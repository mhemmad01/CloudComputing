<?php

class User{
    public static  $user;
    public $id;
    public $email;
    public $name;

    function User($id, $email, $name ){
        $this->id = $id;
        $this->email = $email;
        $this->name = $name; 
    }
}



class Account {

    public static $list = array();

    public $id;
    public $website;
    public $username;
    public $password;

    function Account($id,$username,$password,$website){
        
        $this->id = $id;
        $this->website = $website;
        $this->username = $username; 
        $this->password = $password;

        Account::Add($this);

    }
    public static function Add($obj)
    {
        array_push(Account::$list, $obj);
    }
    
    public function Remove($key)
    {
        if(array_key_exists($key, $this::$list))
        {
            unset($this::$list[$key]);
        }
    }
    
    public function Size()
    {
        return count($this::$list);
    }
    
    public function IsEmpty()
    {
        return empty($this::$list);
    }
    
    public function GetObj($key)
    {
        if(array_key_exists($key, $this::$list))
        {
            return $this::$list[$key];
        }
        else
        {
            return NULL;
        }
    }
    
    public function GetKey($obj)
    {
        $arrKeys = array_keys($this::$list, $obj);
    
        if(empty($arrKeys))    
        {
            return -1;
        }
        else
        {
            return $arrKeys[0];
        }
    }
    
    }

?>