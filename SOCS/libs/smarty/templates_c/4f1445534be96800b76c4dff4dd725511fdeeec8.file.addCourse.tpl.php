<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 06:44:33
         compiled from "C:\wamp\www\SOCS\views\administrator_views\addCourse.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1556050f4fad16135d1-60957105%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f1445534be96800b76c4dff4dd725511fdeeec8' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\administrator_views\\addCourse.tpl',
      1 => 1358232167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1556050f4fad16135d1-60957105',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Dept_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f4fad1656311_93870591',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f4fad1656311_93870591')) {function content_50f4fad1656311_93870591($_smarty_tpl) {?><h1><center><?php echo $_smarty_tpl->tpl_vars['Dept_name']->value;?>
</center></h1>
<h2><center>Academic Courses</center></h2>

<button class="pull-right btn" onclick="window.location.href='course_list_byDepartment.php'">Back</button>
        
<form action="course_list_byDepartment.php?action=add_course" method='post' class="form-horizontal">
    <legend>Add Course:</legend>
    <div class="control-group">
        <label class="control-label">Course Name: </label>
        <div class="controls">
            <input class="input-xxlarge" type ='text' name='course_name'>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Description: </label>
        <div class="controls">
            <textarea class="input-xxlarge" name='course_description' rows="5" cols="50"></textarea>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit' value='Save'>
        </div>
    </div>
</form>       <?php }} ?>