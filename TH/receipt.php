<?php 
require_once('connect.php');
  if(isset($_POST["subm"])){
    $sql = "SELECT * from order_details order by order_id desc limit 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $deSoup = "update supplier set ing_quantity = ing_quantity-".$row['quantity']." where ing_name ='".$row['soup']."'";
    $denoo = "update supplier set ing_quantity = ing_quantity-".$row['quantity']." where ing_name ='".$row['noodles']."'";
    $deDip = "update supplier set ing_quantity = ing_quantity-".$row['quantity']." where ing_name ='".$row['dip']."'";
    $meats = explode(',', $row['meat']); #string to array!
    $countM = count($meats);
    for ($i = 0; $i < $countM; $i++) {
      $deMeat = "update supplier set ing_quantity = ing_quantity-".$row['quantity']." where ing_name ='".$meats[$i]."'";
      mysqli_query($conn,$deMeat);
    }
    $vegetables = explode(',', $row["vegetable"]);
    $countV = count($vegetables);
    for ($i = 0; $i < $countM; $i++) {
      $deVeg = "update supplier set ing_quantity = ing_quantity-".$row['quantity']." where ing_name ='".$vegetables[$i]."'";
      mysqli_query($conn,$deVeg);
    }
   mysqli_query($conn,$deSoup);
   mysqli_query($conn,$denoo);
   mysqli_query($conn,$deDip);
   header("Location: index.html");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header-cart">
        <img class="image-headerlogo" src="Photo\logo.png" />
        <a class="navbar-brand text-color-w sriracha-regular text-position-name" href="index.html">Malatang</a>
        <div class="d-flex position-absolute end-0 mt-4 me-3">
            <img style="height: 46px; margin-right: 10px;" src="Photo\thailand (1).png" />
                <h4 class="text-color-w" style="margin-top: 7px; font-weight:bold">TH</h4>
        </div>
        <div class="text-color-w sriracha-regular position-absolute start-50 translate-middle-x" style="font-size: 45px; top:20px">ใบเสร็จ
        </div>
    </div>
    <div class="card position-absolute" style="width: 50rem; height: 450px; margin-top: 120px; margin-left:25%;">
        <div class="card-body text-center">
        <h1 class="card-title text-color-b sriracha-regular">คิวที่ <?php require_once('connect.php');
$sql = "SELECT order_id from order_details order by order_id desc limit 1";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
echo $row['order_id'];
//mysqli_query($conn, $sql) 
?></h1></h1>
        <h6 class="card-subtitle mb-2 noto-sans-thai" style="text-align:left">จำนวนชาม : <?php $sql = "SELECT * from order_details order by order_id desc limit 1";
                                                                                        $result = mysqli_query($conn, $sql);
                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                        $quantity = $row['quantity'];
                                                                                        echo "$quantity"; ?> </h6>
        <h6 class="card-subtitle noto-sans-thai" style="text-align:left;">ชำระด้วย : <?php $sql = "SELECT * from payment order by payment_id desc limit 1";
                                                                                        $result = mysqli_query($conn, $sql);
                                                                                        $row = mysqli_fetch_assoc($result);?>
                                                                                        <?php if ($row['methods'] == "Bank Transfer") : ?>
                                                                                          ผ่านบัญชีธนาคาร
                                                                                        <?php elseif ($row['methods'] == "cash") : ?>
                                                                                          เงินสด
                                                                                          <?php endif; ?>
                                                                                       </h6>
        <hr>
        <p> <table class="table table-borderless noto-sans-thai" style="font-weight: bold; font-size: 20px;">
            <thead>
            <tr>
                <td style="text-align: left;">x<?php $sql = "SELECT * from order_details order by order_id desc limit 1";
                                                                                        $result = mysqli_query($conn, $sql);
                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                        $quantity = $row['quantity'];
                                                                                        echo "$quantity"; ?></td>
                <td style="text-align: left;"><?php

require_once('connect.php');
$sql = "SELECT soup from order_details order by order_id desc limit 1";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result); ?>
<?php if ($row['soup'] == "mala soup") : ?>
ซุปหม่าล่า
<?php elseif ($row['soup'] == "pork bone soup") : ?>
ซุปกระดูกหมู
<?php elseif ($row['soup'] == "mala dry pot") : ?>
หม่าล่าผัดแห้ง
<?php endif; ?></td>
                <td style="text-align: right;"><?php $sql = "SELECT * from payment order by payment_id desc limit 1";
                                                                                        $result = mysqli_query($conn, $sql);
                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                        $amount = $row['amount'];
                                                                                        echo "$amount"; ?>.00</td>
            </tr>
            </thead>
            <tbody class="noto-sans-thai" style="text-align: left; font-size:15px; color:rgb(162, 64, 64);">
              <tr>
                <td></td>
                <td><?php
                $sql = "SELECT meat from order_details order by order_id desc limit 1";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $keepstring = $row["meat"]; // keep value of topping eng for change to thai
                if (str_contains($keepstring, "beef slice") == true) {
                  $keepstring = str_ireplace("beef slice", "เนื้อสไลด์", $keepstring);
                }
                if (str_contains($keepstring, "soft marinated pork") == true) {
                  $keepstring = str_ireplace("soft marinated pork", "หมูนุ่ม", $keepstring);
                }
                if (str_contains($keepstring, "soft marinated chicken") == true) {
                  $keepstring = str_ireplace("soft marinated chicken", "ไก่นุ่ม", $keepstring);
                }
                if (str_contains($keepstring, "sausage") == true) {
                  $keepstring = str_ireplace("soft marinated chicken", "ไส้กรอก", $keepstring);
                }
                echo $keepstring;?></td>
              </tr>
              <tr>
                <td></td><td><?php
                $sql = "SELECT vegetable from order_details order by order_id desc limit 1";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $keepstring = $row["vegetable"]; // keep value of topping eng for change to thai
                if (str_contains($keepstring, "bokchoy") == true) {
                  $keepstring = str_ireplace("bokchoy", "ผักกวางตุ้ง", $keepstring);
                }
                if (str_contains($keepstring, "golden needle mushroom") == true) {
                  $keepstring = str_ireplace("golden needle mushroom", "เห็ดเข็มทอง", $keepstring);
                }
                if (str_contains($keepstring, "tofu skin") == true) {
                  $keepstring = str_ireplace("tofu skin", "ฟองเต้าหู้", $keepstring);
                }
                if (str_contains($keepstring, "baby corn") == true) {
                  $keepstring = str_ireplace("baby corn", "ข้าวโพดอ่อน", $keepstring);
                }
                echo $keepstring;
                ?></td>
              </tr>
              <tr>
                <td></td><td><?php
                require_once('connect.php');
                $sql = "SELECT noodles from order_details order by order_id desc limit 1";
                $result = $conn->query($sql);
                $row = mysqli_fetch_assoc($result); ?>
              <?php if ($row['noodles'] == "veggie noodles") : ?>
                เส้นผัก
              <?php elseif ($row['noodles'] == "glass noodles") : ?>
                วุ้นเส้น
              <?php elseif ($row['noodles'] == "sweet potato noodles") : ?>
                เส้นมันเทศ
              <?php endif; ?></td>
              </tr>
              <tr>
                <td></td><td><?php
                require_once('connect.php');
                $sql = "SELECT dip from order_details order by order_id desc limit 1";
                $result = $conn->query($sql);
                $row = mysqli_fetch_assoc($result); ?>
              <?php if ($row['dip'] == "bean dip") : ?>
                น้ำจิ้มถั่วงา
              <?php elseif ($row['dip'] == "suki dip") : ?>
                น้ำจิ้มสุกี้

              <?php endif; ?></td>
              </tr>
              <tr class="underline-row">
                <td></td><td>ระดับความเผ็ด <?php
                      require_once('connect.php');
                      $sql = "SELECT spice from order_details order by order_id desc limit 1";
                      $result = $conn->query($sql);
                      $row = mysqli_fetch_assoc($result); ?>
              <?php if ($row['spice'] == "100%") : ?>
                100%
              <?php elseif ($row['spice'] == "50%") : ?>
                50%
              <?php elseif ($row['spice'] == "20%") : ?>
                20%
              <?php elseif ($row['spice'] == "0%") : ?>
                ไม่เผ็ด
              <?php endif; ?></td>
              </tr>
              <tr style="font-size: 20px; font-weight: bold;">
                <td>ยอดชำระสุทธิ</td><td></td><td style="text-align: right;"><?php $sql = "SELECT * from payment order by payment_id desc limit 1";
                                                                                        $result = mysqli_query($conn, $sql);
                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                        $amount = $row['amount'];
                                                                                        echo "$amount"; ?>.00</td>
              </tr>
            </tbody>
        </table></p>
        </div>
    </div>
    <form action="" method="post" >
            <button type="submit" class="btn btn-outline-warning position-absolute bottom-0 end-0 btn-lg" name = "subm" value>สั่งอาหารชามถัดไป</button>
           </form>
    <!--<form method="post" action="">
        <botton type="submit" name="subm" class="" value>  
          ชำระเงิน</button></form>-->
          <!--<a href="completed.html"
            class=" text-color-b sriracha-regular"></a>-->
            <div class="text-color-b sriracha-regular position-absolute start-50 translate-middle-x" style="text-align: center; font-size:30px; bottom:70px;">..ขอบคุณที่ใช้บริการ..
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>
</html>