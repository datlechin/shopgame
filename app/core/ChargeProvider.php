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

    private string $provider;
    private string $telco;
    private int $amount;
    private string $serial;
    private string $pin;
    private string $request_id;

    public int $status;
    public string $message;

    public object $data;

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

    public function postCard()
    {
        if (setting('charge_provider') == 'CARDVIP') {
            $this->provider = 'CARDVIP';
            $dataPost = array(
                'APIKey' => setting('charge_api_key'),
                'NetworkCode' => $this->telco,
                'PricesExchange' => $this->amount,
                'NumberCard' => $this->pin,
                'SeriCard' => $this->serial,
                'IsFast' => true,
                'RequestId' => $this->request_id,
                'UrlCallback' => site_url('callback')
            );
            $response = $this->curl('https://partner.cardvip.vn/api/createExchange', $dataPost);
            $this->data = json_decode($response);
        } else if (setting('charge_provider') == 'TSR') {
            $this->provider = 'TSR';
            $dataPost = array(
                'telco' => $this->telco,
                'code' => $this->pin,
                'serial' => $this->serial,
                'amount' => $this->amount,
                'request_id' => $this->request_id,
                'partner_id' => setting('charge_api_key'),
                'sign' => md5(setting('charge_partner_id') . $this->pin . $this->serial),
                'command' => 'charging'
            );
            $response = $this->curl('https://thesieure.com/chargingws/v2', $dataPost);
            $this->data = json_decode($response);
        } else {
            $this->data = (object)array(
                'status' => 0,
                'message' => 'Cổng nạp hiện tại đang bảo trì!'
            );
        }

        $this->status = $this->data->status;
        $this->message = $this->data->message;

        if ($this->status == 200) $this->insert();
    }

    private function curl($url, array $dataPost)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
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
            'provider' => $this->provider,
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
