<?php
include('../dbcon.php');
session_start();


$cName = $cDes = $cImage = "";
$cNameErr = $cDesErr = $cImageErr = "";


if (isset($_POST['addcategory'])) {

    $cName = $_POST['cName'];
    $cDes = $_POST['cDes'];
    $imageName = $_FILES['cImage']['name'];
    $cImageTemp = $_FILES['cImage']['tmp_name'];
    $cImageSize = $_FILES['cImage']['size'];


    if (empty($cName)) {
        $cNameErr = "Name Required";
    }
    if (empty($cDes)) {
        $cDesErr = "Description Required";
    }
    $format = ['png', 'jpg', 'jpeg'];
    $extension = pathinfo($imageName, PATHINFO_EXTENSION);
    if (!in_array($extension, $format)) {
        $cImageErr = "Invalid Image Format";
    }
    if (empty($cNameErr) && empty($cDesErr) && empty($cImageErr)) {
        $image_temName = $_FILES['cimage']['tmp_name'];
        $destination = "img/" . $imageName;

        if (move_uploaded_file($cImageTemp, $destination)) {
            $query = $pdo->prepare("insert into categories (name,des,image) values (:name, :des, :image)");
            $query->bindParam('name', $cName);
            $query->bindParam('des', $cDes);
            $query->bindParam('image', $imageName);
            $query->execute();

            echo "<script>
                alert('Category added successfully');
               location.assign('viewCategory.php');
                </script>";
        }
    } else {
        // echo "<script>alert('complete all fields')</script>";
    }
}


// update category

if (isset($_POST['updateCategory'])) {
    $cId = $_GET['id'];
    $cName = $_POST['cName'];
    $cDes = $_POST['cDes'];
    $query = $pdo->prepare("update categories set name = :cName, des=:cDes where id =:cId");
    if (isset($_FILES['cImage'])) {
        $cImageName = $_FILES['cImage']['name'];
        $cImageTempName = $_FILES['cImage']['tmp_name'];
        $destination = "img/" . $cImageName;
        $extension = pathinfo($cImageName, PATHINFO_EXTENSION);
        $format = ['png', 'jpg', 'jpeg'];
        if (in_array($extension, $format)) {
            if (move_uploaded_file($cImageTempName, $destination)) {
                $query = $pdo->prepare("update categories set name = :cName, des = :cDes, image = :cImage where id = :cId");
                $query->bindParam('cImage', $cImageName);
            }
        }
    }
    $query->bindParam('cName', $cName);
    $query->bindParam('cDes', $cDes);
    $query->bindParam('cId', $cId);
    $query->execute();
    echo "<script>
    alert('Category Update successfully');
   location.assign('viewCategory.php');
    </script>";
}


//delete category
if (isset($_GET['cId'])) {
    $cId = $_GET['cId'];
    $query = $pdo->prepare("DELETE FROM categories WHERE id = :CID");
    $query->bindParam(':CID', $cId);
    $query->execute();

    echo "<script>
    alert('Category delete successfully');
   location.assign('viewCategory.php');
    </script>";
}


//delete product
if (isset($_GET['pId'])) {
    $pId = $_GET['pId'];
    $query = $pdo->prepare("DELETE FROM products WHERE id = :id");
    $query->bindParam(':id', $pId);
    $query->execute();

    echo "<script>
    alert('product delete successfully');
   location.assign('viewProduct.php');
    </script>";
}




//add product
if (isset($_POST['addProduct'])) {
    $pName = $_POST['pName'];
    $pDes = $_POST['pDes'];
    $pQty = $_POST['pQty'];
    $pPrice = $_POST['pPrice'];
    $cId = $_POST['cId'];
    $pImageName = $_FILES['pImage']['name'];
    $pImageTemName = $_FILES['pImage']['tmp_name'];
    $destination = "img/".$pImageName;
    $extension = pathinfo($pImageName, PATHINFO_EXTENSION);
    $format = ['png', 'jpg', 'jpeg'];
    if (in_array($extension, $format)) {
        if (move_uploaded_file($pImageTemName, $destination)) {
            $query = $pdo->prepare("INSERT INTO products (name, price, des, qty, image, c_id) values (:name, :price, :des, :qty, :image, :c_id)");
            $query->bindParam('name', $pName);
            $query->bindParam('des', $pDes);
            $query->bindParam('qty', $pQty);
            $query->bindParam('price', $pPrice);
            $query->bindParam('c_id', $cId);
            $query->bindParam('image', $pImageName);
            $query->execute();

            echo "<script>
    alert('product add  successfully');
   location.assign('addProduct.php');
    </script>";
        }
    }
}

// update product

if (isset($_POST['updateProduct'])) {
    $pId = $_GET['id'];
    $pName = $_POST['pName'];
    $pDes = $_POST['pDes'];
    $pPrice = $_POST['pPrice'];
    $pQty = $_POST['pQty'];
    $cId = $_POST['cId'];
    
    $query = $pdo->prepare("update products set name = :pName, des = :pDes, price = :pPrice, qty = :pQty, c_id = :cId  where id =:pId");

    if (isset($_FILES['pImage'])) {
        $pImageName = $_FILES['pImage']['name'];
        $pImageTempName = $_FILES['pImage']['tmp_name'];
        $destination = "img/".$pImageName;
        $extension = pathinfo($pImageName, PATHINFO_EXTENSION);
        $format = ['png', 'jpg', 'jpeg'];
        
        if (in_array($extension, $format)) {
            if (move_uploaded_file($pImageTempName, $destination)) {
                $query = $pdo->prepare("update products set name = :pName, des = :pDes, price = :pPrice, qty = :pQty, c_id = :cId, image = :pImage where id = :pId");

                $query->bindParam('pImage', $pImageName);
            }
        }
    }
    $query->bindParam('pName', $pName);
    $query->bindParam('pDes', $pDes);
    $query->bindParam('pPrice', $pPrice);
    $query->bindParam('pQty', $pQty);
    $query->bindParam('cId', $cId);
    $query->bindParam('pId', $pId);
   
    $query->execute();

    echo "<script>
    alert('product Update successfully');
   location.assign('viewProduct.php');
    </script>";
}