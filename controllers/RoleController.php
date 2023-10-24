<?php 

include 'models/Role.php';

include 'config/database.php';

$db = new Database();
$role = new Role($db);

class RoleController {
    public function index() {
        $role = new Role();
        $roles = $role->getAll();
        return $roles;
    }

    public function show($id) {
        $role = new Role();
        $roleData = $role->getById($id);
        return $roleData;
    }

    public function create($name) {
        $role = new Role();
        $result = $role->create($name);

        if ($result) {
            return "Rol creado exitosamente.";
        } else {
            return "Error al crear el rol.";
        }
    }

    public function edit($id, $name) {
        $role = new Role();
        $result = $role->update($id, $name);

        if ($result) {
            return "Rol actualizado exitosamente.";
        } else {
            return "Error al actualizar el rol.";
        }
    }

    public function delete($id) {
        $role = new Role();
        $result = $role->delete($id);

        if ($result) {
            return "Rol eliminado exitosamente.";
        } else {
            return "Error al eliminar el rol.";
        }
    }
}
$roleController = new RoleController();
$response = $roleController->index();

header('Content-Type: application/json'); 
echo json_encode($response);
?>
