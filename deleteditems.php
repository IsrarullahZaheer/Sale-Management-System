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
    $query = "SELECT * FROM deleteditems WHERE id = $restoreId";
    $restoreQuery = mysqli_query($connection, $query);
    if ($restoreQuery) {
        while ($rows = mysqli_fetch_assoc($restoreQuery)) {
            $itemId = $rows['id'];
            $itemName = $rows['name'];
            $itemCategory = $rows['category'];
            $itemQuality = $rows['quality'];
            $itemPrice = $rows['price'];
            $itemQuantity = $rows['quantity'];
            $itemTotalPrice = $rows['total_price'];
            $itemPic = $rows['pic'];
            // $itemDate = $rows['date'];
        }
        $query = "INSERT INTO general_items (";
        $query .= "name,";
        $query .= "category,";
        $query .= "quality,";
        $query .= "price,";
        $query .= "quantity,";
        $query .= "total_price,";
        $query .= "pic,";
        $query .= "date) ";
        $query .= "VALUES (";
        $query .= "'$itemName',";
        $query .= "'$itemCategory',";
        $query .= "'$itemQuality ',";
        $query .= "'$itemPrice',";
        $query .= "$itemQuantity,";
        $query .= "'$itemTotalPrice',";
        $query .= "'$itemPic',";
        $query .= "now()";
        $query .= ")";

        $insertIntoItems = mysqli_query($connection, $query);
        if (!$insertIntoItems) {
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
                                >سامان په بریالی ډول خپل ډیټابیس ته اضافه شو</span
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

            $query = "DELETE FROM deleteditems WHERE id = $restoreId";
            $deleteQuery = mysqli_query($connection, $query);
            // header("Location:deletedRecord.php");

        }

    }

}
?>




<h1 class="display-2 pashtofont text-center"> ټول ډیلیټ شوی سامان</h1>
 <!-- Light table -->
 <div class="table-responsive">
              <table class="table align-items-center table-flush table-condensed" id="search">
                <thead class="thead-light">
                <tr class="pashtofont text-center">

<th style="font-size:16px;">تاریخ</th>
<th style="font-size:16px;">عکس</th>
<th style="font-size:16px">نوم</th>
<th style="font-size:16px">کټګوری</th>
<th style="font-size:16px">کیفیت</th>
<th style="font-size:16px">قیمت</th>
<th style="font-size:16px">مقدار</th>
<th style="font-size:16px">مجموعه قیمت</th>
<th style="font-size:16px">عملیات</th>

</tr>
</thead>
<tbody class="list">

<?php
$query = "SELECT * FROM deleteditems";
$displayMobiles1 = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($displayMobiles1)) {
    if ($displayMobiles1) {

        $itemId = $rows['id'];
        $itemName = $rows['name'];
        $itemCategory = $rows['category'];
        $itemQuality = $rows['quality'];
        $itemPrice = $rows['price'];
        $itemQuantity = $rows['quantity'];
        $itemTotalPrice = $rows['total_price'];
        $itemPic = $rows['pic'];
        $itemDate = $rows['date'];
        ?>

<tr style="font-weight:600" class="text-center">
            <td><?=$itemDate?></td>
                <td class="media"><img class="avatar rounded-circle mr-3 mx-auto" height="90px" src="img/theme/<?php
if ($itemPic) {
            echo $itemPic;
        } else {
            echo 'react.jpg';
        }

        ?>" alt="img"> </td>
                <td><?=$itemName?></td>
                <td><?=$itemCategory?></td>
                <td><?=$itemQuality?></td>
                <td>
                <?=$itemPrice?> <span style='font-size:16px' class='text-danger'> افغانی</span>
                </td>
                <td><?=$itemQuantity?></td>
                <td>
                <?=$itemTotalPrice?> <span style='font-size:16px' class='text-danger'> افغانی</span>
                </td>
            <td>




<a href="deleteditems.php?deleteRec=<?php echo $itemId ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure To Delete ?');">Delete</a>
<a href="deleteditems.php?restore=<?php echo $itemId ?>" class="btn btn-success btn-sm" onclick="return confirm('Are You Sure To Restore ?');">Restore</a>




</td>

            </tr>


<?php }}?>
<?php
if (isset($_GET['deleteRec'])) {
    $deleteId = $_GET['deleteRec'];
    $query = "DELETE FROM deleteditems WHERE id = $deleteId";
    $deleteQuery = mysqli_query($connection, $query);
    header("Location:deleteditems.php");
}
?>

        </tbody>
    </table>
</div>
</div>

                </div>

                <!-- Footer -->
                <?php include "includes/footer.php";?>