<?php
/* Smarty version 4.2.0, created on 2022-08-22 15:27:25
  from '/var/www/html/gl_php_mvc/public/views/patrials/top_link.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6303a05d4e34d5_79909620',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd16cc82cafd9a04a458401f82ef1b73f127bd942' => 
    array (
      0 => '/var/www/html/gl_php_mvc/public/views/patrials/top_link.tpl',
      1 => 1661182043,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6303a05d4e34d5_79909620 (Smarty_Internal_Template $_smarty_tpl) {
?><li class="nav-item <?php if (($_SERVER['REDIRECT_URL'] == $_smarty_tpl->tpl_vars['href']->value)) {?>active<?php }?>">
    <a class="nav-link" href="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['href']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['text']->value, ENT_QUOTES, 'UTF-8');?>
</a>
</li><?php }
}
