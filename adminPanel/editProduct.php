<?php
include('query.php');
include('header.php');
?>


<?php

if (isset($_GET['id'])) {
    $pId = $_GET['id'];
    $query = $pdo->prepare("SELECT products.*, categories.name as catName , categories.id as catId
                            FROM products 
                            INNER JOIN categories ON products.c_id = categories.id 
                            WHERE products.id = :proId");

    $query->bindParam(':proId', $pId);
    $query->execute();
    $product = $query->fetch(PDO::FETCH_ASSOC);
}
?>


<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
        <div class="col-md-8 p-5">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Name</label>
                    <input value="<?php echo $product['name']; ?>" type="text" name="pName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input value="<?php echo $product['des']; ?>" type="text" name="pDes" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input value="<?php echo $product['price']; ?>" type="text" name="pPrice" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Quantity</label>
                    <input value="<?php echo $product['qty']; ?>" type="text" name="pQty" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-danger"></small>
                </div>

                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="pImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    <img height="100px" src="img/<?php echo $product['image'] ?>" alt="">
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <select class="form-control" name="cId" id="">
                        <option value="<?php echo $product['catId'] ?>"><?php echo $product['catName'] ?></option>
                        <?php
                        $query = $pdo->prepare("SELECT * FROM categories
                        where name  != :cName");
                        $query->bindParam(':cName', $product['catName']);
                        $query->execute();
                        $allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($allCategories as $category) {
                        ?>
                            <option value="<?php echo $category['id'] ?>"><?php echo $category['name']  ?></option>
                        <?php

                        }


                        ?>
                    </select>
                </div>

                <button name="updateProduct" class="btn btn-info mt-3">Update</button>
            </form>
        </div>
    </div>
</div>
<!-- Blank End -->



<?php
include('footer.php');
?>