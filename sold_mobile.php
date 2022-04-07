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

			<?php

if (isset($_POST['sale'])) {
    $sale_Id = $_POST['saleId'];

    $sale_name = $_POST['mobilename'];

    // calculation
    $mycurrency = $_POST['currency'];
    $myqty = $_POST['qty'];
    $myprice = $_POST['price'];

    $total_price = $myqty * $myprice;
    $basePrice = $_POST['basePrice'];
    $smobileId = $_POST['saleId'];
    $smobileName = $_POST['mobilename'];
    $smobileCategory = $_POST['category'];
    $smobileRam = $_POST['ram'];
    $smobileStorage = $_POST['storage'];
    $smobileBattery = $_POST['battery'];
    $smobileColor = $_POST['color'];
    $smobilePic = $_POST['pic'];
    $smobileDate = date("m-d-Y");

    $mobileRate = $_POST['rate'];
    if ($mobileRate > 1) {
        $mobileRate = $mobileRate;
    } else {
        $mobileRate = 1;
    }
    // store price by currency
    $mypriceAF = null;
    $mypriceRS = null;

    $mytotalpriceAF = null;
    $mytotalpriceRS = null;

    if ($mycurrency == 1) {
        $mypriceAF = $myprice;
        $mytotalpriceAF = $total_price;

    } elseif ($mycurrency == 2) {
        $mypriceRS = $myprice;
        $mytotalpriceRS = $total_price;
    } else {
        $mypriceRS = null;
        $mypriceAF = null;
    }
    $RSTOAF = ($mytotalpriceRS * 1000) / $mobileRate;
    $mobilebasePrice = $basePrice * $myqty;
//  Insert Into Sold Mobiles Table

    $query = "INSERT INTO sold_mobiles (";
    $query .= "sold_mobile_name,";
    $query .= "sold_mobile_category,";
    $query .= "sold_mobile_ram,";
    $query .= "sold_mobile_storage,";
    $query .= "sold_mobile_battery,";
    $query .= "sold_mobile_quantity,";
    $query .= "sold_mobile_color,";
    $query .= "sold_mobile_pic,";
    $query .= "sold_mobile_price_af,";
    $query .= "sold_mobile_price_rs,";
    // $query .= "sold_mobile_price_dollor,";
    $query .= "sold_mobile_total_price_af,";
    $query .= "sold_mobile_total_price_rs,";
    // $query .= "sold_mobile_total_price_dollor,";
    // $query .= "exchange_rate,";
    // $query .= "afghani,";
    $query .= "sold_mobile_date,";
    $query .= "sold_mobile_rate,";
    $query .= "sold_mobile_basePrice,";
    $query .= "sold_mobile_rstoaf,";
    $query .= "sale_id) ";
    $query .= "VALUES (";
    $query .= "'$sale_name',";
    $query .= "'$smobileCategory',";
    $query .= "'$smobileRam',";
    $query .= "'$smobileStorage',";
    $query .= "'$smobileBattery',";
    $query .= "$myqty,";
    $query .= "'$smobileColor',";
    $query .= "'$smobilePic',";
    $query .= "'$mypriceAF',";
    $query .= "'$mypriceRS',";
    // $query .= "'$mypriceDollor',";
    $query .= "'$mytotalpriceAF',";
    $query .= "'$mytotalpriceRS',";
    // $query .= "'$mytotalpriceDollor',";
    // $query .= "'$afghaniRate',";
    // $query .= "'$updatedTotalAfghani',";
    $query .= "now(),";
    $query .= "'$mobileRate',";
    $query .= "'$mobilebasePrice',";
    $query .= "'$RSTOAF',";
    $query .= "$smobileId";
    $query .= ")";

    $insertIntoSoldMobiles = mysqli_query($connection, $query);
    if (!$insertIntoSoldMobiles) {
        die("QUERY  FIELD 4" . mysqli_error($connection));
    } else {

        $query = "SELECT * FROM mobiles WHERE mobile_id = $sale_Id";
        $selectByMobileID = mysqli_query($connection, $query);
        while ($rows = mysqli_fetch_assoc($selectByMobileID)) {

            $mobileQTY = $rows['mobile_quantity'];
            $mobileAF = $rows['mobile_price_af'];
            // $mobileRS = $rows['mobile_price_rs'];

            $newQTY = $mobileQTY - $myqty;
            $newAF = $newQTY * $mobileAF;
            // $newRS = $newQTY * $mobileRS;

            $query = "UPDATE mobiles SET ";
            $query .= "mobile_quantity = $newQTY,";
            $query .= "mobile_total_price_af = $newAF ";
            // $query .= "mobile_total_price_rs = $newRS ";

            $query .= "WHERE mobile_id = $sale_Id";
            $updateQTY = mysqli_query($connection, $query);
            if (!$updateQTY) {
                die("Query Field 8" . mysqli_error($connection));
            }

        }

        ?>

                <?php

        $query = "SELECT sum(sold_mobile_total_price_af) AS FF,sum(sold_mobile_total_price_rs) AS RR,sold_mobile_id FROM sold_mobiles WHERE sold_mobile_date =CURDATE()";
        $soldMaf = 0;
        $soldMrs = 0;
        $itemDes = null;
        $displaySoldMobileByDate = mysqli_query($connection, $query);

        while ($rowss = mysqli_fetch_assoc($displaySoldMobileByDate)) {
            $soldMobileID = $rowss['sold_mobile_id'];
            $soldMaf = $rowss['FF'];
            $soldMrs = $rowss['RR'];
            // new close bracket
        }
        $query = "SELECT sum(sold_items_total_price_af) AS F,sum(sold_items_total_price_rs) AS R,sold_id FROM sold_general_items WHERE sold_date = curdate()";
        $soldItemrs = 0;
        $soldItemaf = 0;

        $displaySoldItemByDate = mysqli_query($connection, $query);

        while ($rows = mysqli_fetch_assoc($displaySoldItemByDate)) {
            $soldItemID = $rows['sold_id'];
            $soldItemaf = $rows['F'];
            $soldItemrs = $rows['R'];
        }
        $query = "SELECT sum(easyload_af) AS F,sum(easyload_rs) AS R FROM easyload WHERE easyload_date = curdate()";
        $soldErs = 0;
        $soldEaf = 0;
        $displaySoldItemByDate = mysqli_query($connection, $query);
        while ($rows = mysqli_fetch_assoc($displaySoldItemByDate)) {

            $soldEaf = $rows['F'];
            $soldErs = $rows['R'];
        }

        $query = "SELECT * FROM `income` WHERE `income_date`=curdate() AND `income_des`='خرڅ شوی سامان'";
        $selectItem = mysqli_query($connection, $query);
        while ($rows = mysqli_fetch_assoc($selectItem)) {
            $itemDes = $rows['income_des'];
        }
        $a = $soldItemaf + $soldMaf + $soldEaf;
        $r = $soldItemrs + $soldMrs + $soldErs;
        if ($itemDes) {

            $query = "UPDATE income SET Iprice_af ='$a',Iprice_rs = '$r' WHERE income_des = '$itemDes' AND `income_date`=curdate()";
            $updateq = mysqli_query($connection, $query);
            if (!$updateq) {
                die("error on updateIncome Query " . mysqli_error($connection));
            }
            // header("Location:report.php");

        } else {
            $query = "INSERT INTO income (income_date,Iprice_af,Iprice_rs,income_des) VALUES (now(),'$a','$r','خرڅ شوی سامان')";
            $insertItem = mysqli_query($connection, $query);
            if (!$insertItem) {
                die("error on insertItem Query " . mysqli_error($connection));
            }
        }

        ?>










    <div class="col">
    <div class="alert alert-success alert-dismissible fade show text-center pashtofont" role="alert">
    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-text display-4">موبایل په بریالی ډول وپرول شو</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
        </div>
    </div>






<?php
}

    // $query = "SELECT * FROM report WHERE report_date = CURDATE()";
    // $displayReport = mysqli_query($connection, $query);
    // while ($rows = mysqli_fetch_assoc($displayReport)) {

    //     $reportRateToday = $rows['report_rate'];

    // }
    // $query = "SELECT * FROM sold_mobiles WHERE sold_mobile_date = CURDATE()";
    // $displaySoldMobilesByDate = mysqli_query($connection, $query);
    // $soldMobilesaf = 0;
    // $soldMobilesrs = 0;
    // $soldMobilesrs = 0;
    // while ($rows = mysqli_fetch_assoc($displaySoldMobilesByDate)) {

    //     $soldMobileSaleID = $rows['sale_id'];
    //     $soldMobileSoldID = $rows['sold_mobile_id'];
    //     $soldMobileQTY = $rows['sold_mobile_quantity'];
    //     $soldMobilePrice = $rows['sold_mobile_price_af'];
    //     $soldMobilesaf = $rows['sold_mobile_total_price_af'];
    //     $soldMobilesrs = $rows['sold_mobile_total_price_rs'];
    //     if ($soldMobileSaleID) {
    //         $query = "SELECT * FROM mobiles WHERE mobile_id = $soldMobileSaleID";
    //         $bySaleID = mysqli_query($connection, $query);
    //         while ($rows = mysqli_fetch_assoc($bySaleID)) {
    //             $MobilePrice = $rows['mobile_price_af'];
    //         }
    //     }
    //     $mobileProfitRS = 0;
    //     $mobileProfitAF = 0;
    //     if ($soldMobilesrs > 0) {
    //         $mobileProfitRS = (($soldMobilesrs * 1000) / $reportRateToday) - ($MobilePrice * $soldMobileQTY);
    //     } else {
    //         $mobileProfitAF = $soldMobilesaf - ($MobilePrice * $soldMobileQTY);
    //     }
    //     $totalMobileSale = (($soldMobilesrs * 1000) / $reportRateToday) + $soldMobilesaf;

    // }

    // $query = "UPDATE report SET ";
    // $query .= "report_af = report_af + $soldMobilesaf,";
    // $query .= "report_rs = report_rs + $soldMobilesrs,";
    // $query .= "report_profit = report_profit + $mobileProfitAF + $mobileProfitRS,";
    // $query .= "report_total =report_total + $totalMobileSale ";
    // $query .= "WHERE report_date = CURDATE()";

    // $update1 = mysqli_query($connection, $query);
    // if (!$update1) {
    //     die("QUERY FIELD report" . mysqli_error($connection));
    // }

}
?>



<div class="col" dir="rtl">




<div>
<?php

if (isset($_GET['soldAllMobile'])) {
    $query = "SELECT * FROM sold_mobiles WHERE sold_mobile_date = CURDATE() ORDER BY sold_mobile_id DESC";
    ?>
    <form action="" Method='get'>
    <input type="submit" name='all' value='All' class=' btn btn-danger'>
    </form>

<?php } elseif (isset($_GET['all'])) {
    $query = "SELECT * FROM sold_mobiles ORDER BY sold_mobile_id DESC";
    ?>
    <form action="" Method='get'>
   <a href="sold_mobile.php?soldAllMobile" class="btn btn-success">Today</a>
    </form>

<?php }

?>
</div>


<h1 class="display-2 pashtofont text-center"> ټول خرڅ شوی موبایلونه</h1>
 <!-- Light table -->
 <div class="table-responsive">
              <table class="table align-items-center table-flush table-condensed" id="search">
                <thead class="thead-light">
                <tr class="pashtofont text-center">
                <th style="font-size:16px">ایډی</th>
<th style="font-size:16px">تاریخ</th>
<th style="font-size:16px">عکس</th>
<th style="font-size:16px">نوم</th>
<th style="font-size:16px">کټګوری</th>
<th style="font-size:16px">ریم</th>
<th style="font-size:16px">حافظه</th>
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

$query = "SELECT * FROM sold_mobiles ORDER BY sold_mobile_id DESC";
$displaySoldMobiles = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($displaySoldMobiles)) {
    $soldMobileId = $rows['sold_mobile_id'];
    $soldMobileName = $rows['sold_mobile_name'];
    $soldMobileCategory = $rows['sold_mobile_category'];
    $soldMobileRam = $rows['sold_mobile_ram'];
    $soldMobileStorage = $rows['sold_mobile_storage'];
    $soldMobileQuantity = $rows['sold_mobile_quantity'];
    $soldMobileColor = $rows['sold_mobile_color'];
    $soldMobilePic = $rows['sold_mobile_pic'];
    $soldMobilePriceAF = $rows['sold_mobile_price_af'];
    $soldMobilePriceRS = $rows['sold_mobile_price_rs'];
    // $soldMobilePriceDollor = $rows['sold_mobile_price_dollor'];
    $soldMobileTotalPriceAF = $rows['sold_mobile_total_price_af'];
    $soldMobileTotalPriceRS = $rows['sold_mobile_total_price_rs'];
    // $soldMobileTotalPriceDollor = $rows['sold_mobile_total_price_dollor'];
    // $soldMobileExchangeRate = $rows['exchange_rate'];
    // $soldMobileAfghani = $rows['afghani'];
    $soldMobileDate = $rows['sold_mobile_date'];
    $soldMobileSaleID = $rows['sale_id'];

    ?>



            <tr class="text-center">
            <td style="font-weight:600"><?=$soldMobileId?></td>
            <td style="font-weight:600"><?=$soldMobileDate?></td>
                <td class="media"><img class="avatar rounded-circle mr-3" src="img/theme/<?php
if ($mobilePic) {
        echo $mobilePic;
    } else {
        echo 'xx.jpg';
    }
    ?>" alt="img"> </td>
                <td style="font-weight:600"><?=$soldMobileName?></td>
                <td style="font-weight:600"><?=$soldMobileCategory?></td>
                <td style="font-weight:600"><?=$soldMobileRam?> GB</td>
                <td style="font-weight:600"><?=$soldMobileStorage?> GB</td>

                <td style="font-weight:600"><?=$soldMobileColor?></td>
                <td style="font-weight:600">
                <?php
if ($soldMobilePriceAF) {
        echo $soldMobilePriceAF . " <span style='font-size:16px;color:red'>افغانی</span>";
    } elseif ($soldMobilePriceRS) {
        echo $soldMobilePriceRS . " <span style='font-size:16px;color:red'>کلداری</span>";

        // elseif ($soldMobilePriceDollor) {
        //     echo $soldMobilePriceDollor . " <span style='font-size:16px;color:red'>ډالر</span>";
    } else {
        echo null;
    }
    ?>

                 </td>
                <td style="font-weight:600"><?=$soldMobileQuantity?></td>
                <td style="font-weight:600">
                <?php
if ($soldMobilePriceAF) {
        echo $soldMobileTotalPriceAF . " <span style='font-size:16px;color:red'>افغانی</span>";
    } elseif ($soldMobilePriceRS) {
        echo $soldMobileTotalPriceRS . " <span style='font-size:16px;color:red'>کلداری</span>";
        // } elseif ($soldMobilePriceDollor) {
        //     echo $soldMobileTotalPriceDollor . " <span style='font-size:16px;color:red'>ډالر</span>";
    } else {
        echo null;
    }
    ?>
                </td>

            <td>

<!--

<a href="edit_sold_mobile.php?editid=<?php echo $soldMobileId ?>&c=<?php
if ($soldMobilePriceAF) {echo 1;
    } elseif ($soldMobilePriceRS) {
        echo 2;
    }
    ?>" class="btn btn-icon btn-3 btn-primary btn-sm"

type="button">
Edit
</a> -->
<a href="sold_mobile.php?delete=<?=$soldMobileId?> " class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure To Delete ?');">Delete</a>




</td>

            </tr>


<?php }?>


<?php

if (isset($_GET['delete'])) {
    $deleteId = $_GET['delete'];
    $query = "SELECT * FROM sold_mobiles WHERE sold_mobile_id = $deleteId";
    $selectQuery = mysqli_query($connection, $query);
    $mobileNEW = 0;
    while ($rows = mysqli_fetch_assoc($selectQuery)) {
        $mobileNEW = $rows['sale_id'];
        $soldQ = $rows['sold_mobile_quantity'];
        //new coding

        $soldMpA = $rows['sold_mobile_price_af'];
        $soldMpR = $rows['sold_mobile_price_rs'];
        $soldMDate = $rows['sold_mobile_date'];

        $query = "UPDATE income SET Iprice_af = Iprice_af - '$soldMpA',Iprice_rs = Iprice_rs -'$soldMpR' WHERE income_des = 'خرڅ شوی سامان' AND `income_date`='$soldMDate'";
        $updateq = mysqli_query($connection, $query);
        if (!$updateq) {
            die("error on updateIncome Query " . mysqli_error($connection));
        }

// end of new codig
        $query = "SELECT * FROM mobiles WHERE mobile_id = $mobileNEW";
        $selectQuery = mysqli_query($connection, $query);
        while ($rows = mysqli_fetch_assoc($selectQuery)) {
            $mobileq = $rows['mobile_quantity'];
            $mobilep = $rows['mobile_price_af'];
            $qq = $soldQ + $mobileq;
            $query = "UPDATE mobiles SET mobile_quantity = $qq WHERE mobile_id = $mobileNEW";
            $updateQuery = mysqli_query($connection, $query);

        }

        $query = "UPDATE mobiles SET  mobile_total_price_af = $qq * $mobilep WHERE mobile_id = $mobileNEW";
        $updateQuery = mysqli_query($connection, $query);

    }

    $query = "DELETE FROM sold_mobiles WHERE sold_mobile_id = $deleteId";
    $deleteQuery = mysqli_query($connection, $query);
    header("Location:sold_mobile.php");
}

?>


        </tbody>
    </table>
</div>
</div>




		</div>
<!-- Update Sold Item -->

		<?php

if (isset($_POST['update'])) {

    $soldid = $_POST['soldid'];
    $id = $_POST['id'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $currency = $_POST['currency'];
    $total_updated_price = $price * $qty;

    $query = "UPDATE mobiles SET ";
    $query .= "mobile_quantity = mobile_quantity - '$qty' ";
    $query .= "WHERE mobile_id = $id";
    $updateMobile = mysqli_query($connection, $query);
    if (!updateMobile) {
        die("query Field " . mysqli_error($connection));
    }
    // $newafghaniRate = $_POST['afghaniRate'];
    // $newtotalAfghani = $_POST['total_afghani'];
    // if ($newafghaniRate > 1) {
    //     $newtotalAfghani = ($newafghaniRate * $price * $qty) / 1000;
    // } else {
    //     $newtotalAfghani = null;
    //     $newafghaniRate = null;
    // }
    $priceAF = null;
    $priceRS = null;
    // $priceDollor = null;

    $totalpriceAF = null;
    $totalpriceRS = null;
    // $totalpriceDollor = null;

    if ($currency == 1) {
        $priceAF = $price;
        $totalpriceAF = $total_updated_price;

    } elseif ($currency == 2) {
        $priceRS = $price;
        $totalpriceRS = $total_updated_price;
    }
    // } elseif ($currency == 3) {
    //     $priceDollor = $price;
    //     $totalpriceDollor = $total_updated_price;
    //     $newafghaniRate = null;
    //     $newtotalAfghani = null;

    // }

    $query = "UPDATE sold_mobiles SET ";
    $query .= "sold_mobile_quantity = '$qty',";
    $query .= "sold_mobile_price_af = '$priceAF',";
    $query .= "sold_mobile_price_rs = '$priceRS',";
    // $query .= "sold_mobile_price_dollor = '$priceDollor',";
    $query .= "sold_mobile_total_price_af = '$totalpriceAF',";
    $query .= "sold_mobile_total_price_rs = '$totalpriceRS' ";
    // $query .= "sold_mobile_total_price_dollor = '$totalpriceDollor',";
    // $query .= "exchange_rate = '$newafghaniRate',";
    // $query .= "afghani = '$newtotalAfghani' ";
    $query .= "WHERE sold_mobile_id = $soldid";

    $updateSoldMobile = mysqli_query($connection, $query);
    if (!updateSoldMobile) {
        die("query Field " . mysqli_error($connection));
    } else {

        $query = "SELECT * FROM mobiles WHERE mobile_id = $id";
        $displayMobiles = mysqli_query($connection, $query);
        while ($rows = mysqli_fetch_assoc($displayMobiles)) {

            $mobilequantity = $rows['mobile_quantity'];

        }

        $query = "SELECT * FROM sold_mobiles WHERE sold_mobile_id = $soldid";
        $displaySoldMobiles = mysqli_query($connection, $query);
        while ($rows = mysqli_fetch_assoc($displaySoldMobiles)) {
            $soldmobilequantity = $rows['sold_mobile_quantity'];
            $soldMobilepriceAF = $rows['sold_mobile_price_af'];
            $soldMobilepriceRS = $rows['sold_mobile_price_rs'];
            // $soldMobilepriceDollor = $rows['sold_mobile_price_dollor'];
        }

        $finalQTY = $mobilequantity - $soldmobilequantity;
        $AF = $finalQTY * $soldMobilepriceAF;
        $RS = $finalQTY * $soldMobilepriceRS;
        // $D = $finalQTY * $soldMobilepriceDollor;

        $query = "UPDATE mobiles SET ";
        $query .= "mobile_quantity = '$finalQTY',";
        $query .= "mobile_total_price_af = '$AF',";
        $query .= "mobile_total_price_rs = '$RS' ";
        // $query .= "mobile_total_price_dollor = '$D' ";
        $query .= "WHERE mobile_id = $id";

        header('Location:sold_mobile.php');

        $updateMobile = mysqli_query($connection, $query);
        if (!updateMobile) {
            die("query Field3 " . mysqli_error($connection));
        }

    }

}

?>

				<!-- Footer -->
				<?php include "includes/footer.php";?>