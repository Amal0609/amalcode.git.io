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

    <meta name="viewport" content="width=device-width, intial scale=1.0" />
    <link rel="stylesheet" type="text/css" href="user.css">
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
                <a href="adduser.php">Add User</a>
                <a href="#">About</a>
            </div>
        </nav>



        <main>



            <table class="content-table">
                <form action="header.php" method="POST">
                    <caption style="text-transform: uppercase; font-weight: bold;">
                        <h1> View All User</h1>
                    </caption>
                    <thead>
                        <tr>
                            <th>Account No.</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Balance</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = "SELECT * FROM `coustomer`";
                        $result = mysqli_query($conn, $sql);
                        while ($rows = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $rows['account_no'] ?></td>
                                <td><?php echo $rows['name'] ?></td>
                                <td><?php echo $rows['email'] ?></td>
                                <td><?php echo $rows['balance'] ?></td>
                                <td><a href="header.php?id=<?php echo $rows['account_no']; ?>"><input type="button" id="btn" value="Transfer Money"> </a></td>
                            </tr>
                        <?php
                        }
                        ?>



                    </tbody>
                </form>
            </table>



        </main>



    </header>
    <footer>
        <div id="foot">© 2021. Made by AMAL PUSHP <br>
            For the Project of The Sparks Foundation</div>
    </footer>


</body>

</html>