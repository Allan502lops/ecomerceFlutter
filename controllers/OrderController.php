<?php 
include 'models/Order.php';

include 'config/database.php';

$db = new Database();
$order = new Order($db);

class OrderController {
    public function index() {
        $order = new Order();
        $orders = $order->getAll();
        return $orders;
    }

    public function show($id) {
        $order = new Order();
        $orderData = $order->getById($id);
        return $orderData;
    }

    public function create($userId, $date, $status, $total) {
        $order = new Order();
        $result = $order->create($userId, $date, $status, $total);

        if ($result) {
            return "Orden creada exitosamente.";
        } else {
            return "Error al crear la orden.";
        }
    }

    public function edit($id, $status) {
        $order = new Order();
        $result = $order->update($id, $status);

        if ($result) {
            return "Orden actualizada exitosamente.";
        } else {
            return "Error al actualizar la orden.";
        }
    }

    public function delete($id) {
        $order = new Order();
        $result = $order->delete($id);

        if ($result) {
            return "Orden eliminada exitosamente.";
        } else {
            return "Error al eliminar la orden.";
        }
    }
}

$orderController = new OrderController();
$response = $orderController->index();

header('Content-Type: application/json'); 
echo json_encode($response);
?>