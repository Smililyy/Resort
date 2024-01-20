<?php

class Database
{
    private $con;
    private $db_server = 'localhost';
    private $db_username = 'root';
    private $db_password = '';
    private $db_name = 'hotel';

    public function connect()
    {
        // Connect to the database
        $this->con = new mysqli($this->db_server, $this->db_username, $this->db_password, $this->db_name);
        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }
    }
    public function prepare($sql)
    {
        // Tạo một đối tượng PDOStatement
        $stmt = $this->con->prepare($sql);
        // Kiểm tra lỗi
        if ($stmt === false) {
            die("Error preparing statement: " . $this->con->error);
        }

        return $stmt;
    }

    public function queryNoStmt($sql)
    {
        $result = $this->con->query($sql);

        if ($result === false) {
            die("Error executing query: " . $this->con->error);
        }
        return $result;
    }
    public function query($sql)
    {
        $stmt = $this->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getError()
    {
        return $this->con->error;
    }
    public function getInsertId()
    {
        return $this->con->insert_id;
    }
    public function close()
    {
        $this->con->close();
    }
}
