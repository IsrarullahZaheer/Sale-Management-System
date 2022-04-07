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

if (isset($_GET['saleId'])) {
    $saleId = $_GET['saleId'];
    $query = "SELECT * FROM mobiles WHERE mobile_id = $saleId";
    $displayMobileBySaleId = mysqli_query($connection, $query);
}

while ($rows = mysqli_fetch_assoc($displayMobileBySaleId)) {

    $mobileId = $rows['mobile_id'];
    $mobileName = $rows['mobile_name'];
    $mobileCategory = $rows['mobile_category'];
    $mobileRam = $rows['mobile_ram'];
    $mobileStorage = $rows['mobile_storage'];
    $mobileBattery = $rows['mobile_battery'];
    $mobileQuantity = $rows['mobile_quantity'];
    $mobileColor = $rows['mobile_color'];
    $mobilePic = $rows['mobile_pic'];
    $mobilePriceAF = $rows['mobile_price_af'];
    $mobileTotalPriceAF = $rows['mobile_total_price_af'];
    $mobileDate = $rows['mobile_date'];

}

?>

		<div class="row mt-3">
			<div
				class="col-md-4"
				style="
					overflow: hidden;
					background-size: cover;
					background-position: center;
				"
			>
				<img
					class="rounded mr-3 mx-auto"
					height="400px"
					src="img/theme/<?php
if ($mobilePic) {
    echo $mobilePic;
} else {
    echo 'xx.jpg';
}
?>"
					alt="img"
				/>
			</div>
			<div class="col-md-4">
				<div class="card bg-secondary shadow border-0">
					<div class="card-body px-lg-5 py-lg-5">
						<div class="text-center text-muted mb-4">
							<big><?=$mobileCategory?> </big>
						</div>

						<form action="sold_mobile.php" Method="POST">
							<div style="display: none;">
								<div class="form-group mb-3">
									<div class="input-group input-group-alternative">
										<input
											name="category"
											class="form-control"
											readonly
											type=""
											value="<?=$mobileCategory?>"
										/>
									</div>
								</div>
								<div class="form-group mb-3">
									<div class="input-group input-group-alternative">
										<input
											name="pic"
											class="form-control"
											readonly
											type=""
											value="<?=$mobilePic?>"
										/>
									</div>
								</div>
								<div class="form-group mb-3">
									<div class="input-group input-group-alternative">
										<input
											name="saleId"
											class="form-control"
											readonly
											type=""
											value="<?=$saleId?>"
										/>
									</div>
								</div>
								<div class="form-group mb-3">
									<div class="input-group input-group-alternative">
										<input
											name="basePrice"
											class="form-control"
											readonly
											type=""
											value="<?=$mobilePriceAF?>"
										/>
									</div>
								</div>
								<div class="form-group mb-3">
									<div class="input-group input-group-alternative">
										<input
											name="ram"
											class="form-control"
											readonly
											type=""
											value="<?=$mobileRam?>"
										/>
									</div>
								</div>
								<div class="form-group mb-3">
									<div class="input-group input-group-alternative">
										<input
											name="total_afghani"
											class="form-control"
											readonly
											type=""
											value=""
										/>
									</div>
								</div>
								<div class="form-group mb-3">
									<div class="input-group input-group-alternative">
										<input
											name="storage"
											class="form-control"
											readonly
											type=""
											value="<?=$mobileStorage?>"
										/>
									</div>
								</div>
								<div class="form-group mb-3">
									<div class="input-group input-group-alternative">
										<input
											name="battery"
											class="form-control"
											readonly
											type=""
											value="<?=$mobileBattery?>"
										/>
									</div>
								</div>
								<div class="form-group mb-3">
									<div class="input-group input-group-alternative">
										<input
											name="color"
											class="form-control"
											readonly
											type=""
											value="<?=$mobileColor?>"
										/>
									</div>
								</div>
							</div>

							<div class="form-group mb-3">
								<div class="input-group input-group-alternative">
									<input name="date" class="form-control" readonly type="text"
									value="<?=date("d-m-Y")?>">
								</div>
							</div>
							<div class="form-group mb-3">
								<div class="input-group input-group-alternative">
									<input
										name="mobilename"
										class="form-control"
										readonly
										type="text"
										value="<?=$mobileName?>"
									/>
								</div>
							</div>
							<div class="input-group mb-3">
								<div class="input-group input-group-alternative">
									<input
										class="form-control"
										placeholder="موبایل قیمت"
										type="number"
										name="price"
										required
										value="<?=$price?>"
										style="font-size: 16px;"
									/>
									<div class="input-group-append">
										<select
											name="currency"
											id="curr"
											class="form-control text-danger pashtofont"
											required
											style="font-size: 20px;"
										>
											<option value="" style="font-size: 18px;">جنس</option>
											<option value="1" style="font-size: 18px;">افغانی</option>
											<option value="2" style="font-size: 18px;">کلداری</option>
										</select>

									</div>




								</div>
							</div>
							<?php
$query = "SELECT * FROM sarafi ORDER BY id DESC LIMIT 1";
$selectLast = mysqli_query($connection, $query);
if ($selectLast) {
    while ($rows = mysqli_fetch_assoc($selectLast)) {
        $lastAf2rs = $rows['af2rs'];
    }
}
?>
							<div class="form-group mb-3 content">
								<div class="input-group input-group-alternative">
									<input
										name="rate"
										class="form-control"

										type="text"
										value=<?=$lastAf2rs?>
										placeholder="د 1000 افغانیو څو کلداری کیږی"
									/>
								</div>
							</div>

							<?php
$query = "SELECT * FROM mobiles WHERE mobile_id = $saleId";
$displayMobiles = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($displayMobiles)) {
    $mobileQTY = $rows['mobile_quantity'];
}
?>

							<div class="form-group mb-3">
								<div class="input-group input-group-alternative">
									<input
										name="qty"
										min="1"
										max="<?=$mobileQTY?>"
										class="form-control"
										placeholder="مقدار"
										type="number"
										required
										style="font-size: 16px;"
									/>
								</div>
							</div>
<?php
if ($mobileQuantity < 1) {
    echo "تاسو دا ډول موبایل نه لری";
} else {
    ?>
<div class="text-center">
								<input
									name="sale"
									type="submit"
									value="Sale"
									class="btn btn-primary my-4"
								/>
							</div>
<?php
}
?>

						</form>
					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>

		<script>
		var selector = document.querySelector("#curr");

		selector.addEventListener("change",select);
		function select(){
			var content = document.querySelector(".content");
			var v = this.value;
			if(v == 2){
				content.classList.remove("d-none");
			}else if(v =='' ){
				content.classList.add("d-none");
			}else{
				content.classList.add("d-none");
			}
		};

		</script>




		<!-- Footer -->
		<?php include "includes/footer.php";?>
	</div>
</div>

