<?php
/* Smarty version 4.2.0, created on 2022-08-22 18:32:22
  from '/var/www/html/gl_php_mvc/public/views/tasks/tasks_table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6303cbb6590753_21878643',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d8061a6e9467145c87af36ba6e58702c6628095' => 
    array (
      0 => '/var/www/html/gl_php_mvc/public/views/tasks/tasks_table.tpl',
      1 => 1661193080,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6303cbb6590753_21878643 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="tasks-title mt-5">
    <h2>Tasks list</h2>
</div>

<?php if (($_smarty_tpl->tpl_vars['elements']->value)) {?>
<table class="table task-table my-2">
    <thead>
        <tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['columns']->value, 'columnKey', false, 'columnName');
$_smarty_tpl->tpl_vars['columnKey']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['columnName']->value => $_smarty_tpl->tpl_vars['columnKey']->value) {
$_smarty_tpl->tpl_vars['columnKey']->do_else = false;
?>
                <th scope="col">
                    <?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['columnName']->value, ENT_QUOTES, 'UTF-8');?>

                    <?php if ((in_array($_smarty_tpl->tpl_vars['columnKey']->value,$_smarty_tpl->tpl_vars['sortableColumns']->value))) {?>
                        <span class="column-sorter" data-column="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['columnKey']->value, ENT_QUOTES, 'UTF-8');?>
" data-active="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['columnKey']->value == $_smarty_tpl->tpl_vars['sortColumn']->value, ENT_QUOTES, 'UTF-8');?>
"
                              data-desc="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['desc']->value, ENT_QUOTES, 'UTF-8');?>
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
            <?php if (($_smarty_tpl->tpl_vars['isAdmin']->value)) {?>
                <th scope="col">
                    Actions
                </th>
            <?php }?>
        </tr>
    </thead>
    <tbody>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['elements']->value, 'element');
$_smarty_tpl->tpl_vars['element']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['element']->value) {
$_smarty_tpl->tpl_vars['element']->do_else = false;
?>
        <tr data-id="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['element']->value->id, ENT_QUOTES, 'UTF-8');?>
" class="not-editing">
            <th scope="row">
                <?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['element']->value->id, ENT_QUOTES, 'UTF-8');?>

            </th>
            <td><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['element']->value->username, ENT_QUOTES, 'UTF-8');?>
</td>
            <td><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['element']->value->email, ENT_QUOTES, 'UTF-8');?>
</td>
            <td>
                <div class="task-table__text">
                    <div class="task-table__text-static hide-on-edit"><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['element']->value->text, ENT_QUOTES, 'UTF-8');?>
</div>
                </div>
            </td>
            <td>
                <input type="checkbox"
                   class="form-check-input task-table__status-changer"
                    <?php if (($_smarty_tpl->tpl_vars['element']->value->done)) {?>
                        checked
                    <?php }?>
                    <?php if (empty($_smarty_tpl->tpl_vars['isAdmin']->value)) {?>
                        disabled
                    <?php }?>
                />
            </td>
            <td>
                <input type="checkbox"
                   class="form-check-input task-table__edited_by_admin"
                    <?php if (($_smarty_tpl->tpl_vars['element']->value->edited_by_admin)) {?>
                        checked
                    <?php }?>
                        disabled
                />
            </td>
            <?php if (($_smarty_tpl->tpl_vars['isAdmin']->value)) {?>
                <td>
                    <button class="btn btn-sm btn-success task-table__edit-button hide-on-edit ml-1 mt-1"">
                        Edit
                    </button>

                    <button class="btn btn-sm btn-success task-table__save-button hide-on-not-edit ml-1 mt-1">
                        Save
                    </button>

                    <button class="btn btn-sm btn-warning task-table__stop-edit-button hide-on-not-edit ml-1 mt-1"">
                        Stop
                    </button>

                    <div class="task-table__edit-message"></div>
                </td>
            <?php }?>
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
