<?php
error_reporting(0);
$conn = mysqli_connect("localhost", "root", "", "customers");


?>
<!DOCTYPE html>

<html lang="en">

<head>

    <title>
        AMAL PUSHP
    </title>
    <meta charset="UTF-18" />
    <meta name="viewport" content="width=device-width, intial scale=1.0" />
    <script src="js/jqery-3.5.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="history.css">
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

            <table class="content-table">
                <caption style="text-transform: uppercase; font-weight: bold;">
                    <h1> Transactional History</h1>
                </caption>
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Sender</th>
                        <th>Receiver</th>
                        <th>Amount Transfered</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT * FROM `transfer`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo ' <tr>
                        <td>' . $row['serial_no'] . '</td>
                        <td>' . $row['sender'] . '</td>
                        <td>' . $row['reciver'] . '</td>
                        <td>' . $row['amount'] . '</td>
                    </tr>';
                    }
                    ?>


                </tbody>
            </table>



        </main>



    </header>
    <footer>
        <div id="foot">© 2021. Made by AMAL PUSHP <br>
            For the Project of The Sparks Foundation</div>
    </footer>


</body>

</html>