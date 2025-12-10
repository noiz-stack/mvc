
<?php
require_once __DIR__ . '/../Controllers/MahasiswaController.php';

$c = new MahasiswaController();
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        $c->create();
        break;

    case 'store':
        $c->store();
        break;

    case 'edit':
        $c->edit($_GET['id']);
        break;

    case 'update':
        $c->update($_GET['id']);
        break;

    case 'delete':
        $c->delete($_GET['id']);
        break;

    default:
        $c->index();
        break;
}
?>