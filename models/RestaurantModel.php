<?php
require_once __DIR__ . '/Database.php';

class RestaurantModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    // Get all restaurants
    public function getAll(): array {
        $stmt = $this->db->query("SELECT * FROM restaurants ORDER BY name ASC");
        return $stmt->fetchAll();
    }

    // Get a single restaurant by ID
    public function getById(int $id): array|false {
        $stmt = $this->db->prepare("SELECT * FROM restaurants WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Create a new restaurant, returns the new ID
    public function create(string $name, string $address, string $cuisineType): string {
        $stmt = $this->db->prepare(
            "INSERT INTO restaurants (name, address, cuisine_type, created_at)
             VALUES (:name, :address, :cuisine_type, NOW())"
        );
        $stmt->execute([
            'name' => $name,
            'address' => $address,
            'cuisine_type' => $cuisineType,
        ]);
        return $this->db->lastInsertId();
    }

    // Update an existing restaurant
    public function update(int $id, string $name, string $address, string $cuisineType): bool {
        $stmt = $this->db->prepare(
            "UPDATE restaurants
             SET name = :name, address = :address, cuisine_type = :cuisine_type
             WHERE id = :id"
        );
        return $stmt->execute([
            'id' => $id,
            'name' => $name,
            'address' => $address,
            'cuisine_type' => $cuisineType,
        ]);
    }

    // Delete a restaurant
    public function delete(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM restaurants WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
