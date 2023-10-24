<?php 
include 'models/OrderDetail.php';

include 'config/database.php';

$db = new Database();
$orderDetail = new OrderDatail($db);


class OrderDetailController {
    public function index() {
        $orderDetail = new OrderDetail();
        $orderDetails = $orderDetail->getAll();
        return $orderDetails;
    }

    public function show($id) {
        $orderDetail = new OrderDetail();
        $orderDetailData = $orderDetail->getById($id);
        return $orderDetailData;
    }

    public function create($orderId, $productId, $quantity, $price) {
        $orderDetail = new OrderDetail();
        $result = $orderDetail->create($orderId, $productId, $quantity, $price);

        if ($result) {
            return "Detalle de orden creado exitosamente.";
        } else {
            return "Error al crear el detalle de orden.";
        }
    }

    public function edit($id, $quantity, $price) {
        $orderDetail = new OrderDetail();
        $result = $orderDetail->update($id, $quantity, $price);

        if ($result) {
            return "Detalle de orden actualizado exitosamente.";
        } else {
            return "Error al actualizar el detalle de orden.";
        }
    }

    public function delete($id) {
        $orderDetail = new OrderDetail();
        $result = $orderDetail->delete($id);

        if ($result) {
            return "Detalle de orden eliminado exitosamente.";
        } else {
            return "Error al eliminar el detalle de orden.";
        }
    }
}
$orderDetailController = new OrderDetailController();
$response = $orderDetailController->index();

header('Content-Type: application/json'); 
echo json_encode($response);
?>
