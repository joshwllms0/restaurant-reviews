<?php include __DIR__ . '/../layouts/header.php'; ?>

<h1>Edit Restaurant</h1>

<form method="POST" action="index.php?action=update&id=<?= $restaurant['id'] ?>">

    <label>Name</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($restaurant['name']) ?>" required><br><br>

    <label>Address</label><br>
    <input type="text" name="address" value="<?= htmlspecialchars($restaurant['address']) ?>" required><br><br>

    <label>Cuisine Type</label><br>
    <input type="text" name="cuisine_type" value="<?= htmlspecialchars($restaurant['cuisine_type']) ?>" required><br><br>

    <button type="submit">Update</button>

</form>

<?php include __DIR__ . '/../layouts/footer.php'; ?>