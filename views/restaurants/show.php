
<?php include __DIR__ . '/../layouts/header.php'; ?>

<h1><?= htmlspecialchars($restaurant['name']) ?></h1>

<div class="top-nav" style="margin-top: 18px;">
    <a href="?controller=review&action=index&restaurant_id=<?= $restaurant['id'] ?>" class="btn">
        View Reviews
    </a>
</div>

<div class="card" style="max-width: 400px;">
    <p><?= htmlspecialchars($restaurant['address']) ?></p>
    <p><?= htmlspecialchars($restaurant['cuisine_type']) ?></p>
</div>

<a href="?controller=restaurant&action=index">
    Back
</a>

<?php include __DIR__ . '/../layouts/footer.php'; ?>