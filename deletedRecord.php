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
                <div class="row">
                <div class="col" dir="rtl">

                <?php

if (isset($_GET['restore'])) {
    $restoreId = $_GET['restore'];
    $query = "SELECT * FROM deletedMobile WHERE mobile_id = $restoreId";
    $restoreQuery = mysqli_query($connection, $query);
    if ($restoreQuery) {
        while ($rows = mysqli_fetch_assoc($restoreQuery)) {
            $mobileId = $rows['mobile_id'];
            $mobileName = $rows['mobile_name'];
            $mobileCategory = $rows['mobile_category'];
            $mobileRam = $rows['mobile_ram'];
            $mobileStorage = $rows['mobile_storage'];
            $mobileBattery = $rows['mobile_battery'];
            $mobileQuantity = $rows['mobile_quantity'];
            $mobileColor = $rows['mobile_color'];
            $mobilePic = $rows['mobile_pic'];
            $mobilePriceAF = $rows['mobile_price_af'];
            $mobileTotalPriceAF = $rows['mobile_total_price_af'];
            // $mobileDate = $rows['mobile_date'];
        }

        $query = "INSERT INTO mobiles (";
        $query .= "mobile_name,";
        $query .= "mobile_category,";
        $query .= "mobile_ram,";
        $query .= "mobile_storage,";
        $query .= "mobile_battery,";
        $query .= "mobile_quantity,";
        $query .= "mobile_color,";
        $query .= "mobile_pic,";
        $query .= "mobile_price_af,";
        $query .= "mobile_total_price_af,";

        $query .= "mobile_date) ";
        $query .= "VALUES (";
        $query .= "'$mobileName',";
        $query .= "'$mobileCategory ',";
        $query .= "'$mobileRam',";
        $query .= "'$mobileStorage',";
        $query .= "'$mobileBattery',";
        $query .= "$mobileQuantity,";
        $query .= "'$mobileColor',";
        $query .= "'$mobilePic',";
        $query .= "'$mobilePriceAF',";
        $query .= "'$mobileTotalPriceAF',";

        $query .= "now()";
        $query .= ")";

        $insertIntoMobiles = mysqli_query($connection, $query);
        if (!$insertIntoMobiles) {
            die("QUERY  FIELD" . mysqli_error($connection));
        } else {

            ?>

                    <div class="col">
                        <div
                            class="alert alert-success alert-dismissible fade show text-center pashtofont"
                            role="alert"
                        >
                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                            <span class="alert-text display-4"
                                >موبایل په بریالی ډول خپل ډیټابیس ته اضافه شو</span
                            >
                            <button
                                type="button"
                                class="close"
                                data-dismiss="alert"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>

                    <?php

            $query = "DELETE FROM deletedMobile WHERE mobile_id = $restoreId";
            $deleteQuery = mysqli_query($connection, $query);
            // header("Location:deletedRecord.php");

        }

    }

}
?>




<h1 class="display-2 pashtofont text-center"> ټول ډیلیټ شوی موبایلونه</h1>
 <!-- Light table -->
 <div class="table-responsive">
              <table class="table align-items-center table-flush table-condensed" id="search">
                <thead class="thead-light">
                <tr class="pashtofont text-center">


<th style="font-size:16px;">عکس</th>
<th style="font-size:16px">نوم</th>
<th style="font-size:16px">کټګوری</th>
<th style="font-size:16px">ریم</th>
<th style="font-size:16px">حافظه</th>
<th style="font-size:16px">بتری</th>
<th style="font-size:16px">رنګ</th>
<th style="font-size:16px">قیمت</th>
<th style="font-size:16px">مقدار</th>
<th style="font-size:16px">مجموعه قیمت</th>
<th style="font-size:16px">عملیات</th>

</tr>
</thead>
<tbody class="list">

<?php
$query = "SELECT * FROM deletedmobile";
$displayMobiles1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($displayMobiles1)) {
    if ($displayMobiles1) {

        $mobileId = $rows['mobile_id'];
        $mobileName = $rows['mobile_name'];
        $mobileCategory = $rows['mobile_category'];
        $mobileRam = $rows['mobile_ram'];
        $mobileStorage = $rows['mobile_storage'];
        $mobileBattery = $rows['mobile_battery'];
        $mobileQuantity = $rows['mobile_quantity'];
        $mobileColor = $rows['mobile_color'];
        $mobilePic = $rows['mobile_pic'];
        $mobilePriceAF = $rows['mobile_price_af'];
        // $mobilePriceRS = $rows['mobile_price_rs'];
        // $mobilePriceDollor = $rows['mobile_price_dollor'];
        $mobileTotalPriceAF = $rows['mobile_total_price_af'];
        // $mobileTotalPriceRS = $rows['mobile_total_price_rs'];
        // $mobileTotalPriceDollor = $rows['mobile_total_price_dollor'];
        $mobileDate = $rows['mobile_date'];
        ?>



            <tr style="font-weight:600" class="text-center">

                <td class="media"><img class="avatar rounded-circle mr-3 mx-auto" height="90px" src="img/theme/<?php
if ($mobilePic) {
            echo $mobilePic;
        } else {
            echo 'xx.jpg';
        }

        ?>" alt="img"> </td>
                <td><?=$mobileName?></td>
                <td><?=$mobileCategory?></td>
                <td><?=$mobileRam?> GB</td>
                <td><?=$mobileStorage?> GB</td>
                <td><?=$mobileBattery?> MAH</td>
                <td><?=$mobileColor?></td>
                <td>
                <?php
if ($mobilePriceAF) {
            echo $mobilePriceAF . "<span style='font-size:16px' class='text-danger'> افغانی</span>";
        }
        ?>

                 </td>
                <td><?=$mobileQuantity?></td>
                <td>
                <?php
if ($mobileTotalPriceAF) {
            echo $mobileTotalPriceAF . "<span style='font-size:16px' class='text-danger'> افغانی</span>";
        }
        ?>
                </td>
            <td>

<a href="deletedRecord.php?deleteRec=<?php echo $mobileId ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure To Delete ?');">Delete</a>

<a href="deletedRecord.php?restore=<?php echo $mobileId ?>" class="btn btn-success btn-sm" onclick="return confirm('Are You Sure To Restore?');">Restore</a>



</td>

            </tr>


<?php }}?>
<?php
if (isset($_GET['deleteRec'])) {
    $deleteId = $_GET['deleteRec'];
    $query = "DELETE FROM deletedMobile WHERE mobile_id = $deleteId";
    $deleteQuery = mysqli_query($connection, $query);
    header("Location:deletedRecord.php");
}
?>




        </tbody>
    </table>
</div>
</div>






                </div>






                <!-- Footer -->
                <?php include "includes/footer.php";?>