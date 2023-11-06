<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
    include './connect.php'; 
    include './config.php';
    
    if (isset($_SESSION['specise_id'])) {
        $specise_id = $_SESSION['specise_id'];
        $url = "./shopping.php?specise_id=$specise_id";
       
    } else {
        $url = "./shopping1.php";
    }
    if($_GET["action"]=="add"){
       
        $pid = $_GET['product_id'];
        $sql = "SELECT * FROM product  WHERE product_id = '$pid'";
        $rs  = $conn->query($sql);
        $row = $rs->fetch_assoc();
        $cart_item = array(
            'product_id' => $row['product_id'],
            'pdetail'=> $row['pdetail'],
            'pname' => $row['pname'],
            'price'=> $row['price'],
            'qty' => $_GET['qty']
        );
        if(empty($_SESSION['cart'])){
            $_SESSION['cart']=array();
        }
        if(array_key_exists($pid,$_SESSION['cart'])){
            $_SESSION['cart'][$pid]['qty'] += $_GET['qty'];
        }else{
            $_SESSION['cart'][$pid] = $cart_item;
        }

    }else if($_GET['action']== "update"){
        $pid = $_GET['product_id'];
        $qty = $_GET['qty'];
        $_SESSION['cart'][$pid]['qty'] = $qty;
    }else if($_GET['action']== "remove"){
        $pid = $_GET['product_id'];
        unset($_SESSION['cart'][$pid]);
    }
    
    

    
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/shop.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="cart">
            <a href="<?=$url?>"><i class="fa-solid fa-arrow-left"></i></a>
                <div class="name">CART</div>
                
                <?php foreach ($_SESSION['cart'] as $item) { ?>
                <div class="listCart">
                    <div class="item" data-key="1"> 
                        
                        <div class="img">
                            <img src='../image/img_product/<?=$item["pname"]?>.jpg'>
                                
                        </div>
                        <div class="content"> 
                                
                            <div class="title">
                                <?=$item["pname"]?>
                            </div>

                            <div class="des">
                                <?=$item["pdetail"]?>
                            </div>
                            <div class="price">
                                <?=$item["price"]?> บาท
                            </div>
                            <input type="number" class="count" min="1" value="<?=$item['qty']?>">
                            <a href="?action=remove&product_id=<?=$item['product_id']?>">Remove</a>
                        
                        </div>
                    
                    </div>
                </div>
                <?php }?>
        </div>

        <div class="payment">
            <div class="text">
                จำนวนทั้งหมด ต้น
                ราคารวม <!-- sum price--> บาท
            </div>
            <a class="pay" href="payment1.php">ชำระเงิน</a>
            
        </div>
    </div>


    <script src="../js/js2.js"></script>
</body>
</html>
