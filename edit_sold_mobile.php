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



					<!-- Main Table -->


				<?php

if (isset($_GET['editid'])) {
    $editId = $_GET['editid'];
    $query = "SELECT * FROM sold_mobiles WHERE sold_mobile_id = $editId";
    $displaySoldMobileByEditId = mysqli_query($connection, $query);

    while ($rows = mysqli_fetch_assoc($displaySoldMobileByEditId)) {

        $soldMobileId = $rows['sold_mobile_id'];
        $soldMobileName = $rows['sold_mobile_name'];
        $soldMobileCategory = $rows['sold_mobile_category'];
        $soldMobileRam = $rows['sold_mobile_ram'];
        $soldMobileStorage = $rows['sold_mobile_storage'];
        $soldMobileBattery = $rows['sold_mobile_battery'];
        $soldMobileQuantity = $rows['sold_mobile_quantity'];
        $soldMobileColor = $rows['sold_mobile_color'];
        $soldMobilePic = $rows['sold_mobile_pic'];
        $soldMobilePriceAF = $rows['sold_mobile_price_af'];
        $soldMobilePriceRS = $rows['sold_mobile_price_rs'];
        // $soldMobilePriceDollor = $rows['sold_mobile_price_dollor'];
        $soldMobileTotalPriceAF = $rows['sold_mobile_total_price_af'];
        $soldMobileTotalPriceRS = $rows['sold_mobile_total_price_rs'];
        // $soldMobileTotalPriceDollor = $rows['sold_mobile_total_price_dollor'];
        // $soldMobileExchageRate = $rows['exchange_rate'];
        // $soldMobileAfghani = $rows['afghani'];
        $soldMobileDate = $rows['sold_mobile_date'];
        $soldMobileSaleId = $rows['sale_id'];

    }
}
?>




<div class="col" >

<div class="row mt-3">
<div class="col-md-4"><img class="rounded mr-3 mx-auto" height="400px" src="img/theme/<?=$soldMobilePic?>" alt="img"> </div>
<div class="col-md-4">

<div class="card bg-secondary shadow border-0">

    <div class="card-body px-lg-5 py-lg-5">
        <div class="text-center text-muted mb-4">
            <big><?=$soldMobileCategory?> </big>
        </div>





        <form action="sold_mobile.php" Method="POST">
<div style="display:none">
<div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <input name="soldid" class="form-control" readonly  type="text" value="<?=$editId?>">
                </div>
        </div>
</div>
        <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <input name="date" class="form-control" readonly  type="text" value="<?=$soldMobileDate?>">
                </div>
        </div>
        <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <input name="mobilename" class="form-control" readonly  type="text" value="<?=$soldMobileName?>">
                </div>
        </div>
        <div class="input-group mb-3">
                <div class="input-group input-group-alternative">
                    <input class="form-control" placeholder="موبایل قیمت" type="number" min="0" step="0.00000001" name="price" required  style="font-size:16px"
                    value="<?php
if ($soldMobilePriceAF) {
    echo $soldMobilePriceAF;
} elseif ($soldMobilePriceRS) {
    echo $soldMobilePriceRS;
} else {
    echo null;
}
?>">
                    <div class="input-group-append">
                    <?php
if (isset($_GET['c'])) {
    $currency = $_GET['c'];

    $query = "SELECT * FROM mobiles WHERE mobile_id = $soldMobileSaleId";
    $displayMobiles = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($displayMobiles)) {
        $mobileQTYm = $rows['mobile_quantity'];

    }

    $newSoldMobileQTy = $soldMobileQuantity + $mobileQTYm;

    $query = "UPDATE mobiles SET mobile_quantity = '$newSoldMobileQTy' WHERE mobile_id = $soldMobileSaleId";
    $updateQTY = mysqli_query($connection, $query);
    if (!$updateQTY) {
        die("Query Field" . mysqli_error($connection));
    }
    $query = "SELECT * FROM mobiles WHERE mobile_id = $soldMobileSaleId";
    $displayMobiles = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($displayMobiles)) {
        $mobileNewSQTY = $rows['mobile_quantity'];
        
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
                    <input name="qty" min="1" max="<?=$mobileNewSQTY?>" class="form-control" placeholder="مقدار" type="number" required style="font-size:16px" value="<?=$soldMobileQuantity?>">
                </div>
            </div>
            <div class="d-none">
            <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <input name="id" min="0" max="" class="form-control" placeholder="مقدار" type="number" required style="font-size:16px" value="<?=$soldMobileSaleId?>">
                </div>
            </div>
            </div>
            <div class="text-center">
                <input name="update" type="submit" value="Update" class="btn btn-primary my-4">
            </div>
        </form>




    </div>
</div>
</div>
<div class="col-md-4"></div>
</div>


<!-- Update Sold -->

</div>

<!-- <script>
		var selector = document.querySelector("#curr");
		var oldClass = "";
		selector.addEventListener("change",select);
		function select(){
			var content = document.querySelector(".content");
			var v = this.value;
			if(v == 2){
				content.classList.remove("d-none");
			}else{
				content.classList.add("d-none");
			}
		};

		</script> -->

				<!-- Footer -->
				<?php include "includes/footer.php";?>