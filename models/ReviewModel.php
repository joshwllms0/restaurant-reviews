<?php
require_once __DIR__ . '/Database.php';

class ReviewModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    // Get all reviews for a specific restaurant
    public function getByRestaurantId(int $restaurantId): array {
        $stmt = $this->db->prepare(
            "SELECT * FROM reviews WHERE restaurant_id = :restaurant_id ORDER BY created_at DESC"
        );
        $stmt->execute(['restaurant_id' => $restaurantId]);
        return $stmt->fetchAll();
    }

    // Get a single review by ID
    public function getById(int $id): array|false {
        $stmt = $this->db->prepare("SELECT * FROM reviews WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Create a new review, returns the new ID
    public function create(int $restaurantId, string $reviewerName, int $rating, string $comment): string {
        $stmt = $this->db->prepare(
            "INSERT INTO reviews (restaurant_id, reviewer_name, rating, comment, created_at)
             VALUES (:restaurant_id, :reviewer_name, :rating, :comment, NOW())"
        );
        $stmt->execute([
            'restaurant_id' => $restaurantId,
            'reviewer_name' => $reviewerName,
            'rating' => $rating,
            'comment' => $comment,
        ]);
        return $this->db->lastInsertId();
    }

    // Update an existing review
    public function update(int $id, string $reviewerName, int $rating, string $comment): bool {
        $stmt = $this->db->prepare(
            "UPDATE reviews
             SET reviewer_name = :reviewer_name, rating = :rating, comment = :comment
             WHERE id = :id"
        );
        return $stmt->execute([
            'id' => $id,
            'reviewer_name' => $reviewerName,
            'rating' => $rating,
            'comment' => $comment,
        ]);
    }

    // Delete a review
    public function delete(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM reviews WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
