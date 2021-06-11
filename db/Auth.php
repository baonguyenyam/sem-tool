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

    // CONFIG 
    function getConfig()
    {
        $db_handle = new DBController();
        $query = "Select * from tbl_config where config_id = 1";
        $result = $db_handle->runBaseQuery($query);
        return $result;
    }
    function updateConfig($host, $port, $username, $password, $type, $name)
    {
        $db_handle = new DBController();
        $query = "UPDATE tbl_config SET config_host = ?, config_port = ?, config_username = ?, config_password = ?, config_type = ?, config_name = ? WHERE config_id = 1";
        $result = $db_handle->update($query, 'ssssss', array($host, $port, $username, $password, $type, $name));
        return $result;
    }

    // USER
    function getAllMember($search)
    {
        $db_handle = new DBController();
        $query = "Select * from tbl_members WHERE (member_name LIKE ? OR member_email LIKE ? OR member_fullname LIKE ?) ORDER BY member_id DESC";
        $result = $db_handle->runQuery($query, 'sss', array($search, $search, $search));
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
    function getTokenByUsername($username, $expired)
    {
        $db_handle = new DBController();
        $query = "Select * from tbl_token_auth where auth_username = ? and auth_is_expired = ?";
        $result = $db_handle->runQuery($query, 'si', array($username, $expired));
        return $result;
    }
    function markAsExpired($tokenId)
    {
        $db_handle = new DBController();
        $query = "UPDATE tbl_token_auth SET auth_is_expired = ? WHERE auth_id = ?";
        $expired = 1;
        $result = $db_handle->update($query, 'ii', array($expired, $tokenId));
        return $result;
    }
    function getMemberByUsername($username)
    {
        $db_handle = new DBController();
        $query = "Select * from tbl_members where member_name = ?";
        $result = $db_handle->runQuery($query, 's', array($username));
        return $result;
    }
    function checkEmail($email)
    {
        $db_handle = new DBController();
        $query = "Select * from tbl_members where member_email = ?";
        $result = $db_handle->runQuery($query, 's', array($email));
        return $result;
    }
    function insertUser($username, $random_password, $email, $type, $fullname, $content)
    {
        $db_handle = new DBController();
        $query = "INSERT INTO tbl_members (member_name, member_password, member_email, member_type, member_fullname, member_info) values (?, ?, ?, ?, ?, ?)";
        $result = $db_handle->insert($query, 'ssssss', array($username, $random_password, $email, $type, $fullname, $content));
        return $result;
    }
    function editUser($email, $type = null, $fullname, $content, $id)
    {
        $db_handle = new DBController();
        if(isset($type)) {
            $query = "UPDATE tbl_members SET member_email = ?, member_type = ?, member_fullname = ?, member_info = ? WHERE member_id = $id";
            $result = $db_handle->update($query, 'ssss', array($email, $type, $fullname, $content));
        } else {
            $query = "UPDATE tbl_members SET member_email = ?, member_fullname = ?, member_info = ? WHERE member_id = $id";
            $result = $db_handle->update($query, 'sss', array($email, $fullname, $content));
        }
        return $result;
    }
    function updatePass($tokenId, $pass)
    {
        $db_handle = new DBController();
        $query = "UPDATE tbl_members SET member_password = ? WHERE member_id = ?";
        $result = $db_handle->update($query, 'si', array($pass, $tokenId));
        return $result;
    }
    function checkReset($id, $email, $key)
    {
        $db_handle = new DBController();
        $query = "Select * from tbl_members where member_id = ? AND member_email = ? AND member_temp_pass = ?";
        $result = $db_handle->runQuery($query, 'sss', array($id, $email, $key));
        return $result;
    }
    
    function update($query)
    {
        mysqli_query($this->conn, $query);
    }
}
