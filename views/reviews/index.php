
<?php include __DIR__ . '/../layouts/header.php'; ?>

<h1>Reviews for <?= htmlspecialchars($restaurant['name']) ?></h1>

<div class="top-nav">
    <a href="?controller=review&action=create&restaurant_id=<?= $restaurant['id'] ?>" class="btn">
        Leave a Review
    </a>
</div>

<?php if (empty($reviews)): ?>
    <div class="empty-state">
        <p>No reviews yet.</p>
    </div>
<?php else: ?>
    <?php foreach ($reviews as $review): ?>
        <div class="review-card">
            <strong><?= htmlspecialchars($review['reviewer_name']) ?></strong>
            <span class="rating"><?= htmlspecialchars($review['rating']) ?>/5</span>
            <p><?= htmlspecialchars($review['comment']) ?></p>

            <div class="card-actions">
                <a href="?controller=review&action=edit&id=<?= $review['id'] ?>">
                    Edit
                </a>
                <a href="?controller=review&action=delete&id=<?= $review['id'] ?>&restaurant_id=<?= $restaurant['id'] ?>"
                   onclick="return confirm('Delete this review?');">
                    Delete
                </a>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<a href="?controller=restaurant&action=index">
    Back to Restaurants
</a>

<?php include __DIR__ . '/../layouts/footer.php'; ?>

