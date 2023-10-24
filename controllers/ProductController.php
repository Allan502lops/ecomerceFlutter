<?php
include 'models/Product.php';
include 'config/database.php';

$db = new Database();
$product = new Product($db);

class ProductController {
    public function index() {
        global $product;
        $products = $product->getAll();
        echo json_encode($products);
    }

    public function show($id) {
        global $product;
        $productData = $product->getById($id);
        echo json_encode($productData);
    }

    public function create($name, $description, $price, $stock, $category_id) {
        global $product;
        $result = $product->create($name, $description, $price, $stock, $category_id);

        if ($result) {
            echo "Producto creado exitosamente.";
        } else {
            echo "Error al crear el producto.";
        }
    }

    public function edit($id, $name, $description, $price, $stock, $category_id) {
        global $product;
        $result = $product->update($id, $name, $description, $price, $stock, $category_id);

        if ($result) {
            echo "Producto actualizado exitosamente.";
        } else {
            echo "Error al actualizar el producto.";
        }
    }

    public function delete($id) {
        global $product;
        $result = $product->delete($id);

        if ($result) {
            echo "Producto eliminado exitosamente.";
        } else {
            echo "Error al eliminar el producto.";
        }
    }
}
?>
