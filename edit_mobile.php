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



					<!--edit form -->
                    <div class="container">
<div class="row mt-3">
<div class="col-md-12">







<?php
if (isset($_GET['editId'])) {
    $editID = $_GET['editId'];

    $query = "SELECT * FROM mobiles WHERE mobile_id = $editID";
    $displayMobiles = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($displayMobiles)) {
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
        // $mobilePriceRS = $rows['mobile_price_rs'];
        // $mobilePriceDollor = $rows['mobile_price_dollor'];
        $mobileTotalPriceAF = $rows['mobile_total_price_af'];
        // $mobileTotalPriceRS = $rows['mobile_total_price_rs'];
        // $mobileTotalPriceDollor = $rows['mobile_total_price_dollor'];
        $mobileDate = $rows['mobile_date'];

    }

}
?>


<?php
if (isset($_POST['updateMobile'])) {
    $mDate = $_POST['mdate'];

    $mCategory = $_POST['mcategory'];

    $mName = $_POST['mname'];
    $mRam = $_POST['mram'];
    $mStorage = $_POST['mstorage'];
    $mBattery = $_POST['mbattery'];
    $mColor = $_POST['mcolor'];
    $mPic = $_FILES['mpic']['name'];
    $mPicTmp = $_FILES['mpic']['tmp_name'];

    move_uploaded_file($mPicTmp, "img/theme/$mPic");

    if (empty($mPic)) {
        $query = "SELECT * FROM mobiles WHERE mobile_id = $editID";
        $selectmobiles = mysqli_query($connection, $query);
        while ($rows = mysqli_fetch_assoc($selectmobiles)) {
            $mPic = $rows['mobile_pic'];

        }
    }

    // calculation
    // $mCurrency = $_POST['mcurrency'];
    $mQty = $_POST['mqty'];
    $mPrice = $_POST['mprice'];

    $total_price = $mQty * $mPrice;
    // store price by currency
    // $priceAF = null;
    // $priceRS = null;
    // $priceDollor = null;

    // $totalpriceAF = null;
    // $totalpriceRS = null;
    // $totalpriceDollor = null;

    // if ($mCurrency == 1) {
    //     $priceAF = $mPrice;
    //     $totalpriceAF = $total_price;
    // } elseif ($mCurrency == 2) {
    //     $priceRS = $mPrice;
    //     $totalpriceRS = $total_price;
    // } elseif ($mCurrency == 3) {
    //     $priceDollor = $mPrice;
    //     $totalpriceDollor = $total_price;
    // } else {
    //     $priceDollor = null;
    //     $priceRS = null;
    //     $priceAF = null;
    //     $totalpriceDollor = null;
    //     $totalpriceRS = null;
    //     $totalpriceAF = null;
    // }

    //  Insert Into Sold Mobiles Table

    $query = "UPDATE mobiles SET ";
    $query .= "mobile_name = '$mName',";
    $query .= "mobile_category = '$mCategory',";
    $query .= "mobile_ram = '$mRam',";
    $query .= "mobile_storage = '$mStorage',";
    $query .= "mobile_battery = '$mBattery',";
    $query .= "mobile_quantity = $mQty,";
    $query .= "mobile_color = '$mColor',";
    $query .= "mobile_pic = '$mPic',";
    $query .= "mobile_price_af = '$mPrice',";
    // $query .= "mobile_price_rs = '$priceRS',";
    // $query .= "mobile_price_dollor = '$priceDollor',";
    $query .= "mobile_total_price_af = '$total_price',";
    // $query .= "mobile_total_price_rs = '$totalpriceRS',";
    // $query .= "mobile_total_price_dollor = '$totalpriceDollor',";
    $query .= "mobile_date = '$mDate' ";
    $query .= "WHERE mobile_id = '$editID'";

    $updateMobiles = mysqli_query($connection, $query);
    if (!$updateMobiles) {
        die("QUERY  FIELD" . mysqli_error($connection));
    } else {
        header('Location:viewMobiles.php');
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



<div class="card bg-secondary shadow border-0">

    <div class="card-body px-lg-5 py-lg-5">
        <div class="text-center text-muted mb-4 pashtofont">
            <big class="display-4">اضافه شوی موبایل کی تغیر راوستلولو فورمه</big>
        </div>

        <form action="" Method="POST" enctype="multipart/form-data">


        <div class="row">
        <div class="col-md-6">

        <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <input placeholder="موبایل بټری" min="0" name="mbattery" class="form-control" value="<?=$mobileBattery?>" >
                    <div class="input-group-append">
                    <input type="text" readonly class="form-control text-center" placeholder=" MAH  موبایل بټری ">
                    </div>
                </div>
        </div>
<div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <input placeholder="موبایل رنګ" name="mcolor" class="form-control"  value="<?=$mobileColor?>" >
                    <div class="input-group-append">
                    <input type="text" readonly class="form-control text-center" placeholder=" موبایل رنګ">
                    </div>
                </div>
        </div>


        <div class="input-group mb-3 ">
                <div class="input-group input-group-alternative ">
                    <input class="form-control" placeholder="موبایل قیمت" min="0" step="0.00000001" type="number" required name="mprice"
                    value="<?=$mobilePriceAF?>">
                    <div class="input-group-append pashtofont" >
                    <input type="text" readonly class="form-control text-center" placeholder="افغانی ">
                    </div>
                </div>
        </div>
            <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <input name="mqty" min="0" class="form-control" placeholder="مقدار" type="number" value="<?=$mobileQuantity?>" required style="font-size:16px">
                    <div class="input-group-append">
                    <input type="text" readonly class="form-control text-center" placeholder=" مقدار">
                    </div>
                </div>
            </div>

    <div class="form-group mb-3">

    <div class="custom-file">
        <input name="mpic" value="<?=$mobilePic?>"  type="file" class="custom-file-input" id="mpic" lang="en">
        <label class="custom-file-label" value="<?=$mobilePic?>" for="mpic"></label>
    </div>


    </div>



            </div>
        <!-- end -->

<div class="col-md-6">
<div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <input placeholder="" name="mdate" class="form-control" value="<?=$mobileDate?>"  type="date" >
                </div>
        </div>
        <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <input placeholder="موبایل کټګوری" name="mcategory" class="form-control" value="<?=$mobileCategory?>"  type="" required >
                    <div class="input-group-append">
                    <input type="text" readonly class="form-control text-center" placeholder=" موبایل کټګوری">
                    </div>
                </div>
        </div>
        <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <input  name="mname" class="form-control" value="<?=$mobileName?>" type="" required>

                    <div class="input-group-append">
                    <input type="text" readonly class="form-control text-center" placeholder="موبایل نوم" >
                    </div>
                </div>
        </div>
        <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <input placeholder="موبایل ریم" min="0" name="mram" class="form-control"  value="<?=$mobileRam?>" required >
                    <div class="input-group-append">
                    <input type="text" readonly class="form-control text-center" placeholder="GB              موبایل ریم">
                    </div>
                </div>
        </div>
        <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <input placeholder="موبایل داخلی میموری" name="mstorage" class="form-control"  value="<?=$mobileStorage?>"required >
                    <div class="input-group-append">
                    <input type="text" readonly class="form-control text-center" placeholder="GB     موبایل داخلی میموری">
                    </div>
                </div>
        </div>



    </div>



            </div>


            <div class="text-center pashtofont">
                <input name="updateMobile" type="submit" value="موبایل اضافه کړه" class="btn btn-success btn-lg my-4" style="font-size:18px">
            </div>

        </form>




    </div>
</div>
</div>

</div>
</div>




				<!-- Footer -->
				<?php include "includes/footer.php";?>