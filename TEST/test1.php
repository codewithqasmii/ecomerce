<?php
// Connect to database
$con = mysqli_connect("localhost", "root", "", "web");

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $roleid = $_POST['roleid'];

    if (empty($name) || empty($email) || empty($password) || empty($roleid)) {
      echo "<script> alert('Please fill in all fields')</script>";
      exit();
    }
    
    // Insert data into users table
    $qry = "INSERT INTO users (name, email, password, role_id) VALUES ('$name', '$email', '$password', '$roleid')";
    $result = mysqli_query($con, $qry);

    // Check if data is inserted
    if ($result) {
        echo "<script> alert('Data inserted successfully!')</script>";
    } 
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>MY FIRST PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container border p-5 rounded-4 " style="width: 500px; margin: auto; margin-top:150px; background-color: black;">
    <form method="POST">
        <div>
            <h1 class="text-center text-warning">LOGIN FORM</h1>
        </div>
        <div class="form-group text-warning">
            <label>Name</label>
            <input type="text" name="name" class="form-control " >
        </div>
        <div class="form-group text-warning">
            <label>E-mail</label>
            <input type="emial" name="email" class="form-control" >
        </div>
        <div class="form-group text-warning">
            <label>Password</label>
            <input type="password" name="password" class="form-control" >
        </div>
        <div class="form-group text-warning">
            <label>Select Role</label>
            <select name="roleid" class="form-control">
                <option value="1">Admin</option>
                <option value="2">Users</option>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-warning mt-4 mx-auto" style="width: 100%;">Submit</button>
</form>
    </div>
</body>xt
</html>