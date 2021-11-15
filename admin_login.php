<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Login Page </title>
    <style>
        Body {
            font-family: Calibri, Helvetica, sans-serif;
        }

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
</head>

<body>
    <a href="index.php">User</a>
    <center>
        <h1> Admin Login </h1>
    </center>
    <form method="POST">
        <div class="container">
            <label>Username : </label>
            <input type="text" name="username" placeholder="Enter Username" required>
            <label>Password : </label>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="submit" name="submit" value="Login" class="login_btn">
        </div>
    </form>
</body>

</html>

<?php
session_start();

include 'conn.php';

if (isset($_POST['submit'])) {
    $admin_name = $_POST['username'];
    $admin_password = $_POST['password'];

    $query = "select * from admin where username = '$admin_name' and password = '$admin_password' ";
    $login_result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($login_result);

    if ($count > 0) {
        $_SESSION["admin"] = "Login Sucessfully";
        header("location:create_user.php");
    } else {
?>
        <script>
            alert("Wrong Username or Password")
        </script>
<?php
    }
}
?>