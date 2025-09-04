<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=100%, initial-scale=1.0">
    <title>Ejemplo impresoras</title>
</head>
<body>
    <table border=1>
      <thead>
        <tr>
          <th>ID</th>
          <th>tipo</th>
          <th>nombre</th>
        </tr>
      </thead>
      <tbody>
        {foreach $impresoras as $impresora}
        <tr>
          <td>{$impresora -> getId()}</td> <!-- En versiones antiguas se usaba de esta forma -->
          <td>{$impresora -> getTipo()}</td>
          <td>{$impresora -> getNombre()}</td>
        </tr>
        {/foreach}
      </tbody>
    </table>
    <a href="?accion=formnewimp">Añade una nueva impresora</a>
</body>
</html>