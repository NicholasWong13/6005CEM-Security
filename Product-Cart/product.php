<?php

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);

    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$product) {
        
        exit('Product does not exist!');
    }
} else {
    
    exit('Product does not exist!');
}
?>

<?=template_header('Product')?>

<div class="product content-wrapper">
    <img src="<?=$product['photo']?>" width="500" height="500" alt="<?=$product['name']?>">
    <div>
        <h1 class="name"><?=$product['name']?></h1>
        <span class="price">
            RM<?=$product['price']?>
            <?php if ($product['discount'] > 0): ?>
            <span class="discount">RM<?=$product['discount']?></span>
            <?php endif; ?>
        </span><br/>
        Description: <div class="description" align="justify">
            <?=$product['description']?>
        </div>
        <form action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['id']?>">
            <input type="submit" value="Add To Cart">
        </form>
        
    </div>
</div>
