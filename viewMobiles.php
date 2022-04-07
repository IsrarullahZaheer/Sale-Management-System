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

if (isset($_POST['add'])) {
    $mDate = $_POST['mdate'];
    $mCategory = $_POST['mcategory'];

    $query = "SELECT * FROM mobile_categories WHERE category_id =$mCategory";
    $displayCategories = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($displayCategories)) {
        $categoryName = $rows['category_name'];
    }

    $mName = $_POST['mname'];
    $mRam = $_POST['mram'];
    $mStorage = $_POST['mstorage'];
    $mBattery = $_POST['mbattery'];
    $mColor = $_POST['mcolor'];
    $mPic = $_FILES['mpic']['name'];
    $mPicTmp = $_FILES['mpic']['tmp_name'];

    move_uploaded_file($mPicTmp, "img/theme/$mPic");

    // }
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

    // store total Price

    //  Insert Into Sold Mobiles Table

    $query = "INSERT INTO mobiles (";
    $query .= "mobile_name,";
    $query .= "mobile_category,";
    $query .= "mobile_ram,";
    $query .= "mobile_storage,";
    $query .= "mobile_battery,";
    $query .= "mobile_quantity,";
    $query .= "mobile_color,";
    $query .= "mobile_pic,";
    $query .= "mobile_price_af,";
    // $query .= "mobile_price_rs,";
    // $query .= "mobile_price_dollor,";
    $query .= "mobile_total_price_af,";
    // $query .= "mobile_total_price_rs,";
    // $query .= "mobile_total_price_dollor,";
    $query .= "mobile_date) ";
    $query .= "VALUES (";
    $query .= "'$mName',";
    $query .= "'$categoryName ',";
    $query .= "'$mRam',";
    $query .= "'$mStorage',";
    $query .= "'$mBattery',";
    $query .= "$mQty,";
    $query .= "'$mColor',";
    $query .= "'$mPic',";
    $query .= "'$mPrice',";
    // $query .= "'$priceRS',";
    // $query .= "'$priceDollor',";
    $query .= "'$total_price',";
    // $query .= "'$totalpriceRS',";
    // $query .= "'$totalpriceDollor',";
    $query .= "now()";
    $query .= ")";

    $insertIntoMobiles = mysqli_query($connection, $query);
    if (!$insertIntoMobiles) {
        die("QUERY  FIELD" . mysqli_error($connection));
    } else {

        ?>

                    <div class="col">
                        <div
                            class="alert alert-success alert-dismissible fade show text-center pashtofont"
                            role="alert"
                        >
                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                            <span class="alert-text display-4"
                                >موبایل په بریالی ډول اضافه شو</span
                            >
                            <button
                                type="button"
                                class="close"
                                data-dismiss="alert"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>

                    <?php
}
}
?>





                <div class="col" dir="rtl">
<h1 class="display-2 pashtofont text-center"> ټول موجود موبایلونه</h1>
 <!-- Light table -->
 <div class="table-responsive">
              <table class="table align-items-center table-flush table-condensed" id="search">
                <thead class="thead-light">
                <tr class="pashtofont text-center">


<th style="font-size:16px;">عکس</th>
<th style="font-size:16px">نوم</th>
<th style="font-size:16px">کټګوری</th>
<th style="font-size:16px">ریم</th>
<th style="font-size:16px">حافظه</th>
<th style="font-size:16px">بتری</th>
<th style="font-size:16px">رنګ</th>
<th style="font-size:16px">قیمت</th>
<th style="font-size:16px">مقدار</th>
<th style="font-size:16px">مجموعه قیمت</th>
<th style="font-size:16px">عملیات</th>

</tr>
</thead>
<tbody class="list">




<!-- display  Mobiles From Database -->
<?php
$query = "SELECT * FROM mobiles ORDER BY mobile_id DESC";
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
    ?>



            <tr style="font-weight:600" class="text-center">

                <td class="media"><img class="avatar rounded-circle mr-3 mx-auto" height="90px" src="img/theme/<?php
if ($mobilePic) {
        echo $mobilePic;
    } else {
        echo 'xx.jpg';
    }

    ?>" alt="img"> </td>
                <td><?=$mobileName?></td>
                <td><?=$mobileCategory?></td>
                <td><?=$mobileRam?> GB</td>
                <td><?=$mobileStorage?> GB</td>
                <td><?=$mobileBattery?> MAH</td>
                <td><?=$mobileColor?></td>
                <td>
                <?php
if ($mobilePriceAF) {
        echo $mobilePriceAF . "<span style='font-size:16px' class='text-danger'> افغانی</span>";
    }
    ?>

                 </td>
                <td><?=$mobileQuantity?></td>
                <td>
                <?php
if ($mobileTotalPriceAF) {
        echo $mobileTotalPriceAF . "<span style='font-size:16px' class='text-danger'> افغانی</span>";
    }
    ?>
                </td>
            <td>



<a href="sale_form.php?saleId=<?php echo $mobileId ?>"
class="btn btn-icon btn-3 btn-success btn-sm"

type="button">
Sale
</a>
<a href="edit_mobile.php?editId=<?php echo $mobileId ?>&c=<?php
if ($mobilePriceAF) {
        echo 1;
    } elseif ($mobilePriceRS) {
        echo 2;
    } elseif ($mobilePriceDollor) {
        echo 3;
    }
    ?>" class="btn btn-primary btn-sm">Edit</a>
<a href="viewMobiles.php?deleteId=<?php echo $mobileId ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure To Delete ?');">Delete</a>




</td>

            </tr>


<?php }?>
<?php

if (isset($_GET['deleteId'])) {
    $deleteID = $_GET['deleteId'];

    $query = "SELECT * FROM mobiles WHERE mobile_id = $deleteID";
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

        $query = "INSERT INTO `deletedmobile`(`mobile_id`, `mobile_name`, `mobile_category`, `mobile_ram`, `mobile_storage`, `mobile_battery`, `mobile_quantity`, `mobile_color`, `mobile_pic`, `mobile_price_af`, `mobile_total_price_af`, `mobile_date`) VALUES ('$mobileId ','$mobileName','$mobileCategory','$mobileRam','$mobileStorage','$mobileBattery','$mobileQuantity','$mobileColor','$mobilePic','$mobilePriceAF','$mobileTotalPriceAF ','$mobileDate')";
        $Mobile = mysqli_query($connection, $query);

        $query = "DELETE FROM mobiles WHERE mobile_id = $deleteID";
        $deleteMobile = mysqli_query($connection, $query);
        header('Location:viewMobiles.php');
    }
}
?>


        </tbody>
    </table>
</div>
</div>






                </div>



                <!-- Footer -->
                <?php include "includes/footer.php";?>