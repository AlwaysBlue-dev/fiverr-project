<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .login_btn {
            background-color: #4CAF50;
            width: 100%;
            color: #fff;
            padding: 15px;
            margin: 10px 0px;
            border: none;
            cursor: pointer;
        }

        form {
            border: 3px solid #f1f1f1;
            width: 50%;
            margin: auto;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            margin: 8px 0;
            padding: 12px 20px;
            display: inline-block;
            border: 2px solid green;
            box-sizing: border-box;
        }

        .login_btn:hover {
            opacity: 0.7;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            margin: 10px 5px;
        }


        .container {
            padding: 25px;
            background-color: lightblue;
        }
    </style>

    <?php session_start(); ?>
</head>

<body>
    <a href="admin_login.php">Admin</a>
    <center>
        <h1> Login </h1>
    </center>
    <form method="POST">
        <div class="container">
            <label>Password : </label>
            <input type="password" name="password" placeholder="Enter Password" />
            <input type="submit" name="submit" value="Login" class="login_btn" />
    </form>


    <?php


    include 'conn.php';



    if (isset($_POST['submit'])) {

        $user_password = $_POST['password'];

        $query = "select * from login where password = '$user_password'";
        $login_result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($login_result);

        if ($count > 0) {
            $_SESSION["login"] = "Login Sucessfully";
            header("location:tour.php");
    ?>
        <?php

        } else {
        ?>
            <script>
                alert("Wrong Password")
            </script>
    <?php
        }
    }

    ?>

    </div>
    </form>
</body>

</html>