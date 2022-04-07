<?php include "config/connectoin.php"?>
<?php include "includes/header.php";?>
<!-- Sidenav -->
<?php include "includes/sidenav.php";?>
<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include "includes/topnav.php";?>
    <!-- Header -->
<!-- number_format(1.2390,2); -->


<?php
//add
if (isset($_POST['wasol'])) {
    $Grand = $_POST['easyloadGrand'];

    $query = "SELECT * FROM easyload_total";
    $displayEasyload = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($displayEasyload)) {

        $easyloadGrandID = $rows['easyload_total_id'];
    }
    if ($easyloadGrandID) {
        $query = "UPDATE easyload_total SET easyload_grand_total = easyload_grand_total +'$Grand' WHERE easyload_total_id = '$easyloadGrandID'";
        $insertWasol = mysqli_query($connection, $query);
        header("Location:easyload.php?todayeasyload");
    } else {
        $query = "INSERT INTO easyload_total (easyload_total_date,easyload_grand_total) VALUES (now(),'$Grand')";
        $insertWasol = mysqli_query($connection, $query);
        header("Location:easyload.php?todayeasyload");
    }

}
?>


<?php
if (isset($_GET['wasol'])) {
    ?>
    <h1 class="display-2 pashtofont text-center text-success mb-4">د ایزیلوډ اضافه کولو فورمه </h1>
    <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">

<form action="" method="POST" dir="rtl">

    <div class="form-group mb-3">
    <input name="easyloadGrand" type="number" class="form-control border border-success" placeholder="ایزیلوډ اندازه" aria-label="Recipient's username" aria-describedby="basic-addon2">

        </div>
		<div class="form-group mb-3">
								<div class="input-group">
								<input class="btn btn-primary btn-block" style="font-size: 20px;" type="submit" value="سیستم ته داخلول" name="wasol">
								</div>
							</div>

</form>
</div>
<div class="col-md-4"></div>
</div>
<?php }?>



    <!-- Page content -->
    <div class="container-fluid mt-3 ">
        <!-- Main Table -->



        <div class="text-center mb-4 mt-4 pashtofont">
                    <big class="display-4"> موجود ایزیلوډ </big>

        </div>
<?php
$query = "SELECT * FROM easyload_total";
$displayEasyload = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($displayEasyload)) {

    $easyloadGrandTotal = $rows['easyload_grand_total'];
}
?>
        <div class="text-center mb-4 mt-4 ">
                    <big class="display-4"> <?php
if ($easyloadGrandTotal) {
    echo $easyloadGrandTotal;
}
?> </big>

        </div>


        <?php

// if (isset($_GET['saleId'])) {
//     $saleId = $_GET['saleId'];
//     $query = "SELECT * FROM mobiles WHERE mobile_id = $saleId";
//     $displayMobileBySaleId = mysqli_query($connection, $query);
// }

// while ($rows = mysqli_fetch_assoc($displayMobileBySaleId)) {

//     $mobileId = $rows['mobile_id'];
//     $mobileName = $rows['mobile_name'];
//     $mobileCategory = $rows['mobile_category'];
//     $mobileRam = $rows['mobile_ram'];
//     $mobileStorage = $rows['mobile_storage'];
//     $mobileBattery = $rows['mobile_battery'];
//     $mobileQuantity = $rows['mobile_quantity'];
//     $mobileColor = $rows['mobile_color'];
//     $mobilePic = $rows['mobile_pic'];
//     $mobilePriceAF = $rows['mobile_price_af'];
//     $mobileTotalPriceAF = $rows['mobile_total_price_af'];
//     $mobileDate = $rows['mobile_date'];

// }
if (isset($_POST['saleEasy'])) {
    $easyloadQTY = $_POST['QTY'];
    $easyloadPrice = $_POST['price'];
    $easyloadCurr = $_POST['currency'];
    // $easyloadCompany = $_POST['company'];
    $easyloadRate = 0;
    $easyloadRate = $_POST['rate'];

    $af = 0;
    $rs = 0;
    if ($easyloadCurr == 1) {
        $af = $easyloadPrice;
    } else if ($easyloadCurr == 2) {
        $rs = $easyloadPrice;
    }
    $rstoaf = 0;
    if ($rs > 0) {
        $rstoaf = ($rs * 1000) / $easyloadRate;
    }
    if ($rstoaf > 0) {
        if ($rstoaf > $easyloadQTY) {
            $extraRS = $rstoaf - $easyloadQTY;
            $rstoaf = $rstoaf - $extraRS;
            $profit = (($rstoaf * 5) / 100);
            $profit = $profit + $extraRS;
            $rstoaf = $rstoaf + $extraRS;
//6.976744
        } else {
            $profit = (($rstoaf * 5) / 100);
        }

    } else if ($af > $easyloadQTY) {
        $extra = $af - $easyloadQTY;
        $af = $af - $extra;
        $profit = (($af * 5) / 100);
        $profit = $profit + $extra;
        $af = $af + $extra;
    } else {
        $profit = (($af * 5) / 100);
        //
    }

    // switch ($easyloadCompany) {
    //     case '1';
    //         $easyloadCompany = 'MTN';
    //         break;
    //     case '2';
    //         $easyloadCompany = 'Etisalat';
    //         break;
    //     case '3';
    //         $easyloadCompany = 'ROSHAN';
    //         break;
    //     case '4';
    //         $easyloadCompany = 'SALAM';
    //         break;

    //     case '5';
    //         $easyloadCompany = 'AWCC';
    //         break;
    //     default:
    //         $easyloadCompany = '';
    // }

    $query = "INSERT INTO easyload (";
    $query .= "easyload_date,";

    $query .= "easyload_quantity,";
    $query .= "easyload_af,";
    $query .= "easyload_rs,";
    $query .= "easyload_exchange,";
    $query .= "easyload_rstoaf,";
    // $query .= "easyload_company,";
    $query .= "easyload_profit ) ";
    $query .= "VALUES (";
    $query .= "now(),";

    $query .= "'$easyloadQTY',";
    $query .= "'$af',";
    $query .= "'$rs',";
    $query .= "'$easyloadRate',";
    $query .= "'$rstoaf',";
    // $query .= "'$easyloadCompany',";
    $query .= "'$profit'";
    $query .= ")";

    $insertEasyLoad = mysqli_query($connection, $query);
    if (!$insertEasyLoad) {
        die("ERROR" . mysqli_error($connection));
    }

    $query = "UPDATE easyload_total SET easyload_grand_total = easyload_grand_total - $easyloadQTY";
    $result = mysqli_query($connection, $query);
    header("Location:easyload.php?todayeasyload");

//new

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

//end of new

}
?>
<?php
// if (isset($_GET['easy'])) {
?>

<div class="row mt-3">
            <div
                class="col-md-4"
                style="
                    overflow: hidden;
                    background-size: cover;
                    background-position: center;
                "
            >
                <img
                    class="rounded mr-3 mx-auto"
                    height="400px"
                    src=""
                    alt=""
                />
            </div>
            <div class="col-md-4">
                <div class="card bg-secpmdary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4 pashtofont">
                            <big class="display-4">ایزیلوډ سیستم</> </big>
                        </div>

                        <form action="" Method="POST" >


                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <input
                                        name="QTY"
                                        class="form-control pashtofont"

                                        type="text"
                                        value=""
                                        placeholder=" د ایزیلوډ اندازه"
                                    />
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group input-group-alternative ">
                                    <input
                                        class="form-control pashtofont"
                                        placeholder="ایزیلوډ قیمت"
                                        type="number"
                                        name="price"
                                        required
                                        value=""
                                        style="font-size: 16px;"
                                    />
                                    <div class="input-group-append">
                                        <select
                                            name="currency"
                                            id="curr"
                                            class="form-control text-danger pashtofont"
                                            required
                                            style="font-size: 20px;"
                                        >
                                            <option value="" style="font-size: 18px;">جنس</option>
                                            <option value="1" style="font-size: 18px;">افغانی</option>
                                            <option value="2" style="font-size: 18px;">کلداری</option>
                                        </select>

                                    </div>

                                </div>
                            </div>

                            <!-- <div class="form-group mb-3 ">
                                <div class="input-group input-group-alternative">
                                <select
                                            name="company"

                                            class="form-control text-danger "
                                            required
                                            style="font-size: 20px;"
                                        >
                                            <option value="" style="font-size: 18px;">کمپنی</option>
                                            <option value="1" style="font-size: 18px;">MTN</option>
                                            <option value="2" style="font-size: 18px;">Etisalat</option>
                                            <option value="3" style="font-size: 18px;">Roshan</option>
                                            <option value="4" style="font-size: 18px;">Salam</option>
                                            <option value="5" style="font-size: 18px;">AWCC</option>
                                        </select>
                                </div>
                            </div> -->
<?php
$query = "SELECT * FROM sarafi ORDER BY id DESC LIMIT 1";
$selectLast = mysqli_query($connection, $query);
if ($selectLast) {
    while ($rows = mysqli_fetch_assoc($selectLast)) {
        $lastAf2rs = $rows['af2rs'];
    }
}
?>

                            <div class="form-group mb-3 content">
                                <div class="input-group input-group-alternative">
                                    <input
                                        name="rate"
                                        class="form-control"

                                        type="text"
                                        value=<?=$lastAf2rs?>
                                        placeholder="د 1000 افغانیو څو کلداری کیږی"
                                    />
                                </div>
                            </div>

                            <?php
// $query = "SELECT * FROM mobiles WHERE mobile_id = $saleId";
// $displayMobiles = mysqli_query($connection, $query);
// while ($rows = mysqli_fetch_assoc($displayMobiles)) {
//     $mobileQTY = $rows['mobile_quantity'];
// }
?>



<div class="text-center">
                                <input
                                    name="saleEasy"
                                    type="submit"
                                    value="Sale"
                                    class="btn btn-primary my-4"
                                />
                            </div>
<?php
// }
?>

                        </form>
                    </div>
                </div>
            </div>




            <div class="col-md-4"></div>
        </div>


  <?php
// }

?>

<h2 class="text-center mt-5"><a href="easyload.php?todayeasyload&wasol=1"  class="btn btn-success  btn-large pashtofont d-inline-block w-25"><span style="font-size:20px">ایزیلوډ اضافه کول</span> </a></h2>


<?php

if (isset($_GET['todayeasyload'])) {
    $query = "SELECT * FROM easyload WHERE easyload_date = CURDATE() ORDER BY easyload_id DESC";
    ?>
    <form action="" Method='get'>
    <input type="submit" name='all' value='All' class=' btn btn-danger'>
    </form>

<?php } elseif (isset($_GET['all'])) {
    $query = "SELECT * FROM easyload ORDER BY easyload_id DESC";
    ?>
<form action="" Method='get'>
   <a href="easyload.php?todayeasyload" class="btn btn-success">Today</a>
    </form>

<?php }?>



<!-- Light table -->
<div class="table-responsive mt-5">
              <table class="table align-items-center table-flush table-condensed table-bordered table-striped table-primary" dir="rtl" id="search">
                <thead class="thead-light">

<!-- <tr class="text-center pashtofont text-success">
<th style="font-size:34px;" class="text-danger"> جمله  </th>

<th style="font-size:32px;" colspan="" ><span class="text-success"></span><span class="text-danger">  افغانی</span> </th>
<th style="font-size:32px;" colspan="4"><span class="text-success"></span><span class="text-danger">  کلداری</span></th>
<th style="font-size:32px;" colspan="3" ><span class="text-success"></span><span class="text-danger">  دالر</span></th>
</tr> -->

<tr class="pashtofont text-center">
    <th style="font-size:17px;">ایډی</th>
<th style="font-size:17px;">تاریخ</th>
<th style="font-size:17px">ایزیلوډ اندازه</th>
<th style="font-size:17px" class="text-success border-right"> ایزیلوډ افغانی</th>
<th style="font-size:17px" class="text-success">ایزیلوډ کلداری</th>
<th style="font-size:17px" class="text-success">  کلداری په افغانیو</th>
<!-- <th style="font-size:17px" class="text-success border-left">کمپنی</th> -->
<th style="font-size:17px" class="text-danger">ګټه</th>
<th></th>

</tr>
</thead>
<tbody class="list">

<?php
//new order by increase in the following code
// $query = "SELECT * FROM easyload ORDER BY easyload_id DESC";
$displayEasyload = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($displayEasyload)) {
    $easyloadId = $rows['easyload_id'];
    $easyloadDate = $rows['easyload_date'];
    $easyloadQuantity = $rows['easyload_quantity'];
    $easyloadExchange = $rows['easyload_exchange'];
    $easyloadAf = $rows['easyload_af'];
    $easyloadRs = $rows['easyload_rs'];
    $easyloadRstoaf = $rows['easyload_rstoaf'];
    // $easyloadDCompany = $rows['easyload_company'];
    $easyloadProfit = $rows['easyload_profit'];

    ?>


<tr class="text-center">
    <td><?=$easyloadId?></td>
<td><?=$easyloadDate?></td>
<td><?=$easyloadQuantity?></td>
<td><?=$easyloadAf?></td>
<td><?=$easyloadRs?></td>
<td><?=$easyloadRstoaf?></td>
<!-- <td><?=$easyloadDCompany?></td> -->
<td><?=number_format($easyloadProfit, 2)?></td>

<td><a href="easyload.php?todayeasyload&delete=<?=$easyloadQuantity?>&id=<?=$easyloadId?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure To Delete ?');">Delete</a></td>
</tr>
<?php }?>

</tbody>
    </table>

</div>


<?php

if (isset($_GET['delete'])) {
    $deletedQTY = $_GET['delete'];
    $easyload_delete_id = $_GET['id'];

//new conding
    $query = "SELECT * FROM easyload WHERE easyload_id = $easyload_delete_id";
    $selectQuery = mysqli_query($connection, $query);
    $mobileNEW = 0;
    while ($rows = mysqli_fetch_assoc($selectQuery)) {

        $easyloadAF = $rows['easyload_af'];
        $easyloadRS = $rows['easyload_rs'];
        $easyloadDate = $rows['easyload_date'];

        $query = "UPDATE income SET Iprice_af = Iprice_af - '$easyloadAF',Iprice_rs = Iprice_rs -'$easyloadRS' WHERE income_des = 'خرڅ شوی سامان' AND `income_date`='$easyloadDate'";
        $updateq = mysqli_query($connection, $query);
        if (!$updateq) {
            die("error on updateIncome Query " . mysqli_error($connection));
        }
    }
// end of new codig

    $query = "UPDATE easyload_total SET easyload_grand_total = easyload_grand_total + $deletedQTY";
    $result = mysqli_query($connection, $query);

    $query = "DELETE FROM easyload WHERE easyload_id = $easyload_delete_id";
    $deleteQuery = mysqli_query($connection, $query);
    header("Location:easyload.php?todayeasyload");

}
?>







        <script>
        var selector = document.querySelector("#curr");

        selector.addEventListener("change",select);
        function select(){
            var content = document.querySelector(".content");
            var v = this.value;
            if(v == 2){
                content.classList.remove("d-none");
            }else if(v =='' ){
                content.classList.add("d-none");
            }else{
                content.classList.add("d-none");
            }
        };

        </script>




        <!-- Footer -->
        <?php include "includes/footer.php";?>
    </div>
</div>

