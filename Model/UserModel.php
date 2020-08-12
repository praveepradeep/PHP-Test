<?php

class UserModel
{
    // set database config for mysql
    function __construct($consetup)
    {
        $this->host = $consetup->host;
        $this->user = $consetup->user;
        $this->pass =  $consetup->pass;
        $this->db = $consetup->db;
    }
    // open mysql data base
    public function open_db()
    {
        $this->condb = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->condb->connect_error) {
            die("Erron in connection: " . $this->condb->connect_error);
        }
    }
    // close database
    public function close_db()
    {
        $this->condb->close();
    }

    // insert record
    public function insertRecord($obj)
    {

        try {
            $this->open_db();
            $query = $this->condb->prepare("INSERT INTO phptest (email, first_name, last_name, password, date_of_birth) VALUES (?, ?, ?, ?, ?)");
            $query->bind_param("sssss", $obj->email, $obj->first_name, $obj->last_name, $obj->password, $obj->date_of_birth);
            $query->execute();
            $res = $query->get_result();
            $last_id = $this->condb->insert_id;
            $query->close();
            $this->close_db();
            return $last_id;
        } catch (Exception $e) {
            $this->close_db();
            throw $e;
        }
    }
    //update record
    public function updateRecord($obj)
    {
        try {
            $this->open_db();
            $query = $this->condb->prepare("UPDATE phptest SET email=?,first_name=? WHERE id=?");
            $query->bind_param("ssi", $obj->email, $obj->first_name, $obj->id);
            $query->execute();
            $res = $query->get_result();
            $query->close();
            $this->close_db();
            return true;
        } catch (Exception $e) {
            $this->close_db();
            throw $e;
        }
    }
    // delete record
    public function deleteRecord($id)
    {
        try {
            $this->open_db();
            $query = $this->condb->prepare("DELETE FROM phptest WHERE id=?");
            $query->bind_param("i", $id);
            $query->execute();
            $res = $query->get_result();
            $query->close();
            $this->close_db();
            return true;
        } catch (Exception $e) {
            $this->close_db();
            throw $e;
        }
    }

    // select record     
    public function selectRecord($id = null)
    {
        try {
            $this->open_db();

            $query = $this->condb->prepare("SELECT * FROM phptest WHERE id=?");
            $query->bind_param("i", $id);

            $query->execute();
            $res = $query->get_result();
            $query->close();
            $this->close_db();
            return $res;
        } catch (Exception $e) {
            $this->close_db();
            throw $e;
        }
    }

    // get record     
    public function getRecord($email, $password)
    {
        try {
            $this->open_db();
            $query = $this->condb->prepare("SELECT * FROM phptest WHERE email=? AND password=?");
            $query->bind_param("ss", $email, $password);
            $query->execute();
            $res = $query->get_result();
            $query->close();
            $this->close_db();
            return $res;
        } catch (Exception $e) {
            $this->close_db();
            throw $e;
        }
    }
}
