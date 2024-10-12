<?php
include('query.php');
include('header.php');
?>


<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
        <div class="col-md-12 text-center">
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col"><input class="form-check-input" type="checkbox"></th>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = $pdo->query("select * from categories");
                        $allCategory = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($allCategory as $cat) {
                        ?>
                            <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td><?php echo $cat['id'] ?></td>
                                <td><?php echo $cat['name'] ?></td>
                                <td><?php echo $cat['des'] ?></td>
                                <td><img src="img/<?php echo $cat['image'] ?>" alt="" width="50" height="50"></td>
                                <td><a class="btn btn-sm btn-primary" href="editCategrory.php?id=<?php echo $cat['id'] ?>">Edit</a></td>
                                <td><a class="btn btn-sm btn-danger" href="viewCategory.php?cId=<?php echo $cat['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a></td>

                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Blank End -->


<?php
include("footer.php");
?>

