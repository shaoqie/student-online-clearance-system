<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 06:44:25
         compiled from "C:\wamp\www\SOCS\views\administrator_views\dashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:207850f39ed5804047-22627186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3515f9fa4bb1cdcf02382cf31318606cedde6958' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\administrator_views\\dashboard.tpl',
      1 => 1358232167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207850f39ed5804047-22627186',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f39ed58d20f8_05279104',
  'variables' => 
  array (
    'filter' => 0,
    'rowCount_admin' => 0,
    'myName' => 0,
    'k' => 0,
    'myKey_admin' => 0,
    'i' => 0,
    'myType' => 0,
    'admin_length' => 0,
    'start' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f39ed58d20f8_05279104')) {function content_50f39ed58d20f8_05279104($_smarty_tpl) {?><ul class="nav nav-tabs">
    <li class="active"><a href='../administrator/index.php'>User Accounts</a></li>
    <li><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
    <li><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<form class="form-horizontal" method="get" action="?action=filter">
    <input type="hidden" value="filter" name="action">
    <input class="input-xxlarge" id="search" type="text" placeholder="Search..." value ="<?php echo $_smarty_tpl->tpl_vars['filter']->value;?>
" name="filterName">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i></button>
    <input class="btn pull-right" type="button" value="Add User Account" onclick="window.location.href='index.php?action=display_add_edit_account'">
</form>

<a href = "javascript:isCheckAll(true, <?php echo $_smarty_tpl->tpl_vars['rowCount_admin']->value;?>
)" >Checked All</a> / 
<a href = "javascript:isCheckAll(false, <?php echo $_smarty_tpl->tpl_vars['rowCount_admin']->value;?>
)">Unchecked All</a>

<table class="table table-hover">     
    <tr>
        <th><p class="pull-left">Controls</p></th>
        <th> User</th>  
        <th> Type</th>        
    </tr>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['myName']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
    <tr>
        <td style="width:400px">
            <div class="pull-left">
                <input type="checkbox" id = '<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' value = <?php echo $_smarty_tpl->tpl_vars['myKey_admin']->value[$_smarty_tpl->tpl_vars['k']->value];?>
></input>&nbsp; &nbsp; 
                <i class="icon-pencil"></i> <a style="cursor:pointer;" >Edit</a>&nbsp; &nbsp;
                <i class="icon-remove"></i> <a style="cursor:pointer;" onclick="confirmDelete('<?php echo $_smarty_tpl->tpl_vars['myKey_admin']->value[$_smarty_tpl->tpl_vars['k']->value];?>
')">Delete</a>
            </div>                
        </td>       
        <td><p><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</p></td>
        <td><p><?php echo $_smarty_tpl->tpl_vars['myType']->value[$_smarty_tpl->tpl_vars['k']->value];?>
</p></td>
    </tr>
<?php } ?>
</table>
<a style="cursor:pointer;" onclick="findCheck('<?php echo $_smarty_tpl->tpl_vars['rowCount_admin']->value;?>
')"> Delete Selected</a>

<div class="pull-right">
    Jump to: 
    <select id="jump" class="input-mini" onchange="jumpToPage()">
        <option>--</option>
        <?php $_smarty_tpl->tpl_vars['start'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['start']->step = 1;$_smarty_tpl->tpl_vars['start']->total = (int)ceil(($_smarty_tpl->tpl_vars['start']->step > 0 ? $_smarty_tpl->tpl_vars['admin_length']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['admin_length']->value)+1)/abs($_smarty_tpl->tpl_vars['start']->step));
if ($_smarty_tpl->tpl_vars['start']->total > 0){
for ($_smarty_tpl->tpl_vars['start']->value = 1, $_smarty_tpl->tpl_vars['start']->iteration = 1;$_smarty_tpl->tpl_vars['start']->iteration <= $_smarty_tpl->tpl_vars['start']->total;$_smarty_tpl->tpl_vars['start']->value += $_smarty_tpl->tpl_vars['start']->step, $_smarty_tpl->tpl_vars['start']->iteration++){
$_smarty_tpl->tpl_vars['start']->first = $_smarty_tpl->tpl_vars['start']->iteration == 1;$_smarty_tpl->tpl_vars['start']->last = $_smarty_tpl->tpl_vars['start']->iteration == $_smarty_tpl->tpl_vars['start']->total;?>
        <option><?php echo $_smarty_tpl->tpl_vars['start']->value;?>
</option>
        <?php }} ?>
    </select>
</div>
    <?php }} ?>