<?php
/* Smarty version 4.2.0, created on 2022-08-22 11:22:34
  from '/var/www/html/gl_php_mvc/public/views/tasks/tasks_sender.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_630366facf3dc3_36886865',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f486325cdb1ecdeec088cc8eab076796e9ca7c28' => 
    array (
      0 => '/var/www/html/gl_php_mvc/public/views/tasks/tasks_sender.tpl',
      1 => 1661167192,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_630366facf3dc3_36886865 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="tasks-title mt-3">
    <h2>Add new task</h2>
</div>

<form class="new-task-form">
    <div class="form-group">
        <label for="usernameInput">Username</label>
        <input type="text" class="form-control new-task-form__form-element" name="username"
               id="usernameInput" aria-describedby="emailHelp" placeholder="Enter username" required>
    </div>
    <div class="form-group">
        <label for="emailInput">Email address</label>
        <input type="email" class="form-control new-task-form__form-element" name="email"
               id="emailInput" aria-describedby="emailHelp" placeholder="Enter email" required>
    </div>
    <div class="form-group">
        <label for="textInput">Text</label>
        <textarea class="form-control new-task-form__form-element" name="text"
                   id="textInput" placeholder="Add text" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form><?php }
}
