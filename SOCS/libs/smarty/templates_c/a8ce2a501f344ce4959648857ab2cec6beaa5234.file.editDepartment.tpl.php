<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 07:44:17
         compiled from "C:\wamp\www\SOCS\views\administrator_views\editDepartment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1222050f508d163beb8-95188209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8ce2a501f344ce4959648857ab2cec6beaa5234' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\administrator_views\\editDepartment.tpl',
      1 => 1358232167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1222050f508d163beb8-95188209',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'editDepartment_Name' => 0,
    'editDepartment_Desc' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f508d1686114_03052856',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f508d1686114_03052856')) {function content_50f508d1686114_03052856($_smarty_tpl) {?><ul class="nav nav-tabs">
    <li><a href='../administrator/index.php'>User Accounts</a></li>
    <li><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
    <li class="active"><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<button class="pull-right btn" onclick="window.location.href='department_list_manager.php'">Back</button>
        
<form action="" method='post' class="form-horizontal">
    <legend>Edit Department:</legend>
    <div class="control-group">
        <label class="control-label">Department Name: </label>
        <div class="controls">
            <input class="input-xxlarge" type ='text' name='dept_name' value='<?php echo $_smarty_tpl->tpl_vars['editDepartment_Name']->value;?>
'>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Description: </label>
        <div class="controls">
            <textarea class="input-xxlarge" name='dept_description' rows="5" cols="50"><?php echo $_smarty_tpl->tpl_vars['editDepartment_Desc']->value;?>
</textarea>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit' value='Save' name="editSave">
        </div>
    </div>
</form>       <?php }} ?>