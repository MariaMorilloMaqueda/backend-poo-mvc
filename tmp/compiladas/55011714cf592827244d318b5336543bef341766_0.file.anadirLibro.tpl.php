<?php
/* Smarty version 4.5.5, created on 2025-02-19 17:57:51
  from 'C:\xampp\htdocs\dwes04\templates\anadirLibro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67b61b9f80a5e2_19497959',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55011714cf592827244d318b5336543bef341766' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dwes04\\templates\\anadirLibro.tpl',
      1 => 1739984381,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67b61b9f80a5e2_19497959 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isertar un libro</title>
</head>
<body>
    <h1>Añade un libro</h1>
    <?php if ((isset($_smarty_tpl->tpl_vars['errores']->value)) && $_smarty_tpl->tpl_vars['errores']->value) {?>
        <ul>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errores']->value, 'error');
$_smarty_tpl->tpl_vars['error']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->do_else = false;
?>
                <li><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
    <?php }?>

    <form action="index.php?accion=nuevo_libro_form_MMM" method="post">
        <label>ISBN: <input type="text" name="isbn"></label><br>
        <label>Título: <input type="text" name="titulo"></label><br>
        <label>Autor: <input type="text" name="autor"></label><br>
        <label>Año de publicación: <input type="number" name="anio_publicacion"></label><br>
        <label>Páginas: <input type="number" name="paginas"></label><br>
        <label>Ejemplares disponibles: <input type="number" name="ejemplares_disponibles"></label><br>
        <input type="submit" value="Añadir!">
    </form>
    <?php if ((isset($_smarty_tpl->tpl_vars['mensaje']->value))) {?>
        <p><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
</p>
    <?php }?>
</body>
</html><?php }
}
