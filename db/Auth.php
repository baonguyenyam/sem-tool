<?php
require "DBController.php";
class Auth
{
    
    function upload($name,$fname,$type,$version)
    {
        $db_handle = new DBController();
        $query = "INSERT INTO upload (name,fname,type,version) values (?, ?, ?, ?)";
        $result = $db_handle->insert($query, 'ssss', array($name,$fname,$type,$version));
        return $result;
    }
    function getfile($type)
    {
        $db_handle = new DBController();
        $query = "SELECT * FROM upload WHERE type = ? ORDER BY id DESC LIMIT 1";
        $result = $db_handle->runQuery($query, 's', array($type));
        return $result;
    }
    
    function update($query)
    {
        mysqli_query($this->conn, $query);
    }
}
