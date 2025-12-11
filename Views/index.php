
<?php
require_once __DIR__ . '/../Controllers/MahasiswaController.php';
//membuat instance controller
$c = new MahasiswaController();

$action = $_GET['action'] ?? 'index';
// Routing

// based on action parameter
// memanggil method yang sesuai di controller
switch ($action) {
    case 'create':
        $c->create();
        break;
// memanggil method store di controller
    case 'store':
        $c->store();
        break;
//memanggil method edit di controller
    case 'edit':
        $c->edit($_GET['id']);
        break;
//memanggil method update di controller
    case 'update':
        $c->update($_GET['id']);
        break;
//memanggil method delete di controller
    case 'delete':
        $c->delete($_GET['id']);
        break;
//memanggil method index di controller
    default:
        $c->index();
        break;
}
?>