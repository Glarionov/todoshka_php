<?php
/* Smarty version 4.2.0, created on 2022-08-22 12:33:15
  from '/var/www/html/gl_php_mvc/public/views/tasks/tasks_table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6303778b251ab7_09724985',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d8061a6e9467145c87af36ba6e58702c6628095' => 
    array (
      0 => '/var/www/html/gl_php_mvc/public/views/tasks/tasks_table.tpl',
      1 => 1661171592,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6303778b251ab7_09724985 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="tasks-title mt-5">
    <h2>Tasks list</h2>
</div>

<?php if (($_smarty_tpl->tpl_vars['elements']->value)) {?>
<table class="table my-2">
    <thead>
        <tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['columns']->value, 'columnKey', false, 'columnName');
$_smarty_tpl->tpl_vars['columnKey']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['columnName']->value => $_smarty_tpl->tpl_vars['columnKey']->value) {
$_smarty_tpl->tpl_vars['columnKey']->do_else = false;
?>
                <th scope="col">
                    <?php echo $_smarty_tpl->tpl_vars['columnName']->value;?>

                    <?php if ((in_array($_smarty_tpl->tpl_vars['columnKey']->value,$_smarty_tpl->tpl_vars['sortableColumns']->value))) {?>
                        <span class="column-sorter" data-column="<?php echo $_smarty_tpl->tpl_vars['columnKey']->value;?>
" data-active="<?php echo $_smarty_tpl->tpl_vars['columnKey']->value == $_smarty_tpl->tpl_vars['sortColumn']->value;?>
"
                              data-desc="<?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
"
                        >
                                <?php if (($_smarty_tpl->tpl_vars['columnKey']->value == $_smarty_tpl->tpl_vars['sortColumn']->value)) {?>
                                    <?php if (($_smarty_tpl->tpl_vars['desc']->value)) {?>
                                        <i class="fa fa-fw fa-sort-desc"></i>
                                    <?php } else { ?>
                                        <i class="fa fa-fw fa-sort-asc"></i>
                                    <?php }?>
                                <?php } else { ?>
                                    <i class="fa fa-fw fa-sort"></i>
                                <?php }?>
                            </span>
                    <?php }?>
                </th>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tr>
    </thead>
    <tbody>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['elements']->value, 'element');
$_smarty_tpl->tpl_vars['element']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['element']->value) {
$_smarty_tpl->tpl_vars['element']->do_else = false;
?>
        <tr>
            <th scope="row">
                <?php echo $_smarty_tpl->tpl_vars['element']->value->id;?>

            </th>
            <td><?php echo $_smarty_tpl->tpl_vars['element']->value->username;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['element']->value->email;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['element']->value->text;?>
</td>
            <td>
                <input type="checkbox"
                       class="form-check-input"
                        <?php if (($_smarty_tpl->tpl_vars['element']->value->done)) {?>
                            checked
                        <?php }?>
                        <?php if (empty($_smarty_tpl->tpl_vars['isAdmin']->value)) {?>
                            disabled
                        <?php }?>
                />
            </td>
        </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>

    <?php } else { ?>
    No data available by this filter
<?php }
}
}
