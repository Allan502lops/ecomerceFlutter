<?php

$request = $_SERVER['REQUEST_URI'];

include 'controllers/ProductController.php';
include 'controllers/CategoryController.php';
include 'controllers/UserController.php';
include 'controllers/OrderController.php';
include 'controllers/OrderDatailController.php';
include 'controllers/InvoiceController.php';
include 'controllers/RoleController.php';
include 'controllers/InvoiceCategoryController.php';


switch ($request) {
    // Product Endpoints
    case '/api/products':
        $productController = new ProductController();
        echo json_encode($productController->index());
        break;
    case '/api/products/create':
        // Código para crear un nuevo producto
        break;
    case '/api/products/{id}':
        $id = $_GET['id'];
        $productController = new ProductController();
        echo json_encode($productController->show($id));
        break;
    case '/api/products/edit/{id}':
        $id = $_GET['id'];
        // Obtener los datos del producto a editar desde la solicitud
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $category_id = $_POST['category_id'];
        $productController = new ProductController();
        echo json_encode($productController->edit($id, $name, $description, $price, $stock, $category_id));
        break;
    case '/api/products/delete/{id}':
        $id = $_GET['id'];
        $productController = new ProductController();
        echo json_encode($productController->delete($id));
        break;

    // Category Endpoints
    case '/api/categories':
        $categoryController = new CategoryController();
        echo json_encode($categoryController->index());
        break;
    case '/api/categories/create':
        // Código para crear una nueva categoría
        break;
    case '/api/categories/{id}':
        $id = $_GET['id'];
        $categoryController = new CategoryController();
        echo json_encode($categoryController->show($id));
        break;
    case '/api/categories/edit/{id}':
        $id = $_GET['id'];
        // Obtener los datos de la categoría a editar desde la solicitud
        $name = $_POST['name'];
        $description = $_POST['description'];
        $categoryController = new CategoryController();
        echo json_encode($categoryController->edit($id, $name, $description));
        break;
    case '/api/categories/delete/{id}':
        $id = $_GET['id'];
        $categoryController = new CategoryController();
        echo json_encode($categoryController->delete($id));
        break;

    // User Endpoints
    case '/api/users':
        $userController = new UserController();
        echo json_encode($userController->index());
        break;
    case '/api/users/create':
        // Código para crear un nuevo usuario
        break;
    case '/api/users/{id}':
        $id = $_GET['id'];
        $userController = new UserController();
        echo json_encode($userController->show($id));
        break;
    case '/api/users/edit/{id}':
        $id = $_GET['id'];
        // Obtener los datos del usuario a editar desde la solicitud
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $userController = new UserController();
        echo json_encode($userController->edit($id, $name, $email, $password, $role));
        break;
    case '/api/users/delete/{id}':
        $id = $_GET['id'];
        $userController = new UserController();
        echo json_encode($userController->delete($id));
        break;

    // Order Endpoints
    case '/api/orders':
        $orderController = new OrderController();
        echo json_encode($orderController->index());
        break;
    case '/api/orders/create':
        // Código para crear una nueva orden
        break;
    case '/api/orders/{id}':
        $id = $_GET['id'];
        $orderController = new OrderController();
        echo json_encode($orderController->show($id));
        break;
    case '/api/orders/edit/{id}':
        $id = $_GET['id'];
        // Obtener los datos de la orden a editar desde la solicitud
        $userId = $_POST['user_id'];
        $date = $_POST['date'];
        $status = $_POST['status'];
        $total = $_POST['total'];
        $orderController = new OrderController();
        echo json_encode($orderController->edit($id, $userId, $date, $status, $total));
        break;
    case '/api/orders/delete/{id}':
        $id = $_GET['id'];
        $orderController = new OrderController();
        echo json_encode($orderController->delete($id));
        break;

    // OrderDetail Endpoints
    case '/api/order-details':
        $orderDetailController = new OrderDetailController();
        echo json_encode($orderDetailController->index());
        break;
    case '/api/order-details/create':
        // Código para crear un nuevo detalle de orden
        break;
    case '/api/order-details/{id}':
        $id = $_GET['id'];
        $orderDetailController = new OrderDetailController();
        echo json_encode($orderDetailController->show($id));
        break;
    case '/api/order-details/edit/{id}':
        $id = $_GET['id'];
        // Obtener los datos del detalle de orden a editar desde la solicitud
        $orderId = $_POST['order_id'];
        $productId = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $orderDetailController = new OrderDetailController();
        echo json_encode($orderDetailController->edit($id, $orderId, $productId, $quantity, $price));
        break;
    case '/api/order-details/delete/{id}':
        $id = $_GET['id'];
        $orderDetailController = new OrderDetailController();
        echo json_encode($orderDetailController->delete($id));
        break;

    // Invoice Endpoints
    case '/api/invoices':
        $invoiceController = new InvoiceController();
        echo json_encode($invoiceController->index());
        break;
    case '/api/invoices/create':
        // Código para crear una nueva factura
        break;
    case '/api/invoices/{id}':
        $id = $_GET['id'];
        $invoiceController = new InvoiceController();
        echo json_encode($invoiceController->show($id));
        break;
    case '/api/invoices/edit/{id}':
        $id = $_GET['id'];
        // Obtener los datos de la factura a editar desde la solicitud
        $orderId = $_POST['order_id'];
        $date = $_POST['date'];
        $total = $_POST['total'];
        $invoiceController = new InvoiceController();
        echo json_encode($invoiceController->edit($id, $orderId, $date, $total));
        break;
    case '/api/invoices/delete/{id}':
        $id = $_GET['id'];
        $invoiceController = new InvoiceController();
        echo json_encode($invoiceController->delete($id));
        break;

    // Role Endpoints
    case '/api/roles':
        $roleController = new RoleController();
        echo json_encode($roleController->index());
        break;
    case '/api/roles/create':
        // Código para crear un nuevo rol
        break;
    case '/api/roles/{id}':
        $id = $_GET['id'];
        $roleController = new RoleController();
        echo json_encode($roleController->show($id));
        break;
    case '/api/roles/edit/{id}':
        $id = $_GET['id'];
        // Obtener los datos del rol a editar desde la solicitud
        $name = $_POST['name'];
        $roleController = new RoleController();
        echo json_encode($roleController->edit($id, $name));
        break;
    case '/api/roles/delete/{id}':
        $id = $_GET['id'];
        $roleController = new RoleController();
        echo json_encode($roleController->delete($id));
        break;

    // InvoiceCategory Endpoints
    case '/api/invoice-categories':
        $invoiceCategoryController = new InvoiceCategoryController();
        echo json_encode($invoiceCategoryController->index());
        break;
    case '/api/invoice-categories/create':
        // Código para crear una nueva categoría de factura
        break;
    case '/api/invoice-categories/{id}':
        $id = $_GET['id'];
        $invoiceCategoryController = new InvoiceCategoryController();
        echo json_encode($invoiceCategoryController->show($id));
        break;
    case '/api/invoice-categories/edit/{id}':
        $id = $_GET['id'];
        // Obtener los datos de la categoría de factura a editar desde la solicitud
        $name = $_POST['name'];
        $startDate = $_POST['start_date'];
        $endDate = $_POST['end_date'];
        $invoiceCategoryController = new InvoiceCategoryController();
        echo json_encode($invoiceCategoryController->edit($id, $name, $startDate, $endDate));
        break;
    case '/api/invoice-categories/delete/{id}':
        $id = $_GET['id'];
        $invoiceCategoryController = new InvoiceCategoryController();
        echo json_encode($invoiceCategoryController->delete($id));
        break;

    default:
        http_response_code(404);
        echo json_encode(['error' => 'Endpoint no encontrado']);
        break;
}
?>