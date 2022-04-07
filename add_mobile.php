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

		<div class="container" dir="rtl">
			<div class="row mt-3">
				<div class="col-md-12">


					<div class="card bg-secondary shadow border-0">
						<div class="card-body px-lg-5 py-lg-5">
							<div class="text-center text-muted mb-4 pashtofont">
								<big class="display-4">نوی موبایل اضافه کړئ</big>
							</div>

							<form action="viewMobiles.php" Method="POST" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group mb-3">
											<div class="input-group input-group-alternative">
												<input placeholder="d-m-y" value="<?=date("Y-m-d")?>"
												readonly name="mdate" class="form-control" type="text" >
											</div>
										</div>
										<div class="form-group mb-3">
											<div class="input-group input-group-alternative">
											<select class="form-control pashtofont" style="font-size:16px;font-weight:600" name="mcategory" id="" required>
											<option value=''  >موبایل کټګوری</option>
											<?php
$query = "SELECT * FROM mobile_categories";
$displayCategories = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($displayCategories)) {
    $categoryID = $rows['category_id'];
    $categoryName = $rows['category_name'];
    echo "<option value='$categoryID'>$categoryName</option>";
}
?>

											</select>

												<!-- <input
													placeholder="موبایل کټګوری"
													name="mcategory"
													class="form-control"
													required
													type=""
												/> -->
											</div>
										</div>
										<div class="form-group mb-3">
											<div class="input-group input-group-alternative">
												<input
													placeholder="موبایل نوم"
													name="mname"
													class="form-control"
													required
													type=""
												/>
											</div>
										</div>
										<div class="form-group mb-3">
											<div class="input-group input-group-alternative">
												<input
													placeholder="موبیل ریم"
													min="0"
													name="mram"
													class="form-control"
													required
													type=""
												/>
											</div>
										</div>
										<div class="form-group mb-3">
											<div class="input-group input-group-alternative">
												<input
													placeholder="موبایل داخلی میموری"
													name="mstorage"
													class="form-control"
													required
													type=""
												/>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group mb-3">
											<div class="input-group input-group-alternative">
												<input
													placeholder="موبایل بټری"
													min="0"
													name="mbattery"
													class="form-control"
													type=""
												/>
											</div>
										</div>
										<div class="form-group mb-3">
											<div class="input-group input-group-alternative">
												<input
													placeholder="موبایل رنګ"
													name="mcolor"
													class="form-control"
													type=""
												/>
											</div>
										</div>

										<div class="input-group mb-3">
											<div class="input-group input-group-alternative">
												<input
													class="form-control"
													placeholder="موبایل قیمت"
													min="0"
													type="number"
													name="mprice"
													required
												/>
												<div class="input-group-append pashtofont">
												<input
													class="form-control"
													placeholder="افغانی"
													name="af"
													readonly
												/>
													<!-- <select
														style="font-size: 18px;"
														name="mcurrency"
														id=""
														class="form-control text-danger"
														required
													>
														<option value="" style="font-size: 18px;"
															>جنس</option
														>
														<option value="1" style="font-size: 18px;"
															>افغانی</option
														>
														<option value="2" style="font-size: 18px;"
															>کلداری</option
														>
														<option value="3" style="font-size: 18px;"
															>ډالر</option
														>
													</select> -->
												</div>
											</div>
										</div>
										<div class="form-group mb-3">
											<div class="input-group input-group-alternative">
												<input
													name="mqty"
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
													name="mpic"
													type="file"
													class="custom-file-input"
													id="mpic"
													lang="en"
												/>
												<label class="custom-file-label" for="mpic"
													>عکس</label
												>
											</div>
										</div>
									</div>
								</div>

								<div class="text-center pashtofont">
									<input
										name="add"
										type="submit"
										value="موبایل اضافه کړه"
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
	</div>
</div>
