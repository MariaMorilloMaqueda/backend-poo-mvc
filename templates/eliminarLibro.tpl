<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar un libro</title>
</head>
<body>
    <h1>Elimina un libro</h1>
    <form action="index.php?accion=borrar_libro_MMM" method="post">
            <input type="hidden" name="id" value="{$id}"><br>
            <label for=""> ¿Desea eliminar el libro seleccionado?
                <input type="checkbox" name="confirmacion" value="">Confirmación
            </label>
            <input type="submit" value="Eliminar">
    </form>
</body>
</html>