
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

if (isset($_POST['add'])) {

    $Select = $_POST['select'];
    $Des = $_POST['des'];
    $RAF = $_POST['RAF'];
    $RRS = $_POST['RRS'];
    $RD = $_POST['RD'];
    $TAF = $_POST['TAF'];
    $TRS = $_POST['TRS'];
    $TD = $_POST['TD'];
    if ($Select == 1) {
        $Select = "عمومی";
    } elseif ($Select == 2) {
        $Select = "صرافی";
    } elseif ($Select == 3) {
        $Select = "ماشین";
    } elseif ($Select == 4) {
        $Select = "بابا";
    } elseif ($Select == 5) {
        $Select = "کرایه";
    } elseif ($Select == 6) {
        $Select = "دوکان دایمی سامان";
    } elseif ($Select == 7) {
        $Select = "عسی پخوانی شوی قرض وصول";
    } elseif ($Select == 8) {
        $Select = "خرچه";
    } elseif ($Select == 9) {
        $Select = "شاپور";
    } elseif ($Select == 10) {
        $select == "بیل";
    }
    $query = "INSERT INTO income (income_date,income_category,income_des,Iprice_af,Iprice_rs,Iprice_dollar,Oprice_af,Oprice_rs,Oprice_dollar) VALUES (now(),'$Select','$Des','$RAF','$RRS','$RD','$TAF','$TRS','$TD')";
    $insertIncome = mysqli_query($connection, $query);

}

if (isset($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $query = "DELETE FROM income WHERE income_id = '{$deleteId}'";
    $deleteCategory = mysqli_query($connection, $query);
    header('Location:report.php');

}

?>


    <h1 class="display-2 pashtofont text-center mb-3"> تللو او راغلو روپو راپور</h1>
        <div class="row">



<?php

?>

            <!-- Main Table -->

            <div class="col-xl-2 col-md-2"></div>
        <div class="col-xl-8 col-md-6">

        <?php
if (isset($_GET['editId'])) {
    $theEditId = $_GET['editId'];
    $query = "SELECT * FROM income WHERE income_id = $theEditId";
    $editCategory = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($editCategory)) {
        $editSelectCategory = $rows['income_category'];
        $incomeDescription = $rows['income_des'];
        $incomeDa = $rows['income_date'];
        $editIAF = $rows['Iprice_af'];
        $editIRS = $rows['Iprice_rs'];
        $editIDollar = $rows['Iprice_dollar'];
        $editOAF = $rows['Oprice_af'];
        $editORS = $rows['Oprice_rs'];
        $editODollar = $rows['Oprice_dollar'];

    }
    ?>
 <form action="" method="POST" dir="rtl">
    <div class="row">
    <div class="col-md-12">

    <div class="form-group mb-3">
    <select
        name="select"
        class="form-control pashtofont border border-dark"
        required
        style="font-size: 20px;"

        value = "<?=$editSelectCategory?>"
        >
          <?php
$query = "SELECT (income_category) FROM income WHERE income_id = '$theEditId'";
    $editCategory = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($editCategory)) {
        $editSelectCategory = $rows['income_category'];
        if ($editSelectCategory == 'عمومی') {
            $Select = 1;
        } elseif ($editSelectCategory == 'صرافی') {
            $Select = 2;
        } elseif ($editSelectCategory == 'ماشین') {
            $Select = 3;
        } elseif ($editSelectCategory == 'بابا') {
            $Select = 4;
        } elseif ($editSelectCategory == 'کرایه') {
            $Select = 5;
        } elseif ($editSelectCategory == 'دوکان دایمی سامان') {
            $Select = 6;
        } elseif ($editSelectCategory == 'عسی پخوانی قرض وصول') {
            $Select = 7;
        } elseif ($editSelectCategory == 'خرچه') {
            $Select = 8;
        } elseif ($editSelectCategory == 'شاپور') {
            $Select = 9;
        } elseif ($editSelectCategory == 'بیل') {
            $Select = 10;
        }
        ?>

        <option value="<?=$Select?>" style="font-size: 20px;"><?=$editSelectCategory?></option>
   <?php }
    ?>

            <option value="1" style="font-size: 20px;">عمومی</option>
            <option value="2" style="font-size: 20px;">صرافی</option>
            <option value="3" style="font-size: 20px;">ماشین</option>
            <option value="4" style="font-size: 20px;">بابا</option>
            <option value="5" style="font-size: 20px;">کرایه</option>
            <option value="6" style="font-size: 20px;">دوکان دایمی سامان</option>
            <option value="7" style="font-size: 20px;">عسی پخوانی قرض وصول</option>
            <option value="8" style="font-size: 20px;">خرچه</option>
            <option value="9" style="font-size: 20px;">شاپور</option>
            <option value="10" style="font-size: 20px;">بیل</option>

        </select>
        </div>

    <div class="input-group mb-3">
      <input name="des" value="<?=$incomeDescription?>" type="text" class="form-control border border-dark" placeholder="تفصیل" aria-label="Recipient's username" aria-describedby="basic-addon2">

    </div>

    </div>
    </div>
    <div class="row">
       <div class="col-md-6">
    <div class="input-group mb-3">
    <label for="income" class="pashtofont text-success" style="font-size: 28px;">راغلی</label>
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
    </div>
    <div class="col-md-6">
    <div class="input-group mb-3">
    <label for="income" class="pashtofont text-danger" style="font-size: 28px;">تللی</label>
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
    </div>
    </div>




                            <div class="form-group mb-3">
                                <div class="input-group">
                                <input class="btn btn-primary btn-block" style="font-size: 20px;" type="submit" value="Update" name="updateIncome">
                                </div>
                            </div>

            </form>
<?php
} else {
    ?>
    <form action="" method="POST" dir="rtl">
    <div class="row">
    <div class="col-md-12">

    <div class="form-group mb-3">
    <select
        name="select"
        id="selectBill"
        class="form-control pashtofont border border-dark"
        required
        style="font-size: 20px;"
        >
            <option value="1" style="font-size: 20px;">عمومی</option>
            <option value="2" style="font-size: 20px;">صرافی</option>
            <option value="3" style="font-size: 20px;">ماشین</option>
            <option value="4" style="font-size: 20px;">بابا</option>
            <option value="5" style="font-size: 20px;">کرایه</option>
            <option value="6" style="font-size: 20px;">دوکان دایمی سامان</option>
            <option value="7" style="font-size: 20px;">عسی پخوانی قرض وصول</option>
            <option value="8" style="font-size: 20px;">خرچه</option>
            <option value="9" style="font-size: 20px;">شاپور</option>
            <option value="10" style="font-size: 20px;">بیل</option>

        </select>
        </div>
        <div class="form-group mb-3 bill d-none">
											<div class="custom-file">
												<input
													name="bpic"
													type="file"
													class="custom-file-input"
													id="bpic"
													lang="en"
												/>
												<label class="custom-file-label" for="bpic"
													>بیل عکس</label
												>
											</div>
		</div>

    <div class="input-group mb-3">
      <input name="des" type="text" class="form-control border border-dark" placeholder="تفصیل" aria-label="Recipient's username" aria-describedby="basic-addon2">

    </div>
    </div>
    </div>
    <div class="row">
       <div class="col-md-6">
    <div class="input-group mb-3">
    <label for="income" class="pashtofont text-success" style="font-size: 28px;">راغلی</label>
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
    </div>
    <div class="col-md-6">
    <div class="input-group mb-3">
    <label for="income" class="pashtofont text-danger" style="font-size: 28px;">تللی</label>
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
    </div>
    </div>




                            <div class="form-group mb-3">
                                <div class="input-group">
                                <input class="btn btn-primary btn-block" style="font-size: 20px;" type="submit" value="سیستم ته داخلول" name="add">
                                </div>
                            </div>

            </form>
<?php }

if (isset($_POST['updateIncome'])) {
    $Select = $_POST['select'];
    $Des = $_POST['des'];
    $RAF = $_POST['RAF'];
    $RRS = $_POST['RRS'];
    $RD = $_POST['RD'];
    $TAF = $_POST['TAF'];
    $TRS = $_POST['TRS'];
    $TD = $_POST['TD'];
    if ($Select == 1) {
        $Select = "عمومی";
    } elseif ($Select == 2) {
        $Select = "صرافی";
    } elseif ($Select == 3) {
        $Select = "ماشین";
    } elseif ($Select == 4) {
        $Select = "بابا";
    } elseif ($Select == 5) {
        $Select = "کرایه";
    } elseif ($Select == 6) {
        $Select = "دوکان دایمی سامان";
    } elseif ($Select == 7) {
        $Select = "عسی پخوانی قرض وصول";
    } elseif ($Select == 8) {
        $Select = "خرچه";
    } elseif ($Select == 9) {
        $Select = "شاپور";
    } elseif ($Select == 10) {
        $Select = "بیل";
    }
    $query = "UPDATE income SET income_des = '$updateIncomeDes',";
    $query .= "income_category = '$Select',";
    $query .= "income_des = '$Des',";
    $query .= "Iprice_af = '$RAF',";
    $query .= "Iprice_rs = '$RRS',";
    $query .= "Iprice_dollar = '$RD',";
    $query .= "Oprice_af = '$TAF',";
    $query .= "Oprice_rs = '$TRS',";
    $query .= "Oprice_dollar = '$TD' ";
    $query .= "WHERE income_id = $theEditId";
    $updatein = mysqli_query($connection, $query);
    if (!$updatein) {
        die("ERROR " . mysqli_error($connection));
    }
    header("Location:report.php");
}
?>



        </div>
        <div class="col-xl-2 col-md-2"></div>
</div>
<div class="row">

            <div class="col-xl-12" dir="rtl">

<?php
$query = "SELECT SUM(Iprice_af) as RtotalAF,SUM(Iprice_rs) as RtotalRS,SUM(Iprice_dollar) as RtotalDollar,SUM(Oprice_af) as TtotalAF,SUM(Oprice_rs) as TtotalRS,SUM(Oprice_dollar) as TtotalDollar FROM income";

$querySumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($querySumAF)) {
    $raf = $rows['RtotalAF'];
    $rrs = $rows['RtotalRS'];
    $rd = $rows['RtotalDollar'];
    $taf = $rows['TtotalAF'];
    $trs = $rows['TtotalRS'];
    $td = $rows['TtotalDollar'];

    $query = "SELECT SUM(Iprice_af) as RtotalAF,SUM(Iprice_rs) as RtotalRS,SUM(Iprice_dollar) as RtotalDollar,SUM(Oprice_af) as TtotalAF,SUM(Oprice_rs) as TtotalRS,SUM(Oprice_dollar) as TtotalDollar FROM income WHERE income_category ='شاپور'";

    $querySumAF = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($querySumAF)) {
        $shraf = $rows['RtotalAF'];
        $shrrs = $rows['RtotalRS'];
        $shrd = $rows['RtotalDollar'];
        $shtaf = $rows['TtotalAF'];
        $shtrs = $rows['TtotalRS'];
        $shtd = $rows['TtotalDollar'];

        $grandTotalAF = ($raf - $shraf) - $taf;
        $grandTotalRS = ($rrs - $shrrs) - $trs;
        $grandTotalDollar = ($rd - $shrd) - $td;

    }
}
?>






 <!-- Light table -->
 <div class="table-responsive mt-5">
              <table class="table align-items-center table-flush table-bordered table-striped table-primary table-condensed" id="search">
                <thead class="thead-light table table-bordered">

<tr class="text-center pashtofont text-success thead-dark border border-darker">
<th style="font-size:34px;" class="text-danger border-darker border "> جمله  </th>

<th class="border-darker border" style="font-size:32px;" colspan="3" ><span class="text-success"><?=$grandTotalAF?></span><span class="text-danger">  افغانی</span> </th>
<th class="border-darker border" style="font-size:32px;" colspan="3"><span class="text-success"><?=$grandTotalRS?></span><span class="text-danger">  کلداری</span></th>
<th class="border-darker border" style="font-size:32px;" colspan="3" ><span class="text-success"><?=$grandTotalDollar?></span><span class="text-danger">  دالر</span></th>
</tr>

<tr class="text-center pashtofont text-success">
<th class="border-darker border" colspan="1"></th>

<th class="border-darker border"></th>
<th class="border-darker border"></th>
<th class="border-darker border text-success" colspan="3" style="font-size:26px;" >راغلی</th>
<th class="border-darker border text-danger" colspan="3" style="font-size:26px;" >تللی</th>
</tr>

<tr class="pashtofont text-center">
    <th class="border border-darker" style="font-size:17px;">ایډی</th>
<th class="border border-darker" style="font-size:17px;">تاریخ</th>
<th class="border border-darker" style="font-size:17px">تفصیل</th>
<th class="border border-darker text-success " style="font-size:17px">افغانی</th>
<th class="border border-darker text-success" style="font-size:17px">کلداری</th>
<th class="border border-darker text-success" style="font-size:17px">ډالر</th>
<th class="border border-darker text-danger" style="font-size:17px">افغانی</th>
<th class="border border-darker text-danger" style="font-size:17px">کلداری</th>
<th class="border border-darker text-danger" style="font-size:17px">ډالر</th>

</tr>
</thead>
<tbody class="list">




<!-- display  Mobiles From Database -->
<?php
$query = "SELECT * FROM income ORDER BY income_date DESC";
$displayIncome = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($displayIncome)) {
    $incomeID = $rows['income_id'];
    $incomeDate = $rows['income_date'];
    $incomeDes = $rows['income_des'];
    $incomeIAF = $rows['Iprice_af'];
    $incomeIRS = $rows['Iprice_rs'];
    $incomeIDollor = $rows['Iprice_dollar'];
    $incomeOAF = $rows['Oprice_af'];
    $incomeORS = $rows['Oprice_rs'];
    $incomeODollor = $rows['Oprice_dollar'];

    ?>
         <tr style="" class='text-center font-weight-600 '>
            <td><?=$incomeID?></td>
        <td><?php
$timestamp = strtotime($incomeDate);
    $day = date('D', $timestamp);
    echo $day . "  " . $incomeDate?></td>
            <td class="pashtofont" style="font-size:17px"><?=wordwrap($incomeDes, 60, "<br>\n");?></td>
        <td style="font-size:17px"><?=$incomeIAF?></td>
<td style="font-size:17px"><?=$incomeIRS?></td>
<td style="font-size:17px"><?=$incomeIDollor?></td>
<td class="text-danger " style="font-size:17px"><?=$incomeOAF?></td>
<td class="text-danger " style="font-size:17px"><?=$incomeORS?></td>
<td class="text-danger " style="font-size:17px"><?=$incomeODollor?></td>

        <td>


<a href='report.php?editId=<?php echo $incomeID ?>' class='btn btn-primary btn-sm'>Edit</a>
<!-- <a href="report.php?deleteId=<?php echo $incomeID ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure To Delete ?');">Delete</a> -->




</td>

        </tr>


<?php }?>

        </tbody>
    </table>

</div>





                </div>


                <!-- <script>
		var selector = document.querySelector("#selectBill");

		selector.addEventListener("change",select);
		function select(){
			var content = document.querySelector(".bill");
			var v = this.value;
			if(v == 10){
				content.classList.remove("d-none");
            }else{
                content.classList.add("d-none");
            }
		};

		</script> -->


</div>
</div>
                <!-- Footer -->

                <?php include "includes/footer.php";?>