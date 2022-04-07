
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

$query = "SELECT * FROM mobile_categories";
$selectMobileCategory = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($selectMobileCategory)) {
    $catName = $rows['category_name'];
}

if (isset($_POST['addMobile'])) {

    $catTitle = $_POST['cat'];
    if ($catTitle == "" || empty($catTitle)) {
        echo "SORRY!!! The Field Is Empty";
    } elseif ($catTitle == "$catName") {
        echo "SORRY!!! This Category is already Exists";
    } else {

        $query = "INSERT INTO mobile_categories (category_name) VALUES ('{$catTitle}')";
        $insertCategories = mysqli_query($connection, $query);

    }

}
if (isset($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $query = "DELETE FROM mobile_categories WHERE category_id = '{$deleteId}'";
    $deleteCategory = mysqli_query($connection, $query);
    header('Location:mobile_category.php');

}

?>


    <h1 class="display-2 pashtofont text-center">راپور کټګوری</h1>
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
    $query = "SELECT * FROM mobile_categories WHERE category_id = $theEditId";
    $editCategory = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($editCategory)) {
        $editCat = $rows['category_name'];
    }
    ?>
<form action="" method="POST">
<div class="input-group mb-3">
  <input name="cat" value= "<?=$editCat?>" type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <input class="btn btn-success" type="submit" value="Update" name="update">
  </div>
</div>

		</form>
<?php
} else {
    ?>
    <form action="" method="POST">
    <div class="input-group mb-3">
      <input name="cat" type="text" class="form-control" placeholder="راپور کټګوری" aria-label="Recipient's username" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <input class="btn btn-success" type="submit" value="Add" name="addMobile">
      </div>
    </div>

            </form>
<?php }

if (isset($_POST['update'])) {
    $catTitle = $_POST['cat'];
    $query = "UPDATE mobile_categories SET category_name = '$catTitle' WHERE category_id = $theEditId";
    $updateCategory = mysqli_query($connection, $query);
    if (!$updateCategory) {
        die("ERROR " . mysqli_error($connection));
    }
    header("Location:mobile_category.php");
}
?>



        </div>
        <div class="col-xl-2 col-md-2"></div>
</div>
<div class="row">
<div class="col-xl-2 col-md-2"></div>
            <div class="col-xl-8" dir="rtl">

 <!-- Light table -->
 <div class="table-responsive">
              <table class="table align-items-center table-flush" id="search">
                <thead class="thead-light">
                <tr class="pashtofont text-center">


<th style="font-size:16px;">ایدی نمبر</th>
<th style="font-size:16px">نوم</th>

<th style="font-size:16px">عملیات</th>

</tr>
</thead>
<tbody class="list">




<!-- display  Mobiles From Database -->
<?php
$query = "SELECT * FROM mobile_categories";
$selectCategories = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($selectCategories)) {
    $catId = $rows['category_id'];
    $catTitle = $rows['category_name'];

    ?>
         <tr style='font-weight:600' class='text-center'>
        <td><?=$catId?></td>
            <td>کرایه</td>

        <td>



<a href='mobile_category.php?editId=<?php echo $catId ?>' class='btn btn-primary btn-sm'>Edit</a>
<a href='mobile_category.php?deleteId=<?php echo $catId ?>' class='btn btn-danger btn-sm' onclick='return confirm('Are You Sure To Delete ?');'>Delete</a>




</td>

        </tr>


<?php }?>









        </tbody>
    </table>
</div>
</div>





<div class="col-xl-2 col-md-2"></div>
				</div>

</div>
</div>
				<!-- Footer -->
				<?php include "includes/footer.php";?>