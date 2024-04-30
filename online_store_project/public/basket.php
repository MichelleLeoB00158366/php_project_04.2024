<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Basket</title>
    <link rel="stylesheet" href="../private/assets/css/styles.css"> <!-- Link to your CSS stylesheet -->
</head>
<body>

<?php include('../public/templates/header.php'); ?>

    <div class="main-content">
        <h2>Items in Your Basket</h2>
        <div class="basket-items">
            
            <div class="basket-item">
                <img src="../private/pics/green.png" alt="Green Stickers">
                <p>Green Stickers</p>
                <p>Quantity: 1</p>
                <p>Price: €1.99</p>                
                <button>Remove</button>
            </div>            
        </div>
          <p>Total Price: €1.99</p>
        <button>Proceed to Checkout</button>
    </div>

   
    <?php include('../public/templates/footer.php'); ?>
  

</body>
</html>
