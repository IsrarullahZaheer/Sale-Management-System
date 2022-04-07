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
	<div class="container">
<div class="row mt-3">


		<div class="col-md-12">


			<!-- Main Table -->



			<div class="card bg-secondary shadow border-0">

<div class="card-body px-lg-5 py-lg-5">
	<div class="text-center text-muted mb-4 pashtofont">
		<big class="display-4">اضافه شوی سامان کی تغیر راوستلولو فورمه</big>
	</div>



	<?php
if (isset($_GET['editId'])) {
    $editID = $_GET['editId'];

    $query = "SELECT * FROM general_items WHERE id = $editID";
    $displayItems = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($displayItems)) {
        $itemId = $rows['id'];
        $itemName = $rows['name'];
        $itemCategory = $rows['category'];
        $itemQuality = $rows['quality'];
        $itemQuantity = $rows['quantity'];
        $itemPic = $rows['pic'];
        $itemPriceAF = $rows['price'];
        $itemTotalPriceAF = $rows['total_price'];
        $itemDate = $rows['date'];

    }

}
?>


<?php

if (isset($_POST['updateItem'])) {

    $ItemCategory = $_POST['itemCategory'];
    $query = "SELECT * FROM general_categories WHERE category_id =$ItemCategory";
    $displayCategories = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($displayCategories)) {
        $updateCategoryName = $rows['category_name'];
    }
    $updateItemName = $_POST['itemName'];
    $updateItemQuality = $_POST['itemQuality'];
    $updateItemPic = $_FILES['itemPic']['name'];
    $updateItemPicTmp = $_FILES['itemPic']['tmp_name'];

    move_uploaded_file($updateItemPicTmp, "img/theme/$updateItemPic");

    if (empty($updateItemPic)) {
        $query = "SELECT * FROM general_items WHERE id = $editID";
        $selectItems = mysqli_query($connection, $query);
        while ($rows = mysqli_fetch_assoc($selectItems)) {
            $updateItemPic = $rows['pic'];

        }
    }

    // calculation
    // $mCurrency = $_POST['mcurrency'];
    $updateItemQuantity = $_POST['itemQuantity'];
    $updateItemPrice = $_POST['itemPrice'];

    $total_price = $updateItemQuantity * $updateItemPrice;

    $query = "UPDATE general_items SET ";
    $query .= "name = '$updateItemName',";
    $query .= "category = '$updateCategoryName',";
    $query .= "quality = '$updateItemQuality',";
    $query .= "quantity = $updateItemQuantity,";
    $query .= "pic = '$updateItemPic',";
    $query .= "price= '$updateItemPrice',";
    $query .= "total_price = '$total_price' ";
    $query .= "WHERE id = '$editID'";

    $updateItem = mysqli_query($connection, $query);
    if (!$updateItem) {
        die("QUERY FIELD" . mysqli_error($connection));
    } else {
        header('Location:view_general_items.php');
        ?>

		<div class="col">
		<div class="alert alert-success alert-dismissible fade show text-center pashtofont" role="alert">
		<span class="alert-icon"><i class="ni ni-like-2"></i></span>
		<span class="alert-text display-4">موبایل په بریالی ډول اضافه شو</span>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
			</div>







	<?php
}
}

?>




	<form action="" Method="POST" enctype="multipart/form-data">


	<div class="row">
	<div class="col-md-6">




	<div class="form-group mb-3">
			<div class="input-group input-group-alternative ">
				<input class="form-control" placeholder="" min="0" step="any" type="number" required name="itemPrice" style="font-size:16px" value="<?=$itemPriceAF?>">
				<div class="input-group-append pashtofont" >
				<input type="text" readonly class="form-control text-center" placeholder="افغانی ">
				</div>
			</div>
	</div>
	<div class="form-group mb-3">
		<div class="input-group input-group-alternative">
				<input name="itemQuantity" min="0" class="form-control" placeholder="مقدار" type="number" value="<?=$itemQuantity?>" required style="font-size:16px">
				<div class="input-group-append pashtofont">
				<input type="text" readonly class="form-control text-center" placeholder=" مقدار">
				</div>
		</div>
	</div>

<div class="form-group mb-3">

<div class="custom-file">
	<input name="itemPic" value="<?=$itemPic?>"  type="file" class="custom-file-input" id="itempic" lang="en">
	<label class="custom-file-label" value="<?=$itemPic?>" for="itempic"></label>
</div>


</div>



		</div>
	<!-- end -->

<div class="col-md-6">

	<div class="form-group mb-3">
			<div class="input-group input-group-alternative">
			<select class="form-control pashtofont" style="font-size:16px;font-weight:600" name="itemCategory" id="" required>
			<?php
$query = "SELECT * FROM general_categories WHERE category_name= '$itemCategory'";
$displayCategories = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($displayCategories)) {
    $categoryIDD = $rows['category_id'];
}
?>
			<option value="<?=$categoryIDD?>"><?=$itemCategory?></option>
											<?php
$query = "SELECT * FROM general_categories";
$displayCategories = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($displayCategories)) {
    $categoryID = $rows['category_id'];
    $categoryName = $rows['category_name'];

    echo "<option value='$categoryID'>$categoryName</option>";
}

?>

											</select>
				<div class="input-group-append">
				<input type="text" readonly class="form-control text-center" placeholder="  کټګوری">
				</div>
			</div>
	</div>
	<div class="form-group mb-3">
			<div class="input-group input-group-alternative">
				<input  name="itemName" class="form-control" value="<?=$itemName?>" type="" required>

				<div class="input-group-append">
				<input type="text" readonly class="form-control text-center" placeholder=" نوم" >
				</div>
			</div>
	</div>
	<div class="form-group mb-3">
			<div class="input-group input-group-alternative">
				<input placeholder=" کیفیت" min="0" name="itemQuality" class="form-control"  value="<?=$itemQuality?>" required >
				<div class="input-group-append">
				<input type="text" readonly class="form-control text-center" placeholder=" کیفیت">
				</div>
			</div>
	</div>

</div>



		</div>


		<div class="text-center pashtofont">
			<input name="updateItem" type="submit" value="s اضافه کړه" class="btn btn-success btn-lg my-4" style="font-size:18px">
		</div>

	</form>




</div>
</div>
</div>

</div>
</div>
</div>
</div>







				<!-- Footer -->
				<?php include "includes/footer.php";?>