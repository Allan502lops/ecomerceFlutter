<?php 
include 'models/User.php';

include 'config/database.php';

$db = new Database();
$User = new User($db);

class UserController {
    public function index() {
        $user = new User();
        $users = $user->getAll();
        return $users;
    }

    public function show($id) {
        $user = new User();
        $userData = $user->getById($id);
        return $userData;
    }

    public function create($name, $email, $password, $role) {
        // hashear la contrasena del usuario
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $user = new User();
        $result = $user->create($name, $email, $hashed_password, $role);

        if ($result) {
            return "Usuario creado exitosamente.";
        } else {
            return "Error al crear el usuario.";
        }
    }

    public function edit($id, $name, $email, $password, $role) {
        // Si se quiere editar la contraseña, encriptarla nuevamente
        if (!empty($password)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $hashed_password = null;
        }

        $user = new User();
        $result = $user->update($id, $name, $email, $hashed_password, $role);

        if ($result) {
            return "Usuario actualizado exitosamente.";
        } else {
            return "Error al actualizar el usuario.";
        }
    }

    public function delete($id) {
        $user = new User();
        $result = $user->delete($id);

        if ($result) {
            return "Usuario eliminado exitosamente.";
        } else {
            return "Error al eliminar el usuario.";
        }
    }
}
//response view 
$categoryController = new CategoryController();
$response = $categoryController->index();

header('Content-Type: application/json'); 
echo json_encode($response);
?>
