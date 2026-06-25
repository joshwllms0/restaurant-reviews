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

    $this->model->create(
        $_POST['name'],
        $_POST['address'],
        $_POST['cuisine_type']
    );

    header("Location: index.php?action=index");
    exit;

    }

    // edit gets id of resurtant then goes to form
    public function edit($id) { 

    $restaurant = $this->model->getById($id);

    include __DIR__ . '/../views/restaurants/edit.php';
    }

    // update takes the id and updates resurant in db
    public function update($id) {
    
    $this->model->update(
        $id,
        $_POST['name'],
        $_POST['address'],
        $_POST['cuisine_type']
    );

    header("Location: index.php?action=index");
    exit;
    }
    // delete takes id and deletes it from db
    public function delete($id) {

    $this->model->delete($id);

    header("Location: index.php?action=index");
    exit;
    }

   

}