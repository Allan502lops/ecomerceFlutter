<?php 
include 'models/Invoice.php';
include 'config/database.php';

$db = new Database();
$invoice= new Invoice($db);



class InvoiceController {
    public function index() {
        $invoice = new Invoice();
        $invoices = $invoice->getAll();
        return $invoices;
    }

    public function show($id) {
        $invoice = new Invoice();
        $invoiceData = $invoice->getById($id);
        return $invoiceData;
    }

    public function create($orderId, $date, $total) {
        $invoice = new Invoice();
        $result = $invoice->create($orderId, $date, $total);

        if ($result) {
            return "Factura creada exitosamente.";
        } else {
            return "Error al crear la factura.";
        }
    }

    public function edit($id, $total) {
        $invoice = new Invoice();
        $result = $invoice->update($id, $total);

        if ($result) {
            return "Factura actualizada exitosamente.";
        } else {
            return "Error al actualizar la factura.";
        }
    }

    public function delete($id) {
        $invoice = new Invoice();
        $result = $invoice->delete($id);

        if ($result) {
            return "Factura eliminada exitosamente.";
        } else {
            return "Error al eliminar la factura.";
        }
    }
}
$invoiceController = new InvoiceController();
$response = $invoiceController->index();

header('Content-Type: application/json'); 
echo json_encode($response);
?>
