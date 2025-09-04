<?php
/* Smarty version 4.5.5, created on 2025-02-19 18:00:25
  from 'C:\xampp\htdocs\dwes04\templates\libros.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67b61c39b3e893_17676372',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd7199efeb6597f4693df04f09a7c762d074760ae' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dwes04\\templates\\libros.tpl',
      1 => 1739987952,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67b61c39b3e893_17676372 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de libros</title>
</head>
<body>
    <h1>Listado de Libros</h1>

    <form action="index.php" method="post">
        <h2>Selecciona un orden:</h2>
        <SELECT name="orden">
            <option value="actualizacion">Fecha de Actualización</option>
            <option value="creacion">Fecha de Creación</option>
        </SELECT>
        <br><br>
        <input type="submit" value="Enviar!">
    </form><br>

    <table border=1>
        <thead>
            <tr>
            <th>ID</th>
            <th>isbn</th>
            <th>titulo</th>
            <th>autor</th>
            <th>anio_publicacion</th>
            <th>paginas</th>
            <th>ejemplares_disponibles</th>
            <th>fecha_creacion</th>
            <th>fecha_actualizacion</th>
            <th>Eliminar un libro</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['libros']->value, 'libro');
$_smarty_tpl->tpl_vars['libro']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['libro']->value) {
$_smarty_tpl->tpl_vars['libro']->do_else = false;
?>
            <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['libro']->value->getId();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['libro']->value->getIsbn();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['libro']->value->getTitulo();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['libro']->value->getAutor();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['libro']->value->GetAnioPublicacion();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['libro']->value->getPaginas();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['libro']->value->getEjemplaresDisponibles();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['libro']->value->getFechaCreacion();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['libro']->value->getFechaActualizacion();?>
</td>
            <td> 
                <form action="index.php?accion=borrar_libro_MMM" method="post">
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['libro']->value->getId();?>
"><br>
                    <input type="submit" value="Eliminar">
                </form>
            </td>
            </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table><br>
    <?php if ((isset($_smarty_tpl->tpl_vars['mensaje']->value))) {?>
        <p><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
</p>
    <?php }?>
    <?php if ((isset($_smarty_tpl->tpl_vars['errores']->value))) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errores']->value, 'error');
$_smarty_tpl->tpl_vars['error']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->do_else = false;
?>
            <p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }?>
    <a href="index.php?accion=nuevo_libro_form_MMM">Añade un nuevo libro</a>
</body>
</html><?php }
}
