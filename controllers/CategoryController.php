<?php 
include 'models/Category.php';
include 'config/database.php';

$db = new Database();
$category = new Category($db);

class CategoryController {
    public function index() {
        $category = new Category();
        $categories = $category->getAll();
        return $categories;
    }

    public function show($id) {
        $category = new Category();
        $categoryData = $category->getById($id);
        return $categoryData;
    }

    public function create($name, $description) {
        $category = new Category();
        $result = $category->create($name, $description);

        if ($result) {
            return "Categoría creada exitosamente.";
        } else {
            return "Error al crear la categoría.";
        }
    }

    public function edit($id, $name, $description) {
        $category = new Category();
        $result = $category->update($id, $name, $description);

        if ($result) {
            return "Categoría actualizada exitosamente.";
        } else {
            return "Error al actualizar la categoría.";
        }
    }

    public function delete($id) {
        $category = new Category();
        $result = $category->delete($id);

        if ($result) {
            return "Categoría eliminada exitosamente.";
        } else {
            return "Error al eliminar la categoría.";
        }
    }
}
// response view 
$categoryController = new CategoryController();
$response = $categoryController->index();

header('Content-Type: application/json'); 
echo json_encode($response);
?>
