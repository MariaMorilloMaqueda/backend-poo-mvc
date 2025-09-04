<?php
// El controlador maneja el modole y la vista
namespace Dwes04\controladores;

use Dwes04\MiClase;
use Dwes04\modelo_ejemplo\Impresora;
use Dwes04\modelo_ejemplo\Impresoras;

class Controlador_ejemplo {
    public static function mostrarAlAzar(\Smarty $smarty) {
        //VISTAS
        $smarty -> assign('alAzar', MiClase::randomNumber());
        $smarty -> display('lista.tpl');
    }

    public static function mostrarImpresoras(\Smarty $smarty, \PDO $pdo) {
        $listado = Impresoras::obtenerImpresoras($pdo);
        var_dump($listado);
        $smarty -> assign('impresoras', $listado);
        $smarty -> display('impresoras.tpl');
    }

    public static function formCrearImpresora(\Smarty $smarty) {
        $smarty -> display('formnuevaimpresora.tpl');
    }

    public static function crearImpresora (\Smarty $smarty, \PDO $pdo) {

        $imp = new Impresora();
        $error = false;

        if (isset($_POST['nombre'])) {
            $imp -> setNombre($_POST['nombre']);
        } else { $error = true; }

        if (isset($_POST['tipo']) && in_array($_POST['tipo'], Impresora::TIPOS)) {
            $imp -> setTipo($_POST['tipo']);
        } else {
            $error = true;
        }

        if (!$error){
            if ($errc = $imp->guardar($pdo) === true) {
                $mensaje = 'Añadida la impresora con id: ' . $imp -> getId();
            } else {
                $mensaje = 'La operación retorno el código de error: ' . $errc;
            }
        } else {
            $mensaje = "Error en los datos recibidos.";
        }
        $smarty -> assign('mensaje', $mensaje);
        $smarty -> display('mensaje.tpl');
    }
}