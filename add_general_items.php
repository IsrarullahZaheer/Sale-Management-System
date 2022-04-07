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



			<!-- Main Table -->


			<div class="container" dir="rtl">
			<div class="row mt-3">
				<div class="col-md-12">


					<div class="card bg-secondary shadow border-0">
						<div class="card-body px-lg-5 py-lg-5">
							<div class="text-center text-muted mb-4 pashtofont">
								<big class="display-4">نوی سامان اضافه کړئ</big>
							</div>

							<form action="view_general_items.php" Method="POST" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">

										<div class="form-group mb-3">
											<div class="input-group input-group-alternative">
											<select class="form-control pashtofont" style="font-size:16px;font-weight:600" name="itemCategory" id="" required>
											<option value=''  > کټګوری</option>
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


											</div>
										</div>
										<div class="form-group mb-3">
											<div class="input-group input-group-alternative">
												<input
													placeholder=" نوم"
													name="itemName"
													class="form-control"
													required
													type=""
												/>
											</div>
										</div>
										<div class="form-group mb-3">
											<div class="input-group input-group-alternative">
												<input
													placeholder=" کیفیت"

													name="itemQuality"
													class="form-control"

													type=""
												/>
											</div>
										</div>

									</div>
									<div class="col-md-6">



										<div class="input-group mb-3">
											<div class="input-group input-group-alternative">
												<input
													class="form-control"
													placeholder=" قیمت"
													min="0"
													type="number"
													name="itemPrice"
													required
												/>
												<div class="input-group-append pashtofont">
												<input
													class="form-control"
													placeholder="افغانی"
													name="af"
													readonly
												/>

												</div>
											</div>
										</div>
										<div class="form-group mb-3">
											<div class="input-group input-group-alternative">
												<input
													name="itemQty"
													min="0"
													class="form-control"
													placeholder="مقدار"
													type="number"
													required
													style="font-size: 16px;"
												/>
											</div>
										</div>

										<div class="form-group mb-3">
											<div class="custom-file">
												<input
													name="itemPic"
													type="file"
													class="custom-file-input"
													id="itempic"
													lang="en"
												/>
												<label class="custom-file-label" for="itempic"
													>عکس</label
												>
											</div>
										</div>
									</div>
								</div>

								<div class="text-center pashtofont">
									<input
										name="addItem"
										type="submit"
										value=" اضافه کړه"
										class="btn btn-success btn-lg my-4"
										style="font-size: 18px;"
									/>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>











				<!-- Footer -->
				<?php include "includes/footer.php";?>