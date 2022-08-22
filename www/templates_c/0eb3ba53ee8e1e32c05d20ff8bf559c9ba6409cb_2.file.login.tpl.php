<?php
/* Smarty version 4.2.0, created on 2022-08-22 13:57:03
  from '/var/www/html/gl_php_mvc/public/views/auth/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_63038b2f899d54_90580183',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0eb3ba53ee8e1e32c05d20ff8bf559c9ba6409cb' => 
    array (
      0 => '/var/www/html/gl_php_mvc/public/views/auth/login.tpl',
      1 => 1661176458,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../patrials/page_top.tpl' => 1,
    'file:../patrials/page_bottom.tpl' => 1,
  ),
),false)) {
function content_63038b2f899d54_90580183 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../patrials/page_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container mt-5">
    <form class="login-page" action="/login" method="post">
        <div class="form-group">
            <label for="loginInput">Login</label>
            <input type="text" class="form-control login-page__form-element" name="login"
                   id="loginInput" aria-describedby="emailHelp" placeholder="Enter login" required>
        </div>
        <div class="form-group">
            <label for="passwordInput">Password</label>
            <input type="password" class="form-control login-page_form-element" name="password"
                   id="passwordInput" aria-describedby="emailHelp" placeholder="Enter password" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

        <?php if (!empty($_smarty_tpl->tpl_vars['errorMessage']->value)) {?>
            <div class="text-danger mt-2 temp-message">
                <?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['errorMessage']->value, ENT_QUOTES, 'UTF-8');?>

            </div>
        <?php }?>
    </form>

</div>


<?php $_smarty_tpl->_subTemplateRender("file:../patrials/page_bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
