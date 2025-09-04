<?php

namespace Dwes04\modelo;

/**
 * <p>Clase que representa todos los libros.</p>
 * <p>
 * Esta clase no contiene objetos</p>
 *
 * <p>Se trata de una clase  que implementa el método rescatar de la clase libro
 * para seleccionar y almacenar todos los libros de la base de datos en un array.
 * </p>
 * 
 *
 * @author María Morillo Maqueda
 * @version 1.0
 */
class Libros {

    //-------------------------------------
    //MÉTODO LISTARMMM
    //-------------------------------------
    /**
     * Selecciona y almacena todos los libros de la base de datos.
     * @param c una instancia de la clase PDO.
     * @param parametro un parámetro booleano que ordenará los libros por fecha de creación o de actualización
     * según si el parámetro es true(verdadero) o false (falso).
     * @return libros array que contiene todos los libros de la base de datos.
     * @return int -2 fallo en la conexión PDO.
     * @return false en caso de que no se pueda eliminar el libro.
     */
    public static function listarMMM(\PDO $c, bool $parametro): array|int|bool {
        // Determinar el campo de ordenación
        $campoOrden = $parametro ? "fecha_creacion" : "fecha_actualizacion";
        $SQL = "SELECT id FROM libros ORDER BY $campoOrden DESC";

        try {
            $stmt = $c->prepare($SQL);
            if ($stmt->execute()) {
                $registros = $stmt->fetchAll(\PDO::FETCH_COLUMN);

                if ($registros) {
                    $libros = [];
                    foreach ($registros as $id) {
                        $libro = Libro::rescatar($c, (int) $id);
                        if ($libro !== null) {
                            $libros[] = $libro;
                        }
                    }
                    return $libros;
                }
            }
        } catch (\PDOException $ex) {
            return -2; 
        }

        return false;
    }
}