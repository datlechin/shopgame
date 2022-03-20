<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

namespace ShopGame\core;

class ChargeProvider
{
    private Medoo $db;
    private array $user;

    private string $telco;
    private int $amount;
    private string $serial;
    private string $pin;
    private string $request_id;

    public int $status;
    public string $message;

    public function __construct($user, Medoo $db)
    {
        $this->user = $user;
        $this->db = $db;
    }

    public function init(string $telco, int $amount, string $serial, string $pin, string $request_id)
    {
        $this->telco = $telco;
        $this->amount = $amount;
        $this->serial = $serial;
        $this->pin = $pin;
        $this->request_id = $request_id;
    }

    public function postCardVip()
    {
        $dataPost = array(
            'APIKey' => CARDVIP_APIKEY,
            'NetworkCode' => $this->telco,
            'PricesExchange' => $this->amount,
            'NumberCard' => $this->pin,
            'SeriCard' => $this->serial,
            'IsFast' => true,
            'RequestId' => $this->request_id,
            'UrlCallback' => CARDVIP_URL_CALLBACK
        );

        $response = $this->curl('https://partner.cardvip.vn/api/createExchange', $dataPost);
        $data = json_decode($response);

        $this->status = $data->status;
        $this->message = $data->message;

        if ($this->status == 200) $this->insert();
    }

    private function curl(string $apiUrl, array $dataPost)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($dataPost),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }

    private function insert()
    {
        $card = [
            'user_id' => $this->user['id'],
            'telco' => $this->telco,
            'amount_declared' => $this->amount,
            'serial' => $this->serial,
            'pin' => $this->pin,
            'request_id' => $this->request_id,
            'status' => '0'
        ];
        $this->db->insert('charges', $card);
    }
}
