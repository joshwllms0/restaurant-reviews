
<?php include __DIR__ . '/../layouts/header.php'; ?>

<h1>Leave a Review for <?= htmlspecialchars($restaurant['name']) ?></h1>

<form method="POST" action="?controller=review&action=store&restaurant_id=<?= $restaurant['id'] ?>">

    <label>Your Name:</label>
    <input type="text" name="reviewer_name" value="<?= htmlspecialchars($_COOKIE['reviewer_name'] ?? '') ?>" required>

    <label>Rating (1-5):</label>
    <input type="number" name="rating" min="1" max="5" value="<?= htmlspecialchares($_COOKIE['last_rating'] ?? '') ?>" required>

    <label>Comment:</label>
    <textarea name="comment" required></textarea>

    <button type="submit">Submit Review</button>

</form>

<a href="?controller=review&action=index&restaurant_id=<?= $restaurant['id'] ?>" class="btn">
    Back
</a>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
