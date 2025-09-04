<?php // ESTE ES EL ENRUTADOR
// Cargar el archivo

use Dwes04\controladores\ControladorMMM;

require __DIR__ .'/vendor/autoload.php';

// Crear instancia PDO
$pdo = new PDO('mysql:dbname=dwes04; host=localhost; port=3306', 'root', '');
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Crear instancia Smarty
$smarty = new Smarty;
$smarty -> template_dir = __DIR__ . '/templates';
$smarty -> compile_dir = __DIR__ . '/tmp/compiladas';
$smarty -> cache_dir = __DIR__ . '/tmp/cache';

// Ejecutar controlador por defecto
switch ($_GET['accion'] ?? 'libros') {
    case 'nuevo_libro_form_MMM':
        ControladorMMM::anadirLibro($smarty, $pdo);
        break;
    case 'borrar_libro_MMM':
        ControladorMMM::eliminarLibro($smarty, $pdo);
        break;
    default:
        ControladorMMM::mostrarLibros($smarty, $pdo);
}