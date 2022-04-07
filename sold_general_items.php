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

if (isset($_POST['sale'])) {
    $sale_Id = $_POST['saleId'];

    // calculation
    $mycurrency = $_POST['currency'];
    $myqty = $_POST['itemQuantity'];
    $myprice = $_POST['itemPrice'];

    $total_price = $myqty * $myprice;

    $sitemId = $_POST['saleId'];
    $sitemName = $_POST['itemName'];
    $sitemCategory = $_POST['itemCategory'];
    $itemRate = $_POST['rate'];
    if ($itemRate > 1) {
        $itemRate = $itemRate;
    } else {
        $itemRate = 1;
    }
    // $query = "SELECT * FROM general_categories WHERE category_id = $sitemCategory";
    // $displayCategories = mysqli_query($connection, $query);
    // while ($rows = mysqli_fetch_assoc($displayCategories)) {
    //     $categoryName = $rows['category_name'];

    // }

    $sitemQuality = $_POST['itemQuality'];
    $sitemPic = $_POST['itemPic'];
    $sitemDate = date("Y-m-d");
    $basePrice = $_POST['basePrice'];
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
    $RSTOAF = ($mytotalpriceRS * 1000) / $itemRate;
    $itembasePrice = $basePrice * $myqty;
//  Insert Into Sold Mobiles Table

    $query = "INSERT INTO sold_general_items (";
    $query .= "sold_name,";
    $query .= "sold_category,";
    $query .= "sold_Quality,";
    $query .= "sold_quantity,";
    $query .= "sold_pic,";
    $query .= "sold_items_price_af,";
    $query .= "sold_items_price_rs,";
    // $query .= "sold_mobile_price_dollor,";
    $query .= "sold_items_total_price_af,";
    $query .= "sold_items_total_price_rs,";
    // $query .= "sold_mobile_total_price_dollor,";
    // $query .= "exchange_rate,";
    // $query .= "afghani,";
    $query .= "sold_date,";
    $query .= "sold_rate,";
    $query .= "sold_basePrice,";
    $query .= "sold_rstoaf,";
    $query .= "sale_item_id) ";
    $query .= "VALUES (";
    $query .= "'$sitemName',";
    $query .= "'$sitemCategory',";
    $query .= "'$sitemQuality',";
    $query .= "$myqty,";

    $query .= "'$sitemPic',";
    $query .= "'$mypriceAF',";
    $query .= "'$mypriceRS',";
    // $query .= "'$mypriceDollor',";
    $query .= "'$mytotalpriceAF',";
    $query .= "'$mytotalpriceRS',";
    // $query .= "'$mytotalpriceDollor',";
    // $query .= "'$afghaniRate',";
    // $query .= "'$updatedTotalAfghani',";
    $query .= "now(),";
    $query .= "'$itemRate',";
    $query .= "'$itembasePrice',";
    $query .= "'$RSTOAF',";
    $query .= "$sitemId";
    $query .= ")";

    $insertIntoSoldItems = mysqli_query($connection, $query);
    if (!$insertIntoSoldItems) {
        die("QUERY  FIELD sold Item" . mysqli_error($connection));
    } else {

        $query = "SELECT * FROM general_items WHERE id = $sale_Id";
        $selectByItemID = mysqli_query($connection, $query);
        while ($rows = mysqli_fetch_assoc($selectByItemID)) {

            $ItemQTY = $rows['quantity'];
            $ItemAF = $rows['price'];
            // $mobileRS = $rows['price_rs'];

            $newQTY = $ItemQTY - $myqty;
            $newAF = $newQTY * $ItemAF;
            // $newRS = $newQTY * $mobileRS;

            $query = "UPDATE general_items SET ";
            $query .= "quantity = $newQTY,";
            $query .= "total_price = $newAF ";
            // $query .= "mobile_total_price_rs = $newRS ";

            $query .= "WHERE id = $sale_Id";
            $updateQTY = mysqli_query($connection, $query);
            if (!$updateQTY) {
                die("Query Field qty" . mysqli_error($connection));
            }

        }

        ?>

<!-- new coding for general items -->
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


<!-- end of new coding general items -->








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

    // $query = "SELECT * FROM sold_general_items WHERE sold_date = CURDATE()";
    // $displaySoldItemByDate = mysqli_query($connection, $query);
    // $soldItemaf = 0;
    // $soldItemrs = 0;
    // $soldMobilesrs = 0;
    // while ($rows = mysqli_fetch_assoc($displaySoldItemByDate)) {
    //     $soldItemSaleID = $rows['sale_item_id'];
    //     $soldItemSoldID = $rows['sold_id'];
    //     $soldItemQTY = $rows['sold_quantity'];
    //     $soldItemPrice = $rows['sold_items_price_af'];
    //     $soldItemaf = $rows['sold_items_total_price_af'];
    //     $soldItemrs = $rows['sold_items_total_price_rs'];
    //     if ($soldItemSaleID) {
    //         $query = "SELECT * FROM general_items WHERE id = $soldItemSaleID";
    //         $bySaleID = mysqli_query($connection, $query);
    //         while ($rows = mysqli_fetch_assoc($bySaleID)) {
    //             $itemID = $rows['id'];
    //             $itemPrice = $rows['price'];
    //         }
    //     }
    //     $itemProfitRS = 0;
    //     $itemProfitAF = 0;
    //     if ($soldItemrs > 0) {
    //         $itemProfitRS = (($soldItemrs * 1000) / $reportRateToday) - ($itemPrice * $soldItemQTY);
    //     } else {
    //         $itemProfitAF = $soldItemaf - ($itemPrice * $soldItemQTY);
    //     }
    //     $totalItemSale = (($soldItemrs * 1000) / $reportRateToday) + $soldItemaf;
    // }

    // $query = "UPDATE report SET ";
    // $query .= "report_af = report_af + $soldItemaf,";
    // $query .= "report_rs = report_rs + $soldItemrs,";
    // $query .= "report_total =report_total + $totalItemSale,";
    // $query .= "report_profit = report_profit + $itemProfitAF + $itemProfitRS ";

    // $query .= "WHERE report_date = CURDATE()";
    // $update2 = mysqli_query($connection, $query);
    // if (!$update2) {
    //     die("QUERY FIELD report" . mysqli_error($connection));
    // }
}
?>






<div class="col" dir="rtl">

<div>
<?php

if(isset($_GET['soldAllItems'])){
    $query = "SELECT * FROM sold_general_items WHERE sold_date = CURDATE() ORDER BY sold_id DESC";
    ?>
    <form action="" Method='get'>
    <input type="submit" name='all' value='All' class=' btn btn-danger'>
    </form>
 
<?php }elseif(isset($_GET['all'])) {
    $query = "SELECT * FROM sold_general_items ORDER BY sold_id DESC";
    ?>
    <form action="" Method='get'>
   <a href="sold_general_items.php?soldAllItems" class="btn btn-success">Today</a>
    </form>
 
<?php }

?>
</div>

<h1 class="display-2 pashtofont text-center"> ټول خرڅ شوی سامان</h1>
 <!-- Light table -->
 <div class="table-responsive">
              <table class="table align-items-center table-flush table-condensed" id="search">
                <thead class="thead-light">
                <tr class="pashtofont text-center">

<th style="font-size:16px">تاریخ</th>
<th style="font-size:16px">عکس</th>
<th style="font-size:16px">نوم</th>
<th style="font-size:16px">کټګوری</th>
<th style="font-size:16px">کیفیت</th>
<th style="font-size:16px">قیمت</th>
<th style="font-size:16px">مقدار</th>
<th style="font-size:16px">مجموعه قیمت</th>
<th style="font-size:16px">عملیات</th>

</tr>
</thead>
<tbody class="list">




<!-- display  Mobiles From Database -->
<?php




$displaySoldItem = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($displaySoldItem)) {
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
    // $soldMobileExchangeRate = $rows['exchange_rate'];
    // $soldMobileAfghani = $rows['afghani'];
    $soldItemDate = $rows['sold_date'];
    $soldItemSaleID = $rows['sale_item_id'];

    ?>



            <tr class="text-center">
            <td style="font-weight:600"><?=$soldItemDate?></td>
                <td class="media"><img class="avatar rounded-circle mr-3" src="img/theme/<?=$soldItemPic?>" alt="img"> </td>
                <td style="font-weight:600"><?=$soldItemName?></td>
                <td style="font-weight:600"><?=$soldItemCategory?></td>
                <td style="font-weight:600"><?=$soldItemQuality?></td>



                <td style="font-weight:600">
                <?php
if ($soldItemPriceAF) {
        echo $soldItemPriceAF . " <span style='font-size:16px;color:red'>افغانی</span>";
    } elseif ($soldItemPriceRS) {
        echo $soldItemPriceRS . " <span style='font-size:16px;color:red'>کلداری</span>";

        // elseif ($soldMobilePriceDollor) {
        //     echo $soldMobilePriceDollor . " <span style='font-size:16px;color:red'>ډالر</span>";
    } else {
        echo null;
    }
    ?>

                 </td>
                <td style="font-weight:600"><?=$soldItemQuantity?></td>
                <td style="font-weight:600">
                <?php
if ($soldItemPriceAF) {
        echo $soldItemTotalPriceAF . " <span style='font-size:16px;color:red'>افغانی</span>";
    } elseif ($soldItemPriceRS) {
        echo $soldItemTotalPriceRS . " <span style='font-size:16px;color:red'>کلداری</span>";
        // } elseif ($soldMobilePriceDollor) {
        //     echo $soldMobileTotalPriceDollor . " <span style='font-size:16px;color:red'>ډالر</span>";
    } else {
        echo null;
    }
    ?>
                </td>

            <td>



<!-- <a href="edit_sold_general_items.php?editid=<?php echo $soldItemId ?>&c=<?php
if ($soldItemPriceAF) {
        echo 1;
    } elseif ($soldItemPriceRS) {
        echo 2;
    }
    ?>" class="btn btn-icon btn-3 btn-primary btn-sm"

type="button">
Edit
</a> -->
<a href="sold_general_items.php?soldAllItems&delete=<?=$soldItemId?> " class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure To Delete ?');">Delete</a>




</td>

            </tr>


<?php }?>


<?php

if (isset($_GET['delete'])) {
    $deleteId = $_GET['delete'];
    $query = "SELECT * FROM sold_general_items WHERE sold_id = $deleteId";
    $selectQuery = mysqli_query($connection, $query);
    $mobileNEW = 0;
    while ($rows = mysqli_fetch_assoc($selectQuery)) {
        $mobileNEW = $rows['sale_item_id'];
        $soldQ = $rows['sold_quantity'];

        //new coding

        $soldMpA = $rows['sold_items_price_af'];
        $soldMpR = $rows['sold_items_price_rs'];
        $soldMDate = $rows['sold_date'];

        $query = "UPDATE income SET Iprice_af = Iprice_af - '$soldMpA',Iprice_rs = Iprice_rs -'$soldMpR' WHERE income_des = 'خرڅ شوی سامان' AND `income_date`='$soldMDate'";
        $updateq = mysqli_query($connection, $query);
        if (!$updateq) {
            die("error on updateIncome Query " . mysqli_error($connection));
        }

// end of new coding

        $query = "SELECT * FROM general_items WHERE id = $mobileNEW";
        $selectQuery = mysqli_query($connection, $query);
        while ($rows = mysqli_fetch_assoc($selectQuery)) {
            $mobileq = $rows['quantity'];
            $mobilep = $rows['price'];
            $qq = $soldQ + $mobileq;
            $query = "UPDATE general_items SET quantity = $qq WHERE id = $mobileNEW";
            $updateQuery = mysqli_query($connection, $query);
        }

        $query = "UPDATE general_items SET  total_price = $qq * $mobilep WHERE id = $mobileNEW";
        $updateQuery = mysqli_query($connection, $query);

    }

    $query = "DELETE FROM sold_general_items WHERE sold_id = $deleteId";
    $deleteQuery = mysqli_query($connection, $query);
    header('Location:sold_general_items.php?soldAllItems');
}

?>


        </tbody>
    </table>
</div>
</div>




        </div>
<!-- Update Sold Item -->




<?php

if (isset($_POST['updateSoldItem'])) {

    $soldid = $_POST['soldid'];
    $id = $_POST['id'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $currency = $_POST['currency'];
    $total_updated_price = $price * $qty;

    $query = "UPDATE general_items SET ";
    $query .= "quantity = quantity - '$qty' ";
    $query .= "WHERE id = $id";
    $updateItem = mysqli_query($connection, $query);
    if (!updateItem) {
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

    $query = "UPDATE sold_general_items SET ";
    $query .= "sold_quantity = '$qty',";
    $query .= "sold_items_price_af = '$priceAF',";
    $query .= "sold_items_price_rs = '$priceRS',";
    // $query .= "sold_mobile_price_dollor = '$priceDollor',";
    $query .= "sold_items_total_price_af = '$totalpriceAF',";
    $query .= "sold_items_total_price_rs = '$totalpriceRS' ";
    // $query .= "sold_mobile_total_price_dollor = '$totalpriceDollor',";
    // $query .= "exchange_rate = '$newafghaniRate',";
    // $query .= "afghani = '$newtotalAfghani' ";
    $query .= "WHERE sold_item_id = $soldid";

    $updateSoldItem = mysqli_query($connection, $query);
    if (!updateSoldItem) {
        die("query Field sold" . mysqli_error($connection));
    } else {

        $query = "SELECT * FROM general_items WHERE id = $id";
        $displayItem = mysqli_query($connection, $query);
        while ($rows = mysqli_fetch_assoc($displayItem)) {

            $ItemQuantity = $rows['quantity'];

        }

        $query = "SELECT * FROM sold_general_items WHERE sold_id = $soldid";
        $displaySoldItem = mysqli_query($connection, $query);
        while ($rows = mysqli_fetch_assoc($displaySoldItem)) {
            $soldItemQuantity = $rows['sold_quantity'];
            $soldItemPriceAF = $rows['sold_items_price_af'];
            $soldItemPriceRS = $rows['sold_items_price_rs'];
            // $soldMobilepriceDollor = $rows['sold_mobile_price_dollor'];
        }

        $finalQTY = $ItemQuantity - $soldItemQuantity;
        $AF = $finalQTY * $soldItemPriceAF;
        $RS = $finalQTY * $soldItemPriceRS;
        // $D = $finalQTY * $soldMobilepriceDollor;

        $query = "UPDATE general_items SET ";
        $query .= "quantity = '$finalQTY',";
        $query .= "total_items_price_af = '$AF' ";
        $query .= "total_items_price_rs = '$RS' ";
        // $query .= "mobile_total_price_dollor = '$D' ";
        $query .= "WHERE id = $id";

        header('Location:sold_general_items.php?soldAllItems');

        $updateItem = mysqli_query($connection, $query);
        if (!updateItem) {
            die("query Field update " . mysqli_error($connection));
        }

    }

}

?>



            <!-- Main Table -->



                <!-- Footer -->
                <?php include "includes/footer.php";?>