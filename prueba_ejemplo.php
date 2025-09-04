<?php
require __DIR__ . '/vendor/autoload.php';

use Dwes04\modelo_ejemplo\Impresora;
use Dwes04\modelo_ejemplo\Impresoras;

try {
    $pdo = new PDO('mysql:dbname=dwes04; host=localhost; port=3306', 'root', '');
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    die ("No se pudo conectar.");
}

$i = new Impresora();
$i -> setNombre('Impresora Test');
$i -> setTipo(Impresora::TIPOS[0]);
var_dump($i -> guardar($pdo));
var_dump($i -> getId());

$i_r = Impresora::rescatar($pdo, $i -> getId());
var_dump($i_r);

$i_r -> setTipo(Impresora::TIPOS[1]);
$i_r -> guardar($pdo);

$i_r2 = Impresora::rescatar($pdo, $i_r -> getId());
var_dump($i_r2);

var_dump(Impresoras::obtenerImpresoras($pdo));

$r = Impresora::borrar($pdo, $i_r -> getId());
var_dump($r);

