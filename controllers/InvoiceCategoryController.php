<?php 
include 'models/InvoiceCategory.php';
include 'config/database.php';

$db = new Database();
$invoiceCategory = new InvoiceCategory($db);

class InvoiceCategoryController {
    public function index() {
        $category = new InvoiceCategory();
        $categories = $category->getAll();
        return $categories;
    }

    public function show($id) {
        $category = new InvoiceCategory();
        $categoryData = $category->getById($id);
        return $categoryData;
    }

    public function create($name, $start_date, $end_date) {
        $category = new InvoiceCategory();
        $result = $category->create($name, $start_date, $end_date);

        if ($result) {
            return "Categoría de factura creada exitosamente.";
        } else {
            return "Error al crear la categoría de factura.";
        }
    }

    public function edit($id, $name, $start_date, $end_date) {
        $category = new InvoiceCategory();
        $result = $category->update($id, $name, $start_date, $end_date);

        if ($result) {
            return "Categoría de factura actualizada exitosamente.";
        } else {
            return "Error al actualizar la categoría de factura.";
        }
    }

    public function delete($id) {
        $category = new InvoiceCategory();
        $result = $category->delete($id);

        if ($result) {
            return "Categoría de factura eliminada exitosamente.";
        } else {
            return "Error al eliminar la categoría de factura.";
        }
    }
}
$invoiceCategoryController = new InvoiceCategoryController();
$response = $invoiceCategoryController->index();

header('Content-Type: application/json');
echo json_encode($response);
?>

