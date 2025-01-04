<?php
require_once('connect.php');
$sql = "select * from order_details";
$result = $conn->query($sql);
if(isset($_POST["subm"])){
    $sqlu = "update order_details set serve_status = 'served'";
    $conn->query($sqlu); 
}
?>
<DOCTYPE! html>
    <html lang="th">

    <head>
        <meta charset="UFT-8">
        <meta name="viewport" content="width=device-width,initial-scale = 1.0">
        <link rel="stylesheet" href="style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
        <title>shop cus</title>
        <style>
            table {
                border: 3px solid black;
                border-collapse: collapse;
               
              
            }
            button{
                position: static;
                right: 100px;
            }

            body {
                font-family: "Sriracha", cursive;
                font-weight: 400;
                font-style: normal;
                /*padding-top: 110px;*/
            }
            .move{

                padding-top: 110px;
            }
           a{
            color: black;
           }
        </style>
      
    </head>

    <body>

    <nav class = "header-cart">
    <img class="image-headerlogo" src="Photo\logo.png" />
    <a class="navbar-brand text-color-w sriracha-regular text-position-name" href="supplier.php"><h1><font style="color:antiquewhite;">Service</font><h1></a>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
       
    <div class="container-sm">
           <div class = "move"> <table class="table table-striped"  >
                <tr>

                    <td>Order_Id</td>
                    <td>soup</td>
                    <td>meat</td>
                    <td>vegetable</td>
                    <td>noodles</td>
                    <td>dip</td>
                    <td>spice</td>
                    <td>quantity</td>
                    <td>Serve_status</td>
                </tr>
                <tr>

                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                        <td><?php echo $row['order_id'];?></td>
                        <td><?php echo $row['soup'];?></td>
                        <td><?php echo $row['meat'];?></td>
                        <td><?php echo $row['vegetable'];?></td>
                        <td><?php echo $row['noodles'];?></td>
                        <td><?php echo $row['dip'];?></td>
                        <td><?php echo $row['spice'];?></td>
                        <td><?php echo $row['quantity'];?></td>
                        <td><?php if($row['serve_status']==null){
                                echo "<font style =color:red;>haven't served</font>";
                        }else{
                            echo "<font style =color:green;>served</font>";}
                                ?></td>
                      
                        

                </tr>
                    <?php
                    
                
                }
                    ?>

               

            </table>
            <form action="" method="post" >
            <button type="submit" class="btn btn-success" name = "subm" value>Serve</button>
           </form>
           <button class="btn btn-warning" ><a  href="supplier.php">shop_supplier</a></button>
           <button class="btn btn-warning"  ><a  href="shop_payment.php">shop_payment</a></button>
            
        </div>
    </body>

    </html>