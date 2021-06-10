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

    // AUTHENTICATION 
    function getMemberByID($id)
    {
        $db_handle = new DBController();
        $query = "Select * from tbl_members where member_id = ?";
        $result = $db_handle->runQuery($query, 's', array($id));
        return $result;
    }
    function getLogin($id)
    {
        $db_handle = new DBController();
        $query = "Select * from tbl_login where member_id = ?";
        $result = $db_handle->runQuery($query, 's', array($id));
        return $result;
    }
    function updateLogin($now, $id)
    {
        $db_handle = new DBController();
        $query = "UPDATE tbl_login SET login_last_login = ? WHERE member_id = $id";
        $result = $db_handle->update($query, 's', array($now));
        return $result;
    }
    function updateTempPass($now, $id)
    {
        $db_handle = new DBController();
        $query = "UPDATE tbl_members SET member_temp_pass = ? WHERE member_id = $id";
        $result = $db_handle->update($query, 's', array($now));
        return $result;
    }
    function insertLogin($now, $id)
    {
        $db_handle = new DBController();
        $query = "INSERT INTO tbl_login (login_last_login, member_id) values (?, ?)";
        $result = $db_handle->insert($query, 'ss', array($now, $id));
        return $result;
    }
    function insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date)
    {
        $db_handle = new DBController();
        $query = "INSERT INTO tbl_token_auth (auth_username, auth_password_hash, auth_selector_hash, auth_expiry_date) values (?, ?, ?,?)";
        $result = $db_handle->insert($query, 'ssss', array($username, $random_password_hash, $random_selector_hash, $expiry_date));
        return $result;
    }
    
    function update($query)
    {
        mysqli_query($this->conn, $query);
    }
}
