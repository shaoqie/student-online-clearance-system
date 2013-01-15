<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 07:41:34
         compiled from "C:\wamp\www\SOCS\views\administrator_views\editSignatory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3055250f5082e5a6a08-56432603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afc20d3300b15385ca21d651b036e9106cc9cf4d' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\administrator_views\\editSignatory.tpl',
      1 => 1358232167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3055250f5082e5a6a08-56432603',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'editSignatory_Name' => 0,
    'editSignatory_Desc' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f5082e5f2182_69144310',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f5082e5f2182_69144310')) {function content_50f5082e5f2182_69144310($_smarty_tpl) {?><ul class="nav nav-tabs">
    <li><a href='../administrator/index.php'>User Accounts</a></li>
    <li  class="active"><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
    <li><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<button class="pull-right btn" onclick="window.location.href='signatory_list_manager.php'">Back</button>
        
<form action="" method='post' class="form-horizontal">
    <legend>Edit Signatory:</legend>
    <div class="control-group">
        <label class="control-label">Signatory Name: </label>
        <div class="controls">
            <input class="input-xxlarge" type ='text' name='sign_name' value='<?php echo $_smarty_tpl->tpl_vars['editSignatory_Name']->value;?>
'>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Description: </label>
        <div class="controls">
            <textarea class="input-xxlarge" name='sign_description' rows="5" cols="50"><?php echo $_smarty_tpl->tpl_vars['editSignatory_Desc']->value;?>
</textarea>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit' value='Save' name ='editSave'>
        </div>
    </div>
</form>       <?php }} ?>