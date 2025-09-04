<?php
/* Smarty version 4.5.5, created on 2025-02-20 11:34:58
  from 'C:\xampp\htdocs\dwes04\templates\impresoras.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67b70552396b89_41743263',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d5727e7d3f9d907f3b8d79323203d7163d30cfd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dwes04\\templates\\impresoras.tpl',
      1 => 1740047680,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67b70552396b89_41743263 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['impresoras']->value, 'impresora');
$_smarty_tpl->tpl_vars['impresora']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['impresora']->value) {
$_smarty_tpl->tpl_vars['impresora']->do_else = false;
?>
        <tr>
          <td><?php echo $_smarty_tpl->tpl_vars['impresora']->value->getId();?>
</td> <!-- En versiones antiguas se usaba de esta forma -->
          <td><?php echo $_smarty_tpl->tpl_vars['impresora']->value->getTipo();?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['impresora']->value->getNombre();?>
</td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </tbody>
    </table>
    <a href="?accion=formnewimp">Añade una nueva impresora</a>
</body>
</html><?php }
}
