
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
$catName = 0;
$query = "SELECT * FROM loan_categories";
$selectLoanCategories = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($selectLoanCategories)) {
    $catName = $rows['cat_name'];
}

if (isset($_POST['addCat'])) {

    $catTitle = $_POST['cat'];
    if ($catTitle == "" || empty($catTitle)) {
        echo "SORRY!!! The Field Is Empty";
    } elseif ($catTitle == "$catName") {
        echo "SORRY!!! This Category is already Exists";
    } else {

        $query = "INSERT INTO loan_categories (cat_name) VALUES ('{$catTitle}')";
        $insertCategories = mysqli_query($connection, $query);

    }

}
if (isset($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $deleteName = $_GET['deleteName'];
    $query = "DELETE FROM loan_categories WHERE cat_id = '{$deleteId}'";
    $deleteCategory = mysqli_query($connection, $query);

    $query = "DELETE FROM loan WHERE loan_category = '{$deleteName}'";
    $deleteCategory = mysqli_query($connection, $query);

    header('Location:loan_list.php');

}

?>
    <h1 class="display-2 pashtofont text-center">قرض کهاته </h1>
        <div class="row">



<?php

// $query = "SELECT * FROM categories";
// $selectCategories = mysqli_query($connection, $query);
// while ($rows = mysqli_fetch_assoc($selectCategories)) {
//     $catId = $rows['category_id'];
//     $catTitle = $rows['category_name'];

//     echo
//         "<tr>
// <td>{$catId}</td>
// <td>{$catTitle}</td>
// <td>
// <a href='categories.php?delete= {$catId}'>Delete</a></td>
// <td> <a href='categories.php?edit= {$catId}'>Edit</a></td>

// </tr>";

// }

// if (isset($_GET['delete'])) {
//     $deleteId = $_GET['delete'];
//     $query = "DELETE FROM categories WHERE cat_id = '{$deleteId}'";
//     $deleteCategory = mysqli_query($connection, $query);
//     header('Location:categories.php');

// }

?>

            <!-- Main Table -->

            <div class="col-xl-2 col-md-2"></div>
        <div class="col-xl-8 col-md-6">
        <?php
if (isset($_GET['editId'])) {
    $theEditId = $_GET['editId'];
    $query = "SELECT * FROM loan_categories WHERE cat_id = $theEditId";
    $editCategory = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($editCategory)) {
        $editCat = $rows['cat_name'];
    }
    ?>
    <form action="" method="POST">
    <div class="input-group mb-3">
<input name="cat" value="<?=$editCat?>" type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">

<div class="input-group-append">
<input class="btn btn-success" type="submit" value="Update" name="updateCat">
</div>
</div>

    </form>
    <?php
} else {
    ?>
    <form action="" method="POST">
        <div class="input-group mb-3">
  <input name="cat" type="text" class="form-control" placeholder=" قرض وړی نوم" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <input class="btn btn-success" type="submit" value="Add" name="addCat">
  </div>
</div>

        </form>
<?php }

if (isset($_POST['updateCat'])) {
    $catTitle = $_POST['cat'];

    $query = "SELECT * FROM loan WHERE loan_category = '$editCat'";
    $displayCat = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($displayCat)) {
        $foundCat = $rows['loan_category'];
        echo $foundCat;
    }
    $query = "UPDATE loan SET loan_category = '$catTitle' WHERE loan_category =  '$foundCat'";
    $updateCategory = mysqli_query($connection, $query);
    if (!$updateCategory) {
        die("ERROR " . mysqli_error($connection));
    }
    $query = "UPDATE loan_categories SET cat_name = '$catTitle' WHERE cat_id = '$theEditId'";
    $updateCategory = mysqli_query($connection, $query);
    if (!$updateCategory) {
        die("ERROR " . mysqli_error($connection));
    }
    header("Location:loan_list.php");
}

$query = "SELECT SUM(loan_Iprice_af) as RtotalAF,SUM(loan_Iprice_rs) as RtotalRS,SUM(loan_Iprice_dollar) as RtotalDollar,SUM(loan_Oprice_af) as TtotalAF,SUM(loan_Oprice_rs) as TtotalRS,SUM(loan_Oprice_dollar) as TtotalDollar FROM loan";

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

        </div>
        <div class="col-xl-2 col-md-2"></div>
</div>

<div class="row">

            <div class="col-xl-12 col-md-12" dir="rtl">

 <!-- Light table -->
 <div class="table-responsive">
              <table class="table table-flush table-condensed table-bordered table-striped table-primary" id="">
                <thead class="thead-light">
                <tr class="text-center pashtofont text-success thead-dark">
<th style="font-size:34px;" colspan="2" class="text-danger">  جمله قرض  </th>

<th class="" style="font-size:32px;" colspan=""><span class="text-success"><?=$grandTotalAF?></span><span class="text-danger">  افغانی</span> </th>
<th class="" style="font-size:32px;" colspan=""><span class="text-success"><?=$grandTotalRS?></span><span class="text-danger">  کلداری</span></th>
<th class="" style="font-size:32px;" colspan="" ><span class="text-success"><?=$grandTotalDollar?></span><span class="text-danger">  دالر</span></th>
</tr>

                <tr class="pashtofont text-center">


<th style="font-size:16px">نوم</th>
<th style="font-size:16px">جمله افغانی</th>
<th style="font-size:16px">جمله کلداری</th>
<th style="font-size:16px">جمله ډالر</th>
<th style="font-size:16px">عملیات</th>

</tr>
</thead>
<tbody class="list">




<!-- display  Mobiles From Database -->
<?php
$query = "SELECT * FROM loan_categories";
$selectCategories = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($selectCategories)) {
    $catId = $rows['cat_id'];
    $catTitle = $rows['cat_name'];

    ?>
         <tr style='font-weight:600' class='text-center'>

            <td >
            <a href="loan.php?categoryID=<?=$catId?>">
            <span style="font-size:16px"><?=$catTitle?></span></a>
            </td>

<?php
$query = "SELECT SUM(loan_Iprice_af) as RtotalAF,SUM(loan_Iprice_rs) as RtotalRS,SUM(loan_Iprice_dollar) as RtotalDollar,SUM(loan_Oprice_af) as TtotalAF,SUM(loan_Oprice_rs) as TtotalRS,SUM(loan_Oprice_dollar) as TtotalDollar FROM loan WHERE loan_category = '$catTitle'";

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

    }?>


    <td><?=$grandTotalAF?></td>
    <td><?=$grandTotalRS?></td>
    <td><?=$grandTotalDollar?></td>



        <td>



    <a href='loan_list.php?editId=<?php echo $catId ?>' class='btn btn-primary btn-sm'>Edit</a>
    <a href='loan_list.php?deleteId=<?php echo $catId ?>&deleteName=<?=$catTitle?>' class='btn btn-danger btn-sm' onclick="return confirm(' آیا دی شخص ټول قرض وصول کړی؟');">Delete</a>




    </td>

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