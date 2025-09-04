<?php
// El controlador maneja el modole y la vista
namespace Dwes04\controladores;

use Dwes04\modelo\Libros;

use Dwes04\modelo\Libro;

class ControladorMMM {
    public static function mostrarLibros(\Smarty $smarty, \PDO $pdo) {

        $orden = 'actualizacion'; // Valor por defecto
        $mensaje = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['orden'])) {
                if ($_POST['orden'] === 'creacion' || $_POST['orden'] === 'actualizacion') {
                    $orden = $_POST['orden'];
                } else {
                    $mensaje = "Orden no válido. Se mostrará el orden por defecto.";
                }
            }
        }

        $ordenarPorCreacion = ($orden === 'creacion');
        $listado = Libros::listarMMM($pdo, $ordenarPorCreacion);

        $smarty->assign('libros', $listado);
        $smarty->assign('ordenActual', $orden);
        $smarty->assign('mensaje', $mensaje);
        $smarty->display('libros.tpl');
    }

    public static function anadirLibro(\Smarty $smarty, \PDO $pdo) {
        
        $libro = null;
        $errores = [];
        $mensaje = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Saneamiento de datos
            $isbn = filter_input(INPUT_POST, 'isbn', FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => "/^\d{13}$/"]]);
            $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $anio_publicacion = filter_input(INPUT_POST, 'anio_publicacion', FILTER_VALIDATE_INT);
            $paginas = filter_input(INPUT_POST, 'paginas', FILTER_VALIDATE_INT);
            $ejemplares_disponibles = filter_input(INPUT_POST, 'ejemplares_disponibles', FILTER_VALIDATE_INT);
            
            // COMPROBACIÓN MEDIANTE ESTRUCTURA CONDICIONAL DE DATOS DE ENTRADA:
            // Ningún parámetro debe estar vacío
            if (!$isbn) {
                $errores[] = "El código ISBN no puede estar vacío y debe contener 13 dígitos numéricos.";
            }

            if (!$titulo) {
                $errores[] = "El título no puede estar vacío.";
            }

            if (!$autor) {
                $errores[] = "El autor no puede estar vacío.";
            }

            // Año de publicación: si es menor de 0 o mayor del año actual se mostrará un error.
            if (!$anio_publicacion) {
                $errores[] = "El año de publicación no puede estar vacío.";
            } else if ($anio_publicacion < 0 || $anio_publicacion > date('Y')) {
                $errores[] = "El año de publicación debe ser un número entero mayor que 0 y no superior al año actual.";
            }

            // Páginas: si está vacío o no es un número o es menor de 0 se mostrará un error.
            if (!$paginas) {
                $errores[] = "El número de páginas no puede estar vacío.";
            } else if (!is_numeric($paginas) || !intval($paginas) || $paginas < 0) {
                $errores[] = "El número de paginas debe ser un número positvo mayor de 0.";
            }

            // Ejemplares disponibles: si está vacío o no es un número o es menor de 0 se mostrará un error.
            if (!$ejemplares_disponibles) {
                $errores[] = "El número de ejemplares disponibles no puede estar vacío.";
            } else if (!is_numeric($ejemplares_disponibles) || !intval($ejemplares_disponibles) || $ejemplares_disponibles < 0) {
                $errores[] = "El número de ejemplares diponibles debe ser un número positvo mayor de 0.";
            }

            if (empty($errores)) {
                $libro = new Libro();
                $libro->setIsbn($_POST['isbn']);
                $libro->setTitulo($_POST['titulo']);
                $libro->setAutor($_POST['autor']);
                $libro->setAnioPublicacion((int)$_POST['anio_publicacion']);
                $libro->setPaginas((int)$_POST['paginas']);
                $libro->setEjemplaresDisponibles((int)$_POST['ejemplares_disponibles']);
        
                if ($libro->guardar($pdo)) {
                    $mensaje = 'Añadido el libro con ID: ' . $libro -> getId();
                } else {
                    $mensaje = "No se ha podido añadir el libro.";
                }
            }
        }
        
        $smarty->assign('libro', $libro);
        $smarty->assign('errores', $errores);
        $smarty->assign('mensaje', $mensaje);
        $smarty->display('anadirLibro.tpl');
    }

    public static function eliminarLibro(\Smarty $smarty, \PDO $pdo) {
        
        $errores = [];
        $mensaje = '';
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    
            if (!$id) {
                $errores[] = 'El libro con ID indicado no existe en la base de datos.';
            } else {
                if (!isset($_POST['confirmacion'])) {
                    $smarty->assign('id', $id);
                    $smarty->display('eliminarLibro.tpl');
                } else {
                    $resultado = Libro::borrar($pdo, $id);
                    if ($resultado) {
                        $mensaje = "El libro con ID $id ha sido eliminado correctamente.";
                    } else {
                        $mensaje = "No se ha podido eliminar el libro con el ID indicado.";
                    }
                }
            }
        }
        $libros = Libros::listarMMM($pdo, false);

        $smarty->assign('libros', $libros);
        $smarty->assign('errores', $errores);
        $smarty->assign('mensaje', $mensaje);
        $smarty->display('libros.tpl');
    }
}