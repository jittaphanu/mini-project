<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
$username= $_SESSION['user_name'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update profile</title>
    <link href ="../css/history.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<section class="vh-100 gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-10 col-lg-8 col-xl-6">
        <div class="card card-stepper" style="border-radius: 16px;">
          <div class="card-header p-4">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <p class="text-muted mb-0"> Hello, <span class="fw-bold text-body"><?=$username?></span> </p>
              </div>
            </div>
          </div>
          <div class="card-body p-4">
            <?php 
                    $sum = 0;
                    $sql = "SELECT * FROM lists JOIN orders ON orders.order_id=lists.order_id JOIN product ON product.product_id=lists.product_id JOIN member ON member.member_id=orders.member_id";
                    $rs = $conn->query($sql);
                    while ($row = $rs->fetch_assoc()) {
                        $imageFileName = $row['pname'] . '.jpg'; 
                        $imagePath = '../image/img_product/' . $imageFileName;
                ?>     
            <div class="d-flex flex-row mb-4 pb-2">
                
              <div class="flex-fill">
                <h5 class="bold"><?=$row['pname']?> </h5>
                <p class="text-muted"> Qt: <?=$row['order_quatity']?>  item</p>
                <h4 class="mb-3"> <?=$row['price']?> ฿ <span class="small text-muted"> </span></h4>
                <p class="text-muted">Order on: <span class="text-body"><?=$row['date']?>, <?=$row['time']?></span></p>
                <p class="text-muted">Account: <span class="text-body"><?=$row['username']?></span></p>
                <p class="text-muted">Address: <span class="text-body"><?=$row['address']?></span></p>
              </div>
              <div>
                <img class="align-self-center img-fluid"
                  src="<?php echo $imagePath; ?>" width="250">
              </div>
            </div>
            <?php } ?>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>