
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


        <?php

if (isset($_POST['addItem'])) {

    $itemCategory = $_POST['itemCategory'];

    $query = "SELECT * FROM general_categories WHERE category_id =$itemCategory";
    $displayCategories = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($displayCategories)) {
        $categoryName = $rows['category_name'];
    }

    $itemName = $_POST['itemName'];
    $itemQuality = $_POST['itemQuality'];

    $itemPic = $_FILES['itemPic']['name'];
    $itemPicTmp = $_FILES['itemPic']['tmp_name'];

    move_uploaded_file($itemPicTmp, "img/theme/$itemPic");

    // }
    // calculation
    // $mCurrency = $_POST['mcurrency'];
    $itemQty = $_POST['itemQty'];
    $itemPrice = $_POST['itemPrice'];

    $itemTotalPrice = $itemQty * $itemPrice;

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
    $query .= "'$categoryName ',";
    $query .= "'$itemQuality',";
    $query .= "'$itemPrice',";
    $query .= "$itemQty,";
    $query .= "'$itemTotalPrice',";
    $query .= "'$itemPic',";
    $query .= "now()";
    $query .= ")";

    $insertIntoItems = mysqli_query($connection, $query);
    if (!$insertIntoItems) {
        die("QUERY  FIELD" . mysqli_error($connection));
    }

}?>





            <!-- Main Table -->


            <div class="col" dir="rtl">


<h1 class="display-2 pashtofont text-center"> ټول موجود سامان</h1>
 <!-- Light table -->
 <div class="table-responsive">
              <table class="table align-items-center table-flush table-condensed " id="search">
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




<!-- display  Mobiles From Database -->
<?php

$query = "SELECT * FROM general_items ORDER BY id DESC";

$displayMobiles = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($displayMobiles)) {

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



<a href="sale_general_items_form.php?saleId=<?php echo $itemId ?>"
class="btn btn-icon btn-3 btn-success btn-sm"

type="button">
Sale
</a>
<a href="edit_general_item.php?editId=<?php echo $itemId ?>" class="btn btn-primary btn-sm">Edit</a>
<a href="view_general_items.php?deleteId=<?php echo $itemId ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure To Delete ?');">Delete</a>




</td>

            </tr>


<?php }?>

<?php

if (isset($_GET['deleteId'])) {
    $deleteID = $_GET['deleteId'];

    $query = "SELECT * FROM general_items WHERE id = $deleteID";

    $displayMobiles = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($displayMobiles)) {

        $itemId = $rows['id'];
        $itemName = $rows['name'];
        $itemCategory = $rows['category'];
        $itemQuality = $rows['quality'];
        $itemPrice = $rows['price'];
        $itemQuantity = $rows['quantity'];
        $itemTotalPrice = $rows['total_price'];
        $itemPic = $rows['pic'];
        $itemDate = $rows['date'];

        $query = "INSERT INTO `deleteditems`(`id`, `name`, `category`, `quality`, `price`, `quantity`, `total_price`, `pic`, `date`) VALUES ('$itemId','$itemName','$itemCategory','$itemQuality','$itemPrice','$itemQuantity','$itemTotalPrice','$itemPic',' $itemDate')";

        $items = mysqli_query($connection, $query);

        $query = "DELETE FROM general_items WHERE id = $deleteID";
        $deleteMobile = mysqli_query($connection, $query);
        header('Location:view_general_items.php');
    }
}
?>


        </tbody>
    </table>
</div>
</div>






                </div>



                <!-- Footer -->
                <?php include "includes/footer.php";?>