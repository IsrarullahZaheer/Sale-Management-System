
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
    <?php
if (isset($_GET['categoryID'])) {
    $theCatID = $_GET['categoryID'];
    $query = "SELECT * FROM loan_categories WHERE cat_id = '$theCatID'";
    $selectCategories = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($selectCategories)) {
        $catId = $rows['cat_id'];
        $catName = $rows['cat_name'];
    }
}

?>














<h1 class="display-2 pashtofont text-center"><?=$catName?> کهاته </h1>

<h2 class="text-center"><a href="loan.php?categoryID=<?=$theCatID?>&wasol=1"  class="btn btn-success  btn-large pashtofont d-inline-block w-25">وصول</a>
</h2>
<h2 class="text-center"><a href="loan.php?categoryID=<?=$theCatID?>&karz=2" class="btn btn-danger btn-large pashtofont d-inline-block w-25">قرض</a>
</h2>
<?php
if (isset($_GET['wasol'])) {
    ?>
    <h1 class="display-2 pashtofont text-center text-success mb-4">د وصول فورمه </h1>
    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">

<form action="" method="POST" dir="rtl">

    <div class="form-group mb-3">
    <input name="status" type="text" readonly class="form-control border border-success" placeholder="وصول" aria-label="Recipient's username" aria-describedby="basic-addon2">

        </div>
    <div class="input-group mb-3">
      <input name="des" type="text" class="form-control border border-success" placeholder="تفصیل" aria-label="Recipient's username" aria-describedby="basic-addon2">

    </div>



    <div class="input-group mb-3">
   <div class="input-group input-group-alternative">
            <input
                id="income"
                class="form-control border border-success"
                placeholder=" افغانی"
                type="any"
                name="RAF"

                value=""
                style="font-size: 20px;"
            />

        </div>
        </div>
        <div class="input-group mb-3">
        <div class="input-group input-group-alternative">
            <input
                id="income"
                class="form-control border border-success"
                placeholder=" کلداری"
                type="any"
                name="RRS"

                value=""
                style="font-size: 20px;"
            />

        </div>
        </div>
        <div class="input-group mb-3">
        <div class="input-group input-group-alternative">
            <input
                id="income"
                class="form-control border border-success"
                placeholder=" ډالر"
                type="any"
                name="RD"

                value=""
                style="font-size: 20px;"
            />
</div>
        </div>




                            <div class="form-group mb-3">
                                <div class="input-group">
                                <input class="btn btn-primary btn-block" style="font-size: 20px;" type="submit" value="سیستم ته داخلول" name="wasol">
                                </div>
                            </div>



            </form>
            </div>
            <div class="col-md-3"></div>
            </div>
<?php
} elseif (isset($_GET['karz'])) {
    ?>

<h1 class="display-2 pashtofont text-center mb-4 text-danger">د قرض فورمه </h1>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">


            <form action="" method="POST" dir="rtl">


    <div class="form-group mb-3">
    <input name="status" type="text" readonly class="form-control border border-danger" placeholder="قرض" aria-label="Recipient's username" aria-describedby="basic-addon2">

        </div>
    <div class="input-group mb-3">
      <input name="des" type="text" class="form-control border border-danger" placeholder="تفصیل" aria-label="Recipient's username" aria-describedby="basic-addon2">

    </div>



    <div class="input-group mb-3">
   <div class="input-group input-group-alternative">
            <input
                id="income"
                class="form-control border border-danger"
                placeholder=" افغانی"
                type="any"
                name="TAF"

                value=""
                style="font-size: 20px;"
            />

        </div>
        </div>
        <div class="input-group mb-3">
        <div class="input-group input-group-alternative">
            <input
                id="income"
                class="form-control border border-danger"
                placeholder=" کلداری"
                type="any"
                name="TRS"

                value=""
                style="font-size: 20px;"
            />

        </div>
        </div>
        <div class="input-group mb-3">
        <div class="input-group input-group-alternative">
            <input
                id="income"
                class="form-control border border-danger"
                placeholder=" ډالر"
                type="any"
                name="TD"

                value=""
                style="font-size: 20px;"
            />
</div>
        </div>




                            <div class="form-group mb-3">
                                <div class="input-group">
                                <input class="btn btn-danger btn-block" style="font-size: 20px;" type="submit" value="سیستم ته داخلول" name="karz">
                                </div>
                            </div>


            </form>
            </div>
                            <div class="col-md-3"></div>
            </div>
<?php }?>

<?php
//add
if (isset($_POST['wasol'])) {
    $Des = $_POST['des'];
    $RAF = $_POST['RAF'];
    $RRS = $_POST['RRS'];
    $RD = $_POST['RD'];
    $query = "INSERT INTO loan (loan_date,loan_category,loan_des,loan_Iprice_af,loan_Iprice_rs,loan_Iprice_dollar,loan_status) VALUES (now(),'$catName','$Des','$RAF','$RRS','$RD','وصول')";
    $insertWasol = mysqli_query($connection, $query);

}
?>

<?php
//remove
if (isset($_POST['karz'])) {
    $Des = $_POST['des'];
    $TAF = $_POST['TAF'];
    $TRS = $_POST['TRS'];
    $TD = $_POST['TD'];
    $query = "INSERT INTO loan (loan_date,loan_category,loan_des,loan_Oprice_af,loan_Oprice_rs,loan_Oprice_dollar,loan_status) VALUES (now(),'$catName','$Des','$TAF','$TRS','$TD','قرض')";
    $insertKarz = mysqli_query($connection, $query);

}
?>






        <div class="row">


            <div class="col-xl-12" dir="rtl">

<?php
$query = "SELECT SUM(loan_Iprice_af) as RtotalAF,SUM(loan_Iprice_rs) as RtotalRS,SUM(loan_Iprice_dollar) as RtotalDollar,SUM(loan_Oprice_af) as TtotalAF,SUM(loan_Oprice_rs) as TtotalRS,SUM(loan_Oprice_dollar) as TtotalDollar FROM loan WHERE loan_category = '$catName'";

$grandTotalAF = null;
$grandTotalRS = null;
$grandTotalDollar = null;
$querySumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($querySumAF)) {
    $raf = $rows['RtotalAF'];
    $rrs = $rows['RtotalRS'];
    $rd = $rows['RtotalDollar'];
    $taf = $rows['TtotalAF'];
    $trs = $rows['TtotalRS'];
    $td = $rows['TtotalDollar'];

    $grandTotalAF = $taf - $raf;
    $grandTotalRS = $trs - $rrs;
    $grandTotalDollar = $td - $rd;

}

?>



 <!-- Light table -->
 <div class="table-responsive mt-5">
              <table class="table align-items-center table-condensed table-flush table-bordered table-striped table-primary" id="">
                <thead class="thead-light">



<tr class="text-center pashtofont text-success">
<th style="font-size:30px;" class="text-danger"> جمله  </th>

<th style="font-size:30px;" colspan="" ><span class="text-success"><?=$grandTotalAF?></span><span class="text-danger">  افغانی</span> </th>
<th style="font-size:30px;" colspan="4"><span class="text-success"><?=$grandTotalRS?></span><span class="text-danger">  کلداری</span></th>
<th style="font-size:30px;" colspan="3" ><span class="text-success"><?=$grandTotalDollar?></span><span class="text-danger">  دالر</span></th>
</tr>

<tr class="text-center pashtofont text-success">
<th></th>
<th></th>
<th colspan="3" style="font-size:24px;" class="text-success border-left border-right">راغلی</th>
<th colspan="3" style="font-size:24px;" class="text-danger border-left">تللی</th>

</tr>
<tr class="pashtofont text-center">
<th style="font-size:17px;">ایډی</th>
<th style="font-size:17px;">تاریخ</th>
<th style="font-size:17px">تفصیل</th>
<th style="font-size:17px" class="text-success border-right">افغانی</th>
<th style="font-size:17px" class="text-success">کلداری</th>
<th style="font-size:17px" class="text-success border-left">ډالر</th>
<th style="font-size:17px" class="text-danger">افغانی</th>
<th style="font-size:17px" class="text-danger">کلداری</th>
<th style="font-size:17px" class="text-danger border-left">ډالر</th>

</tr>
</thead>
<tbody class="list">




<!-- display  Mobiles From Database -->
<?php
$query = "SELECT * FROM loan WHERE loan_category = '$catName' ORDER BY loan_id DESC";
$displayIncome = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($displayIncome)) {
    $incomeID = $rows['loan_id'];
    $incomeDate = $rows['loan_date'];
    $incomeDes = $rows['loan_des'];
    $incomeIAF = $rows['loan_Iprice_af'];
    $incomeIRS = $rows['loan_Iprice_rs'];
    $incomeIDollor = $rows['loan_Iprice_dollar'];
    $incomeOAF = $rows['loan_Oprice_af'];
    $incomeORS = $rows['loan_Oprice_rs'];
    $incomeODollor = $rows['loan_Oprice_dollar'];

    ?>
         <tr style="" class='text-center font-weight-600 '>
         <td><?=$incomeID?></td>
        <td><?=$incomeDate?></td>
            <td class="pashtofont" style="font-size:17px"><?=$incomeDes?></td>
        <td style="font-size:17px"><?=$incomeIAF?></td>
<td style="font-size:17px"><?=$incomeIRS?></td>
<td style="font-size:17px"><?=$incomeIDollor?></td>
<td class="text-danger " style="font-size:17px"><?=$incomeOAF?></td>
<td class="text-danger " style="font-size:17px"><?=$incomeORS?></td>
<td class="text-danger " style="font-size:17px"><?=$incomeODollor?></td>

<td>
<a href="loan.php?editId=<?=$incomeID?>&categoryID=<?=$catId?>" class="btn btn-primary btn-sm">Edit</a>
</td>

        </tr>


<?php }?>



<?php
if (isset($_GET['editId'])) {
    $theEditId = $_GET['editId'];
    $query = "SELECT * FROM loan WHERE loan_id = $theEditId";
    $editCategory = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($editCategory)) {

        $incomeDescription = $rows['loan_des'];
        $incomeDa = $rows['loan_date'];
        $editIAF = $rows['loan_Iprice_af'];
        $editIRS = $rows['loan_Iprice_rs'];
        $editIDollar = $rows['loan_Iprice_dollar'];
        $editOAF = $rows['loan_Oprice_af'];
        $editORS = $rows['loan_Oprice_rs'];
        $editODollar = $rows['loan_Oprice_dollar'];

    }

    if ($editIAF || $editIRS || $editIDollar) {?>
        <h1 class="display-2 pashtofont text-center text-success mb-4">د وصول بدلون فورمه </h1>
<form action="" method="POST" dir="rtl">
    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">

    <div class="form-group mb-3">
    <input name="status" type="text" readonly class="form-control border border-success" placeholder="وصول" aria-label="Recipient's username" aria-describedby="basic-addon2">

        </div>
    <div class="input-group mb-3">
      <input value="<?=$incomeDescription?>" name="des" type="text" class="form-control border border-success" placeholder="تفصیل" aria-label="Recipient's username" aria-describedby="basic-addon2">

    </div>



    <div class="input-group mb-3">
   <div class="input-group input-group-alternative">
            <input
                id="income"
                class="form-control border border-success"
                placeholder=" افغانی"
                type="any"
                name="RAF"

                value="<?=$editIAF?>"
                style="font-size: 20px;"
            />

        </div>
        </div>
        <div class="input-group mb-3">
        <div class="input-group input-group-alternative">
            <input
                id="income"
                class="form-control border border-success"
                placeholder=" کلداری"
                type="any"
                name="RRS"

                value="<?=$editIRS?>"
                style="font-size: 20px;"
            />

        </div>
        </div>
        <div class="input-group mb-3">
        <div class="input-group input-group-alternative">
            <input
                id="income"
                class="form-control border border-success"
                placeholder=" ډالر"
                type="any"
                name="RD"

                value="<?=$editIDollar?>"
                style="font-size: 20px;"
            />
</div>
        </div>




                            <div class="form-group mb-3">
                                <div class="input-group">
                                <input class="btn btn-primary btn-block" style="font-size: 20px;" type="submit" value="بدلون فورمی سیستم ته داخلول" name="updatewasol">
                                </div>
                            </div>
                            </div>
                            <div class="col-md-3"></div>
</div>
            </form>

    <?php } else {?>
        <h1 class="display-2 pashtofont text-center text-danger mb-4">د قرض بدلون فورمه </h1>
<form action="" method="POST" dir="rtl">
    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">

    <div class="form-group mb-3">
    <input name="status" type="text" readonly class="form-control border border-danger" placeholder="وصول" aria-label="Recipient's username" aria-describedby="basic-addon2">

        </div>
    <div class="input-group mb-3">
      <input value="<?=$incomeDescription?>" name="des" type="text" class="form-control border border-danger" placeholder="تفصیل" aria-label="Recipient's username" aria-describedby="basic-addon2">

    </div>



    <div class="input-group mb-3">
   <div class="input-group input-group-alternative">
            <input
                id="income"
                class="form-control border border-danger"
                placeholder=" افغانی"
                type="any"
                name="TAF"

                value="<?=$editOAF?>"
                style="font-size: 20px;"
            />

        </div>
        </div>
        <div class="input-group mb-3">
        <div class="input-group input-group-alternative">
            <input
                id="income"
                class="form-control border border-danger"
                placeholder=" کلداری"
                type="any"
                name="TRS"

                value="<?=$editORS?>"
                style="font-size: 20px;"
            />

        </div>
        </div>
        <div class="input-group mb-3">
        <div class="input-group input-group-alternative">
            <input
                id="income"
                class="form-control border border-danger"
                placeholder=" ډالر"
                type="any"
                name="TD"

                value="<?=$editODollar?>"
                style="font-size: 20px;"
            />
</div>
        </div>




                            <div class="form-group mb-3">
                                <div class="input-group">
                                <input class="btn btn-primary btn-block" style="font-size: 20px;" type="submit" value="بدلون فورمی سیستم ته داخلول" name="updatekarz">
                                </div>
                            </div>
                            </div>
                            <div class="col-md-3"></div>
</div>
            </form>
    <?php }
}

if (isset($_POST['updatewasol'])) {

    $Des = $_POST['des'];
    $RAF = $_POST['RAF'];
    $RRS = $_POST['RRS'];
    $RD = $_POST['RD'];

    $query = "UPDATE loan SET loan_des = '$Des',";
    $query .= "loan_Iprice_af = '$RAF',";
    $query .= "loan_Iprice_rs = '$RRS',";
    $query .= "loan_Iprice_dollar = '$RD' ";

    $query .= "WHERE loan_id = $theEditId";
    $updateLoan = mysqli_query($connection, $query);
    if (!$updateLoan) {
        die("ERROR " . mysqli_error($connection));
    }
    header("Location:loan.php?categoryID=$catId");
}

if (isset($_POST['updatekarz'])) {

    $Des = $_POST['des'];

    $TAF = $_POST['TAF'];
    $TRS = $_POST['TRS'];
    $TD = $_POST['TD'];

    $query = "UPDATE loan SET loan_des = '$Des',";

    $query .= "loan_Oprice_af = '$TAF',";
    $query .= "loan_Oprice_rs = '$TRS',";
    $query .= "loan_Oprice_dollar = '$TD' ";
    $query .= "WHERE loan_id = $theEditId";
    $updateLoank = mysqli_query($connection, $query);
    if (!$updateLoank) {
        die("ERROR " . mysqli_error($connection));
    }
    header("Location:loan.php?categoryID=$catId");
}

?>





        </tbody>
    </table>

</div>





                </div>




</div>








<?php

$query = "SELECT SUM(loan_Iprice_af) as RtotalAF,SUM(loan_Iprice_rs) as RtotalRS,SUM(loan_Iprice_dollar) as RtotalDollar,SUM(loan_Oprice_af) as TtotalAF,SUM(loan_Oprice_rs) as TtotalRS,SUM(loan_Oprice_dollar) as TtotalDollar FROM loan WHERE loan_date=CURDATE()";
$querySumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($querySumAF)) {

    $raf = $rows['RtotalAF'];
    $rrs = $rows['RtotalRS'];
    $rd = $rows['RtotalDollar'];
    $taf = $rows['TtotalAF'];
    $trs = $rows['TtotalRS'];
    $td = $rows['TtotalDollar'];
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

    //     $taf = $taf - $shaporKarzAF;
    //     $trs = $trs - $shaporKarzRS;
    //     $td = $td - $shaporKarzD;

    //     $raf = $raf - $shaporWasolAF - $shaporWasolAF;
    //     $rrs = $rrs - $shaporWasolRS - $shaporWasolRS;
    //     $rd = $rd - $shaporWasolD - $shaporWasolD;

    // }

    //end of new coding
    $itemDes = null;
    $query = "SELECT * FROM `income` WHERE `income_date`=curdate() AND `income_des`='قرض یا وصول'";
    $selectItem = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($selectItem)) {

        $itemDes = $rows['income_des'];
    }

    if ($itemDes) {

        $query = "UPDATE income SET Iprice_af ='$raf',Iprice_rs = '$rrs', Iprice_dollar ='$rd',Oprice_af ='$taf',Oprice_rs = '$trs', Oprice_dollar='$td' WHERE income_des = '$itemDes' AND `income_date`=curdate()";
        $updateq = mysqli_query($connection, $query);
        if (!$updateq) {
            die("error on updateIncome Query " . mysqli_error($connection));
        }
    } else {

        $query = "INSERT INTO income (income_date,Iprice_af,Iprice_rs,Iprice_dollar,Oprice_af,Oprice_rs,Oprice_dollar,income_des) VALUES (now(),'$RAF','$RRS','$RD','$TAF','$TRS','$TD','قرض یا وصول')";
        $insertItem = mysqli_query($connection, $query);
        if (!$insertItem) {
            die("error on insertItem Query " . mysqli_error($connection));
        }
    }
}
?>





</div>
</div>




                <?php include "includes/footer.php";?>