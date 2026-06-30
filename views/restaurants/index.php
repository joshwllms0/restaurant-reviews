<?php include __DIR__ . '/../layouts/header.php'; ?>

<h1>Restaurants</h1>

<div class="top-nav">
    <a href="?controller=restaurant&action=create" class="btn">Add Restaurant</a>
</div>


<?php if (!empty($restaurants)): ?>


        <?php foreach ($restaurants as $restaurant): ?>
            <div class="card">
                <h3>
                    <?= htmlspecialchars($restaurant['name']) ?>
                </h3>

                <p>
                    <?= htmlspecialchars($restaurant['address']) ?>
                </p>

                <p>
                    <?= htmlspecialchars($restaurant['cuisine_type']) ?>
                </p>

                <div class="card-actions">
                    <a href="?controller=restaurant&action=show&id=<?= $restaurant['id'] ?>">View</a>
                    |
                    <a href="?controller=restaurant&action=edit&id=<?= $restaurant['id'] ?>">Edit</a>
                    |
                    <a href="?controller=restaurant&action=delete&id=<?= $restaurant['id'] ?>"
                       onclick="return confirm('Delete this restaurant?');">
                        Delete
                    </a>
                </div>
            </div>
        <?php endforeach; ?>

        </div>

<?php else: ?>
<div class="empty-state">
    <p>No restaurants found.</p>
</div>
<?php endif; ?>
<?php include __DIR__ . '/../layouts/footer.php'; ?>