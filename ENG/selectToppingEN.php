<?php

require_once('connect.php');
//var_dump($_POST);
if(isset($_POST["submit"])) {
    $soup = $_POST["soup"];
    $meats = isset($_POST["meats"]) ? $_POST["meats"] : [];
    $vegetables = isset($_POST["vegetables"]) ? $_POST["vegetables"] : [];
    $noodles = $_POST["noodles"];
    $dip = $_POST["dip"];
    $spice = $_POST["spice"];
    $quantity = $_POST["quantity"];

    // Convert array values to comma-separated strings
    $meat = implode(",", $meats);
    $vegetable = implode(",", $vegetables);

    // Insert data into database
    //$t = "SELECT Last(order_id) from order_details";
    //$order_id = $t+1;
    $sql = "INSERT INTO order_details (soup, meat, vegetable, noodles, dip, spice, quantity) 
           VALUES ('$soup', '$meat', '$vegetable', '$noodles', '$dip', '$spice', '$quantity')";###### ปิดไว้ก่อน######
   if(mysqli_query($conn, $sql)) {
        echo "<script>alert('Order details inserted successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
}
if(isset($_POST["submit"])) {header("Location: paymentMethodsEN.php");}
?>
  
 


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header-cart position-absolute">
        <img class="image-headerlogo" src="Photo\logo.png" />
        <a class="navbar-brand text-color-w sriracha-regular text-position-name" href="index.html">Malatang</a>
        <div class="d-flex position-absolute end-0 mt-4 me-3">
            <img style="height: 46px; margin-right: 10px;" src="Photo\united-states.png" />
                <h4 class="text-color-w" style="margin-top: 7px; font-weight:bold">EN</h4>
        </div>
        <div class="text-color-w sriracha-regular position-absolute start-50 translate-middle-x" style="font-size: 45px; top:20px">Customize Your Malatang
        </div>
    </div>\
    <div class="position-absoulate " style="margin-top: 90px; ">
    </div> 
    <div class="form-check sriracha-regular font-type">Soup Selection
        <div class="container mt-3">
            <div class="row row-cols-3">
                <div class="col">
                <!--<input type="radio" name="gender" value="Male" required> Male-->
                    <img src="Photo\malasoup1.png" style="width: 150px;" alt=""><br>
                    <form action="" method="post" >
                      <label class="form-check-label sriracha-regular font-menu" for="flexRadioDefault1" >
                <input class="form-check-input" type="radio" name="soup" id="flexRadioDefault1"  value ="mala soup" require >mala soup </label>
                    <p class="text-color-b noto-sans-thai" style="font-size: 15px;">free</p>
                </div>
                <div class="col">
                    <img src="Photo/bonepigsoup.png" style="width: 150px;" alt=""><br>
                    <input class="form-check-input" type="radio" name="soup" id="flexRadioDefault2" value ="pork bone soup">
                    <label class="form-check-label sriracha-regular font-menu" for="flexRadioDefault2" >
                    pork bone soup
                    </label>
                    <p class="text-color-b noto-sans-thai" style="font-size: 15px;">free</p>
                </div>
                <div class="col">
                    <img src="Photo/malafried.png" style="width: 150px;" alt=""><br>
                    <input class="form-check-input" type="radio" name="soup" id="flexRadioDefault3" value ="mala dry pot">
                    <label class="form-check-label sriracha-regular font-menu" for="flexRadioDefault3" >
                    mala dry pot
                    </label>
                    <p class="text-color-b noto-sans-thai" style="font-size: 15px;">free</p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="form-check sriracha-regular font-type">Meat Selection
        <div class="container mt-3">
            <div class="row row-cols-4">
                <div class="col">
                    <img src="Photo/pork.jpg" style="width: 150px;" alt=""><br>
                    <input class="form-check-input" type="checkbox" name="meats[]" id="flexCheckboxDefault4" value = "soft marinated pork">
                    <label class="form-check-label sriracha-regular font-menu" for="flexCheckboxDefault4">
                    soft marinated pork
                    </label>
                    <p class="text-color-b noto-sans-thai" style="font-size: 15px;">+฿15.00</p>
                </div>
                <div class="col">
                    <img src="Photo/chicken.jpg" style="width: 188px;" alt=""><br>
                    <input class="form-check-input" type="checkbox" name="meats[]" id="flexCheckboxDefault5" value = "soft marinated chicken">
                    <label class="form-check-label sriracha-regular font-menu" for="flexCheckboxDefault5">
                    soft marinated chicken
                    </label>
                    <p class="text-color-b noto-sans-thai" style="font-size: 15px;">+฿15.00</p>
                </div>
                <div class="col">
                    <img src="Photo/beef.jpg" style="width: 160px;" alt=""><br>
                    <input class="form-check-input" type="checkbox" name="meats[]" id="flexCheckboxDefault6" value ="beef slice">
                    <label class="form-check-label sriracha-regular font-menu" for="flexCheckboxDefault6">
                    beef slice
                    </label>
                    <p class="text-color-b noto-sans-thai" style="font-size: 15px;">+฿20.00</p>
                </div>
                <div class="col">
                    <img src="Photo/sausage.jpg" style="width: 160px;" alt=""><br>
                    <input class="form-check-input" type="checkbox" name="meats[]"
                    id="flexCheckboxDefault7" value ="sausage">
                    <label class="form-check-label sriracha-regular font-menu" for="flexCheckboxDefault7">
                    sausage
                    </label>
                    <p class="text-color-b noto-sans-thai" style="font-size: 15px;">+฿10.00</p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="form-check sriracha-regular font-type">Vegetable Selection
        <div class="container mt-3">
            <div class="row row-cols-4">
                <div class="col">
                    <img src="Photo\bockchoy.jpg" style="width: 150px;" alt=""><br>
                    <input class="form-check-input" type="checkbox" name="vegetables[]" id="flexCheckboxDefault8"  value = "bokchoy" checked>
                    <label class="form-check-label sriracha-regular font-menu" for="flexCheckboxDefault8">
                    bokchoy
                    </label>
                    <p class="text-color-b noto-sans-thai" style="font-size: 15px;">+฿10.00</p>
                </div>
                <div class="col">
                    <img src="Photo\GoldenNeedleMushroom.webp" style="width: 190px;" alt=""><br>
                    <input class="form-check-input" type="checkbox" name="vegetables[]" id="flexCheckboxDefault9" value = "golden needle mushroom">
                    <label class="form-check-label sriracha-regular font-menu" for="flexCheckboxDefault9">
                    golden needle mushroom
                    </label>
                    <p class="text-color-b noto-sans-thai" style="font-size: 15px;">+฿10.00</p>
                </div>
                <div class="col">
                    <img src="Photo\babycorn.jpg" style="width: 150px;" alt=""><br>
                    <input class="form-check-input" type="checkbox" name="vegetables[]" id="flexCheckboxDefault10" value = "baby corn">
                    <label class="form-check-label sriracha-regular font-menu" for="flexCheckboxDefault10">
                    baby corn
                    </label>
                    <p class="text-color-b noto-sans-thai" style="font-size: 15px;">+฿10.00</p>
                </div>
                <div class="col">
                    <img src="Photo/gypsum.webp" style="width: 100px;" alt=""><br>
                    <input class="form-check-input" type="checkbox" name="vegetables[]" id="flexCheckboxDefault11" value ="tofu skin">
                    <label class="form-check-label sriracha-regular font-menu" for="flexCheckboxDefault11">
                    tofu skin
                    </label>
                    <p class="text-color-b noto-sans-thai" style="font-size: 15px;">+฿15.00</p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="form-check sriracha-regular font-type">Noodle Selection
        <div class="container mt-3">
            <div class="row row-cols-4">
                <div class="col">
                    <img src="Photo/glassnoodle.jpg" style="width: 160px;" alt=""><br>
                    <input class="form-check-input" type="radio" name="noodles" id="flexRadioDefault12" value ="glass noodles" checked>
                    <label class="form-check-label sriracha-regular font-menu" for="flexRadioDefault12">
                    glass noodles
                    </label>
                    <p class="text-color-b noto-sans-thai" style="font-size: 15px;">+฿10.00</p>
                </div>
             
                <div class="col">
                    <img src="Photo/sweetpotatonoodles.jpg" style="width: 110px;" alt=""><br>
                    <input class="form-check-input" type="radio" name="noodles" id="flexRadioDefault14" value = "sweet potato noodles">
                    <label class="form-check-label sriracha-regular font-menu" for="flexRadioDefault14">
                    sweet potato noodles
                    </label>
                    <p class="text-color-b noto-sans-thai" style="font-size: 15px;">+฿10.00</p>
                </div>
                <div class="col">
                    <img src="Photo/noodleVet.webp" style="width: 170px;" alt=""><br>
                    <input class="form-check-input" type="radio" name="noodles" id="flexRadioDefault15" value = "veggie noodles">
                    <label class="form-check-label sriracha-regular font-menu" for="flexRadioDefault15">
                    veggie noodles
                    </label>
                    <p class="text-color-b noto-sans-thai" style="font-size: 15px;">+฿10.00</p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="form-check sriracha-regular font-type">Sauce Selection
        <div class="container mt-3">
            <div class="row row-cols-2">
                <div class="col">
                    <img src="Photo/saucebean.png" style="width: 150px;" alt=""><br><br>
                    <input class="form-check-input" type="radio" name="dip" id="flexRadioDefault16" value ="bean dip"checked>
                    <label class="form-check-label sriracha-regular font-menu" for="flexRadioDefault16">
                    bean dip
                    </label>
                    <p class="text-color-b noto-sans-thai" style="font-size: 15px;">free</p>
                </div>
                <div class="col">
                    <img src="Photo/saucesuki.png" style="width: 150px;" alt=""><br><br>
                    <input class="form-check-input" type="radio" name="dip" id="flexRadioDefault17" value ="suki dip">
                    <label class="form-check-label sriracha-regular font-menu" for="flexRadioDefault17">
                    suki dip
                    </label>
                    <p class="text-color-b noto-sans-thai" style="font-size: 15px;">free</p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="form-check sriracha-regular font-type">Spice Level Selection
        <div class="container mt-3">
            <div class="row row-cols-4">
                <div class="col">
                    <input class="form-check-input" type="radio" name="spice" id="flexRadioDefault18" value="100%" checked>
                    <label class="form-check-label sriracha-regular font-menu" for="flexRadioDefault18">
                        spicy 100 %
                    </label>
                </div>
                <div class="col">
                    <input class="form-check-input" type="radio" name="spice" id="flexRadioDefault19" value="50%">
                    <label class="form-check-label sriracha-regular font-menu" for="flexRadioDefault19">
                        spicy 50 %
                    </label>
                </div>
                <div class="col">
                    <input class="form-check-input" type="radio" name="spice" id="flexRadioDefault20" value="20%">
                    <label class="form-check-label sriracha-regular font-menu" for="flexRadioDefault20">
                        spicy 20 %
                    </label>
                </div>
                <div class="col">
                    <input class="form-check-input" type="radio" name="spice" id="flexRadioDefault21" value="0%">
                    <label class="form-check-label sriracha-regular font-menu" for="flexRadioDefault21">
                    not spicy
                    </label>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="form-check sriracha-regular font-type">Quantity Selection
        <div class="container mt-3">
            <div class="row row-cols-4">
                <div class="col">
                    <input class="form-check-input" type="radio" name="quantity" id="flexRadioDefault22" value = 1 checked>
                    <label class="form-check-label sriracha-regular font-menu" for="flexRadioDefault22">
                        1 bowl
                    </label>
                </div>
                <div class="col">
                    <input class="form-check-input" type="radio" name="quantity" id="flexRadioDefault23" value = 2>
                    <label class="form-check-label sriracha-regular font-menu" for="flexRadioDefault23">
                        2 bowls
                    </label>
                </div>
                <div class="col">
                    <input class="form-check-input" type="radio" name="quantity" id="flexRadioDefault23" value =3>
                    <label class="form-check-label sriracha-regular font-menu" for="flexRadioDefault23">
                        3 bowls
                    </label>
                </div>
                <div class="col">
                    <input class="form-check-input" type="radio" name="quantity" id="flexRadioDefault23" value =4>
                    <label class="form-check-label sriracha-regular font-menu" for="flexRadioDefault23">
                        4 bowls
                    </label>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
<footer>
    <button type="submit" name="submit" class="btn btn-outline-warning position-absolute end-0 btn-lg">
    Confirm Orders
       </button></form>

</footer>
</html>