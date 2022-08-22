<?php
/* Smarty version 4.2.0, created on 2022-08-22 05:45:46
  from '/var/www/html/gl_php_mvc/public/views/patrials/paginator/paginator.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6303180a591988_71228897',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a4dbc27aeb962aaa8bb7a479e1e08f67f3b09b0' => 
    array (
      0 => '/var/www/html/gl_php_mvc/public/views/patrials/paginator/paginator.tpl',
      1 => 1661146648,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./page_block.tpl' => 3,
  ),
),false)) {
function content_6303180a591988_71228897 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['pages']->value) {?>
    <div class="paginator">
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php $_smarty_tpl->_subTemplateRender("file:./page_block.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('text'=>"First",'blockPage'=>1), 0, false);
?>

            <?php
$_smarty_tpl->tpl_vars['blockPage'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['blockPage']->value = $_smarty_tpl->tpl_vars['firstPage']->value;
if ($_smarty_tpl->tpl_vars['blockPage']->value <= $_smarty_tpl->tpl_vars['lastPage']->value) {
for ($_foo=true;$_smarty_tpl->tpl_vars['blockPage']->value <= $_smarty_tpl->tpl_vars['lastPage']->value; $_smarty_tpl->tpl_vars['blockPage']->value++) {
?>
                <?php $_smarty_tpl->_subTemplateRender("file:./page_block.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('text'=>($_smarty_tpl->tpl_vars['blockPage']->value),'blockPage'=>($_smarty_tpl->tpl_vars['blockPage']->value)), 0, true);
?>
            <?php }
}
?>
            <?php $_smarty_tpl->_subTemplateRender("file:./page_block.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('text'=>"Last",'blockPage'=>$_smarty_tpl->tpl_vars['maxpage']->value), 0, true);
?>

        </ul>
    </nav>
<?php }?>

<?php }
}
