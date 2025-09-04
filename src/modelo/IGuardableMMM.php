<?php

namespace Dwes04\modelo;

/**
 * <p>Interfaz que ofrece la posibilidad de crear, seleccionar o eliminar un objeto Libro.</p>
 * 
 *
 * @author María Morillo Maqueda
 * @version 1.0
 */
interface IGuardableMMM {
    /**
     * Crea un objeto de tipo Libro.
     * @param c Una instancia de la clase PDO.
     */
    public function guardar(\PDO $c);

    /**
     * Selecciona un objeto de la clase Libro y lo devuelve.
     * @param c Una instancia de la clase PDO.
     * @param id ID del objeto Libro seleccionado.
     */
    public static function rescatar(\PDO $c, int $id);

    /**
     * Elimina un objeto de tipo Libro.
     * @param c una instancia de la clase PDO.
     * @param id ID del objeto Libro eliminado.
     */
    public static function borrar(\PDO $c, int $id);
}