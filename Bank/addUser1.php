<?php
error_reporting(0);
$conn = mysqli_connect("localhost", "root", "", "customers");



  $NO = $_POST['account'];
$name = $_POST['naam'];
$mail = $_POST['email'];
$balance = $_POST['balance'];

    $sql = "INSERT INTO `coustomer`(`account_no`, `name`, `email`, `balance`) VALUES ('$NO','$name','$mail','$balance')";
    $query = mysqli_query($conn, $sql);
                           if ($query) {
                            echo "<script> alert('Added Successfully');
                                                           window.location='allUser.php';
                                                 </script>";
                          } else {
                            echo "Error : " . $sql . "<br>" . mysqli_connect_errno();
                          }
