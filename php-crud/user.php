<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];

    $sql = "insert into `crud` (name,email,mobile,password)
    values('$name', '$email', '$mobile', '$password')";
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
                <input type="text" class="form-control" name="name">  
            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" class="form-control" name="email">  
            </div>
            <div class="mb-3">
                <label class="form-label">Phone:</label>
                <input type="text" class="form-control" name="mobile">  
            </div>
            <div class="mb-3">
                <label class="form-label">Password:</label>
                <input type="password" class="form-control" name="password">  
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

</body>

</html>