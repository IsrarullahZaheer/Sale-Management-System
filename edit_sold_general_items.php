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

		<div class="row">





		<?php

if (isset($_GET['editid'])) {
    $theEditId = $_GET['editid'];
    $query = "SELECT * FROM sold_general_items WHERE sold_id = $theEditId";
    $displaySoldMobileByEditId = mysqli_query($connection, $query);

    while ($rows = mysqli_fetch_assoc($displaySoldMobileByEditId)) {

        $soldItemId = $rows['sold_id'];
        $soldItemName = $rows['sold_name'];
        $soldItemCategory = $rows['sold_category'];
        $soldItemQuality = $rows['sold_quality'];

        $soldItemQuantity = $rows['sold_quantity'];
        $soldItemPic = $rows['sold_pic'];
        $soldItemPriceAF = $rows['sold_items_price_af'];
        $soldItemPriceRS = $rows['sold_items_price_rs'];
        // $soldMobilePriceDollor = $rows['sold_mobile_price_dollor'];
        $soldItemTotalPriceAF = $rows['sold_items_total_price_af'];
        $soldItemTotalPriceRS = $rows['sold_items_total_price_rs'];
        // $soldMobileTotalPriceDollor = $rows['sold_mobile_total_price_dollor'];
        // $soldMobileExchageRate = $rows['exchange_rate'];
        // $soldMobileAfghani = $rows['afghani'];
        $soldItemDate = $rows['sold_date'];
        $soldItemSaleId = $rows['sale_item_id'];

    }
}
?>




<div class="col" >

<div class="row mt-3">
<div class="col-md-4"><img class="rounded mr-3 mx-auto" height="400px" src="img/theme/<?=$soldItemPic?>" alt="img"> </div>
<div class="col-md-4">

<div class="card bg-secondary shadow border-0">

    <div class="card-body px-lg-5 py-lg-5">
        <div class="text-center text-muted mb-4">
            <big><?=$soldItemCategory?> </big>
        </div>









        <form action="sold_general_items.php" Method="POST">
<div style="display:none">
<div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <input name="soldid" class="form-control" readonly  type="text" value="<?=$theEditId?>">
                </div>
        </div>
</div>
        <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <input name="date" class="form-control" readonly  type="text" value="<?=$soldItemDate?>">
                </div>
        </div>
        <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <input name="mobilename" class="form-control" readonly  type="text" value="<?=$soldItemName?>">
                </div>
        </div>
        <div class="input-group mb-3">
                <div class="input-group input-group-alternative">
                    <input class="form-control" placeholder="موبایل قیمت" type="number" min="0" step="any" name="price" required  style="font-size:16px"
                    value="<?php
if ($soldItemPriceAF) {
    echo $soldItemPriceAF;
} elseif ($soldItemPriceRS) {
    echo $soldItemPriceRS;
} else {
    echo null;
}
?>">
                    <div class="input-group-append">
                    <?php
if (isset($_GET['c'])) {
    $currency = $_GET['c'];

    $query = "SELECT * FROM general_items WHERE id = $soldItemSaleId";
    $displayItem = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($displayItem)) {
        $ItemQTYu = $rows['quantity'];

    }

    $newSoldItemQTy = $soldItemQuantity + $ItemQTYu;

    $query = "UPDATE general_items SET quantity = '$newSoldItemQTy' WHERE id = $soldItemSaleId";
    $updateQTY = mysqli_query($connection, $query);
    if (!$updateQTY) {
        die("Query Field Q" . mysqli_error($connection));
    }
    $query = "SELECT * FROM general_items WHERE id = $soldItemSaleId";
    $displayItem = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($displayItem)) {
        $ItemNewSQTY = $rows['quantity'];
        
    }

}?>
                    <select name="currency" id="curr" class="form-control text-danger pashtofont " required style="font-size:20px">
                    <?php
if ($currency == 1) {

    echo "<option value='1' selected style='font-size:18px'>افغانی</option><option value='2' style='font-size:18px'>کلداری</option>";
} elseif ($currency == 2) {
    echo "<option value='2' selected  style='font-size:18px'>کلداری</option><option value='1' style='font-size:18px'>افغانی</option>";
}
?>





                    </select>

                    </div>
                </div>
		</div>



            <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <input name="qty" min="1" max="<?=$ItemNewSQTY?>" class="form-control" placeholder="مقدار" type="number" required style="font-size:16px" value="<?=$soldItemQuantity?>">
                </div>
            </div>
            <div class="d-none">
            <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <input name="id" class="form-control"  type="number" required style="font-size:16px" value="<?=$soldItemSaleId?>">
                </div>
            </div>
            </div>
            <div class="text-center">
                <input name="updateSoldItem" type="submit" value="Update1" class="btn btn-primary my-4">
            </div>
        </form>




    </div>
</div>
</div>
<div class="col-md-4"></div>
</div>


<!-- Update Sold -->

</div>


			<!-- Main Table -->



				<!-- Footer -->
				<?php include "includes/footer.php";?>