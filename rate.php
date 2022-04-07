
<?php include "config/connectoin.php"?>
<?php include "includes/header.php";?>
        <!-- Sidenav -->
<?php include "includes/sidenav.php";?>
        <!-- Main content -->
        <div class="main-content" id="panel">
            <!-- Topnav -->
            <?php include "includes/topnav.php";?>
            <!-- Header -->

    <!-- Page content -->
    <div class="container-fluid mt-3">
 <?php

if (isset($_POST['convert1 '])) {
    $af2rs = $_POST['af2rs'];

    $query = "SELECT * FROM sarafi ORDER BY id DESC LIMIT 1";
    $selectLast = mysqli_query($connection, $query);
    if ($selectLast) {
        while ($rows = mysqli_fetch_assoc($selectLast)) {
            $lastAf2rs = $rows['af2rs'];
        }
    }

    if ($af2rs == "" || empty($af2rs)) {
        echo "SORRY!!! The Field Is Empty";
    } elseif ($af2rs == $lastAf2rs) {
        echo "SORRY!!! This Record is already Exists";
    } else {

        $query = "INSERT INTO sarafi (af2rs) VALUES ('{$af2rs}')";
        $insertAf2rs = mysqli_query($connection, $query);

    }

}
if (isset($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $query = "DELETE FROM sarafi WHERE id = '{$deleteId}'";
    $deleteRec = mysqli_query($connection, $query);

    header('Location:rate.php');

}

?>
    <h1 class="display-2 pashtofont text-center">صرافی  </h1>
        <div class="row">



<?php

// $query = "SELECT * FROM categories";
// $selectCategories = mysqli_query($connection, $query);
// while ($rows = mysqli_fetch_assoc($selectCategories)) {
//     $catId = $rows['category_id'];
//     $catTitle = $rows['category_name'];

//     echo
//         "<tr>
// <td>{$catId}</td>
// <td>{$catTitle}</td>
// <td>
// <a href='categories.php?delete= {$catId}'>Delete</a></td>
// <td> <a href='categories.php?edit= {$catId}'>Edit</a></td>

// </tr>";

// }

// if (isset($_GET['delete'])) {
//     $deleteId = $_GET['delete'];
//     $query = "DELETE FROM categories WHERE cat_id = '{$deleteId}'";
//     $deleteCategory = mysqli_query($connection, $query);
//     header('Location:categories.php');

// }

?>

            <!-- Main Table -->

            <div class="col-xl-2 col-md-2"></div>
        <div class="col-xl-8 col-md-6">
        <?php
if (isset($_GET['editId'])) {
    $theEditId = $_GET['editId'];
    $query = "SELECT * FROM sarafi WHERE id = $theEditId";
    $editCategory = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($editCategory)) {
        $editRec = $rows['af2rs'];
    }
    ?>
    <form action="" method="POST">
    <div class="input-group mb-3">
<input name="af2rs" value="<?=$editRec?>" type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">

<div class="input-group-append">
<input class="btn btn-success" type="submit" value="Update" name="updateRec">
</div>
</div>

    </form>
    <?php
} else {
    ?>
    <form action="" method="POST">
        <div class="input-group mb-3">
  <input name="af2rs" type="text" class="form-control" placeholder=" د 1000 افغانیو څو کلداری کیږی " aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <input class="btn btn-success" type="submit" value="Add" name="convert1">
  </div>
</div>

        </form>
<?php }

if (isset($_POST['updateRec'])) {
    $af2rs = $_POST['af2rs'];

    $query = "UPDATE sarafi SET af2rs = '$af2rs' WHERE id = '$theEditId'";
    $updateCategory = mysqli_query($connection, $query);
    if (!$updateCategory) {
        die("ERROR " . mysqli_error($connection));
    }
    header("Location:rate.php");
}

?>

        </div>
        <div class="col-xl-2 col-md-2"></div>
</div>

<div class="row">

            <div class="col-xl-12 col-md-12" dir="rtl">

 <!-- Light table -->
 <div class="table-responsive">
              <table class="table table-flush table-condensed table-bordered table-striped table-primary" id="">
                <thead class="thead-light">
                <tr class="pashtofont text-center">


<th style="font-size:16px">تاریخ</th>
<th style="font-size:16px"> افغانی</th>
<th style="font-size:16px"> کلداری</th>
<!-- <th style="font-size:16px">جمله ډالر</th> -->
<th style="font-size:16px">عملیات</th>

</tr>
</thead>
<tbody class="list">




<!-- display  Mobiles From Database -->
<?php
$query = "SELECT * FROM sarafi";
$selectCategories = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($selectCategories)) {
    $id = $rows['id'];
    $date = $rows['date'];
    $af2rs = $rows['af2rs'];
    $af = $rows['af']
    ?>
         <tr style='font-weight:600' class='text-center'>

            <td >
         <?=$date?>
            </td>
    <td><?=$af?></td>
    <td><?=$af2rs?></td>
        <td>



    <a href='rate.php?editId=<?php echo $id ?>' class='btn btn-primary btn-sm'>Edit</a>
    <a href='rate.php?deleteId=<?php echo $id ?>' class='btn btn-danger btn-sm' onclick="return confirm('Are you Sure to delete');">Delete</a>




    </td>

        </tr>


<?php }?>









        </tbody>
    </table>
</div>
</div>


</div>



                </div>

</div>

                <!-- Footer -->
                <?php include "includes/footer.php";?>