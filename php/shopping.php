<!DOCTYPE html>
<html lang="en">
<?php include './connect.php'; ?>

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
        <div class="shopping">
            <div class="header">
                <a class="logo"><i class="ri-cactus-line"></i><span>My Cactus</span></a>
                <div class="search">
                    <!-- ajax search -->
                    <div class="form">
                        <input type="text" placeholder="Search...">
                        <button><i class="fa-solid fa-magnifying-glass"></i> Search</button>
                    </div>
                </div>
            </div>

            <?php
                $stmt = $pdo->prepare("SELECT *,specise.specise_id,specise.sname FROM product JOIN specise ON specise.specise_id = product.specise_id WHERE specise.specise_id =1;");
                $stmt->execute(); 
                $row = $stmt->fetch();
            ?>
            
            
            <h2>SPECISE: <?php echo $row["sname"]; ?></h2>
            
            <div class="img-head">
                <img src='../image/img_specise/<?=$row["specise_id"]?>.jpg'>
                <!-- <img src="img/1.jpg"> -->
            </div>
            
            <div class="list">
                <?php $counter = 1; while($row = $stmt->fetch()):?> 
                <div class="item" data-key="<?= $counter ?>">
                    <div class="img">
                        <img src='../image/img_product/<?=$row["pname"]?>.jpg'>
                        <!-- <img src="img1.png" alt=""> -->
                    </div>
                    <div class="content">
                        <div class="title">
                             <?=$row["pname"]?>
                        </div>

                        <div class="des">
                            <?=$row["pdetail"]?>
                        </div>
                        <div class="price">
                            <?=$row["price"]?> บาท
                        </div>
                        <input type="number" class="count" min="1" value="1">
                        <button class="add">Add to cart</button>
                        <button class="remove" onclick="Remove(1)"><i class="fa-solid fa-trash-can"></i></button>
                    </div>
                </div>
                <?php  $counter++; endwhile;?>    
    
            </div>
            
        </div>

        <div class="cart">
            <div class="">
            <div class="name">CART</div>
            <div class="listCart"></div>
            <div class="payment">
                <div class="text">
                    จำนวนสินค้าทั้งหมด ต้น<br>
                    ราคารวม <!-- sum price--> บาท
                </div>
                <a class="pay" href="payment.html"">ชำระเงิน</a>
            </div>
            </div>
        </div>
    </div>
    

    <script src="../js/js2.js"></script>
</body>
</html>
