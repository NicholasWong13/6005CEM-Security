<?php

if (isset($_GET['id'])) {
    // Validate that the provided ID is a positive integer
    $productId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    
    if ($productId === false) {
        exit('Invalid product ID!');
    }

    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$productId]);

    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$product) {
        exit('Product does not exist!');
    }
} else {
    exit('Product ID is missing!');
}

?>

<?=template_header('Product')?>

<div class="product content-wrapper">
    <img src="<?=htmlspecialchars($product['photo'])?>" width="500" height="500" alt="<?=htmlspecialchars($product['name'])?>">
    <div>
        <h1 class="name"><?=htmlspecialchars($product['name'])?></h1>
        <span class="price">
            RM<?=htmlspecialchars($product['price'])?>
            <?php if ($product['discount'] > 0): ?>
                <span class="discount">RM<?=htmlspecialchars($product['discount'])?></span>
            <?php endif; ?>
        </span><br/>
        Description: <div class="description" align="justify">
            <?=htmlspecialchars($product['description'])?>
        </div>
        <form action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=htmlspecialchars($product['quantity'])?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=htmlspecialchars($product['id'])?>">
            <input type="submit" value="Add To Cart">
        </form>
    </div>
</div>
