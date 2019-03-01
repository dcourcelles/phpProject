<?php
  class coffee{
    private $server = "localhost";
    private $username = "root";
    private $password = "lothric90";
    private $dbname = "dbDansCoffeeShop";
    public $db_conn;

    public $purchaseID;
    public $usernameCustomer;
    public $coffeeName;
    public $amountPurchased;
    public $datePurchased;
    public $userID;
    public $coffeeID;
    public $pathIm;


    Function __construct($_purchaseID=NULL, $_usernameCustomer=NULL, $_coffeeName=NULL, $_amountPurchased=NULL, $_datePurchased=NULL, $_userID=NULL, $_coffeeID=NULL, $pathIm=NULL)
    {
      $this->purchaseID = $_purchaseID;
      $this->usernameCustomer = $_usernameCustomer;
      $this->coffeeName = $_coffeeName;
      $this->amountPurchased = $_amountPurchased;
      $this->datePurchased = $_datePurchased;
      $this->userID = $_userID;
      $this->coffeeID = $_coffeeID;
      $this->pathIm = $_pathIm;
    }

    Function updatePath()
    {
      $sql="CALL spUpdatePath('".$this->usernameCustomer."','".$this->PathIm."');";
      $this->db_conn->query($sql);

    }

    Function connect()
    {
      $this->db_conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);

        if ($this->db_conn->connect_error)
        {
          die("Connection Failed".$db_conn->connect_error);
        }
    }

    Function close()
    {
      $this->db_conn->close();
    }


    Function create()
    {
      $sql="CALL spCreatePurchase('".$this->userID."','".$this->coffeeID."','".$this->amountPurchased."','".$this->datePurchased."');";
      $this->db_conn->query($sql);
    }

    Function readPurchases()
    {
      //executes procedure
      $sql="CALL spReadPurchaseReport();";

      //returns query
      $result=$this->db_conn->query($sql);

      echo '<form action="" method="post">';
      if ($result->num_rows > 0)
      {
          echo '<table><tr><th></th><th></th><th>Username</th><th>Coffee Name</th><th>Bags Purchased</th><th>Date Purchased</th></tr>';
          while ($row = $result->fetch_assoc())
          {
          echo '<tr>'.
                '<td><input type="submit" value="Update" formaction="updatePurchase.php?purchaseID='.$row["purchaseID"].'"></td>'.
                '<td><input type="submit" value="Delete" formaction="deletePurchase.php?purchaseID='.$row["purchaseID"].'">'.
                '</td><td>'.
                $row["username"].'</td><td>'.
                $row["coffeeName"].'</td><td>'.
                $row["amountPurchased"].'</td><td>'.
                $row["datePurchased"].
                '</td></tr>';
          }
      }

      else
      {
          echo 'No rows.';
      }
      echo '</table></form>';
    }

    Function update()
    {
      $sql="CALL spUpdatePurchase('".$this->purchaseID."','".$this->userID."','".$this->coffeeID."','".$this->amountPurchased."','".$this->datePurchased."');";
      $this->db_conn->query($sql);
    }

    Function loadUpdate()
    {
        //executes procedure
        $sql="CALL spReadPurchase('".$this->purchaseID."');";

        //returns query
        $result=$this->db_conn->query($sql);

        if ($result->num_rows > 0)
        {
          $row = $result->fetch_assoc();
          $this->userID = $row["userID"];
          $this->coffeeID = $row["coffeeID"];
          $this->bagspurchased = $row["amountPurchased"];
          $this->datePurchased = $row["datePurchased"];
        }
        else
        {
          echo "Error.";
        }
    }

    Function deletePurchase()
    {
      $sql="CALL spDeletePurchase('".$this->purchaseID."');";
      $this->db_conn->query($sql);
    }

    Function loadDropDownUser()
    {
      $sql = "CALL spReadUser()";
      $result=$this->db_conn->query($sql);

      while ($row = $result->fetch_assoc())
      {
        unset($userID, $username);
        $userID = $row['userID'];
        $username = $row['username'];
        echo '<option value="'.$userID.'">'.$username.'</option>';
      }
    }

    Function loadDropDownCoffee()
    {
      $sql = "CALL spReadCoffee()";
      $result=$this->db_conn->query($sql);

      while ($row = $result->fetch_assoc())
      {
        unset($coffeeID, $coffeeName);
        $coffeeID = $row['coffeeID'];
        $coffeeName = $row['coffeeName'];
        echo '<option value="'.$coffeeID.'">'.$coffeeName.'</option>';
      }
    }
  }
?>
