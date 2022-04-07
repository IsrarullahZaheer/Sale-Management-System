
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



    <h1 class="display-2 pashtofont text-center"> بابا کهاته</h1>
		<div class="row">


            <div class="col-xl-12" dir="rtl">

<?php
$query = "SELECT SUM(Iprice_af) as RtotalAF,SUM(Iprice_rs) as RtotalRS,SUM(Iprice_dollar) as RtotalDollar,SUM(Oprice_af) as TtotalAF,SUM(Oprice_rs) as TtotalRS,SUM(Oprice_dollar) as TtotalDollar FROM income WHERE income_category = 'بابا'";

$querySumAF = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($querySumAF)) {
    $raf = $rows['RtotalAF'];
    $rrs = $rows['RtotalRS'];
    $rd = $rows['RtotalDollar'];
    $taf = $rows['TtotalAF'];
    $trs = $rows['TtotalRS'];
    $td = $rows['TtotalDollar'];

    $grandTotalAF = $raf - $taf;
    $grandTotalRS = $rrs - $trs;
    $grandTotalDollar = $rd - $td;

}

?>



 <!-- Light table -->
 <div class="table-responsive mt-5">
              <table class="table align-items-center table-condensed table-flush table-bordered table-striped table-primary" id="">
                <thead class="thead-light">

<tr class="text-center pashtofont text-success">
<th style="font-size:34px;" class="text-danger"> جمله  </th>

<th style="font-size:32px;" colspan="" ><span class="text-success"><?=$grandTotalAF?></span><span class="text-danger">  افغانی</span> </th>
<th style="font-size:32px;" colspan="4"><span class="text-success"><?=$grandTotalRS?></span><span class="text-danger">  کلداری</span></th>
<th style="font-size:32px;" colspan="3" ><span class="text-success"><?=$grandTotalDollar?></span><span class="text-danger">  دالر</span></th>
</tr>

<tr class="text-center pashtofont text-success">
<th></th>
<th></th>
<th colspan="3" style="font-size:26px;" class="text-success border-left border-right">راغلی</th>
<th colspan="3" style="font-size:26px;" class="text-danger border-left">تللی</th>

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
$query = "SELECT * FROM income WHERE income_category = 'بابا' ORDER BY income_id DESC";
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
        <td><?=$incomeDate?></td>
            <td class="pashtofont" style="font-size:17px"><?=$incomeDes?></td>
		<td style="font-size:17px"><?=$incomeIAF?></td>
<td style="font-size:17px"><?=$incomeIRS?></td>
<td style="font-size:17px"><?=$incomeIDollor?></td>
<td class="text-danger " style="font-size:17px"><?=$incomeOAF?></td>
<td class="text-danger " style="font-size:17px"><?=$incomeORS?></td>
<td class="text-danger " style="font-size:17px"><?=$incomeODollor?></td>



        </tr>


<?php }?>









        </tbody>
    </table>

</div>





				</div>




</div>






</div>
</div>
				<!-- Footer -->
				<?php include "includes/footer.php";?>