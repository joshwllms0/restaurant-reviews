<?php
require_once __DIR__ . '/../models/ReviewModel.php';
require_once __DIR__ . '/../models/RestaurantModel.php';

class ReviewController {

    private $model;
    private $restaurantModel;

    public function __construct() {
        $this->model = new ReviewModel();
        $this->restaurantModel = new RestaurantModel();
    }

    // index shows all reviews for one restaurant
    public function index($restaurantId) {
        $restaurant = $this->restaurantModel->getById($restaurantId);
        $reviews = $this->model->getByRestaurantId($restaurantId);
        include __DIR__ . '/../views/reviews/index.php';
    }

    // create shows the form to leave a new review for a restaurant
    public function create($restaurantId) {
        $restaurant = $this->restaurantModel->getById($restaurantId);
        include __DIR__ . '/../views/reviews/create.php';
    }

    // store saves the new review to the db
    public function store($restaurantId) {

        $reviewerName = trim($_POST['reviewer_name'] ?? '');
        $rating = $_POST['rating'] ?? '';
        $comment = trim($_POST['comment'] ?? '');

        if ($reviewerName === '' || $comment === '' || $rating < 1 || $rating > 5) {
            echo "All fields are required and rating must be between 1 and 5.";
            return;
        }

        $this->model->create(
            $restaurantId,
            $reviewerName,
            $rating,
            $comment
        );

        header("Location: index.php?controller=review&action=index&restaurant_id=" . $restaurantId);
        exit;
    }

    // edit gets id of review then goes to form
    public function edit($id) {

        $review = $this->model->getById($id);

        include __DIR__ . '/../views/reviews/edit.php';
    }

    // update takes the id and updates the review in db
    public function update($id) {

        $restaurantId = $_POST['restaurant_id'];
        $reviewerName = trim($_POST['reviewer_name'] ?? '');
        $rating = $_POST['rating'] ?? '';
        $comment = trim($_POST['comment'] ?? '');

        if ($reviewerName === '' || $comment === '' || $rating < 1 || $rating > 5) {
            echo "All fields are required and rating must be between 1 and 5.";
            return;
        }

        $this->model->update(
            $id,
            $reviewerName,
            $rating,
            $comment
        );

        header("Location: index.php?controller=review&action=index&restaurant_id=" . $restaurantId);
        exit;
    }

    // delete takes id and removes it from db
    public function delete($id) {

        $restaurantId = $_GET['restaurant_id'];

        $this->model->delete($id);

        header("Location: index.php?controller=review&action=index&restaurant_id=" . $restaurantId);
        exit;
    }

}
