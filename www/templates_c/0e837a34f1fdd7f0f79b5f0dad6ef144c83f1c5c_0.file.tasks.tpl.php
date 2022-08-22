<?php
/* Smarty version 4.2.0, created on 2022-08-22 12:06:15
  from '/var/www/html/gl_php_mvc/public/views/tasks/tasks.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6303713777a509_72026685',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e837a34f1fdd7f0f79b5f0dad6ef144c83f1c5c' => 
    array (
      0 => '/var/www/html/gl_php_mvc/public/views/tasks/tasks.tpl',
      1 => 1661169928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../patrials/page_top.tpl' => 1,
    'file:./tasks_sender.tpl' => 1,
    'file:./tasks_table_with_paginator.tpl' => 1,
    'file:../patrials/page_bottom.tpl' => 1,
  ),
),false)) {
function content_6303713777a509_72026685 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../patrials/page_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <?php $_smarty_tpl->_subTemplateRender("file:./tasks_sender.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="tasks-table-with-paginator">
        <?php $_smarty_tpl->_subTemplateRender("file:./tasks_table_with_paginator.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>

</div>


<?php $_smarty_tpl->_subTemplateRender("file:../patrials/page_bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
