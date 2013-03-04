<?php /* Smarty version Smarty-3.1.12, created on 2013-03-04 18:22:43
         compiled from "C:\wamp\www\SOCS\views\administrator_views\addDepartment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:255475134e673bfcd28-77492374%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c284a4f28cb0211f8196f4d4b8f24b8a7152678' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\administrator_views\\addDepartment.tpl',
      1 => 1362418956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '255475134e673bfcd28-77492374',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5134e673c41a31_70778122',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5134e673c41a31_70778122')) {function content_5134e673c41a31_70778122($_smarty_tpl) {?><div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Departments</h4>

        <!-- Admin Navigations--> 
        <?php smarty_template_function_nav_admin($_smarty_tpl,array('index'=>3));?>


    </div>
    <div class="span9">

        <!-- Header-->
        <h4 class="well center-text well-small">Add Department</h4>

        

        <!-- Adding Form-->
        <form action="department_list_manager.php?action=add_department" method='post' class="form-horizontal">
            <legend>Department Information: </legend>
            <div class="control-group">
                <label class="control-label"><b>Department Name: </b></label>
                <div class="controls">
                    <input class="span5" type ='text' name='dept_name'>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><b>Description: </b></label>
                <div class="controls">
                    <textarea class="span5" name='dept_description' rows="5" cols="50"></textarea>
                </div>
            </div>
            <div class="form-actions control-group">
                <div class="pull-right">
                    <input class="btn btn-primary" type='Submit' value='Save' />
                    <button class="btn" type="button" onclick="window.history.back();">Back</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php }} ?>