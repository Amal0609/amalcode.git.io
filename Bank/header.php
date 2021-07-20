<?php
error_reporting(0);
$conn = mysqli_connect("localhost", "root", "", "customers");
if (!$conn) {
  echo "Error : "  . "<br>" . mysqli_connect_errno($conn);
}
if (isset($_POST['submit'])) {
  $from = $_GET['id'];
  $to = $_POST['to'];
  $amount = $_POST['amount'];

  $sql = "SELECT * FROM `coustomer` WHERE account_no=$from";
  $query1 = mysqli_query($conn, $sql);
  $sql1 = mysqli_fetch_array($query1);

  $sql = "SELECT * FROM `coustomer` WHERE account_no=$to";
  $query2 = mysqli_query($conn, $sql);
  $sql2 = mysqli_fetch_array($query2);

  if (($amount) < 0) {
    echo '<script type="text/javascript">';
    echo ' alert("Oops! Negative values cannot be transferred")';
    echo '</script>';
  }



  // constraint to check insufficient balance.
  else if ($amount > $sql1['balance']) {

    echo '<script type="text/javascript">';
    echo ' alert("Bad Luck! Insufficient Balance")';
    echo '</script>';
  }



  // constraint to check zero values
  else if ($amount == 0) {

    echo "<script type='text/javascript'>";
    echo "alert('Oops! Zero value cannot be transferred')";
    echo "</script>";
  } else {

    $newbalance = $sql1['balance'] - $amount;
    $sql = "UPDATE `coustomer` SET balance=$newbalance WHERE account_no=$from";
    mysqli_query($conn, $sql);

    $newbalance = $sql2['balance'] + $amount;
    $sql = "UPDATE `coustomer` SET balance=$newbalance WHERE account_no=$to";
    mysqli_query($conn, $sql);

    $sender = $sql1['name'];
    $receiver = $sql2['name'];
    $sql = "INSERT INTO `transfer`(`sender`, `reciver`, `amount`) VALUES ('$sender','$receiver','$amount')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
      echo "<script> alert('Transaction Successful');
                                     window.location='history.php';
                           </script>";
    } else {
      echo "error in the database AMAL PUSHP";
    }

    $newbalance = 0;
    $amount = 0;
  }
}

?>
<!DOCTYPE html>

<html lang="en">

<head>

  <title>
    AMAL PUSHP
  </title>

  <meta name="viewport" content="width=device-width, intial scale=1.0" />
  <link rel="stylesheet" type="text/css" href="header1.css">
  <script src="js/jqery-3.5.1.min.js" type="text/javascript"></script>
  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>

<body>
  <header>
    <nav>
      <div class="logo">
        <a href="home.html"><img src="Img/logo.png" alt="logo" id="img1"> </a>
      </div>
      <div class="menu">
        <a href="home.html">Home</a>
        <a href="addUser.php">Add User</a>
        <a href="#">About</a>
      </div>
    </nav>



    <main>

      <?php

      $no = $_GET['id'];
      $sql = "SELECT * FROM  `coustomer` WHERE account_no=$no";
      $result = mysqli_query($conn, $sql);
      if (!$result) {
        echo "Error : " . $sql . "<br>" . mysqli_error($conn);
      }
      $row = mysqli_fetch_assoc($result);
      ?>

      <table class="content-table">
        <caption style="text-transform: uppercase; font-weight: bold;">
          <h1> Transaction Page</h1>
        </caption>
        <thead>
          <tr>
            <th>Account No.</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Balance</th>

          </tr>
        </thead>
        <tbody>
          <?php

          echo ' <tr>
              <td>' . $row['account_no'] . '</td>
              <td>' . $row['name'] . '</td>
              <td>' . $row['email'] . '</td>
              <td>' . $row['balance'] . '</td>
            </tr>';

          ?>

        </tbody>
      </table>
      <br><br><br>
      <div class="sent">
        <span>
          <h1>Sender Name:</h1>
        </span>

        <h3><?php echo $row['name']; ?></h3>

      </div><br>
      <?php
      $conn = mysqli_connect("localhost", "root", "", "customers");
      $sid = $_GET['id'];
      $sql = "SELECT * FROM `coustomer` WHERE account_no!=$sid";
      $result = mysqli_query($conn, $sql);
      if (!$result) {
        echo "Error " . $sql . "<br>" . mysqli_error($conn);
      }
      ?>

      <div class="send">
        <form method="post">
          <div>
            <label>
              <h2>Transfer To:</h2>
            </label>
            <br>
            <select name="to" width="10px" required>
              <option value="" disabled selected>Choose</option>
              <?php
              while ($rows = mysqli_fetch_assoc($result)) {
              ?>

                <option value="<?php echo $rows['id']; ?>"> <?php echo $rows['name']; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
      </div>
      <div id="am" class="send">
        <label>
          <h2> Enter Amount:</h2>
        </label>
        <input type="number" name="amount" height="100px">
      </div>


      <div class="enter">
        <button name="submit" type="submit" id="press">Transfer</button>
      </div>
      </form>

    </main>



  </header>
  <footer>
    <div id="foot">© 2021. Made by AMAL PUSHP <br>
      For the Project of The Sparks Foundation</div>
  </footer>


</body>

</html>