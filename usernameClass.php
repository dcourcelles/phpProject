<?php
  class login{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "dbDansCoffeeShop";
    public $db_conn;

    public $inputUsername;
    public $inputPassword;

    Function __construct($_username, $_password)
    {
      $this->inputUsername = $_username;
      $this->inputPassword = $_password;      
    }

    Function login()
    {
        $db_conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);

        if (mysqli_connect_errno())
        {
          echo 'Connection to database failed:'.mysqli_connect_error();
          exit();
        }

        $sql="CALL spLogin( '".$this->inputUsername."', '".$this->inputPassword."');";

        $result= $db_conn->query($sql);
        if ($result->num_rows>0)
        {
          // if they are in the database register the user id
          $row = $result->fetch_assoc();
          session_start();
          $_SESSION['valid_user'] = $this->inputUsername;
          $_SESSION['pathIm'] = $row['pathIm'];

          header("Location: home.php");
        }
        else
        {
        //header("Location: login.php");
        }
        $this->$db_conn->close();
      }
    }
?>
