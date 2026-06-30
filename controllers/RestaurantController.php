<?php
require_once __DIR__ . '/../models/RestaurantModel.php';

class RestaurantController {

    private $model;

    public function __construct() {
        $this->model = new RestaurantModel();
    }

    public function index() {
        $restaurants = $this->model->getAll();
        include __DIR__ . '/../views/restaurants/index.php';
    }

    public function create() {
    include __DIR__ . '/../views/restaurants/create.php';
    }
// store creates new restrurant and saves it to db
    public function store() {

    $name = trim($_POST['name'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $cuisineType = trim($_POST['cuisine_type'] ?? '');

    if ($name === '' || $address === '' || $cuisineType === '') {
        echo "All fields are required.";
        return;
    }

    $this->model->create(
        $name,
        $address,
        $cuisineType
    );

    $_SESSION['message'] = "Restaurant added successfully!";
   
    header("Location: index.php?action=index");
    exit;

    }

    // edit gets id of resurtant then goes to form
    public function edit($id) { 

    $restaurant = $this->model->getById($id);

    include __DIR__ . '/../views/restaurants/edit.php';
    }
    
    public function show($id) {

        $restaurant = $this->model->getById($id);

        include __DIR__ . '/../views/restaurants/show.php';
    }

    // update takes the id and updates resurant in db
    public function update($id) {
    
    $name = trim($_POST['name'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $cuisineType = trim($_POST['cuisine_type'] ?? '');

    if ($name === '' || $address === '' || $cuisineType === '') {
        echo "All fields are required.";
        return;
    }

    $this->model->update(
        $id,
        $name,
        $address,
        $cuisineType
    );

     $_SESSION['message'] = "Restaurant updated successfully!";

    header("Location: index.php?action=index");
    exit;
    }
    // delete takes id and deletes it from db
    public function delete($id) {

    $this->model->delete($id);

    $_SESSION['message'] = "Restaurant deleted successfully!";

    header("Location: index.php?action=index");
    exit;
    }

   

}