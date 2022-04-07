<!-- Page content -->
<div class="container-fluid mt-3">

<div class="row">


    <!-- Main Table -->


    <div class="col" dir="rtl">
<h1 class="display-2 pashtofont text-center"> ټول موجود سامان</h1>
<!-- Light table -->
<div class="table-responsive">
      <table class="table align-items-center table-flush" id="search">
        <thead class="thead-light">
        <tr class="pashtofont text-center">

<th style="font-size:16px;">تاریخ</th>
<th style="font-size:16px">نوم</th>
<th style="font-size:16px">کټګوری</th>
<th style="font-size:16px">کیفیت</th>
<th style="font-size:16px">قیمت</th>
<th style="font-size:16px">مقدار</th>
<th style="font-size:16px">مجموعه قیمت</th>

</tr>
</thead>
<tbody class="list">

$query = "SELECT * FROM report WHERE report_date between DATE_FORMAT(CURDATE(),'%Y-%m-01') AND CURDATE()";
$yesterdayDisplayReport = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($yesterdayDisplayReport)) {
    $monthReportID = $rows['report_id'];
    $monthReportDate = $rows['report_date'];
    $monthReportAF = $rows['report_af'];
    $monthReportRS = $rows['report_rs'];
    $monthReportRate = $rows['report_rate'];
    $monthReportTotal = $rows['report_total'];
    $monthReportProfit = $rows['report_profit'];
}



<!-- display  Mobiles From Database -->



    <tr style="font-weight:600" class="text-center">
    <td>today</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>


    </tr>
    <tr style="font-weight:600" class="text-center">
    <td>yesterday</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>


    </tr>
    <tr style="font-weight:600" class="text-center">
    <td>1 week ago</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>


    </tr>
    <tr style="font-weight:600" class="text-center">
    <td>Month</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>


    </tr>
    <tr style="font-weight:600" class="text-center">
    <td>Year</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>


    </tr>



</tbody>
</table>
</div>
</div>
 </div>
