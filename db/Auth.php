<?php
require "DBController.php";
class Auth
{
    
    function upload($name,$fname,$type,$version)
    {
        $db_handle = new DBController();
        $query = "INSERT INTO tbl_upload (upload_name,upload_fname,upload_type,upload_version) values (?, ?, ?, ?)";
        $result = $db_handle->insert($query, 'ssss', array($name,$fname,$type,$version));
        return $result;
    }
    function getfile($type)
    {
        $db_handle = new DBController();
        $query = "SELECT * FROM tbl_upload WHERE upload_type = ? ORDER BY upload_id DESC LIMIT 1";
        $result = $db_handle->runQuery($query, 's', array($type));
        return $result;
    }
    function getfileAll($type)
    {
        $db_handle = new DBController();
        $query = "SELECT * FROM tbl_upload WHERE upload_type = ? ORDER BY upload_id DESC";
        $result = $db_handle->runQuery($query, 's', array($type));
        return $result;
    }
    
    function update($query)
    {
        mysqli_query($this->conn, $query);
    }
}
