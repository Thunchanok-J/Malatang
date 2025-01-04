<?php

require_once('connect.php');
//if(isset($_POST["submit"])) {
/*var_dump($_POST);
$soup = $_POST["soup"];
$meats = isset($_POST["meats"]) ? $_POST["meats"] : [];
$vegetables = isset($_POST["vegetables"]) ? $_POST["vegetables"] : [];
$noodles = $_POST["noodles"];
$dip = $_POST["dip"];
$spice = $_POST["spice"];
$quantity = $_POST["quantity"];
$meat = implode(",", $meats);
$vegetable = implode(",", $vegetables);
//}*/

// Convert array values to comma-separated strings

if (isset($_POST["something"])) {
  $amount = 10;
  $sql = "SELECT * from order_details order by order_id desc limit 1";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  $meats = explode(',', $row['meat']); #string to array!
  $countM = count($meats);
  for ($i = 0; $i < $countM; $i++) {
    $sqlIng = "SELECT * from supplier where ing_name ='" . $meats[$i] . "'";
    $resultIng = mysqli_query($conn, $sqlIng);
    $rows = mysqli_fetch_assoc($resultIng);
    // echo $rows['price'];
    $amount += $rows['price'];
  }
  $vegetables = explode(',', $row["vegetable"]);
  $countV = count($vegetables);
  for ($i = 0; $i < $countV; $i++) {
    $sqlIng = "SELECT * from supplier where ing_name ='" . $vegetables[$i] . "'";
    $resultIng = mysqli_query($conn, $sqlIng);
    $rows = mysqli_fetch_assoc($resultIng);
    $amount += $rows['price'];
  }
  $quantity = $row['quantity'];
  $amount = $amount * $quantity;
  $sqlOrder = "SELECT order_id from order_details order by order_id desc limit 1";
  $resultOrder = mysqli_query($conn, $sqlOrder);
  $rowOr = mysqli_fetch_assoc($resultOrder);
  $order_id = $rowOr['order_id'];
  /* $sqlQuantity = "SELECT * from order_details order by order_id desc limit 1";
  $resultQ =  mysqli_query($conn,$sqlQuantity);
  $rowQ = mysqli_fetch_assoc($resultQ);
    $quantity = $rowQ['quantity'];*/

  $methods = $_POST["methods"];


  $sqlp = "INSERT INTO payment (methods,amount,order_id) 
           VALUES ('$methods', '$amount', '$order_id')";

  if (mysqli_query($conn, $sqlp)) {
    echo "<script>alert('ยืนยันออเดอร์ inserted successfully');</script>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  header("Location: receipt.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bill</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
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
    <div class="text-color-w sriracha-regular position-absolute start-50 translate-middle-x" style="font-size: 45px; top:20px"> สรุปคำสั่งซื้อ
    </div>
  </div>
  <div class="card position-absolute" style="width: 50rem; height: 450px; margin-top: 120px; margin-left:25%;">
    <div class="card-body text-center">
      <h1 class="card-title text-color-b sriracha-regular">คิวที่ <?php

                                                                  require_once('connect.php');
                                                                  $sql = "SELECT order_id from order_details order by order_id desc limit 1";
                                                                  $result = $conn->query($sql);
                                                                  $row = mysqli_fetch_assoc($result);
                                                                  echo $row['order_id'];
                                                                  //mysqli_query($conn, $sql) 
                                                                  ?></h1>

      <h6 class="card-subtitle mb-2 noto-sans-thai" style="text-align:left">จำนวนชาม : <?php $sql = "SELECT * from order_details order by order_id desc limit 1";
                                                                                        $result = mysqli_query($conn, $sql);
                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                        $quantity = $row['quantity'];
                                                                                        echo "$quantity"; ?></h6>
      <hr>
      <p>
      <table class="table table-borderless noto-sans-thai" style="font-weight: bold; font-size: 20px;">
        <thead>
          <tr>
            <td style="text-align: left;">x<?php
                                            $sql = "SELECT quantity from order_details order by order_id desc limit 1";
                                            $result = $conn->query($sql);
                                            $row = mysqli_fetch_assoc($result);
                                            echo $row['quantity'];
                                            ?></td>
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
              <?php endif; ?>
            </td>
            <td style="text-align: right;"><?php $amount = 10;
                                            $sql = "SELECT * from order_details order by order_id desc limit 1";
                                            $result = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_assoc($result);

                                            $meats = explode(',', $row['meat']); #string to array!
                                            $countM = count($meats);
                                            for ($i = 0; $i < $countM; $i++) {
                                              $sqlIng = "SELECT * from supplier where ing_name ='" . $meats[$i] . "'";
                                              $resultIng = mysqli_query($conn, $sqlIng);
                                              $rows = mysqli_fetch_assoc($resultIng);
                                              // echo $rows['price'];
                                              $amount += $rows['price'];
                                            }
                                            $vegetables = explode(',', $row["vegetable"]);
                                            $countV = count($vegetables);
                                            for ($i = 0; $i < $countV; $i++) {
                                              $sqlIng = "SELECT * from supplier where ing_name ='" . $vegetables[$i] . "'";
                                              $resultIng = mysqli_query($conn, $sqlIng);
                                              $rows = mysqli_fetch_assoc($resultIng);
                                              $amount += $rows['price'];
                                            }
                                            $quantity = $row['quantity'];
                                            $amount = $amount * $quantity;
                                            echo "$amount";

                                            ?>.00</td>
          </tr>
        </thead>
        <tbody class="noto-sans-thai" style="text-align: left; font-size:15px; color:rgb(162, 64, 64);">
          <tr>
            <td></td>
            <td><?php
                $sql = "SELECT soup from order_details order by order_id desc limit 1";
                $result = $conn->query($sql);
                $row = mysqli_fetch_assoc($result);
                //$row = $eachrow;
                //$keepstring = $eachrow["meat"]
                // echo $keepstring;   
                ?>
            </td>

          </tr>
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
                  $keepstring = str_ireplace("sausage", "ไส้กรอก", $keepstring);
                }
                echo $keepstring;
                /* $meats = explode(',',$row['meat']); #string to array!
                                    $countM = count($meats);
                                    
                                         
                                    
                                  
                                    for($i=0;$i<$countM;$i++){
                                      $sqlIng = "SELECT price from supplier where ing_name ='".$meats[$i]."'";
                                      $resultIng = mysqli_query($conn,$sqlIng);
                                      $row = mysqli_fetch_assoc($resultIng);
                                      echo $meats[$i]." = ".$row['price'];
                                          
                                    }*/
                // $countData = mysqli_num_rows($result);
                //echo $countData;
                ?></td>
          </tr>
          <tr>
            <td></td>
            <td><?php
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
            <td></td>
            <td><?php
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
            <td></td>
            <td><?php
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
            <td></td>
            <td>ระดับความเผ็ด <?php
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
            <td>ยอดชำระสุทธิ</td>
            <td></td>
            <td style="text-align: right;"><?php $amount = 10;
                                            $sql = "SELECT * from order_details order by order_id desc limit 1";
                                            $result = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_assoc($result);

                                            $meats = explode(',', $row['meat']); #string to array!
                                            $countM = count($meats);
                                            for ($i = 0; $i < $countM; $i++) {
                                              $sqlIng = "SELECT * from supplier where ing_name ='" . $meats[$i] . "'";
                                              $resultIng = mysqli_query($conn, $sqlIng);
                                              $rows = mysqli_fetch_assoc($resultIng);
                                              // echo $rows['price'];
                                              $amount += $rows['price'];
                                            }
                                            $vegetables = explode(',', $row["vegetable"]);
                                            $countV = count($vegetables);
                                            for ($i = 0; $i < $countV; $i++) {
                                              $sqlIng = "SELECT * from supplier where ing_name ='" . $vegetables[$i] . "'";
                                              $resultIng = mysqli_query($conn, $sqlIng);
                                              $rows = mysqli_fetch_assoc($resultIng);
                                              $amount += $rows['price'];
                                            }
                                            $quantity = $row['quantity'];
                                            $amount = $amount * $quantity;
                                            echo "$amount";

                                            ?>.00</td>
          </tr>
        </tbody>
      </table>
      </p>
    </div><br>
    <form action="" method="POST">
      <div class="form-check sriracha-regular font-type">เลือกวิธีการชำระเงิน
        <div class="container mt-3">
          <div class="row row-cols-2">
            <div class="col">
              <input class="form-check-input" type="radio" name="methods" id="flexRadioDefault22" value="cash" checked>
              <label class="form-check-label sriracha-regular font-menu" for="flexRadioDefault22">
                ชำระด้วยเงินสด
              </label>
            </div>
            <div class="col">
              <input class="form-check-input" type="radio" name="methods" id="flexRadioDefault23" value="Bank Transfer">
              <label class="form-check-label sriracha-regular font-menu" for="flexRadioDefault23">
                ชำระเงินผ่านบัญชีธนาคาร
              </label>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div><button name="something" type="submit" class="btn btn-outline-warning position-absolute bottom-0 end-0 btn-lg">ถัดไป</button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </form>
    <!-- <a href="carts.html" class=" text-color-b sriracha-regular">ถัดไป</a> -->

</body>

</html>