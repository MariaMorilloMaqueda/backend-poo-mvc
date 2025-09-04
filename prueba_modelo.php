<?php
require __DIR__ . '/vendor/autoload.php';

use Dwes04\modelo\Libro;
use Dwes04\modelo\Libros;

// Crear instancia PDO
try { 
    $pdo = new PDO('mysql:dbname=dwes04; host=localhost; port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    die ("No se pudo conectar.");
}

// Prueba de creación y guardado de un libro
$libro1 = new Libro();
$libro1 -> setIsbn('9780140449189');
$libro1 -> setTitulo('Cien años de soledad');
$libro1 -> setAutor('Gabriel García Márquez');
$libro1 -> setAnioPublicacion(1967);
$libro1 -> setPaginas(496);
$libro1 -> setEjemplaresDisponibles(5);
var_dump($libro1 -> guardar($pdo));
var_dump($libro1 -> getId());

$libro_r = Libro::rescatar($pdo, $libro1 -> getId());
var_dump($libro_r);

var_dump(Libros::listarMMM($pdo, false));

$r = Libro::borrar($pdo, $libro_r -> getId());
var_dump($r);