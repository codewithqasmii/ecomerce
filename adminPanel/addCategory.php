<?php
include('query.php');
include('header.php');
?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
        <div class="col-md-8 p-5">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="">Name</label>
                  <input value="<?php echo $cName;?>" type="text" name="cName" id="" class="form-control" placeholder="" aria-describedby="helpId" pattern="[a-zA-Z\s]+">
                  <small id="helpId" class="text-danger"><?php echo $cNameErr ?></small>
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <input value="<?php echo $cDes;?>" type="text" name="cDes" id="" class="form-control" placeholder="" aria-describedby="helpId" pattern="[a-zA-Z\s]+">
                  <small id="helpId" class="text-danger"><?php echo $cDesErr ?></small>
                </div>
                <div class="form-group">
                  <label for="">Image</label>
                  <input value="<?php echo $cImage;?>" type="file" name="cImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
                  <small id="helpId" class="text-danger"><?php echo $cImageErr ?></small>
                </div>
                <button name="addcategory" class="btn btn-info mt-3">Add</button>
            </form>
        </div>
    </div>
</div>
<!-- Blank End -->



<?php
include('footer.php');
?>