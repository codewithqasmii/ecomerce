<?php
include("query.php")
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>login</title>
</head>
<body>

    <div class="container w-50 border rounded-3 bg-[lightyellow] p-5" style="margin-top: 80px;" >
        <h1>Login</h1>
        <div class="col">
            <form action="" method="post">
            <div class="form-group">
              <label for="">E-mail</label>
              <input value="<?php echo $u_email ?>" type="email" name="uEmail" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-danger"><?php echo $u_emailErr?></small>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
              <label for="">Password</label>
              <input value="<?php echo $u_pass ?>" type="password" name="uPass" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-danger"><?php echo $u_passErr ?></small>
            </div>
        </div>
        <button class="btn btn-primary mt-3" name="userLogin">Login</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>