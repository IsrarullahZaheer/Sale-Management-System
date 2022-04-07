
 <?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// if (isset($_GET['exchange'])) {
//     $rate = $_GET['exchange'];

//     $query = "INSERT INTO report (report_date,report_rate) VALUES (now(),'$rate')";

//     $insert = mysqli_query($connection, $query);
//     if (!$insert) {
//         die("QUERY FIELD new" . mysqli_error($connection));
//     }
// }
// $query = "SELECT * FROM report WHERE report_date = CURDATE()";
// $displayReport = mysqli_query($connection, $query);
// while ($rows = mysqli_fetch_assoc($displayReport)) {

//     $reportRateToday = $rows['report_rate'];

// }
// mobiles total record
$query = "SELECT sum(mobile_total_price_af) as totalaf  FROM mobiles";
$mobileSumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($mobileSumAF)) {
    $mobileTotalAF = $rows['totalaf'];

// items total record
    $query = "SELECT sum(total_price) as totalItemAF  FROM general_items";
    $sumItemAF = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($sumItemAF)) {
        $itemTotalAF = $rows['totalItemAF'];
    }
    $grandMobileAndItemTotal = $mobileTotalAF + $itemTotalAF;
}
// sold mobiles total record AF
$query = "SELECT sum(sold_mobile_total_price_af) as soldMobileTotalAf  FROM sold_mobiles";
$soldMobileSumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($soldMobileSumAF)) {
    $soldMobileTotalAF = $rows['soldMobileTotalAf'];
    // sold mobiles total record RS
    $query = "SELECT sum(sold_mobile_total_price_rs) as soldMobileTotalRs  FROM sold_mobiles";
    $soldMobileSumRS = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($soldMobileSumRS)) {
        $soldMobileTotalRS = $rows['soldMobileTotalRs'];
    }

// sold item total record AF
    $query = "SELECT sum(sold_items_total_price_af) as soldItemTotalAf  FROM sold_general_items";
    $soldItemSumAF = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($soldItemSumAF)) {
        $soldItemTotalAF = $rows['soldItemTotalAf'];
        // sold item total record RS
        $query = "SELECT sum(sold_items_total_price_rs) as soldItemTotalRs  FROM sold_general_items";
        $soldItemSumRS = mysqli_query($connection, $query);
        while ($rows = mysqli_fetch_assoc($soldItemSumRS)) {
            $soldItemTotalRS = $rows['soldItemTotalRs'];
        }
    }
    $query = "SELECT sum(Iprice_af) as incomeAF  FROM income";
    $incomeAF = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($incomeAF)) {
        $incomeTotalAF = $rows['incomeAF'];

        $query = "SELECT sum(Iprice_rs) as incomeRS  FROM income";
        $incomeRS = mysqli_query($connection, $query);
        while ($rows = mysqli_fetch_assoc($incomeRS)) {
            $incomeTotalRS = $rows['incomeRS'];
        }
        if (!$incomeRS) {
            die(mysqli_error($connection));
        }
    }
    $query = "SELECT sum(price_af) as expensesAF  FROM expenses";
    $expensesAF = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($expensesAF)) {
        $expensesTotalAF = $rows['expensesAF'];

        $query = "SELECT sum(price_rs) as expensesRS  FROM expenses";
        $expensesRS = mysqli_query($connection, $query);
        while ($rows = mysqli_fetch_assoc($expensesRS)) {
            $expensesTotalRS = $rows['expensesRS'];
        }
        if (!$expensesRS) {
            die(mysqli_error($connection));
        }
    }
    $grandSoldTotalMobileAndItemAF = ($soldMobileTotalAF + $soldItemTotalAF + $incomeTotalAF) - ($expensesTotalAF);
    $grandSoldTotalMobileAndItemRS = $soldMobileTotalRS + $soldItemTotalRS + $incomeTotalRS - ($expensesTotalRS);
}

// if ($soldMobileTotalAF || $soldItemTotalAF || $soldMobileTotalRS || $soldItemTotalRS) {
//     $TAF = $soldMobileTotalAF + $soldItemTotalAF;
//     $TRS = $soldMobileTotalRS + $soldItemTotalRS;
// }
// echo
//     "'mobile total'.$mobileTotalAF
// .'item total'.$itemTotalAF
// .'sold mobile total'.$soldMobileTotalAF
// .'sold mobile RS total'.$soldMobileTotalRS
// .'sold item total'.$soldItemTotalAF
// .'sold item total RS'.$soldItemTotalRS
// .";
// $query = "SELECT * FROM sold_mobiles WHERE sold_mobile_id = 100";
// $displaySoldMobiles = mysqli_query($connection, $query);
// while ($rows = mysqli_fetch_assoc($displaySoldMobiles)) {
//     $mobileSaleID = $rows['sale_id'];
//     $mobileSalePriceAF = $rows['sold_mobile_price_af'];
//     $mobileSalePriceRS = $rows['sold_mobile_price_rs'];
//     $mobileSoldPrice = ($mobileSalePriceRS * 1000) / 2100;
//     $soldMobileTotalPrice = $mobileSalePriceAF + $mobileSoldPrice;
// }
// $query = "SELECT * FROM mobiles WHERE mobile_id = $mobileSaleID";
// $x = mysqli_query($connection, $query);
// while ($rows = mysqli_fetch_assoc($x)) {
//     $mobile_id = $rows['mobile_id'];
//     $mobileBasePrice = $rows['mobile_price_af'];
//     $win = $mobileSalePriceAF - $mobileBasePrice;
// }
// echo "base price " . $mobileBasePrice;
// echo "purchise Price " . $mobileSalePriceAF;
// echo " winnner " . $win;
// echo " RS " . $mobileSalePriceRS;
// echo " to AF " . $mobileSoldPrice;

// // sold mobiles total record
// $query = "SELECT sum(mobile_total_price_rs) as total_rs  FROM mobiles";
// $sumAF = mysqli_query($connection, $query);
// while ($rows = mysqli_fetch_assoc($sumAF)) {
//     $totalRS = $rows['total_rs'];

// }

// $query = "SELECT sum(sold_mobile_total_price_af) as soldtotalaf  FROM sold_mobiles";
// $sumRS = mysqli_query($connection, $query);
// while ($rows = mysqli_fetch_assoc($sumRS)) {
//     $soldtotalAF = $rows['soldtotalaf'];
// }
// $grandTotalAfghani = $totalAF + $soldtotalAF;

// $query = "SELECT sum(sold_mobile_total_price_rs) as soldtotalrs  FROM sold_mobiles";
// $sumD = mysqli_query($connection, $query);
// while ($rows = mysqli_fetch_assoc($sumD)) {
//     $soldtotalRS = $rows['soldtotalrs'];
// }

// TODAY SOlD MOBILES

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
//     if ($soldMobilesrs > 0) {
//         $mobileProfitRS = (($soldMobilesrs * $reportRateToday) / 1000) - ($MobilePrice * $soldMobileQTY);
//     } else {
//         $mobileProfitAF = $soldMobilesaf - ($MobilePrice * $soldMobileQTY);
//     }
//     $totalMobileSale = (($soldMobilesrs * $reportRateToday) / 1000) + $soldMobilesaf;

// }

// // TODAY SOlD Items
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
//     }if ($soldItemrs > 0) {
//         $itemProfitRS = (($soldItemrs * $reportRateToday) / 1000) - ($itemPrice * $soldItemQTY);
//     } else {
//         $itemProfitAF = $soldItemaf - ($itemPrice * $soldItemQTY);
//     }
//     $totalItemSale = (($soldItemrs * $reportRateToday) / 1000) + $soldItemaf;
// }

// echo $itemPrice . " price ";
// echo $$itemProfitRS . " rs";
// echo $soldItemQTY . " qty";
// echo $itemProfitAF . " af";
// echo $soldItemrs . " sold rs";

// if ($date = $curDate) {

//     $query = "INSERT INTO report (";
//     $query .= "report_date,";
//     $query .= "report_af,";
//     $query .= "report_rs,";
//     $query .= "report_rate,";
//     $query .= "report_total,";
//     $query .= "report_profit) ";
//     $query .= "VALUES (";
//     $query .= "now(),";
//     $query .= "'$totalAF',";
//     $query .= "'$totalRS',";
//     $query .= "'500',";
//     $query .= "'$grandTotalSale',";
//     $query .= "'$profit'";
//     $query .= ") ";

//     $query .= "ON DUPLICATE KEY UPDATE ";
//     $query .= "report_af =  report_af + ('$totalAF'),";
//     $query .= "report_rs = report_rs + ('$totalRS'),";
//     $query .= "report_rate =  (500),";
//     $query .= "report_total = report_total + ('$grandTotalSale'),";
//     $query .= "report_profit =  report_profit + ('$profit')";

//     $update = mysqli_query($connection, $query);
//     if (!$update) {
//         die("QUERY FIELD u" . mysqli_error($connection));
//     }

// $curDate = date("Y - m - d");

// $startDate = new DateTime('2020-07-15');
// for ($i = 0; $i < 2000; $i++) {
//     $consulta = "INSERT INTO report (report_date) Values ('" . date_format($startDate, 'Y-m-d') . "');";
//     $startDate = date_add($startDate, date_interval_create_from_date_string('1 days'));
//     $query = mysqli_query($connection, $consulta);
// }

// $query = "SELECT * FROM report";
// $displayReport = mysqli_query($connection, $query);
// while ($rows = mysqli_fetch_assoc($displayReport)) {
//     $reportID = $rows['report_id'];
//     $date = $rows['report_date'];
//     $reportAF = $rows['report_af'];
//     $reportRS = $rows['report_rs'];
//     $reportRate = $rows['report_rate'];
//     $reportTotal = $rows['report_total'];
//     $reportProfit = $rows['report_profit'];
// }
// $curDate = date("Y - m - d");
// if ($date = $curDate) {

//     $totalRS = $soldItemrs + $soldMobilesrs;

//     $totalAF = $soldMobilesaf + $soldItemaf;

//     $profit = $itemProfitRS + $itemProfitAF + $mobileProfitRS + $mobileProfitAF;
//     $grandTotalSale = $totalMobileSale + $totalItemSale;

//     $query = "UPDATE report SET ";
//     $query .= "report_af = report_af + $totalAF,";
//     $query .= "report_rs = report_rs + $totalRS,";
//     $query .= "report_total =report_total + $grandTotalSale,";
//     $query .= "report_profit = report_profit + $profit ";

//     $query .= "WHERE report_date = CURDATE()";

//     $update1 = mysqli_query($connection, $query);
//     if (!$update1) {
//         die("QUERY FIELD" . mysqli_error($connection));
//     }

// }

// }
// } else {
// $query = "INSERT INTO report (";
// $query .= "report_date,";
// $query .= "report_af,";
// $query .= "report_rs,";
// $query .= "report_rate,";
// $query .= "report_total,";
// $query .= "report_profit) ";
// $query .= "VALUES (";
// $query .= "now(),";
// $query .= "'$totalAF ',";
// $query .= "'$totalRS',";
// $query .= "460,";
// $query .= "'$grandTotalSale',";
// $query .= "'$profit' ";
// $query .= ")";

//     $insertIntoReport = mysqli_query($connection, $query);
//     if (!$insertIntoReport) {
//         die("QUERY FIELD" . mysqli_error($connection));
//     }

// }

// } elseif ($date = $curDate) {

//     $query = "UPDATE report SET ";
//     $query .= "report_af = '$totalAF',";
//     $query .= "report_rs = '$totalRS',";
//     $query .= "report_rate = '460',";
//     $query .= "report_total = $grandTotalSale,";
//     $query .= "report_profit = $profit ";

//     $query .= "WHERE report_date = CURDATE()";

//     $update = mysqli_query($connection, $query);
//     if (!$update) {
//         die("QUERY FIELD" . mysqli_error($connection));
//     }

// current day
// $query = "SELECT * FROM report WHERE report_date = CURDATE()";
// $todayDisplayReport = mysqli_query($connection, $query);
// $todayReportAF = 0;
// $todayReportTotal = 0;
// $todayReportRate = 0;
// $todayReportProfit = 0;
// $todayReportRS = 0;
// while ($rows = mysqli_fetch_assoc($todayDisplayReport)) {

//     $todayReportID = $rows['report_id'];
//     $todayReportDate = $rows['report_date'];
//     $todayReportAF += $rows['report_af'];
//     $todayReportRS += $rows['report_rs'];
//     $todayReportRate = $rows['report_rate'];
//     $todayReportTotal += $rows['report_total'];
//     $todayReportProfit += $rows['report_profit'];

// }

$query = "SELECT sum(sold_mobile_total_price_af) AS FF,sum(sold_mobile_total_price_rs) AS RR,sold_mobile_date,sold_mobile_id,sale_id FROM sold_mobiles WHERE sold_mobile_date=CURDATE()";
$displaySoldMobileByDate = mysqli_query($connection, $query);

$soldMaf = 0;
$soldMrs = 0;

while ($rowss = mysqli_fetch_assoc($displaySoldMobileByDate)) {
    $soldMobileSaleID = $rowss['sale_id'];
    $soldMobileID = $rowss['sold_mobile_id'];
    $soldDateM = $rowss['sold_mobile_date'];
    $soldMaf = $rowss['FF'];
    $soldMrs = $rowss['RR'];

}

$query = "SELECT sum(sold_items_total_price_af) AS FF,sum(sold_items_total_price_rs) AS RR,sold_date,sold_id,sale_item_id FROM sold_general_items WHERE sold_date=CURDATE() -1";
$displaySoldMobileByDate = mysqli_query($connection, $query);

$soldMaf = 0;
$soldMrs = 0;

while ($rowss = mysqli_fetch_assoc($displaySoldMobileByDate)) {
    $soldMobileSaleID = $rowss['sale_item_id'];
    $soldMobileID = $rowss['sold_id'];
    $soldDateM = $rowss['sold_date'];
    $soldMaf = $rowss['FF'];
    $soldMrs = $rowss['RR'];

}

// YESTERDAY Report Record
$query = "SELECT * FROM report WHERE report_date = CURDATE() - 1";
$yesterdayDisplayReport = mysqli_query($connection, $query);
$yesterdayReportAF = 0;
$yesterdayReportRS = 0;
$yesterdayReportRate = 0;
$yesterdayReportTotal = 0;
$yesterdayReportProfit = 0;
while ($rows = mysqli_fetch_assoc($yesterdayDisplayReport)) {

    $yesterdayReportID = $rows['report_id'];
    $yesterdayReportDate = $rows['report_date'];
    $yesterdayReportAF = $rows['report_af'];
    $yesterdayReportRS = $rows['report_rs'];
    $yesterdayReportRate = $rows['report_rate'];
    $yesterdayReportTotal = $rows['report_total'];
    $yesterdayReportProfit = $rows['report_profit'];
}
// one month record
$query = "SELECT * FROM report WHERE MONTH(report_date) = MONTH(CURDATE())";
$yesterdayDisplayReport = mysqli_query($connection, $query);
$monthReportAF = 0;
$monthReportTotal = 0;
$monthReportRate = 0;
$monthReportProfit = 0;
$monthReportRS = 0;
while ($rows = mysqli_fetch_assoc($yesterdayDisplayReport)) {
    $monthReportID = $rows['report_id'];
    $monthReportDate = $rows['report_date'];
    $monthReportAF += $rows['report_af'];
    $monthReportRS += $rows['report_rs'];
    $monthReportRate = $rows['report_rate'];
    $monthReportTotal += $rows['report_total'];
    $monthReportProfit += $rows['report_profit'];
}
// current Year Report
$query = "SELECT * FROM report WHERE report_date between DATE_FORMAT(CURDATE(),'%Y-01-01') AND DATE_FORMAT(CURDATE(),'%Y-12-31')";
$yesterdayDisplayReport = mysqli_query($connection, $query);
$yearReportAF = 0;
$yearReportTotal = 0;
$yearReportRate = 0;
$yearReportProfit = 0;
$yearReportRS = 0;
while ($rows = mysqli_fetch_assoc($yesterdayDisplayReport)) {
    $yearReportID = $rows['report_id'];
    $yearReportDate = $rows['report_date'];
    $yearReportAF += $rows['report_af'];
    $yearReportRS += $rows['report_rs'];
    $yearReportRate = $rows['report_rate'];
    $yearReportTotal += $rows['report_total'];
    $yearReportProfit += $rows['report_profit'];
}
?>




<!-- Today Report -->

<?php
$query = "SELECT sum(sold_mobile_total_price_af) as af, sum(sold_mobile_total_price_rs) as rs FROM sold_mobiles WHERE sold_mobile_date = curdate()";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $todayMAF = $rows['af'];
    $todayMRS = $rows['rs'];
    $query = "SELECT sum(sold_items_total_price_af) as af, sum(sold_items_total_price_rs) as rs FROM sold_general_items WHERE sold_date = curdate()";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $todayIAF = $rows['af'];
        $todayIRS = $rows['rs'];

    }

    $query = "SELECT sum(easyload_af) as af, sum(easyload_rs) as rs FROM easyload WHERE easyload_date = curdate()";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $todayEAF = $rows['af'];
        $todayERS = $rows['rs'];
    }

}?>

<?php
$query = "SELECT sum(sold_mobile_rstoaf) as rstoaf FROM sold_mobiles WHERE sold_mobile_date = curdate()";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $todayRstoaf = $rows['rstoaf'];

    $query = "SELECT sum(sold_rstoaf) as saf FROM sold_general_items WHERE sold_date = curdate()";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $todayIstoaf = $rows['saf'];

    }

    $query = "SELECT sum(easyload_rstoaf) as saf FROM easyload WHERE easyload_date = curdate()";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $todayEstoaf = $rows['saf'];

    }

    $todayTotalRstoAf = $todayRstoaf + $todayIstoaf + $todayEstoaf;

}?>
<!-- profit -->
<?php
$base = 0;
$Raf = 0;
$af = 0;
$Ibase = 0;
$IRaf = 0;
$Iaf = 0;
$query = "SELECT sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles WHERE sold_mobile_date = curdate()";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $base = $rows['b'];
    $Raf = $rows['r'];
    $af = $rows['a'];

    $query = "SELECT sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items WHERE sold_date = curdate()";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Ibase = $rows['b'];
        $IRaf = $rows['r'];
        $Iaf = $rows['a'];
    }

    $query = "SELECT sum(easyload_profit) as a FROM easyload WHERE easyload_date = curdate()";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $todayeasyloadProfit = $rows['a'];
    }

    $todayProfit = ($Raf + $af - $base) + ($IRaf + $Iaf - $Ibase) + $todayeasyloadProfit;

}
?>





<!-- kharcha  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE income_date = curdate() AND income_category = 'خرچه'";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $todayInvest = $rows['af'];
}
?>



<!-- karaia  -->
<?php
// $query = "SELECT sum(Oprice_af) as af FROM income WHERE income_date = curdate() AND income_category = 'کرایه'";
// $result5 = mysqli_query($connection, $query);
// while ($rows = mysqli_fetch_assoc($result5)) {
//     $karaia10 = $rows['af'];
// }
?>


<?php
// total profit
$todayTotalProfit = $todayProfit - $todayInvest;

?>


<!-- End of Today Report -->


<!-- yesterDay Report -->

<?php
$query = "SELECT sum(sold_mobile_total_price_af) as af, sum(sold_mobile_total_price_rs) as rs FROM sold_mobiles WHERE sold_mobile_date = curdate() -1";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $yesterDayMAF = $rows['af'];
    $yesterDayMRS = $rows['rs'];
    $query = "SELECT sum(sold_items_total_price_af) as af, sum(sold_items_total_price_rs) as rs FROM sold_general_items WHERE sold_date = curdate() -1";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $yesterDayIAF = $rows['af'];
        $yesterDayIRS = $rows['rs'];

    }

    $query = "SELECT sum(easyload_af) as af, sum(easyload_rs) as rs FROM easyload WHERE easyload_date = curdate()-1";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $yesterDayEAF = $rows['af'];
        $yesterDayERS = $rows['rs'];
    }

}?>
<!-- profit -->
<?php
$base = 0;
$Raf = 0;
$af = 0;
$Ibase = 0;
$IRaf = 0;
$Iaf = 0;
$query = "SELECT sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles WHERE sold_mobile_date = curdate() -1";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $base = $rows['b'];
    $Raf = $rows['r'];
    $af = $rows['a'];

    $query = "SELECT sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items WHERE sold_date = curdate() -1";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Ibase = $rows['b'];
        $IRaf = $rows['r'];
        $Iaf = $rows['a'];
    }
    $query = "SELECT sum(easyload_profit) as a FROM easyload WHERE easyload_date = curdate()-1";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $yesterDayeasyloadProfit = $rows['a'];
    }

    $yesterDayProfit = ($Raf + $af - $base) + ($IRaf + $Iaf - $Ibase) + $yesterDayeasyloadProfit;

}
?>
<?php
$query = "SELECT sum(sold_mobile_rstoaf) as rstoaf FROM sold_mobiles WHERE sold_mobile_date = curdate()-1";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $yesterDayRstoaf = $rows['rstoaf'];

    $query = "SELECT sum(sold_rstoaf) as saf FROM sold_general_items WHERE sold_date = curdate()-1";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $yesterDayIstoaf = $rows['saf'];

    }
    $query = "SELECT sum(easyload_rstoaf) as saf FROM easyload WHERE easyload_date = curdate()-1";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $yesterDayEstoaf = $rows['saf'];

    }
    $yesterDayTotalRstoAf = $yesterDayRstoaf + $yesterDayIstoaf + $yesterDayEstoaf;

}?>




<!-- kharcha  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE income_date = curdate() -1 AND income_category = 'خرچه'";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $yesterDayInvest = $rows['af'];
}
?>



<!-- karaia  -->
<?php
// $query = "SELECT sum(Oprice_af) as af FROM income WHERE income_date = curdate() AND income_category = 'کرایه'";
// $result5 = mysqli_query($connection, $query);
// while ($rows = mysqli_fetch_assoc($result5)) {
//     $karaia10 = $rows['af'];
// }
?>


<?php
// total profit
$yesterDayTotalProfit = $yesterDayProfit - $yesterDayInvest;

?>


<!-- End of yesterDay Report -->





<!-- last 7 days -->

<?php
$query = "SELECT sum(sold_mobile_total_price_af) as af, sum(sold_mobile_total_price_rs) as rs FROM sold_mobiles WHERE DATE(sold_mobile_date) > (NOW() - INTERVAL 7 DAY)";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $last7DayMAF = $rows['af'];
    $last7DayMRS = $rows['rs'];
    $query = "SELECT sum(sold_items_total_price_af) as af, sum(sold_items_total_price_rs) as rs FROM sold_general_items WHERE DATE(sold_date) > (NOW() - INTERVAL 7 DAY)";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $last7DayIAF = $rows['af'];
        $last7DayIRS = $rows['rs'];

    }
    $query = "SELECT sum(easyload_af) as af, sum(easyload_rs) as rs FROM easyload WHERE DATE(easyload_date) > (NOW() - INTERVAL 7 DAY)";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $last7DayEAF = $rows['af'];
        $last7DayERS = $rows['rs'];
    }

}?>
<!-- profit -->
<?php
$base = 0;
$Raf = 0;
$af = 0;
$Ibase = 0;
$IRaf = 0;
$Iaf = 0;
$query = "SELECT sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles WHERE DATE(sold_mobile_date) > (NOW() - INTERVAL 7 DAY)";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $base = $rows['b'];
    $Raf = $rows['r'];
    $af = $rows['a'];

    $query = "SELECT sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items WHERE DATE(sold_date) > (NOW() - INTERVAL 7 DAY)";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Ibase = $rows['b'];
        $IRaf = $rows['r'];
        $Iaf = $rows['a'];
    }

    $query = "SELECT sum(easyload_profit) as a FROM easyload WHERE DATE(easyload_date) > (NOW() - INTERVAL 7 DAY)";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $last7DayeasyloadProfit = $rows['a'];
    }

    $last7DayProfit = ($Raf + $af - $base) + ($IRaf + $Iaf - $Ibase) + $last7DayeasyloadProfit;

}
?>
<?php
$query = "SELECT sum(sold_mobile_rstoaf) as rstoaf FROM sold_mobiles WHERE DATE(sold_mobile_date) > (NOW() - INTERVAL 7 DAY)";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $last7DayRstoaf = $rows['rstoaf'];

    $query = "SELECT sum(sold_rstoaf) as saf FROM sold_general_items WHERE DATE(sold_date) > (NOW() - INTERVAL 7 DAY)";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $last7DayIstoaf = $rows['saf'];

    }

    $query = "SELECT sum(easyload_rstoaf) as saf FROM easyload WHERE DATE(easyload_date) > (NOW() - INTERVAL 7 DAY)";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $last7DayEstoaf = $rows['saf'];

    }

    $last7DayTotalRstoAf = $last7DayRstoaf + $last7DayIstoaf + $last7DayEstoaf;

}?>




<!-- kharcha  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE DATE(income_date) > (NOW() - INTERVAL 7 DAY) AND income_category = 'خرچه'";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $last7DayInvest = $rows['af'];
}
?>



<!-- karaia  -->
<?php
// $query = "SELECT sum(Oprice_af) as af FROM income WHERE income_date = curdate() AND income_category = 'کرایه'";
// $result5 = mysqli_query($connection, $query);
// while ($rows = mysqli_fetch_assoc($result5)) {
//     $karaia10 = $rows['af'];
// }
?>


<?php
// total profit
$last7DayTotalProfit = $last7DayProfit - $last7DayInvest;

?>


<!-- End of last7DAY  -->







<!-- last 15 days -->

<?php
$query = "SELECT sum(sold_mobile_total_price_af) as af, sum(sold_mobile_total_price_rs) as rs FROM sold_mobiles WHERE DATE(sold_mobile_date) > (NOW() - INTERVAL 15 DAY)";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $last15DayMAF = $rows['af'];
    $last15DayMRS = $rows['rs'];
    $query = "SELECT sum(sold_items_total_price_af) as af, sum(sold_items_total_price_rs) as rs FROM sold_general_items WHERE DATE(sold_date) > (NOW() - INTERVAL 15 DAY)";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $last15DayIAF = $rows['af'];
        $last15DayIRS = $rows['rs'];

    }
    $query = "SELECT sum(easyload_af) as af, sum(easyload_rs) as rs FROM easyload WHERE DATE(easyload_date) > (NOW() - INTERVAL 15 DAY)";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $last15DayEAF = $rows['af'];
        $last15DayERS = $rows['rs'];
    }

}?>
<!-- profit -->
<?php
$base = 0;
$Raf = 0;
$af = 0;
$Ibase = 0;
$IRaf = 0;
$Iaf = 0;
$query = "SELECT sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles WHERE DATE(sold_mobile_date) > (NOW() - INTERVAL 15 DAY)";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $base = $rows['b'];
    $Raf = $rows['r'];
    $af = $rows['a'];

    $query = "SELECT sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items WHERE DATE(sold_date) > (NOW() - INTERVAL 15 DAY)";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Ibase = $rows['b'];
        $IRaf = $rows['r'];
        $Iaf = $rows['a'];
    }

    $query = "SELECT sum(easyload_profit) as a FROM easyload WHERE DATE(easyload_date) > (NOW() - INTERVAL 15 DAY)";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $last15DayeasyloadProfit = $rows['a'];
    }
    $last15DayProfit = ($Raf + $af - $base) + ($IRaf + $Iaf - $Ibase) + $last15DayeasyloadProfit;

}
?>
<?php
$query = "SELECT sum(sold_mobile_rstoaf) as rstoaf FROM sold_mobiles WHERE DATE(sold_mobile_date) > (NOW() - INTERVAL 15 DAY)";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $last15DayRstoaf = $rows['rstoaf'];

    $query = "SELECT sum(sold_rstoaf) as saf FROM sold_general_items WHERE DATE(sold_date) > (NOW() - INTERVAL 15 DAY)";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $last15DayIstoaf = $rows['saf'];

    }

    $query = "SELECT sum(easyload_rstoaf) as saf FROM easyload WHERE DATE(easyload_date) > (NOW() - INTERVAL 15 DAY)";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $last15DayEstoaf = $rows['saf'];

    }

    $last15DayTotalRstoAf = $last15DayRstoaf + $last15DayIstoaf + $last15DayEstoaf;

}?>




<!-- kharcha  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE DATE(income_date) > (NOW() - INTERVAL 15 DAY) AND income_category = 'خرچه'";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $last15DayInvest = $rows['af'];
}
?>



<!-- karaia  -->
<?php
// $query = "SELECT sum(Oprice_af) as af FROM income WHERE income_date = curdate() AND income_category = 'کرایه'";
// $result5 = mysqli_query($connection, $query);
// while ($rows = mysqli_fetch_assoc($result5)) {
//     $karaia10 = $rows['af'];
// }
?>


<?php
// total profit
$last15DayTotalProfit = $last15DayProfit - $last15DayInvest;

?>


<!-- End of last15DAY  -->











<?php
$afghani = "<span style='font-size:16px' class='text-danger pashtofont'>افغانی </span>";
$pakRs = "<span style='font-size:16px' class='text-danger pashtofont'>کلداری </span>";
?>
<!-- Card stats -->
<div class="header bg-primary pb-6" dir="rtl">
                <div class="container-fluid">
                    <div class="header-body">
                        <div class="py-4 text-center pashtofont">
                        <h2 class="display-2 text-center text-secondary">ټول دوکان حساب</h2>
                        </div>


                            <div class="row">

                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h2 class="card-title text-uppercase text-muted mb-0 pashtofont">
                                                    ټولی افغانی
                                                </h2>
                                        <?php
$query = "SELECT sum(Iprice_af) as totalIaf,sum(Oprice_af) as totalOaf FROM income";
$SumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($SumAF)) {
    $TotalIAF = $rows['totalIaf'];
    $TotalOAF = $rows['totalOaf'];

    $query = "SELECT SUM(Iprice_af) as RtotalAF,SUM(Iprice_rs) as RtotalRS,SUM(Iprice_dollar) as RtotalDollar,SUM(Oprice_af) as TtotalAF,SUM(Oprice_rs) as TtotalRS,SUM(Oprice_dollar) as TtotalDollar FROM income WHERE income_category ='شاپور'";

    $querySumAF = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($querySumAF)) {
        $shraf = $rows['RtotalAF'];
        $shrrs = $rows['RtotalRS'];
        $shrd = $rows['RtotalDollar'];
        $shtaf = $rows['TtotalAF'];
        $shtrs = $rows['TtotalRS'];
        $shtd = $rows['TtotalDollar'];

        $TAF = ($TotalIAF - $shraf) - $TotalOAF;
        echo "<span class='h2 font-weight-bold mb-0'>$TAF</span>";
    }
}
?>


                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-red text-white rounded-circle shadow"
                                                >
                                                    <i class="ni ni-active-40"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <p class="mt-3 mb-0 text-sm">
                                            <span class="text-success mr-2"
                                                ><i class="fa fa-arrow-up"></i> 3.48%</span
                                            >
                                            <span class="text-nowrap">Since last month</span>
                                        </p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h2 class="card-title text-uppercase text-muted mb-0 pashtofont">
                                                    ټولی کلداری
                                                </h2>

                                                <?php
$query = "SELECT sum(Iprice_rs) as totalIrs,sum(Oprice_rs) as totalOrs FROM income";
$SumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($SumAF)) {
    $TotalIRS = $rows['totalIrs'];
    $TotalORS = $rows['totalOrs'];
    $TRS = ($TotalIRS - $shrrs) - $TotalORS;
    echo "<span class='h2 font-weight-bold mb-0'>$TRS</span>";
}
?>



                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow"
                                                >
                                                    <i class="ni ni-chart-pie-35"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <p class="mt-3 mb-0 text-sm">
                                            <span class="text-success mr-2"
                                                ><i class="fa fa-arrow-up"></i> 3.48%</span
                                            >
                                            <span class="text-nowrap">Since last month</span>
                                        </p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h2 class="card-title text-uppercase text-muted mb-0 pashtofont">
                                            ټول ډالر
                                                </h2>

                                                <?php
$query = "SELECT sum(Iprice_dollar) as totalIdollar,sum(Oprice_dollar) as totalOdollar FROM income";
$SumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($SumAF)) {
    $TotalID = $rows['totalIdollar'];
    $TotalOD = $rows['totalOdollar'];
    $TDO = ($TotalID - $shrd) - $TotalOD;
    echo "<span class='h2 font-weight-bold mb-0'>$TDO</span>";
}
?>



                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-green text-white rounded-circle shadow"
                                                >
                                                    <i class="fa fa-dollar-sign"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <p class="mt-3 mb-0 text-sm">
                                            <span class="text-success mr-2"
                                                ><i class="fa fa-arrow-up"></i> 3.48%</span
                                            >
                                            <span class="text-nowrap">Since last month</span>
                                        </p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h2 class="card-title text-uppercase text-muted mb-0 pashtofont">
                                             ټول ایزیلوډ
                                                </h2>
                                                <?php
$query = "SELECT sum(easyload_grand_total) as grand FROM easyload_total";
$SumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($SumAF)) {
    $Easy = $rows['grand'];

    echo "<span class='h2 font-weight-bold mb-0'>$Easy</span>";
}
?>

                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-green text-white rounded-circle shadow"
                                                >
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <p class="mt-3 mb-0 text-sm">
                                            <span class="text-success mr-2"
                                                ><i class="fa fa-arrow-up"></i> 3.48%</span
                                            >
                                            <span class="text-nowrap">Since last month</span>
                                        </p> -->
                                    </div>
                                </div>
                            </div>
                        </div>





                            <div class="row">

                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h2 class="card-title text-uppercase text-muted mb-0 pashtofont">
                                            ټول موبایلونه
                                                </h2>
                                        <?php
$query = "SELECT sum(mobile_total_price_af) as totalMaf FROM mobiles";
$SumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($SumAF)) {
    $TotalMAF = $rows['totalMaf'];

    echo "<span class='h2 font-weight-bold mb-0'>$TotalMAF</span>";
}
?>


                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-red text-white rounded-circle shadow"
                                                >
                                                    <i class="ni ni-active-40"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <p class="mt-3 mb-0 text-sm">
                                            <span class="text-success mr-2"
                                                ><i class="fa fa-arrow-up"></i> 3.48%</span
                                            >
                                            <span class="text-nowrap">Since last month</span>
                                        </p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h2 class="card-title text-uppercase text-muted mb-0 pashtofont">
                                                ټول سامان
                                                </h2>

                                                <?php
$query = "SELECT sum(total_price) as total FROM general_items";
$SumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($SumAF)) {
    $TotalItems = $rows['total'];

    echo "<span class='h2 font-weight-bold mb-0'>$TotalItems</span>";
}
?>



                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow"
                                                >
                                                    <i class="ni ni-chart-pie-35"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <p class="mt-3 mb-0 text-sm">
                                            <span class="text-success mr-2"
                                                ><i class="fa fa-arrow-up"></i> 3.48%</span
                                            >
                                            <span class="text-nowrap">Since last month</span>
                                        </p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h2 class="card-title text-uppercase text-muted mb-0 pashtofont">
                                              جمله خرچه
                                                </h2>

                                              <?php
$query = "SELECT sum(Oprice_af) as totalIK FROM income WHERE DATE(income_date) > '2020-09-25' AND income_category = 'خرچه'";
$SumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($SumAF)) {
    $TotalK = $rows['totalIK'];

    echo "<span class='h2 font-weight-bold mb-0'>$TotalK</span>";
}
?>



                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-green text-white rounded-circle shadow"
                                                >
                                                    <i class="ni ni-money-coins"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <p class="mt-3 mb-0 text-sm">
                                            <span class="text-success mr-2"
                                                ><i class="fa fa-arrow-up"></i> 3.48%</span
                                            >
                                            <span class="text-nowrap">Since last month</span>
                                        </p> -->
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-3 col-md-6">
    <div class="card card-stats">
        <!-- Card body -->
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h2 class="card-title text-uppercase text-muted mb-0 pashtofont">
                 نن جمله ګټه
                    </h2>
                    <!-- <?php
$query = "SELECT sum(easyload_grand_total) as grand FROM easyload_total";
$SumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($SumAF)) {
    $Easy = $rows['grand'];

}
?> -->
  <span class='h2 font-weight-bold mb-0'><?=number_format($todayTotalProfit, 2)?></span>
                </div>
                <div class="col-auto">
                    <div
                        class="icon icon-shape bg-gradient-green text-white rounded-circle shadow"
                    >
                        <i class="ni ni-chart-bar-32"></i>
                    </div>
                </div>
            </div>
            <!-- <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"
                    ><i class="fa fa-arrow-up"></i> 3.48%</span
                >
                <span class="text-nowrap">Since last month</span>
            </p> -->
        </div>
    </div>
</div>
</div>



                        <div class="row">

<div class="col-xl-3 col-md-6">
    <div class="card card-stats">
        <!-- Card body -->
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h2 class="card-title text-uppercase text-muted mb-0 pashtofont">
                         قرض افغانی
                    </h2>
            <?php
$query = "SELECT sum(loan_Iprice_af) as totalLaf,sum(loan_Oprice_af) as totalLOaf FROM loan";
$SumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($SumAF)) {
    $TotalLIAF = $rows['totalLaf'];
    $TotalLOAF = $rows['totalLOaf'];

    // new coding
    // $query = "SELECT SUM(loan_Iprice_af) as RSAF,SUM(loan_Iprice_rs) as RSRS,SUM(loan_Iprice_dollar) as RSDollar,SUM(loan_Oprice_af) as TSAF,SUM(loan_Oprice_rs) as TSRS,SUM(loan_Oprice_dollar) as TSDollar FROM loan WHERE `loan_category`='شاپور'";
    // $selectItem = mysqli_query($connection, $query);
    // while ($rows = mysqli_fetch_assoc($selectItem)) {

    //     $shaporKarzAF = $rows['TSAF'];
    //     $shaporKarzRS = $rows['TSRS'];
    //     $shaporKarzD = $rows['TSDollar'];
    //     $shaporWasolAF = $rows['RSAF'];
    //     $shaporWasolRS = $rows['RSRS'];
    //     $shaporWasolD = $rows['RSDollar'];

    // }

    // $TotalLOAF = $TotalLOAF - $shaporKarzAF;
    // $TotalLIAF = $TotalLIAF - $shaporWasolAF;

    $LAF = $TotalLIAF - $TotalLOAF;
    //end of new coding

    ?>
    <span class='h2 font-weight-bold mb-0
    <?php
if ($LAF < 0) {
        $LAF = -($LAF);

    } else {
        echo "text-danger";
    }
    ?>
     '><?=$LAF?></span>
  <?php
}
?>



                </div>
                <div class="col-auto">
                    <div
                        class="icon icon-shape bg-gradient-red text-white rounded-circle shadow"
                    >
                        <i class="ni ni-active-40"></i>
                    </div>
                </div>
            </div>
            <!-- <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"
                    ><i class="fa fa-arrow-up"></i> 3.48%</span
                >
                <span class="text-nowrap">Since last month</span>
            </p> -->
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card card-stats">
        <!-- Card body -->
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h2 class="card-title text-uppercase text-muted mb-0 pashtofont">
                        قرض کلداری
                    </h2>

                    </h2>
            <?php
$query = "SELECT sum(loan_Iprice_rs) as totalLrs,sum(loan_Oprice_rs) as totalLOrs FROM loan";
$SumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($SumAF)) {
    $TotalLIRS = $rows['totalLrs'];
    $TotalLORS = $rows['totalLOrs'];

    // // new coding
    // $query = "SELECT SUM(loan_Iprice_af) as RSAF,SUM(loan_Iprice_rs) as RSRS,SUM(loan_Iprice_dollar) as RSDollar,SUM(loan_Oprice_af) as TSAF,SUM(loan_Oprice_rs) as TSRS,SUM(loan_Oprice_dollar) as TSDollar FROM loan WHERE `loan_category`='شاپور'";
    // $selectItem = mysqli_query($connection, $query);
    // while ($rows = mysqli_fetch_assoc($selectItem)) {

    //     $shaporKarzAF = $rows['TSAF'];
    //     $shaporKarzRS = $rows['TSRS'];
    //     $shaporKarzD = $rows['TSDollar'];
    //     $shaporWasolAF = $rows['RSAF'];
    //     $shaporWasolRS = $rows['RSRS'];
    //     $shaporWasolD = $rows['RSDollar'];

    // }

    // $TotalLORS = $TotalLORS - $shaporKarzRS;
    // $TotalLIRS = $TotalLIRS - $shaporWasolRS;

    $LRS = $TotalLIRS - $TotalLORS;

    ?>
    <span class='h2 font-weight-bold mb-0
    <?php
if ($LRS < 0) {
        $LRS = -($LRS);

    } else {
        echo "text-danger";
    }
    ?>
     '><?=$LRS?></span>
  <?php
}
?>




                </div>
                <div class="col-auto">
                    <div
                        class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow"
                    >
                        <i class="ni ni-chart-pie-35"></i>
                    </div>
                </div>
            </div>
            <!-- <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"
                    ><i class="fa fa-arrow-up"></i> 3.48%</span
                >
                <span class="text-nowrap">Since last month</span>
            </p> -->
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card card-stats">
        <!-- Card body -->
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h2 class="card-title text-uppercase text-muted mb-0 pashtofont">
                قرض ډالر
                    </h2>
                    <?php
$query = "SELECT sum(loan_Iprice_dollar) as totalLd,sum(loan_Oprice_dollar) as totalLOdd FROM loan";
$SumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($SumAF)) {
    $TotalLIDO = $rows['totalLd'];
    $TotalLODO = $rows['totalLOdd'];
    $LDO = $TotalLIDO - $TotalLODO;

    // // new coding
    // $query = "SELECT SUM(loan_Iprice_af) as RSAF,SUM(loan_Iprice_rs) as RSRS,SUM(loan_Iprice_dollar) as RSDollar,SUM(loan_Oprice_af) as TSAF,SUM(loan_Oprice_rs) as TSRS,SUM(loan_Oprice_dollar) as TSDollar FROM loan WHERE `loan_category`='شاپور'";
    // $selectItem = mysqli_query($connection, $query);
    // while ($rows = mysqli_fetch_assoc($selectItem)) {

    //     $shaporKarzAF = $rows['TSAF'];
    //     $shaporKarzRS = $rows['TSRS'];
    //     $shaporKarzD = $rows['TSDollar'];
    //     $shaporWasolAF = $rows['RSAF'];
    //     $shaporWasolRS = $rows['RSRS'];
    //     $shaporWasolD = $rows['RSDollar'];

    // }

    // $TotalLODO = $TotalLODO - $shaporKarzD;
    // $TotalLIDO = $TotalLIDO - $shaporWasolD;

    $LDO = $TotalLIDO - $TotalLODO;

    ?>
    <span class='h2 font-weight-bold mb-0
    <?php
if ($LDO < 0) {
        $LDO = -($LDO);

    } else {
        echo "text-danger";
    }
    ?>
     '><?=$LDO?></span>
  <?php
}
?>



                </div>
                <div class="col-auto">
                    <div
                        class="icon icon-shape bg-gradient-green text-white rounded-circle shadow"
                    >
                        <i class="ni ni-money-coins"></i>
                    </div>
                </div>
            </div>
            <!-- <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"
                    ><i class="fa fa-arrow-up"></i> 3.48%</span
                >
                <span class="text-nowrap">Since last month</span>
            </p> -->
        </div>
    </div>
</div>


<div class="col-xl-3 col-md-6">
    <div class="card card-stats">
        <!-- Card body -->
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h2 class="card-title text-uppercase text-muted mb-0 pashtofont">
                 نن تبادله
                    </h2>
                    <?php
$query = "SELECT * FROM sarafi ORDER BY id DESC LIMIT 1";
$selectLast = mysqli_query($connection, $query);
if ($selectLast) {
    while ($rows = mysqli_fetch_assoc($selectLast)) {
        $lastAf2rs = $rows['af2rs'];
    }
}
?>
  <span class='h2 font-weight-bold mb-0'><?=number_format($lastAf2rs, 2)?></span>
                </div>
                <div class="col-auto">
                    <div
                        class="icon icon-shape bg-gradient-green text-white rounded-circle shadow"
                    >
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                </div>
            </div>
            <!-- <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"
                    ><i class="fa fa-arrow-up"></i> 3.48%</span
                >
                <span class="text-nowrap">Since last month</span>
            </p> -->
        </div>
    </div>
</div>
</div>



<div class="row">



            </div>

                        <div class="row">

        <div class="col-xl-12 text-center">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">

                  <h2 class="mb-0 pashtofont">مکمل راپور</h2>
                </div>

              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr class="pashtofont">
                    <th style="font-size:16px">وخت</th>
                    <th style="font-size:16px">افغانی</th>
                    <th style="font-size:16px">کلداری
                    <i class="fas fa-arrow-left text-success mr-3"></i>
                    </th>

                    <th style="font-size:16px"> <i class="fas fa-arrow-right text-success ml-3"></i>کلداری په افغانیو</th>

                    <th style="font-size:16px">خرچه</th>

                    <th style="font-size:16px"> ټوله ګټه</th>
                  </tr>
                </thead>
                <tbody class="font-weight-bold">
                  <tr style="font-size:16px" class="text-center">
                    <th style="font-size:16px" class="pashtofont" >
                     نن
                    </th>
                    <td>
                   <?=$todayMAF + $todayIAF + $todayEAF . " " . $afghani?>
                    </td>
                    <td>
                    <?=$todayMRS + $todayIRS + $todayERS . " " . $pakRs?>
                    </td>
                    <td>
                    <?php echo number_format($todayTotalRstoAf, 2) . " " . $afghani ?>
                    </td>
                    <td>
                    <?=$todayInvest . " " . $afghani?>
                    </td>

                    <td>
                    <i class="fas fa-arrow-up text-success mr-3"></i>
                    <?php echo number_format($todayTotalProfit, 2) . " " . $afghani ?>
                    </td>
                  </tr>
                  <tr>
                    <th style="font-size:16px" class="pashtofont">
                      پرون
                    </th>
                    <td>
                     <?=$yesterDayMAF + $yesterDayIAF + $yesterDayEAF . " " . $afghani?>
                    </td>
                    <td>
                    <?=$yesterDayMRS + $yesterDayIRS + $yesterDayERS . " " . $pakRs?>
                    </td>
                    <td>
                    <?php echo number_format($yesterDayTotalRstoAf, 2) . " " . $afghani ?>
                    </td>
                    <td>
                    <?=$yesterDayInvest . " " . $afghani?>

                    </td>

                    <td>
                    <i class="fas fa-arrow-up text-success mr-3"></i>
                    <?=number_format($yesterDayTotalProfit, 2) . " " . $afghani?>


                    </td>
                  </tr>
                  <tr>
                    <th style="font-size:16px" class="pashtofont">
                    تیری 7 ورځی
                    </th>
                    <td>
                     <?=$last7DayMAF + $last7DayIAF + $last7DayEAF . " " . $afghani?>
                    </td>
                    <td>
                    <?=$last7DayMRS + $last7DayIRS + $last7DayERS . " " . $pakRs?>

                    </td>
                    <td>
                    <?=number_format($last7DayTotalRstoAf, 2) . " " . $afghani?>
                    </td>
                    <td>
                    <?=$last7DayInvest . " " . $afghani?>
                    </td>

                    <td>
                    <i class="fas fa-arrow-up text-success mr-3"></i>
                    <?=number_format($last7DayTotalProfit, 2) . " " . $afghani?>
                    </td>
                  </tr>
                  <tr>
                    <th style="font-size:16px" class="pashtofont">
                    تیری 15 ورځی
                    </th>
                    <td>
                     <?=$last15DayMAF + $last15DayIAF + $last15DayEAF . " " . $afghani?>
                    </td>
                    <td>
                    <?=$last15DayMRS + $last15DayIRS + $last15DayERS . " " . $pakRs?>
                    </td>
                    <td>
                    <?=number_format($last15DayTotalRstoAf, 2) . " " . $afghani?>
                    </td>
                    <td>
                    <?=$last15DayInvest . " " . $afghani?>
                    </td>

                    <td>
                    <i class="fas fa-arrow-up text-success mr-3"></i>
                    <?=number_format($last15DayTotalProfit, 2) . " " . $afghani?>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
</div>



<?php

/*

<div class="row">
<div class="col-xl-3 col-md-6">
<div class="card card-stats">
<!-- Card body -->
<div class="card-body">
<div class="row">
<div class="col">
<h2 class="card-title text-uppercase text-muted mb-0 pashtofont">
ټولی افغانی
</h2>
<span class="h2 font-weight-bold mb-0"><?=$totalAF?></span>
</div>
<div class="col-auto">
<div
class="icon icon-shape bg-gradient-red text-white rounded-circle shadow"
>
<i class="ni ni-active-40"></i>
</div>
</div>
</div>
<p class="mt-3 mb-0 text-sm">
<span class="text-success mr-2"
><i class="fa fa-arrow-up"></i> 3.48%</span
>
<span class="text-nowrap">Since last month</span>
</p>
</div>
</div>
</div>
<div class="col-xl-3 col-md-6">
<div class="card card-stats">
<!-- Card body -->
<div class="card-body">
<div class="row">
<div class="col">
<h2 class="card-title text-uppercase text-muted mb-0 pashtofont">
ټولی کلداری
</h2>
<span class="h2 font-weight-bold mb-0"><?=$totalRS?></span>
</div>
<div class="col-auto">
<div
class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow"
>
<i class="ni ni-chart-pie-35"></i>
</div>
</div>
</div>
<p class="mt-3 mb-0 text-sm">
<span class="text-success mr-2"
><i class="fa fa-arrow-up"></i> 3.48%</span
>
<span class="text-nowrap">Since last month</span>
</p>
</div>
</div>
</div>
<div class="col-xl-3 col-md-6">
<div class="card card-stats">
<!-- Card body -->
<div class="card-body">
<div class="row">
<div class="col">
<h2 class="card-title text-uppercase text-muted mb-0 pashtofont">
ټول ډالر
</h2>
<span class="h2 font-weight-bold mb-0"><?=$totalD;?></span>
</div>
<div class="col-auto">
<div
class="icon icon-shape bg-gradient-green text-white rounded-circle shadow"
>
<i class="ni ni-money-coins"></i>
</div>
</div>
</div>
<p class="mt-3 mb-0 text-sm">
<span class="text-success mr-2"
><i class="fa fa-arrow-up"></i> 3.48%</span
>
<span class="text-nowrap">Since last month</span>
</p>
</div>
</div>
</div>
<div class="col-xl-3 col-md-6">
<div class="card card-stats">
<!-- Card body -->
<div class="card-body">
<div class="row">
<div class="col">
<h5 class="card-title text-uppercase text-muted mb-0">
Performance
</h5>
<span class="h2 font-weight-bold mb-0">49,65%</span>
</div>
<div class="col-auto">
<div
class="icon icon-shape bg-gradient-info text-white rounded-circle shadow"
>
<i class="ni ni-chart-bar-32"></i>
</div>
</div>
</div>
<p class="mt-3 mb-0 text-sm">
<span class="text-success mr-2"
><i class="fa fa-arrow-up"></i> 3.48%</span
>
<span class="text-nowrap">Since last month</span>
</p>
</div>
</div>
</div>
</div> */?>
</div>
</div>
</div>
