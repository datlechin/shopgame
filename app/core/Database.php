<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @version 0.0.1
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

class Database
{
    private string $host;
    private string $user;
    private string $dbname;
    private string $password;
    private object $conn;

    public function __construct($host, $user, $password, $dbname)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;

        $this->connect();
    }

    public function connect()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    /**
     * @param $sql
     * @return mysqli_result|bool
     */
    public function query($sql): mysqli_result|bool
    {
        return $this->conn->query($sql);
    }

    /**
     * @param $result
     * @return int
     */
    public function numRows($result): int
    {
        return $result->num_rows;
    }

    /**
     * @param $result
     * @return array
     */
    public function fetchAssoc($result): array
    {
        return $result->fetch_assoc();
    }

    /**
     * @param $result
     * @return array
     */
    public function fetchArray($result): array
    {
        return $result->fetch_array();
    }

    /**
     * @param $result
     * @return array
     */
    public function fetchRow($result): array
    {
        return $result->fetch_row();
    }

    /**
     * @return int|string
     */
    public function getLastId(): int|string
    {
        return $this->conn->insert_id;
    }

    /**
     * @return string
     */
    public function error(): string
    {
        return $this->conn->error;
    }

    /**
     * @return int
     */
    public function getAffectedRows(): int
    {
        return $this->conn->affected_rows;
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}