<?php
/* Smarty version 4.2.0, created on 2022-08-22 12:41:39
  from '/var/www/html/gl_php_mvc/public/views/tasks/tasks_table_with_paginator.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_63037983405b64_58839504',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe62a8a75b1d6cbff06951925584e6b44f80d4f6' => 
    array (
      0 => '/var/www/html/gl_php_mvc/public/views/tasks/tasks_table_with_paginator.tpl',
      1 => 1661168846,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./tasks_table.tpl' => 1,
    'file:../patrials/paginator/paginator.tpl' => 1,
  ),
),false)) {
function content_63037983405b64_58839504 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="tasks-table-with-paginator">
    <div class="task-table-wrapper">
        <?php $_smarty_tpl->_subTemplateRender("file:./tasks_table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>

    <?php $_smarty_tpl->_subTemplateRender("file:../patrials/paginator/paginator.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div><?php }
}
