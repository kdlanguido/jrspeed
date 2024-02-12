<?php

class Database
{
    private $host = 'localhost';
    private $db = 'projects_jrspeed_new';
    private $uid = 'root';
    private $pwd = '';
    private $conn;

    public function read($q, $d = [])
    {
        try {
            $this->conn = null;
            $this->conn = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->db, $this->uid, $this->pwd, [PDO::ATTR_EMULATE_PREPARES => false]);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sth = $this->conn->prepare($q);
            $sth->execute($d);
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            return 0;
        }
    }

    public function update($q, $d)
    {
        try {
            $this->conn = null;
            $this->conn = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->db, $this->uid, $this->pwd, [PDO::ATTR_EMULATE_PREPARES => false]);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sth = $this->conn->prepare($q);
            $sth->execute($d);
            return 1;
        } catch (PDOException $e) {
            return 0;
        }
    }

    public function err_msg_empty()
    {
        echo json_encode(
            [
                'status' => 204,
                'msg' => 'No data available',
                'data' => []
            ]
        );
    }

    public function suc_msg_get($d)
    {
        return json_encode(
            [
                'status' => 200,
                'msg' => 'Get Success...',
                'data' => base64_encode(json_encode($d))
            ]
        );
    }

    public function VALIDATE_GET_REQUEST($GET = [])
    {
        $request_type = false;

        foreach ($GET as $key => $value) {
            $get_data = base64_decode($key);
            $get_data = json_decode($get_data, true);
            $request_type = $get_data['request_type'];
        }

        return $request_type;
    }

    public function COLLECT_PAYLOAD($GET = [])
    {
        $payload_data = false;

        foreach ($GET as $key => $value) {
            $get_data = base64_decode($key);
            $get_data = json_decode($get_data, true);
            if (array_key_exists('payload_data', $get_data)) {
                $payload_data = $get_data['payload_data'];
            }
        }
        return $payload_data;
    }
}
