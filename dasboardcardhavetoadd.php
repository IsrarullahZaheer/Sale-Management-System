
<div class="col-xl-3 col-md-6 ">
<div class="card card-stats">
    <!-- Card body -->
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h2 class="card-title text-uppercase text-muted mb-0 pashtofont">
               شاپور افغانی
                </h2>
                <?php
$query = "SELECT sum(Iprice_af) as ipriceaf ,sum(Oprice_af) as opriceaf FROM income WHERE income_category = 'شاپور'";
$SumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($SumAF)) {
    $shaporiaf = $rows['ipriceaf'];
    $shaporoaf = $rows['opriceaf'];
    $shaporAF = $shaporiaf - $shaporoaf;
    ?>
<span class='h2 font-weight-bold mb-0
<?php
if ($shaporAF < 0) {
        $shaporAF = -($shaporAF);

    } else {
        echo "text-danger";
    }
    ?>
'><?=$shaporAF?></span>
<?php
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
                        بابا افغانی
                    </h2>
                    <?php
$query = "SELECT sum(Iprice_af) as ipriceaf ,sum(Oprice_af) as opriceaf FROM income WHERE income_category = 'بابا'";
$SumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($SumAF)) {
    $babaiaf = $rows['ipriceaf'];
    $babaoaf = $rows['opriceaf'];
    $babaAF = $babaiaf - $babaoaf;

    ?>
  <span class='h2 font-weight-bold mb-0
  <?php
if ($babaAF < 0) {
        $babaAF = -($babaAF);

    } else {
        echo "text-danger";
    }
    ?>
   '><?=$babaAF?></span>
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
                    بابا کلداری
                    </h2>

                    <?php
$query = "SELECT sum(Iprice_rs) as ipricers ,sum(Oprice_rs) as opricers FROM income WHERE income_category = 'بابا'";
$SumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($SumAF)) {
    $babairs = $rows['ipricers'];
    $babaors = $rows['opricers'];
    $babaRS = $babairs - $babaors;
    ?>
  <span class='h2 font-weight-bold mb-0
  <?php
if ($babaRS < 0) {
        $babaRS = -($babaRS);

    } else {
        echo "text-danger";
    }
    ?>
   '><?=$babaRS?></span>
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
                بابا ډالر
                    </h2>


                    <?php
$query = "SELECT sum(Iprice_dollar) as ipricedollar ,sum(Oprice_dollar) as opricedollar FROM income WHERE income_category = 'بابا'";
$SumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($SumAF)) {
    $babaidollar = $rows['ipricedollar'];
    $babaodollar = $rows['opricedollar'];
    $babaD = $babaidollar - $babaodollar;
    ?>
    <span class='h2 font-weight-bold mb-0
    <?php
if ($babaD < 0) {
        $babaD = -($babaD);

    } else {
        echo "text-danger";
    }
    ?>
     '><?=$babaD?></span>
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
                   شاپور ډالر
                    </h2>
                    <?php
$query = "SELECT sum(Iprice_dollar) as ipricedollar ,sum(Oprice_dollar) as opricedollar FROM income WHERE income_category = 'شاپور'";
$SumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($SumAF)) {
    $babaidollar = $rows['ipricedollar'];
    $babaodollar = $rows['opricedollar'];
    $babaD = $babaidollar - $babaodollar;
    ?>
    <span class='h2 font-weight-bold mb-0
    <?php
if ($babaD < 0) {
        $babaD = -($babaD);

    } else {
        echo "text-danger";
    }
    ?>
     '><?=$babaD?></span>
  <?php
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














<div class="col-xl-3 col-md-6">
    <div class="card card-stats">
        <!-- Card body -->
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h2 class="card-title text-uppercase text-muted mb-0 pashtofont">عصمت افغانی</h2>
                    <?php
$query = "SELECT sum(Iprice_af) as ipriceaf ,sum(Oprice_af) as opriceaf FROM income WHERE income_category = 'ماشین'";
$SumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($SumAF)) {
    $babaiaf = $rows['ipriceaf'];
    $babaoaf = $rows['opriceaf'];
    $babaAF = $babaiaf - $babaoaf;
    ?>
    <span class='h2 font-weight-bold mb-0
    <?php
if ($babaAF < 0) {
        $babaAF = -($babaAF);

    } else {
        echo "text-danger";
    }
    ?>
     '><?=$babaAF?></span>
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
                    <h2 class="card-title text-uppercase text-muted mb-0 pashtofont">عصمت کلداری</h2>

                    <?php
$query = "SELECT sum(Iprice_rs) as ipricers ,sum(Oprice_rs) as opricers FROM income WHERE income_category = 'ماشین'";
$SumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($SumAF)) {
    $babairs = $rows['ipricers'];
    $babaors = $rows['opricers'];
    $babaRS = $babairs - $babaors;
    ?>
  <span class='h2 font-weight-bold mb-0
  <?php
if ($babaRS < 0) {
        $babaRS = -($babaRS);

    } else {
        echo "text-danger";
    }
    ?>
   '><?=$babaRS?></span>
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
                 عصمت ډالر
                    </h2>


                    <?php
$query = "SELECT sum(Iprice_dollar) as ipricedollar ,sum(Oprice_dollar) as opricedollar FROM income WHERE income_category = 'ماشین'";
$SumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($SumAF)) {
    $babaidollar = $rows['ipricedollar'];
    $babaodollar = $rows['opricedollar'];
    $babaD = $babaidollar - $babaodollar;
    ?>
    <span class='h2 font-weight-bold mb-0
    <?php
if ($babaD < 0) {
        $babaD = -($babaD);

    } else {
        echo "text-danger";
    }
    ?>
     '><?=$babaD?></span>
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
                شاپور کلداری
                    </h2>
                    <?php
$query = "SELECT sum(Iprice_rs) as ipricers ,sum(Oprice_rs) as opricers FROM income WHERE income_category = 'شاپور'";
$SumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($SumAF)) {
    $babairs = $rows['ipricers'];
    $babaors = $rows['opricers'];
    $babaRS = $babairs - $babaors;
    ?>
    <span class='h2 font-weight-bold mb-0
    <?php
if ($babaRS < 0) {
        $babaRS = -($babaRS);

    } else {
        echo "text-danger";
    }
    ?>
     '><?=$babaRS?></span>
  <?php
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








