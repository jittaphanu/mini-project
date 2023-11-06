<?php 
include "./config.php";
include "./connect.php";
$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : "";
$stmt = $pdo->prepare("SELECT * FROM product WHERE product.pdetail LIKE '" . $keyword . "%' ");
$counter = 1;
if ($stmt->execute()) {
    
    while ($row = $stmt->fetch()) {   
        echo '
        <div class="item" data-key="' . $counter . '">
            <div class="img">
                <img src="../image/img_product/' . $row["pname"] . '.jpg" alt="Product Image">
            </div>
            <div class="content">
                <div class="title">' . $row["pname"] . '</div>
                <div class="des">' . $row["pdetail"] . '</div>
                <div class="price">' . $row["price"] . ' บาท</div>
                <input type="number" class="count" min="1" value="1">
                <button class="add">Add to cart</button>
                <a href="cart.php?action=add&product_id='. $row['product_id'] . '&qty=1">Add to cart</a>
                <button class="remove" onclick="Remove(' . $counter . ')"><i class="fa-solid fa-trash-can"></i></button>
            </div>
        </div><script type="text/javascript" src="../js/js2.js"></script>';
        $counter++;
          
    }
   
}else{
    echo "Error";
   
}
?>
