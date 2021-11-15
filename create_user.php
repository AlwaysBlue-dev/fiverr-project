<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        button {
            background-color: #4CAF50;
            width: 100%;
            color: orange;
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

        button:hover {
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

        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>

</head>

<body>
    <a href="admin_logout.php">Log Out</a>
    <center>
        <h1>Create User </h1>
    </center>
    <form method="POST">
        <div class="container">
            <input type="submit" name="generate" value="generate password" />
            <input type="submit" name="showpwd" value="show generated passwords" />
        </div>
    </form>
    <?php
    session_start();

    include 'conn.php';

    function generate_password($len = 8)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr(str_shuffle($chars), 0, $len);
        return $password;
    }


    if (isset($_POST['generate'])) {
        $gen_pass = generate_password();
        $gen_querry = "insert into login (id, password) values(DEFAULT, '$gen_pass')";
        $querry_res = mysqli_query($conn, $gen_querry);
        if ($querry_res) {
    ?>
            <script>
                alert("Password generated")
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("No Password generated")
            </script>
    <?php
        }
    }

    if (isset($_POST['showpwd'])) {
        header("location:showpassword.php");
    }
    ?>