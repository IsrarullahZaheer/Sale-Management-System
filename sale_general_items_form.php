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

if (isset($_GET['saleId'])) {
    $saleId = $_GET['saleId'];
    $query = "SELECT * FROM general_items WHERE id = $saleId";
    $displayItemBySaleId = mysqli_query($connection, $query);

    while ($rows = mysqli_fetch_assoc($displayItemBySaleId)) {

        $itemId = $rows['id'];
        $itemName = $rows['name'];
        $itemCategory = $rows['category'];
        $itemQuality = $rows['quality'];
        $itemQuantity = $rows['quantity'];
        $itemPic = $rows['pic'];
        $itemPrice = $rows['price'];
        $itemTotalPrice = $rows['total_price'];
        $itemDate = $rows['date'];

    }
}
?>


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
if ($itemPic) {
    echo $itemPic;
} else {
    echo 'react.jpg';
}
?>"
					alt="img"
				/>
			</div>
			<div class="col-md-4">
				<div class="card bg-secondary shadow border-0">
					<div class="card-body px-lg-5 py-lg-5">
						<div class="text-center text-muted mb-4">
							<big><?=$itemCategory?> </big>
						</div>

						<form action="sold_general_items.php?soldAllItems" Method="POST">
							<div class="d-none">
								<div class="form-group mb-3">
									<div class="input-group input-group-alternative">
										<input
											name="itemCategory"
											class="form-control"
											readonly
											type=""
											value="<?=$itemCategory?>"
										/>
									</div>
								</div>
								<div class="form-group mb-3">
									<div class="input-group input-group-alternative">
										<input
											name="itemPic"
											class="form-control"
											readonly
											type=""
											value="<?=$itemPic?>"
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
											value="<?=$itemPrice?>"
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
											name="itemQuality"
											class="form-control"
											readonly
											type=""
											value="<?=$itemQuality?>"
										/>
									</div>
								</div>



							</div>

							<div class="form-group mb-3">
								<div class="input-group input-group-alternative">
									<input name="itemDate" class="form-control" readonly type="text"
									value="<?=date("d-m-Y")?>">
								</div>
							</div>
							<div class="form-group mb-3">
								<div class="input-group input-group-alternative">
									<input
										name="itemName"
										class="form-control"
										readonly
										type="text"
										value="<?=$itemName?>"
									/>
								</div>
							</div>
							<div class="input-group mb-3">
								<div class="input-group input-group-alternative">
									<input
										class="form-control"
										placeholder=" قیمت"
										type="number"
										name="itemPrice"
										required
										value=""
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
$query = "SELECT * FROM general_items WHERE id = $saleId";
$displayMobiles = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($displayMobiles)) {
    $itemQTY = $rows['quantity'];
}
?>

							<div class="form-group mb-3">
								<div class="input-group input-group-alternative">
									<input
										name="itemQuantity"
										min="1"
										max="<?=$itemQTY?>"
										class="form-control"
										placeholder="مقدار"
										type="number"
										required
										style="font-size: 16px;"
									/>
								</div>
							</div>
							<!-- <div class="form-group mb-3">
								<div class="input-group input-group-alternative">
									<select name="" id="" class="form-control" style="font-size: 20px;">
									<option value="">موبایل چا خرڅ کر</option>
									<option value="">وکیل احمد</option>
									<option value="">وکیل احمد</option>
									<option value="">وکیل احمد</option>
									<option value="">وکیل احمد</option>
									</select>
								</div>
							</div> -->

								<div class="text-center">
								<input
									name="sale"
									type="submit"
									value="Submit"
									class="btn btn-primary my-4"
								/>
							</div>


						</form>
					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>




			<!-- Main Table -->
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