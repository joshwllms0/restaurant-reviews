
<?php include __DIR__ . '/../layouts/header.php'; ?>

<h1><?= htmlspecialchars($restaurant['name']) ?></h1>

<p>ID: <?= $restaurant['id'] ?></p>

<a href="?controller=restaurant&action=index">
    Back
</a>