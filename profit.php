

<?php include "config/connectoin.php"?>
<?php include "includes/header.php";?>
		<!-- Sidenav -->
<?php include "includes/sidenav.php";?>
		<!-- Main content -->
		<div class="main-content" id="panel">
			<!-- Topnav -->
			<?php include "includes/topnav.php";?>
			<!-- Header -->

<?php
if (isset($_GET['SearchProfit'])) {

    $dateF = $_GET['datefrom'];
    $dateT = $_GET['dateto'];

}
$date_f = str_replace('/', '-', $dateF);
$dateFrom = date('Y-m-d', strtotime($date_f));

$date_t = str_replace('/', '-', $dateT);
$dateTo = date('Y-m-d', strtotime($date_t));
?>


<!-- Today Report -->

<?php
$query = "SELECT sum(sold_mobile_total_price_af) as af, sum(sold_mobile_total_price_rs) as rs, sum(sold_mobile_rstoaf) as rstoaf,sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles  WHERE sold_mobile_date Between '" . $dateFrom . "' AND '" . $dateTo . "' ";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {

    $todayMAF = $rows['af'];
    $todayMRS = $rows['rs'];

    $todayRstoaf = $rows['rstoaf'];

    $base = $rows['b'];
    $Raf = $rows['r'];
    $af = $rows['a'];

    $query = "SELECT sum(sold_items_total_price_af) as af, sum(sold_items_total_price_rs) as rs,sum(sold_rstoaf) as saf,sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items  WHERE sold_date Between '" . $dateFrom . "' AND '" . $dateTo . "' ";
    $result = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($result)) {

        $todayIAF = $rows['af'];
        $todayIRS = $rows['rs'];

        $todayIstoaf = $rows['saf'];

        $Ibase = $rows['b'];
        $IRaf = $rows['r'];
        $Iaf = $rows['a'];

        $query = "SELECT sum(easyload_af) as af, sum(easyload_rs) as rs,sum(easyload_rstoaf) as saf,sum(easyload_profit) as a FROM easyload WHERE easyload_date Between '" . $dateFrom . "' AND '" . $dateTo . "' ";
        $result = mysqli_query($connection, $query);
        while ($rows = mysqli_fetch_assoc($result)) {

            $todayEAF = $rows['af'];
            $todayERS = $rows['rs'];

            $todayEstoaf = $rows['saf'];

            $todayeasyloadProfit = $rows['a'];

            $todayTotalRstoAf = $todayRstoaf + $todayIstoaf + $todayEstoaf;

        }
    }
}
?>

<?php

?>
<!-- profit -->
<?php
$base = 0;
$Raf = 0;
$af = 0;
$Ibase = 0;
$IRaf = 0;
$Iaf = 0;
// $query = "SELECT sum(sold_mobile_basePrice) as b,sum(sold_mobile_rstoaf) as r, sum(sold_mobile_total_price_af) as a FROM sold_mobiles";
// $result1 = mysqli_query($connection, $query);
// while ($rows = mysqli_fetch_assoc($result1)) {
//     $base = $rows['b'];
//     $Raf = $rows['r'];
//     $af = $rows['a'];
// }
// $query = "SELECT sum(sold_basePrice) as b,sum(sold_rstoaf) as r, sum(sold_items_total_price_af) as a FROM sold_general_items";
// $result2 = mysqli_query($connection, $query);
// while ($rows = mysqli_fetch_assoc($result2)) {
//     $Ibase = $rows['b'];
//     $IRaf = $rows['r'];
//     $Iaf = $rows['a'];
// }

// $query = "SELECT sum(easyload_profit) as a FROM easyload";
// $result2 = mysqli_query($connection, $query);
// while ($rows = mysqli_fetch_assoc($result2)) {
//     $todayeasyloadProfit = $rows['a'];
// }

$todayProfit = ($Raf + $af - $base) + ($IRaf + $Iaf - $Ibase) + $todayeasyloadProfit;

?>





<!-- End of Today Report -->










	<!-- Page content -->
	<div class="container-fluid mt-3">



    <h1 class="display-2 pashtofont text-center">     عمومی ګټه  </h1>

    <div class="row">

<div class="col-xl-12 text-center">


<!-- DataPicker -->
<form action="" method="get">
<div class="input-daterange  row align-items-center">
    <div class="col">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div>
                <input class="datepicker form-control" placeholder="Start date" type="date" name="min" id="min" value="">
            </div>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div>
                <input class="datepicker form-control" placeholder="End date" type="date" name="max" id="max" value="">
            </div>
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            <div class="input-group">
                <input
                                    name="SearchProfit"
                                    type="submit"
                                    value="Search"
                                    class="btn btn-primary my-4"
                                />
            </div>
        </div>
    </div>

</div>
</form>

<!-- EndofDatePicker -->


  <div class="card">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">

          <h2 class="mb-0 pashtofont"> عمومی ګټی راپور</h2>
        </div>

      </div>
    </div>
    <div class="table-responsive" dir="rtl">
      <!-- Projects table -->
      <table class="table align-items-center table-flush" id="example">
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
            <td style="font-size:16px" class="pashtofont" >
            <?=$dateFrom . " - " . $dateTo?></td>
            <td> <?=$todayMAF + $todayIAF + $todayEAF . " " . $afghani?></td>
            <td><?=$todayMRS + $todayIRS + $todayERS . " " . $pakRs?></td>
            <td><?php echo number_format($todayTotalRstoAf, 2) . " " . $afghani ?> </td>
            <td>3000</td>
            <td><?php echo number_format($todayProfit, 2) . " " . $afghani ?> </td>
          </tr>
          <tr style="font-size:16px" class="text-center">
            <td style="font-size:16px" class="pashtofont" >
            2021-01-22</td>
            <td> 22100 </td>
            <td> 44000 </td>
            <td> 21800  </td>
            <td>3000</td>
            <td>25000</td>
          </tr>
          <tr style="font-size:16px" class="text-center">
            <td style="font-size:16px" class="pashtofont" >
            2021-01-22</td>
            <td> 22100 </td>
            <td> 44000 </td>
            <td> 21800  </td>
            <td>3000</td>
            <td>25000</td>
          </tr>
          <tr style="font-size:16px" class="text-center">
            <td style="font-size:16px" class="pashtofont" >
            2021-01-22</td>
            <td> 22100 </td>
            <td> 44000 </td>
            <td> 21800  </td>
            <td>3000</td>
            <td>25000</td>
          </tr>
          <tr style="font-size:16px" class="text-center">
            <td style="font-size:16px" class="pashtofont" >
            2021-01-22</td>
            <td> 22100 </td>
            <td> 44000 </td>
            <td> 21800  </td>
            <td>3000</td>
            <td>25000</td>
          </tr>
          <tr style="font-size:16px" class="text-center">
            <td style="font-size:16px" class="pashtofont" >
            2021-01-22</td>
            <td> 22100 </td>
            <td> 44000 </td>
            <td> 21800  </td>
            <td>3000</td>
            <td>25000</td>
          </tr>
          <tr style="font-size:16px" class="text-center">
            <td style="font-size:16px" class="pashtofont" >
            2021-01-22</td>
            <td> 22100 </td>
            <td> 44000 </td>
            <td> 21800  </td>
            <td>3000</td>
            <td>25000</td>
          </tr>
          <tr style="font-size:16px" class="text-center">
            <td style="font-size:16px" class="pashtofont" >
            2021-01-22</td>
            <td> 22100 </td>
            <td> 44000 </td>
            <td> 21800  </td>
            <td>3000</td>
            <td>25000</td>
          </tr>
          <tr style="font-size:16px" class="text-center">
            <td style="font-size:16px" class="pashtofont" >
            2021-01-22</td>
            <td> 22100 </td>
            <td> 44000 </td>
            <td> 21800  </td>
            <td>3000</td>
            <td>25000</td>
          </tr>
          <tr style="font-size:16px" class="text-center">
            <td style="font-size:16px" class="pashtofont" >
            2021-01-22</td>
            <td> 22100 </td>
            <td> 44000 </td>
            <td> 21800  </td>
            <td>3000</td>
            <td>25000</td>
          </tr>

          <tr style="font-size:16px" class="text-center">
            <td style="font-size:16px" class="pashtofont" >
            2021-01-22</td>
            <td> 22100 </td>
            <td> 44000 </td>
            <td> 21800  </td>
            <td>3000</td>
            <td>25000</td>
          </tr><tr style="font-size:16px" class="text-center">
            <td style="font-size:16px" class="pashtofont" >
            2021-01-22</td>
            <td> 22100 </td>
            <td> 44000 </td>
            <td> 21800  </td>
            <td>3000</td>
            <td>25000</td>
          </tr>
          <tr style="font-size:16px" class="text-center">
            <td style="font-size:16px" class="pashtofont" >
            2021-01-22</td>
            <td> 22100 </td>
            <td> 44000 </td>
            <td> 21800  </td>
            <td>3000</td>
            <td>25000</td>
          </tr>
          <tr style="font-size:16px" class="text-center">
            <td style="font-size:16px" class="pashtofont" >
            2021-01-22</td>
            <td> 22100 </td>
            <td> 44000 </td>
            <td> 21800  </td>
            <td>3000</td>
            <td>25000</td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
</div>

				<!-- Footer -->
        <script>
        var minDate, maxDate;

 // Custom filtering function which will search data in column four between two values
 $.fn.dataTable.ext.search.push(
     function( settings, data, dataIndex ) {
         var min = minDate.val();
         var max = maxDate.val();
         var date = new Date( data[4] );

         if (
             ( min === null && max === null ) ||
             ( min === null && date <= max ) ||
             ( min <= date   && max === null ) ||
             ( min <= date   && date <= max )
         ) {
             return true;
         }
         return false;
     }
 );

 $(document).ready(function() {
     // Create date inputs
     minDate = new DateTime($('#min'), {
         format: 'MMMM Do YYYY'
     });
     maxDate = new DateTime($('#max'), {
         format: 'MMMM Do YYYY'
     });

     // DataTables initialisation
     var table = $('#example').DataTable();

     // Refilter the table
     $('#min, #max').on('change', function () {
         table.draw();
     });
 });
 </script>
				<?php include "includes/footer.php";?>