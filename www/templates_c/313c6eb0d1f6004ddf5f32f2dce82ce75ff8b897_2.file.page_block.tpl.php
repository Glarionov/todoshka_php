<?php
/* Smarty version 4.2.0, created on 2022-08-22 12:41:39
  from '/var/www/html/gl_php_mvc/public/views/patrials/paginator/page_block.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_63037983437ef5_08248432',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '313c6eb0d1f6004ddf5f32f2dce82ce75ff8b897' => 
    array (
      0 => '/var/www/html/gl_php_mvc/public/views/patrials/paginator/page_block.tpl',
      1 => 1661145274,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63037983437ef5_08248432 (Smarty_Internal_Template $_smarty_tpl) {
?><li class="page-item <?php if ($_smarty_tpl->tpl_vars['blockPage']->value == $_smarty_tpl->tpl_vars['page']->value) {?>active<?php }?>">
    <a class="page-link" data-page="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['blockPage']->value, ENT_QUOTES, 'UTF-8');?>
"
        href="<?php echo htmlspecialchars((string) str_replace('#BLOCKPAGE#',$_smarty_tpl->tpl_vars['blockPage']->value,$_smarty_tpl->tpl_vars['paginationUrlBase']->value), ENT_QUOTES, 'UTF-8');?>
"
    ><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['text']->value, ENT_QUOTES, 'UTF-8');?>
</a>
</li><?php }
}
