<!DOCTYPE html>
<html>

<head>
  <?php include 'navbar.php' ?>
  <a href="create_user.php">Create User</a>
</head>
<style>
  table,
  th,
  td {
    border: 1px solid black;
  }
</style>


<body>

  

  <table style="width:100%">
    <tr>
      <th>Id</th>
      <th>Password</th>

    </tr>
    <?php
    include 'conn.php';
    $total_id = "select * from login";
    $query = mysqli_query($conn, $total_id);
    $nums = mysqli_num_rows($query);


    while ($res = mysqli_fetch_array($query)) {

    ?>
      <tr>
        <td><?php echo $res['id'] ?></td>
        <td><?php echo $res['password'] ?></td>


      </tr>
    <?php
    }
    ?>

  </table>


</body>

</html>