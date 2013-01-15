<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 06:44:32
         compiled from "C:\wamp\www\SOCS\views\administrator_views\course_list_byDepartment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1670650f39eda658f76-07435742%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5cd872581e8530bba5da94d89cfbe56f417d73a2' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\administrator_views\\course_list_byDepartment.tpl',
      1 => 1358232167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1670650f39eda658f76-07435742',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f39eda727702_10961658',
  'variables' => 
  array (
    'Dept_name' => 0,
    'filter' => 0,
    'rowCount_course' => 0,
    'myName_course' => 0,
    'k' => 0,
    'myKey_course' => 0,
    'i' => 0,
    'course_length' => 0,
    'start' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f39eda727702_10961658')) {function content_50f39eda727702_10961658($_smarty_tpl) {?><h1><center><?php echo $_smarty_tpl->tpl_vars['Dept_name']->value;?>
</center></h1>

<ul class="nav nav-tabs">
    <li class="active"><a href='../administrator/course_list_byDepartment.php'>Courses</a></li>
    <li><a href='../administrator/signatorialList.php'>Signatorial List</a></li>
</ul>

<form class="form-horizontal">
    <input type="hidden" value="filter" name="action">
    <input class="input-xxlarge" id="search" type="text" placeholder="Search..." value ="<?php echo $_smarty_tpl->tpl_vars['filter']->value;?>
" name="filterName">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i></button>
    <div class="pull-right">   
        <input class="btn" type="button" value="Add Courses" onclick="window.location.href='course_list_byDepartment.php?action=addCourse'">
        <input class="btn" type="button" value="Back" onclick="window.location.href='department_list_manager.php'">    
    </div>
</form>

<a href = "javascript:isCheckAll(true, <?php echo $_smarty_tpl->tpl_vars['rowCount_course']->value;?>
)" >Checked All</a> / 
<a href = "javascript:isCheckAll(false, <?php echo $_smarty_tpl->tpl_vars['rowCount_course']->value;?>
)" >Unchecked All</a>

<table class="table table-hover">     
    <tr>
        <th><p class="pull-left">Controls</p></th>
        <th> Courses</th>       
    </tr>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['myName_course']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
    <tr>
        <td style="width:400px">
            <div class="pull-left">
                <input type="checkbox" id = '<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' value = <?php echo $_smarty_tpl->tpl_vars['myKey_course']->value[$_smarty_tpl->tpl_vars['k']->value];?>
 ></input> &nbsp; &nbsp;
                <i class="icon-pencil"></i><a style="cursor:pointer;" onclick="window.location.href='course_list_byDepartment.php?action=editCourse&seleted=<?php echo $_smarty_tpl->tpl_vars['myKey_course']->value[$_smarty_tpl->tpl_vars['k']->value];?>
'"> Edit</a>&nbsp; &nbsp; 
                <i class="icon-remove"></i><a style="cursor:pointer;" onclick="confirmDelete('<?php echo $_smarty_tpl->tpl_vars['myKey_course']->value[$_smarty_tpl->tpl_vars['k']->value];?>
')"> Delete</a>
            </div>          
        </td>
        <td><p><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</p></td>
    </tr>
<?php } ?>
</table>

<a style="cursor:pointer;" onclick="findCheck('<?php echo $_smarty_tpl->tpl_vars['rowCount_course']->value;?>
')" >Delete Selected</a>

<div class="pull-right">
    Jump to: <select id="jump" class="input-mini" onchange="jumpToPage()">
        <option>--</option>
        <?php $_smarty_tpl->tpl_vars['start'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['start']->step = 1;$_smarty_tpl->tpl_vars['start']->total = (int)ceil(($_smarty_tpl->tpl_vars['start']->step > 0 ? $_smarty_tpl->tpl_vars['course_length']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['course_length']->value)+1)/abs($_smarty_tpl->tpl_vars['start']->step));
if ($_smarty_tpl->tpl_vars['start']->total > 0){
for ($_smarty_tpl->tpl_vars['start']->value = 1, $_smarty_tpl->tpl_vars['start']->iteration = 1;$_smarty_tpl->tpl_vars['start']->iteration <= $_smarty_tpl->tpl_vars['start']->total;$_smarty_tpl->tpl_vars['start']->value += $_smarty_tpl->tpl_vars['start']->step, $_smarty_tpl->tpl_vars['start']->iteration++){
$_smarty_tpl->tpl_vars['start']->first = $_smarty_tpl->tpl_vars['start']->iteration == 1;$_smarty_tpl->tpl_vars['start']->last = $_smarty_tpl->tpl_vars['start']->iteration == $_smarty_tpl->tpl_vars['start']->total;?>
        <option><?php echo $_smarty_tpl->tpl_vars['start']->value;?>
</option>
        <?php }} ?>
    </select>
</div>


<?php }} ?>