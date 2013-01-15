<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 06:46:28
         compiled from "C:\wamp\www\SOCS\views\administrator_views\editCourse.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3225850f4fb440fedd2-15014890%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd698399230202c7ac3bd236f44f15e9cc3739f3f' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\administrator_views\\editCourse.tpl',
      1 => 1358232167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3225850f4fb440fedd2-15014890',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Dept_name' => 0,
    'editCourse_Name' => 0,
    'editCourse_Desc' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f4fb4414f044_16414667',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f4fb4414f044_16414667')) {function content_50f4fb4414f044_16414667($_smarty_tpl) {?><h1><center><?php echo $_smarty_tpl->tpl_vars['Dept_name']->value;?>
</center></h1>
<h2><center>Academic Courses</center></h2>

<button class="pull-right btn" onclick="window.location.href='course_list_byDepartment.php'">Back</button>
        
<form action="" method='post' class="form-horizontal">
    <legend>Edit Course:</legend>
    <div class="control-group">
        <label class="control-label">Course Name: </label>
        <div class="controls">
            <input class="input-xxlarge" type ='text' name='course_name' value='<?php echo $_smarty_tpl->tpl_vars['editCourse_Name']->value;?>
'>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Description: </label>
        <div class="controls">
            <textarea class="input-xxlarge" name='course_description' rows="5" cols="50" id='course_desc'><?php echo $_smarty_tpl->tpl_vars['editCourse_Desc']->value;?>
</textarea>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit' value='Save' name="editSave">
        </div>
    </div>
</form>       <?php }} ?>