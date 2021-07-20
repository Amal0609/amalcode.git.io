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
    <link rel="stylesheet" type="text/css" href="addUser.css">
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
                <form action="addUser1.php" method="post">
                    <caption style="text-transform: uppercase; font-weight: bold;">
                        <h1> Add New User</h1>
                    </caption>
                    <thead>
                        <tr>
                            <th>Account No.</th>
                            <td><input type="number" name="account" placeholder="Enter your Account No."></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><input type="text" name="naam" placeholder="Enter your Name"></td>
                        </tr>
                        <tr>
                            <th>E-Mail</th>
                            <td><input type="text" name="email" placeholder="Enter your E-Mail"></td>
                        </tr>
                        <tr>
                            <th>Balance</th>
                            <td><input type="number" name="balance" placeholder="Enter your Balance"></td>
                        </tr>

                    </thead>
                    <tbody>


                    </tbody>
            </table>
            <input type="submit" id="btn" value="Submit" name="submit">
            </form>

        </main>



    </header>
    <footer>
        <div id="foot">© 2021. Made by AMAL PUSHP <br>
            For the Project of The Sparks Foundation</div>
    </footer>


</body>

</html>