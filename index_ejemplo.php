<?php
require __DIR__ .'/vendor/autoload.php';

// Prueba 1
$numeroAlAzar = Dwes04\MiClase::randomNumber(); // Se ponen dos puntos porque es un método estático.

// Tambien se puede usar use. Sirve para indicar que vamos a usar una clase:
// use Dwes04\MiClase as Clasesita; // Se puede usar un pseudonimo.
// $numeroAlAzar = Clasesita::randomNumber();

//echo $numeroAlAzar;

// Prueba 2
use Dwes04\modelo_ejemplo\Impresora as Impre;

//var_dump(Impre::TIPOS);

// Ejemplo impresora
$pdo = new PDO('mysql:dbname=dwes04; host=localhost; port=3306', 'root', '');
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//$listado = Impre::obtenerImpresoras($pdo);
//var_dump($listado);

// PLANTILLA PARA LAS VISTAS
$smarty = new Smarty;
$smarty -> template_dir = __DIR__ . '/templates';
$smarty -> compile_dir = __DIR__ . '/tmp/compiladas';
$smarty -> cache_dir = __DIR__ . '/tmp/cache';

use Dwes04\controladores\Controlador_ejemplo;

// Se muestran los controlados según la opción que elijamos
switch ($_GET['accion'] ?? 'alAzar') {
    case 'impresoras':
        Controlador_ejemplo::mostrarImpresoras($smarty, $pdo);
        break;
    case 'formnewimp':
        Controlador_ejemplo::formCrearImpresora($smarty, $pdo);
        break;
    case 'newimp':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Controlador_ejemplo::crearImpresora($smarty, $pdo);
        }
        break;
    default:
        Controlador_ejemplo::mostrarAlAzar($smarty);
}
