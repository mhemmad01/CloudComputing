<?php
include "user.php";
class dbConnection
{
    protected $serverName;
    protected $userName;
    protected $passCode;
    protected $dbName;
    protected static $conn;

    function dbConnection()
    {
        $this->serverName = 'localhost';
        $this->userName = 'mhemmad';
        $this->passCode = 'Mhmd12345.';
        $this->dbName = 'savepass';
        if ($this::$conn == NULL)
            $this::$conn = new mysqli($this->serverName, 'mhemmad', 'Mhmd12345.', 'savepass');
        if ($this::$conn->connect_error) {
            die("Connection failed: " . $this::$conn->connect_error);
        }
    }


    function ValidateLogin($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email='" . $email . "' AND password='" . $password . "';";
        $result = $this::$conn->query($sql);
        $user = NULL;
        if ($result != null && $result->num_rows > 0) {
            // output data of each row
            $userrow = $result->fetch_assoc();
            $sql = "SELECT * FROM accounts  WHERE user_id='" . $email . "'";
            $result = $this::$conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    new Account($row["id"], $row["username"], $row["password"], $row["website"]);
                }
                $user = new User($userrow["id"], $userrow["email"], $userrow["name"]);
                User::$user = $user;
            } else {
                $user = new User($userrow["id"], $userrow["email"], $userrow["name"]);
                User::$user = $user;
            }
            $_SESSION["premission"] = "connected";
            $_SESSION["name"] = $userrow["name"];
            $_SESSION["email"] = $userrow["email"];
            $_SESSION['password'] = $userrow["password"];
            $_SESSION["id"] = $userrow["id"];
        }

        return $user;
    }

    function createUser($name, $email, $password)
    {
        $sql = "SELECT * FROM users WHERE email='" . $email . "'";
        $result = $this::$conn->query($sql);
        $user = NULL;
        if ($result != null && $result->num_rows > 0) {
            return -1;
        }
        $sql = "INSERT INTO users (email, password, name) VALUES ('" . $email . "', '" . $password . "', '" . $name . "')";
        if ($this::$conn->query($sql)) {
            return 1;
        } else {
            echo "ERROR: Could not able to execute Insert";
            return 0;
        }
    }

    function loadAccounts()
    {
        $accounts =array();
        if(isset($_SESSION["id"])){
            $sql = "SELECT * FROM accounts  WHERE user_id='";
            $sql .= $_SESSION["id"] . "'";
            $result = $this::$conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $acc = new Account($row["id"], $row["username"], $row["password"], $row["website"]);
                    array_push($accounts, $acc);
                }
            } 
        }
        return $accounts;
    }



    function addAccount($website, $username, $password)
    {
        $id= $_SESSION["id"];
        $sql = "INSERT INTO accounts (user_id, username, password, website) VALUES ('" . $id . "', '" . $website . "', '" . $password . "', '" . $username . "')";
        if ($this::$conn->query($sql)) {
            return 1;
        } else {
            echo "ERROR: Could not able to execute Insert";
            return 0;
        }
    }

    function deleteAccount($id)
    {
        $sql = "DELETE FROM accounts WHERE id='$id'";
        if ($this::$conn->query($sql)) {
            return 1;
        } else {
            echo "ERROR: Could not able to execute Insert";
            return 0;
        }
    }


    function updateUser($name,$email,$password)
    {
        $id= $_SESSION["id"];

        $sql = "SELECT * FROM users WHERE email='" . $email . "' AND NOT id=$id";
        $result = $this::$conn->query($sql);
        $user = NULL;
        if ($result != null && $result->num_rows > 0) {
            return -1;
        }
        $sql = "UPDATE users SET email='$email', password='$password', name='$name' WHERE id=$id;";
        if ($this::$conn->query($sql)) {
            return 1;
        } else {
            echo "ERROR: Could not able to execute Insert";
            return 0;
        }
    }
}

// class Mysql extends Dbconfig {

//     public $connectionString;
//     public $dataSet;
//     private $sqlQuery="";
    
//     protected $databaseName;
//     protected $hostName;
//     protected $userName;
//     protected $passCode;

//     function Mysql() {
//         $this -> connectionString = NULL;
//         $this -> sqlQuery = NULL;
//         $this -> dataSet = NULL;

//         $dbPara = new Dbconfig();
//         $this -> databaseName = $dbPara -> dbName;
//         $this -> hostName = $dbPara -> serverName;
//         $this -> userName = $dbPara -> userName;
//         $this -> passCode = $dbPara ->passCode;
//         $dbPara = NULL;
//     }
  
//     function dbConnect()    {
//         $this -> connectionString = mysqli_connect($this -> serverName,$this -> userName,$this -> passCode);
//         $this -> connectionString = mysqli_select_db($this -> connectionString,$this -> databaseName,);
//         // if ($this -> connectionString) {
//         //     die("Connection failed: " . mysqli_connect_error());
//         //   }
//         return $this -> connectionString;
//     }

//     function dbDisconnect() {
//         $this -> connectionString = NULL;
//         $this -> sqlQuery = NULL;
//         $this -> dataSet = NULL;
//         $this -> databaseName = NULL;
//         $this -> hostName = NULL;
//         $this -> userName = NULL;
//         $this -> passCode = NULL;
//     }

//     function selectAll($tableName)  {
//         $qres=1;
//         $this -> sqlQuery = 'SELECT * FROM '.$this -> databaseName.'.'.$tableName;
//         $this -> dataSet = mysqli_query($this -> connectionString, $this -> sqlQuery,$qres);
//         return $this -> dataSet;
//     }

//     function selectWhere($tableName,$rowName,$operator,$value,$valueType)   {
//         $this -> sqlQuery = 'SELECT * FROM '.$tableName.' WHERE '.$rowName.' '.$operator.' ';
//         if($valueType == 'int') {
//             $this -> sqlQuery .= $value;
//         }
//         else if($valueType == 'char')   {
//             $this -> sqlQuery .= "'".$value."'";
//         }
//         $this -> dataSet = mysqli_query($this -> connectionString, $this -> sqlQuery,$this -> connectionString);
//         $this -> sqlQuery = NULL;
//         return $this -> dataSet;
//         #return $this -> sqlQuery;
//     }


//     function insertInto($tableName,$values) {
//         $i = NULL;

//         $this -> sqlQuery = 'INSERT INTO '.$tableName.' VALUES (';
//         $i = 0;
//         while($values[$i]["val"] != NULL && $values[$i]["type"] != NULL) {
//             if($values[$i]["type"] == "char") {
//                 $this -> sqlQuery .= "'";
//                 $this -> sqlQuery .= $values[$i]["val"];
//                 $this -> sqlQuery .= "'";
//             }
//             else if($values[$i]["type"] == 'int') {
//                 $this -> sqlQuery .= $values[$i]["val"];
//             }
//             $i++;
//             if($values[$i]["val"] != NULL)  {
//                 $this -> sqlQuery .= ',';
//             }
//         }
//         $this -> sqlQuery .= ')';
//         #echo $this -> sqlQuery;
//         mysqli_query($this -> connectionString, $this -> sqlQuery,$this ->connectionString);
//         return $this -> sqlQuery;
//         #$this -> sqlQuery = NULL;
//     }

//     function selectFreeRun($query) {
//         $this -> dataSet = mysqli_query($query,$this -> connectionString);
//         return $this -> dataSet;
//     }

//     function freeRun($query) {
//         return mysqli_query($query,$this -> connectionString);
//     }
// }
// 
