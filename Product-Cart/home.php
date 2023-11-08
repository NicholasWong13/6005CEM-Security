<?php
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_view DESC LIMIT 4');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Products')?>
	<div class="recentlyadded content-wrapper">
    <h2>Mostly Viewed Products</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="<?=$product['photo']?>" width="200" height="200" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <span class="price">
                RM<?=$product['price']?>
                <?php if ($product['discount'] > 0): ?>
                <span class="discount">RM<?=$product['discount']?></span>
                <?php endif; ?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

