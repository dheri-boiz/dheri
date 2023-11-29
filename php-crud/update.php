<!-- <?php
include 'connect.php';

$id=$_GET['updateid'];
$sql = "select * from `crud` where id=$id";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$name =$row["name"];
$email =$row["email"];
$mobile =$row["mobile"];
$password=$row["password"];

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];

    $sql = "update `crud` set id=$id, name='$name', email='$email', mobile='$mobile', password='$password' where id=$id";
    $result = mysqli_query($con,$sql);
    if($result){
        header('location:display.php');
    }else{
        die(mysqli_error($con));
    }
} 


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Name:</label>
                <input type="text" class="form-control" name="name" value=<?php echo $name;?>>  
            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" value=<?php echo $email;?>>  
            </div>
            <div class="mb-3">
                <label class="form-label">Phone:</label>
                <input type="text" class="form-control" name="mobile" value=<?php echo $mobile;?>>  
            </div>
            <div class="mb-3">
                <label class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" value=<?php echo $password;?>>  
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>

</body>

</html> -->

<?php
include 'connect.php';

$id = $_GET['updateid'];
$sql = "SELECT * FROM `crud` WHERE id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row["name"];
$email = $row["email"];
$mobile = $row["mobile"];
$password = $row["password"];

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "UPDATE `crud` SET name='$name', email='$email', mobile='$mobile', password='$password' WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if($result){
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone:</label>
                <input type="text" class="form-control" name="mobile" value="<?php echo $mobile; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>

</html>
