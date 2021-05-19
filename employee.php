<?php
// Initialize the session
session_start();
// Include config file
require_once "config.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
} else {
    $stmt = $pdo->query("SELECT * FROM products");    

    $stmt1 = $pdo->query("SELECT * FROM employee");  
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }
        img {
          width: 50%;
          height: auto;
        }
table.center {
  margin-left: auto; 
  margin-right: auto;
}
    </style>
</head>
<body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <h1 class="my-7">Product Data</h1>
    <table cellpadding="15" cellspacing="30" border="1" class="center">
        <tr>
            <th width="90">Sr. No</th>
            <th width="100">Image</th>
            <th width="200">Product Code</th>
            <th width="200">Name</th>
            <th width="200">Quantity</th>
            <th width="200">Price</th>
        </tr>
        <?php
        while ($row = $stmt->fetch()) {
        ?>
            <tr>
                <td><?php echo $row['productID']; ?></td>
                <td><img src="<?php echo $row['productimg'];?>" alt="Product Image"></td>
                <td><?php echo $row['productCode']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['price']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <h1 class="my-7">Employee Data</h1>
    <table cellpadding="15" cellspacing="30" border="1" class="center">
        <tr>
            <th width="90">Sr. No</th>
            <th width="200">Name</th>
            <th width="200">Emailid</th>
            <th width="200">Phone No</th>
        </tr>
        <?php
        while ($row = $stmt->fetch()) {
        ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['emailid']; ?></td>
                <td><?php echo $row['phoneno']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <p style="margin-top: 100px">
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
</body>
</html>