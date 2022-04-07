<?php
$title = "د 2020 کال عمومی راپور";
?>
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



    <h1 class="display-2 pashtofont text-center"> د 2020 کال ټوله ګټه </h1>
        <div class="row">


            <div class="col-xl-12" dir="rtl">




 <!-- Light table -->
 <div class="table-responsive mt-5">
              <table class="table align-items-center table-flush table-bordered table-condensed table-striped table-primary" id="search">
                <thead class="thead-light">



<tr class="pashtofont text-center">
<th style="font-size:17px;" class="text-success">ایډی</th>
<th style="font-size:17px;" class="text-success">تاریخ</th>

<th style="font-size:17px" class="text-success"> خرڅ شوی سامان افغانی</th>
<th style="font-size:17px" class="text-success"> خرڅ شوی سامان کلداری</th>

<th style="font-size:17px" class="text-danger"> ګټه</th>
<th style="font-size:17px" class="text-success">خرچه</th>
<th style="font-size:17px" class="text-success">کرایه</th>
<th style="font-size:17px" class="text-danger">عمومی ګټه</th>


</tr>
</thead>


<!-- grand total Profit -->
<?php
$query = "SELECT sum(sold_mobile_total_price_af) as af, sum(sold_mobile_total_price_rs) as rs FROM sold_mobiles WHERE DATE(sold_mobile_date) > '2020-09-25' AND MONTH(sold_mobile_date) = 9";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $soldMAF9 = $rows['af'];
    $soldMRS9 = $rows['rs'];
    $query = "SELECT sum(sold_items_total_price_af) as af, sum(sold_items_total_price_rs) as rs FROM sold_general_items WHERE DATE(sold_date) > '2020-09-25' AND MONTH(sold_date) = 9";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldIAF9 = $rows['af'];
        $soldIRS9 = $rows['rs'];

    }
    $query = "SELECT sum(easyload_af) as af, sum(easyload_rs) as rs FROM easyload WHERE DATE(easyload_date) > '2020-09-25' AND MONTH(easyload_date) = 9";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldEAF9 = $rows['af'];
        $soldERS9 = $rows['rs'];

    }

    ?>

  <tr style="" class='text-center font-weight-600 '>
  <td>6</td>
         <td>September 9</td>

<td style="font-size:17px"><?=$soldMAF9 + $soldIAF9 + $soldEAF9?></td>
<td class="" style="font-size:17px"><?=$soldMRS9 + $soldIRS9 + $soldERS9?></td>


<?php }?>
<!-- profit -->
<?php
$base = 0;
$Raf = 0;
$af = 0;
$Ibase = 0;
$IRaf = 0;
$Iaf = 0;
$query = "SELECT sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles WHERE DATE(sold_mobile_date) > '2020-09-25' AND MONTH(sold_mobile_date) = 9";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $base = $rows['b'];
    $Raf = $rows['r'];
    $af = $rows['a'];

    $query = "SELECT sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items WHERE DATE(sold_date) > '2020-09-25' AND MONTH(sold_date) = 9";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Ibase = $rows['b'];
        $IRaf = $rows['r'];
        $Iaf = $rows['a'];
    }

    $query = "SELECT sum(easyload_profit) as b FROM easyload WHERE DATE(easyload_date) > '2020-09-25' AND MONTH(easyload_date) = 9";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Eprofit9 = $rows['b'];
    }

    $profit9 = ($Raf + $af - $base) + ($IRaf + $Iaf - $Ibase) + $Eprofit9;

}
?>




<td style="font-size:17px"><?=number_format($profit9, 2)?></td>
<!-- kharcha  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE DATE(income_date) > '2020-09-25' AND MONTH(income_date) = 9 AND income_category = 'خرچه'";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $invest9 = $rows['af'];
}
?>


<td style="font-size:17px"><?=$invest9?></td>
<!-- karaia  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE DATE(income_date) > '2020-09-25' AND MONTH(income_date) = 9 AND income_category = 'کرایه'";
$result5 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result5)) {
    $karaia9 = $rows['af'];
}
?>
<td class=" " style="font-size:17px"><?=$karaia9?></td>

<?php
// total profit
$totalProfit9 = $profit9 - $invest9 - $karaia9;

?>
<td class="<?php if ($totalProfit9 > 0) {
    echo 'text-success';
} else {
    echo 'text-danger';
}?>" style="font-size:17px"><?=number_format($totalProfit9, 2)?></td>

    </tr>














<!-- grand total Profit -->
<?php
$query = "SELECT sum(sold_mobile_total_price_af) as af, sum(sold_mobile_total_price_rs) as rs FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2020 AND MONTH(sold_mobile_date) = 10";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $soldMAF10 = $rows['af'];
    $soldMRS10 = $rows['rs'];
    $query = "SELECT sum(sold_items_total_price_af) as af, sum(sold_items_total_price_rs) as rs FROM sold_general_items WHERE YEAR(sold_date) = 2020 AND MONTH(sold_date) = 10";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldIAF10 = $rows['af'];
        $soldIRS10 = $rows['rs'];

    }
    $query = "SELECT sum(easyload_af) as af, sum(easyload_rs) as rs FROM easyload WHERE YEAR(easyload_date) = 2020 AND MONTH(easyload_date) = 10";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldEAF10 = $rows['af'];
        $soldERS10 = $rows['rs'];

    }

    ?>

  <tr style="" class='text-center font-weight-600 '>
  <td>5</td>
         <td>October 10</td>

<td style="font-size:17px"><?=$soldMAF10 + $soldIAF10 + $soldEAF10?></td>
<td class="" style="font-size:17px"><?=$soldMRS10 + $soldIRS10 + $soldERS10?></td>


<?php }?>
<!-- profit -->
<?php
$base = 0;
$Raf = 0;
$af = 0;
$Ibase = 0;
$IRaf = 0;
$Iaf = 0;
$query = "SELECT sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2020 AND MONTH(sold_mobile_date) = 10";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $base = $rows['b'];
    $Raf = $rows['r'];
    $af = $rows['a'];

    $query = "SELECT sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items WHERE YEAR(sold_date) = 2020 AND MONTH(sold_date) = 10";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Ibase = $rows['b'];
        $IRaf = $rows['r'];
        $Iaf = $rows['a'];
    }

    $query = "SELECT sum(easyload_profit) as b FROM easyload WHERE YEAR(easyload_date) = 2020 AND MONTH(easyload_date) = 10";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Eprofit10 = $rows['b'];
    }

    $profit10 = ($Raf + $af - $base) + ($IRaf + $Iaf - $Ibase) + $Eprofit10;

}
?>




<td style="font-size:17px"><?=number_format($profit10, 2)?></td>
<!-- kharcha  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2020 AND MONTH(income_date) = 10 AND income_category = 'خرچه'";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $invest10 = $rows['af'];
}
?>


<td style="font-size:17px"><?=$invest10?></td>
<!-- karaia  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2020 AND MONTH(income_date) = 10 AND income_category = 'کرایه'";
$result5 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result5)) {
    $karaia10 = $rows['af'];
}
?>
<td class=" " style="font-size:17px"><?=$karaia10?></td>

<?php
// total profit
$totalProfit10 = $profit10 - $invest10 - $karaia10;

?>
<td class="<?php if ($totalProfit10 > 0) {
    echo 'text-success';
} else {
    echo 'text-danger';
}?>" style="font-size:17px"><?=number_format($totalProfit10, 2)?></td>

    </tr>








<!-- grand total Profit -->
<?php
$query = "SELECT sum(sold_mobile_total_price_af) as af, sum(sold_mobile_total_price_rs) as rs FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2020 AND MONTH(sold_mobile_date) = 11";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $soldMAF11 = $rows['af'];
    $soldMRS11 = $rows['rs'];
    $query = "SELECT sum(sold_items_total_price_af) as af, sum(sold_items_total_price_rs) as rs FROM sold_general_items WHERE YEAR(sold_date) = 2020 AND MONTH(sold_date) = 11";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldIAF11 = $rows['af'];
        $soldIRS11 = $rows['rs'];

    }
    $query = "SELECT sum(easyload_af) as af, sum(easyload_rs) as rs FROM easyload WHERE YEAR(easyload_date) = 2020 AND MONTH(easyload_date) = 11";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldEAF11 = $rows['af'];
        $soldERS11 = $rows['rs'];

    }
    ?>

  <tr style="" class='text-center font-weight-600 '>
  <td>4</td>
         <td>November 11</td>

<td style="font-size:17px"><?=$soldMAF11 + $soldIAF11 + $soldEAF11?></td>
<td class="" style="font-size:17px"><?=$soldMRS11 + $soldIRS11 + $soldERS11?></td>


<?php }?>
<!-- profit -->
<?php
$base = 0;
$Raf = 0;
$af = 0;
$Ibase = 0;
$IRaf = 0;
$Iaf = 0;
$query = "SELECT sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2020 AND MONTH(sold_mobile_date) = 11";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $base = $rows['b'];
    $Raf = $rows['r'];
    $af = $rows['a'];

    $query = "SELECT sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items WHERE YEAR(sold_date) = 2020 AND MONTH(sold_date) = 11";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Ibase = $rows['b'];
        $IRaf = $rows['r'];
        $Iaf = $rows['a'];
    }
    $query = "SELECT sum(easyload_profit) as b FROM easyload WHERE YEAR(easyload_date) = 2020 AND MONTH(easyload_date) = 11";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Eprofit11 = $rows['b'];
    }
    $profit11 = ($Raf + $af - $base) + ($IRaf + $Iaf - $Ibase) + $Eprofit11;

}
?>




<td style="font-size:17px"><?=number_format($profit11, 2)?></td>
<!-- kharcha  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2020 AND MONTH(income_date) = 11 AND income_category = 'خرچه'";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $invest11 = $rows['af'];
}
?>


<td style="font-size:17px"><?=$invest11?></td>
<!-- karaia  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2020 AND MONTH(income_date) = 11 AND income_category = 'کرایه'";
$result5 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result5)) {
    $karaia11 = $rows['af'];
}
?>
<td class=" " style="font-size:17px"><?=$karaia11?></td>

<?php
// total profit
$totalProfit11 = $profit11 - $invest11 - $karaia11;

?>
<td class="<?php if ($totalProfit11 > 0) {
    echo 'text-success';
} else {
    echo 'text-danger';
}?>" style="font-size:17px"><?=number_format($totalProfit11, 2)?></td>

    </tr>








<!-- grand total Profit -->
<?php
$query = "SELECT sum(sold_mobile_total_price_af) as af, sum(sold_mobile_total_price_rs) as rs FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2020 AND MONTH(sold_mobile_date) = 12";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $soldMAF12 = $rows['af'];
    $soldMRS12 = $rows['rs'];
    $query = "SELECT sum(sold_items_total_price_af) as af, sum(sold_items_total_price_rs) as rs FROM sold_general_items WHERE YEAR(sold_date) = 2020 AND MONTH(sold_date) = 12";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldIAF12 = $rows['af'];
        $soldIRS12 = $rows['rs'];

    }
    $query = "SELECT sum(easyload_af) as af, sum(easyload_rs) as rs FROM easyload WHERE YEAR(easyload_date) = 2020 AND MONTH(easyload_date) = 12";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldEAF12 = $rows['af'];
        $soldERS12 = $rows['rs'];

    }
    ?>

  <tr style="" class='text-center font-weight-600 '>
  <td>3</td>
         <td>December 12</td>

<td style="font-size:17px"><?=$soldMAF12 + $soldIAF12 + $soldEAF12?></td>
<td class="" style="font-size:17px"><?=$soldMRS12 + $soldIRS12 + $soldERS12?></td>


<?php }?>
<!-- profit -->
<?php
$base = 0;
$Raf = 0;
$af = 0;
$Ibase = 0;
$IRaf = 0;
$Iaf = 0;
$query = "SELECT sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2020 AND MONTH(sold_mobile_date) = 12";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $base = $rows['b'];
    $Raf = $rows['r'];
    $af = $rows['a'];

    $query = "SELECT sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items WHERE YEAR(sold_date) = 2020 AND MONTH(sold_date) = 12";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Ibase = $rows['b'];
        $IRaf = $rows['r'];
        $Iaf = $rows['a'];
    }
    $query = "SELECT sum(easyload_profit) as b FROM easyload WHERE YEAR(easyload_date) = 2020 AND MONTH(easyload_date) = 12";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Eprofit12 = $rows['b'];
    }
    $profit12 = ($Raf + $af - $base) + ($IRaf + $Iaf - $Ibase) + $Eprofit12;

}
?>




<td style="font-size:17px"><?=number_format($profit12, 2)?></td>
<!-- kharcha  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2020 AND MONTH(income_date) = 12 AND income_category = 'خرچه'";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $invest12 = $rows['af'];
}
?>


<td style="font-size:17px"><?=$invest12?></td>
<!-- karaia  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2020 AND MONTH(income_date) = 12 AND income_category = 'کرایه'";
$result5 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result5)) {
    $karaia12 = $rows['af'];
}
?>
<td class=" " style="font-size:17px"><?=$karaia12?></td>

<?php
// total profit
$totalProfit12 = $profit12 - $invest12 - $karaia12;

?>
<td class="<?php if ($totalProfit12 > 0) {
    echo 'text-success';
} else {
    echo 'text-danger';
}?>" style="font-size:17px"><?=number_format($totalProfit12, 2)?></td>

    </tr>







<tr style="" class='text-center font-weight-600 '>
<td>2</td>
<td class="text-danger pashtofont" style="font-size:26px">د 2020 کال جمله</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>

<tr class="text-center" style="font-size:18px">
<td>1</td>
<td></td>
<!-- tol khars shwy saman afghani -->
<?php $MAFIAF = ($soldIAF12 + $soldMAF12 + $soldEAF12 + $soldIAF11 + $soldMAF11 + $soldEAF11 + $soldIAF10 + $soldMAF10 + $soldEAF10 + $soldIAF9 + $soldMAF9 + $soldEAF9 + $soldIAF8 + $soldMAF8 + $soldEAF8);
?>
<td class="text-danger" style="font-size:18px;font-weight:600">
<?=$MAFIAF?>
</td>
<!-- tol khars shwy saman kaldari -->
<?php $MRSIRS = ($soldMRS12 + $soldIRS12 + $soldMRS11 + $soldIRS11 + $soldMRS10 + $soldIRS10 + $soldMRS9 + $soldIRS9 + $soldMRS8 + $soldIRS8 + $soldERS12 + $soldERS11 + $soldERS10 + $soldERS9 + $soldERS8);?>

<td class="text-danger" style="font-size:18px;font-weight:600">
<?=$MRSIRS?>
</td>
<!-- tola gata -->
<?php $profit = ($profit12 + $profit11 + $profit10 + $profit9 + $profit8);?>
<td class="text-danger" style="font-size:18px;font-weight:600">
<?=number_format($profit, 2)?>
</td>
<!-- tola kharcha -->
<?php $invest = ($invest12 + $invest11 + $invest10 + $invest9 + $invest8);?>
<td class="text-danger" style="font-size:18px;font-weight:600">
<?=$invest?>
</td>
<!-- tola karaia -->
<?php $karaia = ($karaia12 + $karaia11 + $karaia10 + $karaia9 + $karaia8);?>
<td class="text-danger" style="font-size:18px;font-weight:600">
<?=$karaia?>
</td>
<!-- grand total gata -->
<?php $TP = $totalProfit12 + $totalProfit11 + $totalProfit10 + $totalProfit9 + $totalProfit8;

?>

<td class="<?php if ($TP > 0) {
    echo 'text-success';
} else {
    echo 'text-danger';
}?>" style="font-size:18px;font-weight:600">
<?=number_format($TP, 2)?>
</td>
</tr>







        </tbody>
    </table>

</div>





                </div>




</div>






</div>
</div>
                <!-- Footer -->
                <?php include "includes/footer.php";?>