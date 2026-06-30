
<?php include __DIR__ . '/../layouts/header.php'; ?>

<h1>Edit Review</h1>

<form method="POST" action="?controller=review&action=update&id=<?= $review['id'] ?>">

    <input type="hidden" name="restaurant_id" value="<?= $review['restaurant_id'] ?>">

    <label>Your Name:</label>
    <input type="text" name="reviewer_name" value="<?= htmlspecialchars($review['reviewer_name']) ?>" required>

    <label>Rating (1-5):</label>
    <input type="number" name="rating" min="1" max="5" value="<?= htmlspecialchars($review['rating']) ?>" required>

    <label>Comment:</label>
    <textarea name="comment" required><?= htmlspecialchars($review['comment']) ?></textarea>

    <button type="submit">Update Review</button>

</form>

<a href="?controller=review&action=index&restaurant_id=<?= $review['restaurant_id'] ?>" class="btn">
    Back
</a>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
