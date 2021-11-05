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
    </style>
</head>

<body>
    <center>
        <h1> Login </h1>
    </center>
    <form method="POST">
        <div class="container">
            <label>Password : </label>
            <input type="password" name="password" placeholder="Enter Password" />
            <input type="submit" name="submit" value="login" />
            <input type="submit" name="generate" value="generate password" />

            <?php
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



            if (isset($_POST['submit'])) {
                $user_password = $_POST['password'];

                $query = "select * from login where password = '$user_password'";
                $login_result = mysqli_query($conn, $query);

                $count = mysqli_num_rows($login_result);
                if ($count > 0) {
                    header("location:tour.php");
                } else {
                ?>

                    <script>
                        alert("Wrong Password")
                    </script>;
            <?php
                }
            }
            ?>
        </div>
    </form>
</body>

</html>