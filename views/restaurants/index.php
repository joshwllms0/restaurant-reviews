<?php include __DIR__ . '/../layouts/header.php'; ?>




<h1>Restaurants</h1>

<a href="?controller=restaurant&action=create">+ Add Restaurant</a>

<hr>

<?php if (!empty($restaurants)): ?>

    <table border="1" cellpadding="10">
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Cuisine</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($restaurants as $restaurant): ?>
            <tr>
                <td>
                    <?= htmlspecialchars($restaurant['name']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($restaurant['address']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($restaurant['cuisine_type']) ?>
                </td>

                <td>
                    <a href="?controller=restaurant&action=show&id=<?= $restaurant['id'] ?>">View</a>
                    |
                    <a href="?controller=restaurant&action=edit&id=<?= $restaurant['id'] ?>">Edit</a>
                    |
                    <a href="?controller=restaurant&action=delete&id=<?= $restaurant['id'] ?>"
                       onclick="return confirm('Delete this restaurant?');">
                        Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

<?php else: ?>

    <p>No restaurants found.</p>

<?php endif; ?>