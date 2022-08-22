<?php
/* Smarty version 4.2.0, created on 2022-08-22 18:11:18
  from '/var/www/html/gl_php_mvc/public/views/patrials/page_top.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6303c6c6d72314_95559317',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8af0029c6f20c21b33cd512b22fbcd21bcebba7a' => 
    array (
      0 => '/var/www/html/gl_php_mvc/public/views/patrials/page_top.tpl',
      1 => 1661191876,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./top_link.tpl' => 2,
  ),
),false)) {
function content_6303c6c6d72314_95559317 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="gl_php_mvc/public/styles/style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <title>Tasks</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <?php $_smarty_tpl->_subTemplateRender("file:./top_link.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('href'=>"/tasks",'text'=>"Tasks"), 0, false);
?>
            <?php if ((empty($_smarty_tpl->tpl_vars['isLogged']->value))) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:./top_link.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('href'=>"/login",'text'=>"Login"), 0, true);
?>
            <?php }?>
        </ul>
        <?php if (!empty($_smarty_tpl->tpl_vars['isLogged']->value)) {?>
            <input type="hidden" class="api-token" value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8');?>
">
            <span class="navbar-text">
                Hello, <?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['login']->value, ENT_QUOTES, 'UTF-8');?>

                (<small><a href="/logout?token=<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8');?>
">logout</a></small>)
           </span>
        <?php }?>
    </div>
</nav>

<div class="main-content">

<?php }
}
