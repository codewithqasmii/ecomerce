<?php

include('query.php')
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
</head>
<body>
    <div class="container border p-5 rounded w-50 bg-info " style="margin-top: 100px;">
        <h1>Sign Up</h1>
<form action="" method="post" class="container">
    <div class="form-group">
        <label for="userName">NAME</label>
        <input value="<?php echo $userName ?>" type="text" name="userName" id="userName" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-danger"><?php echo $userNameErr ?></small>
    </div>
    <div class="form-group">
        <label for="userEmail">EMAIL</label>
        <input value="<?php echo $userEmail ?>" type="email" name="userEmail" id="userEmail" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-danger"><?php echo $userEmailErr ?></small>
    </div>
    <div class="form-group">
        <label for="userPassword">PASSWORD</label>
        <input value="<?php echo $userPassword ?>" type="password" name="userPassword" id="userPassword" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-danger"><?php echo $userPasswordErr ?></small>
    </div>
    <div class="form-group">
        <label for="userConfirmPassword">CONFIRM PASSWORD</label>
        <input value="<?php echo $userConfirmPassword ?>" type="password" name="userConfirmPassword" id="userConfirmPassword" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-danger"><?php echo $userConfirmPasswordErr ?></small> 
    </div>
    <button type="submit" name="userRegister" class="btn btn-primary mt-3">SUBMIT</button>
</form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>