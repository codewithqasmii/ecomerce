<?php
include('query.php');
include('header.php');
?>


<?php

if(isset($_GET['id'])){
  $cId = $_GET['id'];
  $query = $pdo->prepare("select * from categories where id = :catId");
  $query->bindParam(':catId', $cId);
  $query->execute();
  $category = $query->fetch(PDO::FETCH_ASSOC);
}

?>


<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
        <div class="col-md-8 p-5">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="">Name</label>
                  <input value="<?php echo $category['name'];?>" type="text" name="cName" id="" class="form-control" placeholder="" aria-describedby="helpId" pattern="[a-zA-Z\s]+">
                  <small id="helpId" class="text-danger"><?php echo $cNameErr ?></small>
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <input value="<?php echo $category['des'];?>" type="text" name="cDes" id="" class="form-control" placeholder="" aria-describedby="helpId" pattern="[a-zA-Z\s]+">
                  <small id="helpId" class="text-danger"><?php echo $cDesErr ?></small>
                </div>
                <div class="form-group">
                  <label for="">Image</label>
                  <input type="file" name="cImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
                  <small id="helpId" class="text-danger"><?php echo $cImageErr ?></small>
                  <img height="100px" src="img/<?php echo $category['image']?>" alt="">
                </div>
                <button name="updateCategory" class="btn btn-info mt-3">Update</button>
            </form>
        </div>
    </div>
</div>
<!-- Blank End -->



<?php
include('footer.php');
?>