<?php
$title = "د 2025 کال عمومی راپور";
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



    <h1 class="display-2 pashtofont text-center"> د 2025 کال ټوله ګټه </h1>
        <div class="row">


            <div class="col-xl-12" dir="rtl">




 <!-- Light table -->
 <div class="table-responsive mt-5">
              <table class="table align-items-center table-flush table-bordered table-condensed table-striped table-primary" id="searc">
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

<!-- ----------------------------- -->
<!-- 1 Months Recored -->
<!-- ------------------------------- -->

<?php
$query = "SELECT sum(sold_mobile_total_price_af) as af, sum(sold_mobile_total_price_rs) as rs FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 1";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $soldMAF1 = $rows['af'];
    $soldMRS1 = $rows['rs'];
    $query = "SELECT sum(sold_items_total_price_af) as af, sum(sold_items_total_price_rs) as rs FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 1";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldIAF1 = $rows['af'];
        $soldIRS1 = $rows['rs'];

    }
    $query = "SELECT sum(easyload_af) as af, sum(easyload_rs) as rs FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 1";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldEAF1 = $rows['af'];
        $soldERS1 = $rows['rs'];

    }

    ?>

  <tr style="" class='text-center font-weight-600 '>
  <td>1</td>
         <td>January 1</td>

<td style="font-size:16px"><?=$soldMAF1 + $soldIAF1 + $soldEAF1?></td>
<td class="" style="font-size:16px"><?=$soldMRS1 + $soldIRS1 + $soldERS1?></td>


<?php }?>
<!-- profit -->
<?php
$base = 0;
$Raf = 0;
$af = 0;
$Ibase = 0;
$IRaf = 0;
$Iaf = 0;
$query = "SELECT sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 1";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $base = $rows['b'];
    $Raf = $rows['r'];
    $af = $rows['a'];

    $query = "SELECT sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 1";
    $result1 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result1)) {
        $Ibase = $rows['b'];
        $IRaf = $rows['r'];
        $Iaf = $rows['a'];
    }

    $query = "SELECT sum(easyload_profit) as b FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 1";
    $result1 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result1)) {
        $Eprofit1 = $rows['b'];
    }

    $profit1 = ($Raf + $af - $base) + ($IRaf + $Iaf - $Ibase) + $Eprofit1;

}
?>




<td style="font-size:16px"><?=number_format($profit1, 1)?></td>
<!-- kharcha  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 1 AND income_category = 'خرچه'";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $invest1 = $rows['af'];
}
?>


<td style="font-size:16px"><?=$invest1?></td>
<!-- karaia  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 1 AND income_category = 'کرایه'";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $karaia1 = $rows['af'];
}
?>
<td class=" " style="font-size:16px"><?=$karaia1?></td>

<?php
// total profit
$totalProfit1 = $profit1 - $invest1 - $karaia1;

?>
<td class="<?php if ($totalProfit1 > 0) {
    echo 'text-success';
} else {
    echo 'text-danger';
}?>" style="font-size:16px"><?=number_format($totalProfit1, 1)?></td>

    </tr>









<!-- ------------------------------ -->
<!-- 1 End of Months Recored -->
<!-- ------------------------------- -->

<!-- ----------------------------- -->
<!-- 2 Months Recored -->
<!-- ------------------------------- -->
<?php
$query = "SELECT sum(sold_mobile_total_price_af) as af, sum(sold_mobile_total_price_rs) as rs FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 2";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $soldMAF2 = $rows['af'];
    $soldMRS2 = $rows['rs'];
    $query = "SELECT sum(sold_items_total_price_af) as af, sum(sold_items_total_price_rs) as rs FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 2";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldIAF2 = $rows['af'];
        $soldIRS2 = $rows['rs'];

    }
    $query = "SELECT sum(easyload_af) as af, sum(easyload_rs) as rs FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 2";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldEAF2 = $rows['af'];
        $soldERS2 = $rows['rs'];

    }

    ?>

  <tr style="" class='text-center font-weight-600 '>
  <td>2</td>
         <td>February 2</td>

<td style="font-size:16px"><?=$soldMAF2 + $soldIAF2 + $soldEAF2?></td>
<td class="" style="font-size:16px"><?=$soldMRS2 + $soldIRS2 + $soldERS2?></td>


<?php }?>
<!-- profit -->
<?php
$base = 0;
$Raf = 0;
$af = 0;
$Ibase = 0;
$IRaf = 0;
$Iaf = 0;
$query = "SELECT sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 2";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $base = $rows['b'];
    $Raf = $rows['r'];
    $af = $rows['a'];

    $query = "SELECT sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 2";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Ibase = $rows['b'];
        $IRaf = $rows['r'];
        $Iaf = $rows['a'];
    }

    $query = "SELECT sum(easyload_profit) as b FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 2";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Eprofit2 = $rows['b'];
    }

    $profit2 = ($Raf + $af - $base) + ($IRaf + $Iaf - $Ibase) + $Eprofit2;

}
?>




<td style="font-size:16px"><?=number_format($profit2, 2)?></td>
<!-- kharcha  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 2 AND income_category = 'خرچه'";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $invest2 = $rows['af'];
}
?>


<td style="font-size:16px"><?=$invest2?></td>
<!-- karaia  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 2 AND income_category = 'کرایه'";
$result2 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result2)) {
    $karaia2 = $rows['af'];
}
?>
<td class=" " style="font-size:16px"><?=$karaia2?></td>

<?php
// total profit
$totalProfit2 = $profit2 - $invest2 - $karaia2;

?>
<td class="<?php if ($totalProfit2 > 0) {
    echo 'text-success';
} else {
    echo 'text-danger';
}?>" style="font-size:16px"><?=number_format($totalProfit2, 2)?></td>

    </tr>










<!-- ------------------------------ -->
<!-- 2 End of Months Recored -->
<!-- ------------------------------- -->

<!-- ----------------------------- -->
<!-- 3 Months Recored -->
<!-- ------------------------------- -->

<?php
$query = "SELECT sum(sold_mobile_total_price_af) as af, sum(sold_mobile_total_price_rs) as rs FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 3";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $soldMAF3 = $rows['af'];
    $soldMRS3 = $rows['rs'];
    $query = "SELECT sum(sold_items_total_price_af) as af, sum(sold_items_total_price_rs) as rs FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 3";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldIAF3 = $rows['af'];
        $soldIRS3 = $rows['rs'];

    }
    $query = "SELECT sum(easyload_af) as af, sum(easyload_rs) as rs FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 3";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldEAF3 = $rows['af'];
        $soldERS3 = $rows['rs'];

    }

    ?>

  <tr style="" class='text-center font-weight-600 '>
  <td>3</td>
         <td>March 3</td>

<td style="font-size:16px"><?=$soldMAF3 + $soldIAF3 + $soldEAF3?></td>
<td class="" style="font-size:16px"><?=$soldMRS3 + $soldIRS3 + $soldERS3?></td>


<?php }?>
<!-- profit -->
<?php
$base = 0;
$Raf = 0;
$af = 0;
$Ibase = 0;
$IRaf = 0;
$Iaf = 0;
$query = "SELECT sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 3";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $base = $rows['b'];
    $Raf = $rows['r'];
    $af = $rows['a'];

    $query = "SELECT sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 3";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Ibase = $rows['b'];
        $IRaf = $rows['r'];
        $Iaf = $rows['a'];
    }

    $query = "SELECT sum(easyload_profit) as b FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 3";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Eprofit3 = $rows['b'];
    }

    $profit3 = ($Raf + $af - $base) + ($IRaf + $Iaf - $Ibase) + $Eprofit3;

}
?>




<td style="font-size:16px"><?=number_format($profit3, 2)?></td>
<!-- kharcha  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 3 AND income_category = 'خرچه'";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $invest3 = $rows['af'];
}
?>


<td style="font-size:16px"><?=$invest3?></td>
<!-- karaia  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 3 AND income_category = 'کرایه'";
$result3 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result3)) {
    $karaia3 = $rows['af'];
}
?>
<td class=" " style="font-size:16px"><?=$karaia3?></td>

<?php
// total profit
$totalProfit3 = $profit3 - $invest3 - $karaia3;

?>
<td class="<?php if ($totalProfit3 > 0) {
    echo 'text-success';
} else {
    echo 'text-danger';
}?>" style="font-size:16px"><?=number_format($totalProfit3, 2)?></td>

    </tr>









<!-- ------------------------------ -->
<!-- 3 End of Months Recored -->
<!-- ------------------------------- -->

<!-- ----------------------------- -->
<!-- 4 Months Recored -->
<!-- ------------------------------- -->

<?php
$query = "SELECT sum(sold_mobile_total_price_af) as af, sum(sold_mobile_total_price_rs) as rs FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 4";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $soldMAF4 = $rows['af'];
    $soldMRS4 = $rows['rs'];
    $query = "SELECT sum(sold_items_total_price_af) as af, sum(sold_items_total_price_rs) as rs FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 4";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldIAF4 = $rows['af'];
        $soldIRS4 = $rows['rs'];

    }
    $query = "SELECT sum(easyload_af) as af, sum(easyload_rs) as rs FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 4";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldEAF4 = $rows['af'];
        $soldERS4 = $rows['rs'];

    }

    ?>

  <tr style="" class='text-center font-weight-600 '>
  <td>4</td>
         <td>April 4</td>

<td style="font-size:16px"><?=$soldMAF4 + $soldIAF4 + $soldEAF4?></td>
<td class="" style="font-size:16px"><?=$soldMRS4 + $soldIRS4 + $soldERS4?></td>


<?php }?>
<!-- profit -->
<?php
$base = 0;
$Raf = 0;
$af = 0;
$Ibase = 0;
$IRaf = 0;
$Iaf = 0;
$query = "SELECT sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 4";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $base = $rows['b'];
    $Raf = $rows['r'];
    $af = $rows['a'];

    $query = "SELECT sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 4";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Ibase = $rows['b'];
        $IRaf = $rows['r'];
        $Iaf = $rows['a'];
    }

    $query = "SELECT sum(easyload_profit) as b FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 4";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Eprofit4 = $rows['b'];
    }

    $profit4 = ($Raf + $af - $base) + ($IRaf + $Iaf - $Ibase) + $Eprofit4;

}
?>




<td style="font-size:16px"><?=number_format($profit4, 2)?></td>
<!-- kharcha  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 4 AND income_category = 'خرچه'";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $invest4 = $rows['af'];
}
?>


<td style="font-size:16px"><?=$invest4?></td>
<!-- karaia  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 4 AND income_category = 'کرایه'";
$result4 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result4)) {
    $karaia4 = $rows['af'];
}
?>
<td class=" " style="font-size:16px"><?=$karaia4?></td>

<?php
// total profit
$totalProfit4 = $profit4 - $invest4 - $karaia4;

?>
<td class="<?php if ($totalProfit4 > 0) {
    echo 'text-success';
} else {
    echo 'text-danger';
}?>" style="font-size:16px"><?=number_format($totalProfit4, 2)?></td>

    </tr>









<!-- ------------------------------ -->
<!-- 4 End of Months Recored -->
<!-- ------------------------------- -->

<!-- ----------------------------- -->
<!-- 5 Months Recored -->
<!-- ------------------------------- -->

<?php
$query = "SELECT sum(sold_mobile_total_price_af) as af, sum(sold_mobile_total_price_rs) as rs FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 5";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $soldMAF5 = $rows['af'];
    $soldMRS5 = $rows['rs'];
    $query = "SELECT sum(sold_items_total_price_af) as af, sum(sold_items_total_price_rs) as rs FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 5";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldIAF5 = $rows['af'];
        $soldIRS5 = $rows['rs'];

    }
    $query = "SELECT sum(easyload_af) as af, sum(easyload_rs) as rs FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 5";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldEAF5 = $rows['af'];
        $soldERS5 = $rows['rs'];

    }

    ?>

  <tr style="" class='text-center font-weight-600 '>
  <td>5</td>
         <td>May 5</td>

<td style="font-size:16px"><?=$soldMAF5 + $soldIAF5 + $soldEAF5?></td>
<td class="" style="font-size:16px"><?=$soldMRS5 + $soldIRS5 + $soldERS5?></td>


<?php }?>
<!-- profit -->
<?php
$base = 0;
$Raf = 0;
$af = 0;
$Ibase = 0;
$IRaf = 0;
$Iaf = 0;
$query = "SELECT sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 5";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $base = $rows['b'];
    $Raf = $rows['r'];
    $af = $rows['a'];

    $query = "SELECT sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 5";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Ibase = $rows['b'];
        $IRaf = $rows['r'];
        $Iaf = $rows['a'];
    }

    $query = "SELECT sum(easyload_profit) as b FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 5";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Eprofit5 = $rows['b'];
    }

    $profit5 = ($Raf + $af - $base) + ($IRaf + $Iaf - $Ibase) + $Eprofit5;

}
?>




<td style="font-size:16px"><?=number_format($profit5, 2)?></td>
<!-- kharcha  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 5 AND income_category = 'خرچه'";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $invest5 = $rows['af'];
}
?>


<td style="font-size:16px"><?=$invest5?></td>
<!-- karaia  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 5 AND income_category = 'کرایه'";
$result5 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result5)) {
    $karaia5 = $rows['af'];
}
?>
<td class=" " style="font-size:16px"><?=$karaia5?></td>

<?php
// total profit
$totalProfit5 = $profit5 - $invest5 - $karaia5;

?>
<td class="<?php if ($totalProfit5 > 0) {
    echo 'text-success';
} else {
    echo 'text-danger';
}?>" style="font-size:16px"><?=number_format($totalProfit5, 2)?></td>

    </tr>









<!-- ------------------------------ -->
<!-- 5 End of Months Recored -->
<!-- ------------------------------- -->

<!-- ----------------------------- -->
<!-- 6 Months Recored -->
<!-- ------------------------------- -->

<?php
$query = "SELECT sum(sold_mobile_total_price_af) as af, sum(sold_mobile_total_price_rs) as rs FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 6";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $soldMAF6 = $rows['af'];
    $soldMRS6 = $rows['rs'];
    $query = "SELECT sum(sold_items_total_price_af) as af, sum(sold_items_total_price_rs) as rs FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 6";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldIAF6 = $rows['af'];
        $soldIRS6 = $rows['rs'];

    }
    $query = "SELECT sum(easyload_af) as af, sum(easyload_rs) as rs FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 6";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldEAF6 = $rows['af'];
        $soldERS6 = $rows['rs'];

    }

    ?>

  <tr style="" class='text-center font-weight-600 '>
  <td>6</td>
         <td>Jun 6</td>

<td style="font-size:16px"><?=$soldMAF6 + $soldIAF6 + $soldEAF6?></td>
<td class="" style="font-size:16px"><?=$soldMRS6 + $soldIRS6 + $soldERS6?></td>


<?php }?>
<!-- profit -->
<?php
$base = 0;
$Raf = 0;
$af = 0;
$Ibase = 0;
$IRaf = 0;
$Iaf = 0;
$query = "SELECT sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 6";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $base = $rows['b'];
    $Raf = $rows['r'];
    $af = $rows['a'];

    $query = "SELECT sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 6";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Ibase = $rows['b'];
        $IRaf = $rows['r'];
        $Iaf = $rows['a'];
    }

    $query = "SELECT sum(easyload_profit) as b FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 6";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Eprofit6 = $rows['b'];
    }

    $profit6 = ($Raf + $af - $base) + ($IRaf + $Iaf - $Ibase) + $Eprofit6;

}
?>




<td style="font-size:16px"><?=number_format($profit6, 2)?></td>
<!-- kharcha  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 6 AND income_category = 'خرچه'";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $invest6 = $rows['af'];
}
?>


<td style="font-size:16px"><?=$invest6?></td>
<!-- karaia  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 6 AND income_category = 'کرایه'";
$result5 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result5)) {
    $karaia6 = $rows['af'];
}
?>
<td class=" " style="font-size:16px"><?=$karaia6?></td>

<?php
// total profit
$totalProfit6 = $profit6 - $invest6 - $karaia6;

?>
<td class="<?php if ($totalProfit6 > 0) {
    echo 'text-success';
} else {
    echo 'text-danger';
}?>" style="font-size:16px"><?=number_format($totalProfit6, 2)?></td>

    </tr>









<!-- ------------------------------ -->
<!-- 6 End of Months Recored -->
<!-- ------------------------------- -->

<!-- ----------------------------- -->
<!-- 7 Months Recored -->
<!-- ------------------------------- -->
<?php
$query = "SELECT sum(sold_mobile_total_price_af) as af, sum(sold_mobile_total_price_rs) as rs FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 7";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $soldMAF7 = $rows['af'];
    $soldMRS7 = $rows['rs'];
    $query = "SELECT sum(sold_items_total_price_af) as af, sum(sold_items_total_price_rs) as rs FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 7";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldIAF7 = $rows['af'];
        $soldIRS7 = $rows['rs'];

    }
    $query = "SELECT sum(easyload_af) as af, sum(easyload_rs) as rs FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 7";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldEAF7 = $rows['af'];
        $soldERS7 = $rows['rs'];

    }

    ?>

  <tr style="" class='text-center font-weight-600 '>
  <td>7</td>
         <td>July 7</td>

<td style="font-size:17px"><?=$soldMAF7 + $soldIAF7 + $soldEAF7?></td>
<td class="" style="font-size:17px"><?=$soldMRS7 + $soldIRS7 + $soldERS7?></td>


<?php }?>
<!-- profit -->
<?php
$base = 0;
$Raf = 0;
$af = 0;
$Ibase = 0;
$IRaf = 0;
$Iaf = 0;
$query = "SELECT sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 7";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $base = $rows['b'];
    $Raf = $rows['r'];
    $af = $rows['a'];

    $query = "SELECT sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 7";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Ibase = $rows['b'];
        $IRaf = $rows['r'];
        $Iaf = $rows['a'];
    }

    $query = "SELECT sum(easyload_profit) as b FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 7";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Eprofit7 = $rows['b'];
    }

    $profit7 = ($Raf + $af - $base) + ($IRaf + $Iaf - $Ibase) + $Eprofit7;

}
?>




<td style="font-size:17px"><?=number_format($profit7, 2)?></td>
<!-- kharcha  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 7 AND income_category = 'خرچه'";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $invest7 = $rows['af'];
}
?>


<td style="font-size:17px"><?=$invest7?></td>
<!-- karaia  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 7 AND income_category = 'کرایه'";
$result5 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result5)) {
    $karaia7 = $rows['af'];
}
?>
<td class=" " style="font-size:17px"><?=$karaia7?></td>

<?php
// total profit
$totalProfit7 = $profit7 - $invest7 - $karaia7;

?>
<td class="<?php if ($totalProfit7 > 0) {
    echo 'text-success';
} else {
    echo 'text-danger';
}?>" style="font-size:17px"><?=number_format($totalProfit7, 2)?></td>

    </tr>










<!-- ------------------------------ -->
<!-- 7 End of Months Recored -->
<!-- ------------------------------- -->

<!-- ----------------------------- -->
<!-- 8 Months Recored -->
<!-- ------------------------------- -->

<?php
$query = "SELECT sum(sold_mobile_total_price_af) as af, sum(sold_mobile_total_price_rs) as rs FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 8";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $soldMAF8 = $rows['af'];
    $soldMRS8 = $rows['rs'];
    $query = "SELECT sum(sold_items_total_price_af) as af, sum(sold_items_total_price_rs) as rs FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 8";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldIAF8 = $rows['af'];
        $soldIRS8 = $rows['rs'];

    }
    $query = "SELECT sum(easyload_af) as af, sum(easyload_rs) as rs FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 8";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldEAF8 = $rows['af'];
        $soldERS8 = $rows['rs'];

    }

    ?>

  <tr style="" class='text-center font-weight-600 '>
  <td>8</td>
         <td>August 8</td>

<td style="font-size:17px"><?=$soldMAF8 + $soldIAF8 + $soldEAF8?></td>
<td class="" style="font-size:17px"><?=$soldMRS8 + $soldIRS8 + $soldERS8?></td>


<?php }?>
<!-- profit -->
<?php
$base = 0;
$Raf = 0;
$af = 0;
$Ibase = 0;
$IRaf = 0;
$Iaf = 0;
$query = "SELECT sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 8";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $base = $rows['b'];
    $Raf = $rows['r'];
    $af = $rows['a'];

    $query = "SELECT sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 8";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Ibase = $rows['b'];
        $IRaf = $rows['r'];
        $Iaf = $rows['a'];
    }

    $query = "SELECT sum(easyload_profit) as b FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 8";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Eprofit8 = $rows['b'];
    }

    $profit8 = ($Raf + $af - $base) + ($IRaf + $Iaf - $Ibase) + $Eprofit8;

}
?>




<td style="font-size:17px"><?=number_format($profit8, 2)?></td>
<!-- kharcha  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 8 AND income_category = 'خرچه'";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $invest8 = $rows['af'];
}
?>


<td style="font-size:17px"><?=$invest8?></td>
<!-- karaia  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 8 AND income_category = 'کرایه'";
$result5 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result5)) {
    $karaia8 = $rows['af'];
}
?>
<td class=" " style="font-size:17px"><?=$karaia8?></td>

<?php
// total profit
$totalProfit8 = $profit8 - $invest8 - $karaia8;

?>
<td class="<?php if ($totalProfit8 > 0) {
    echo 'text-success';
} else {
    echo 'text-danger';
}?>" style="font-size:17px"><?=number_format($totalProfit8, 2)?></td>

    </tr>









<!-- ------------------------------ -->
<!-- 8 End of Months Recored -->
<!-- ------------------------------- -->
<!-- grand total Profit -->
<?php
$query = "SELECT sum(sold_mobile_total_price_af) as af, sum(sold_mobile_total_price_rs) as rs FROM sold_mobiles WHERE year(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 9";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $soldMAF9 = $rows['af'];
    $soldMRS9 = $rows['rs'];
    $query = "SELECT sum(sold_items_total_price_af) as af, sum(sold_items_total_price_rs) as rs FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 9";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldIAF9 = $rows['af'];
        $soldIRS9 = $rows['rs'];

    }
    $query = "SELECT sum(easyload_af) as af, sum(easyload_rs) as rs FROM easyload WHERE year(easyload_date) = 2025 AND MONTH(easyload_date) = 9";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldEAF9 = $rows['af'];
        $soldERS9 = $rows['rs'];

    }

    ?>

  <tr style="" class='text-center font-weight-600 '>
  <td>9</td>
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
$query = "SELECT sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 9";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $base = $rows['b'];
    $Raf = $rows['r'];
    $af = $rows['a'];

    $query = "SELECT sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items WHERE year(sold_date) = 2025 AND MONTH(sold_date) = 9";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Ibase = $rows['b'];
        $IRaf = $rows['r'];
        $Iaf = $rows['a'];
    }

    $query = "SELECT sum(easyload_profit) as b FROM easyload WHERE year(easyload_date) = 2025 AND MONTH(easyload_date) = 9";
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
$query = "SELECT sum(Oprice_af) as af FROM income WHERE year(income_date) = 2025 AND MONTH(income_date) = 9 AND income_category = 'خرچه'";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $invest9 = $rows['af'];
}
?>


<td style="font-size:17px"><?=$invest9?></td>
<!-- karaia  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE year(income_date) = 2025 AND MONTH(income_date) = 9 AND income_category = 'کرایه'";
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
$query = "SELECT sum(sold_mobile_total_price_af) as af, sum(sold_mobile_total_price_rs) as rs FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 10";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $soldMAF10 = $rows['af'];
    $soldMRS10 = $rows['rs'];
    $query = "SELECT sum(sold_items_total_price_af) as af, sum(sold_items_total_price_rs) as rs FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 10";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldIAF10 = $rows['af'];
        $soldIRS10 = $rows['rs'];

    }
    $query = "SELECT sum(easyload_af) as af, sum(easyload_rs) as rs FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 10";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldEAF10 = $rows['af'];
        $soldERS10 = $rows['rs'];

    }

    ?>

  <tr style="" class='text-center font-weight-600 '>
  <td>10</td>
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
$query = "SELECT sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 10";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $base = $rows['b'];
    $Raf = $rows['r'];
    $af = $rows['a'];

    $query = "SELECT sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 10";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Ibase = $rows['b'];
        $IRaf = $rows['r'];
        $Iaf = $rows['a'];
    }

    $query = "SELECT sum(easyload_profit) as b FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 10";
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
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 10 AND income_category = 'خرچه'";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $invest10 = $rows['af'];
}
?>


<td style="font-size:17px"><?=$invest10?></td>
<!-- karaia  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 10 AND income_category = 'کرایه'";
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
$query = "SELECT sum(sold_mobile_total_price_af) as af, sum(sold_mobile_total_price_rs) as rs FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 11";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $soldMAF11 = $rows['af'];
    $soldMRS11 = $rows['rs'];
    $query = "SELECT sum(sold_items_total_price_af) as af, sum(sold_items_total_price_rs) as rs FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 11";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldIAF11 = $rows['af'];
        $soldIRS11 = $rows['rs'];

    }
    $query = "SELECT sum(easyload_af) as af, sum(easyload_rs) as rs FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 11";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldEAF11 = $rows['af'];
        $soldERS11 = $rows['rs'];

    }
    ?>

  <tr style="" class='text-center font-weight-600 '>
  <td>11</td>
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
$query = "SELECT sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 11";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $base = $rows['b'];
    $Raf = $rows['r'];
    $af = $rows['a'];

    $query = "SELECT sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 11";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Ibase = $rows['b'];
        $IRaf = $rows['r'];
        $Iaf = $rows['a'];
    }
    $query = "SELECT sum(easyload_profit) as b FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 11";
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
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 11 AND income_category = 'خرچه'";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $invest11 = $rows['af'];
}
?>


<td style="font-size:17px"><?=$invest11?></td>
<!-- karaia  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 11 AND income_category = 'کرایه'";
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
$query = "SELECT sum(sold_mobile_total_price_af) as af, sum(sold_mobile_total_price_rs) as rs FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 12";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $soldMAF12 = $rows['af'];
    $soldMRS12 = $rows['rs'];
    $query = "SELECT sum(sold_items_total_price_af) as af, sum(sold_items_total_price_rs) as rs FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 12";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldIAF12 = $rows['af'];
        $soldIRS12 = $rows['rs'];

    }
    $query = "SELECT sum(easyload_af) as af, sum(easyload_rs) as rs FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 12";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $soldEAF12 = $rows['af'];
        $soldERS12 = $rows['rs'];

    }
    ?>

  <tr style="" class='text-center font-weight-600 '>
  <td>12</td>
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
$query = "SELECT sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles WHERE YEAR(sold_mobile_date) = 2025 AND MONTH(sold_mobile_date) = 12";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $base = $rows['b'];
    $Raf = $rows['r'];
    $af = $rows['a'];

    $query = "SELECT sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items WHERE YEAR(sold_date) = 2025 AND MONTH(sold_date) = 12";
    $result2 = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result2)) {
        $Ibase = $rows['b'];
        $IRaf = $rows['r'];
        $Iaf = $rows['a'];
    }
    $query = "SELECT sum(easyload_profit) as b FROM easyload WHERE YEAR(easyload_date) = 2025 AND MONTH(easyload_date) = 12";
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
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 12 AND income_category = 'خرچه'";
$result1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result1)) {
    $invest12 = $rows['af'];
}
?>


<td style="font-size:17px"><?=$invest12?></td>
<!-- karaia  -->
<?php
$query = "SELECT sum(Oprice_af) as af FROM income WHERE YEAR(income_date) = 2025 AND MONTH(income_date) = 12 AND income_category = 'کرایه'";
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
<td></td>
<td class="text-danger pashtofont" style="font-size:26px">د 2025 کال جمله</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>

<tr class="text-center" style="font-size:18px">
<td></td>
<td></td>
<!-- tol khars shwy saman afghani -->
<?php $MAFIAF = ($soldIAF12 + $soldMAF12 + $soldEAF12 + $soldIAF11 + $soldMAF11 + $soldEAF11 + $soldIAF10 + $soldMAF10 + $soldEAF10 + $soldIAF9 + $soldMAF9 + $soldEAF9 + $soldIAF8 + $soldMAF8 + $soldEAF8 + $soldIAF7 + $soldMAF7 + $soldEAF7 + $soldIAF6 + $soldMAF6 + $soldEAF6 + $soldIAF5 + $soldMAF5 + $soldEAF5 + $soldIAF4 + $soldMAF4 + $soldEAF4 + $soldIAF3 + $soldMAF3 + $soldEAF3 + $soldIAF2 + $soldMAF2 + $soldEAF2 + $soldIAF1 + $soldMAF1 + $soldEAF1);
?>
<td class="text-danger" style="font-size:18px;font-weight:600">
<?=$MAFIAF?>
</td>
<!-- tol khars shwy saman kaldari -->
<?php $MRSIRS = ($soldMRS12 + $soldIRS12 + $soldERS12 + $soldMRS11 + $soldIRS11 + $soldERS11 + $soldMRS10 + $soldIRS10 + $soldERS10 + $soldMRS9 + $soldIRS9 + $soldERS9 + $soldMRS8 + $soldIRS8 + $soldERS8 + $soldMRS7 + $soldIRS7 + $soldERS7 + $soldMRS6 + $soldIRS6 + $soldERS6 + $soldMRS5 + $soldIRS5 + $soldERS5 + $soldMRS4 + $soldIRS4 + $soldERS4 + $soldMRS3 + $soldIRS3 + $soldERS3 + $soldMRS2 + $soldIRS2 + $soldERS2 + $soldMRS1 + $soldIRS1 + $soldERS1);?>

<td class="text-danger" style="font-size:18px;font-weight:600">
<?=$MRSIRS?>
</td>
<!-- tola gata -->
<?php $profit = ($profit12 + $profit11 + $profit10 + $profit9 + $profit8 + $profit7 + $profit6 + $profit5 + $profit4 + $profit3 + $profit2 + $profit1);?>
<td class="text-danger" style="font-size:18px;font-weight:600">
<?=number_format($profit, 2)?>
</td>
<!-- tola kharcha -->
<?php $invest = ($invest12 + $invest11 + $invest10 + $invest9 + $invest8 + $invest7 + $invest6 + $invest5 + $invest4 + $invest3 + $invest2 + $invest1);?>
<td class="text-danger" style="font-size:18px;font-weight:600">
<?=$invest?>
</td>
<!-- tola karaia -->
<?php $karaia = ($karaia12 + $karaia11 + $karaia10 + $karaia9 + $karaia8 + $karaia7 + $karaia6 + $karaia5 + $karaia4 + $karaia3 + $karaia2 + $karaia1);?>
<td class="text-danger" style="font-size:18px;font-weight:600">
<?=$karaia?>
</td>
<!-- grand total gata -->
<?php $TP = $totalProfit12 + $totalProfit11 + $totalProfit10 + $totalProfit9 + $totalProfit8 + $totalProfit7 + $totalProfit6 + $totalProfit5 + $totalProfit4 + $totalProfit3 + $totalProfit2 + $totalProfit1;

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