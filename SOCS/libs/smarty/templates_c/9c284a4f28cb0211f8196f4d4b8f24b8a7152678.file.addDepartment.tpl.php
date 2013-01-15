<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 06:59:53
         compiled from "C:\wamp\www\SOCS\views\administrator_views\addDepartment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2945950f4fe69dc1719-06688232%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c284a4f28cb0211f8196f4d4b8f24b8a7152678' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\administrator_views\\addDepartment.tpl',
      1 => 1358232167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2945950f4fe69dc1719-06688232',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f4fe69df62c0_08077332',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f4fe69df62c0_08077332')) {function content_50f4fe69df62c0_08077332($_smarty_tpl) {?><ul class="nav nav-tabs">
    <li><a href='../administrator/index.php'>User Accounts</a></li>
    <li><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
    <li class="active"><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<button class="pull-right btn" onclick="window.location.href='department_list_manager.php'">Back</button>
        
<form action="department_list_manager.php?action=add_department" method='post' class="form-horizontal">
    <legend>Add Department:</legend>
    <div class="control-group">
        <label class="control-label">Department Name: </label>
        <div class="controls">
            <input class="input-xxlarge" type ='text' name='dept_name'>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Description: </label>
        <div class="controls">
            <textarea class="input-xxlarge" name='dept_description' rows="5" cols="50"></textarea>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit' value='Save'>
        </div>
    </div>
</form>      <?php }} ?>