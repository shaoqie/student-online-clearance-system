<?php /* Smarty version Smarty-3.1.12, created on 2013-03-04 17:55:42
         compiled from "C:\wamp\www\SOCS\views\administrator_views\department_list_manager.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1975134e01e63d4e7-98998450%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8b40d6155491a1a11bf4beb2a882a1f7571286d' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\administrator_views\\department_list_manager.tpl',
      1 => 1362418954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1975134e01e63d4e7-98998450',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rowCount_dept' => 0,
    'myName_dept' => 0,
    'k' => 0,
    'myKey_dept' => 0,
    'i' => 0,
    'desc_dept' => 0,
    'dept_length' => 0,
    'start' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5134e01e71ace7_86249282',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5134e01e71ace7_86249282')) {function content_5134e01e71ace7_86249282($_smarty_tpl) {?><div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Departments</h4>

        <!-- Admin Navigations--> 
        <?php smarty_template_function_nav_admin($_smarty_tpl,array('index'=>3));?>


    </div>
    <div class="span9">

        <div class="row">
            <div class="span9">

                <!-- Header-->
                <h4 class="well center-text well-small">List of Departments</h4>

                <div class="navbar">
                    <div class="navbar-inner">

                        <?php smarty_template_function_nav_departments($_smarty_tpl,array('flag'=>1,'index'=>0));?>


                        <?php smarty_template_function_search($_smarty_tpl,array());?>


                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="span9">
                <!-- Department Table-->
                <table class="table table-bordered table-hover">   
                    <tr>
                        <th>
                            <input type="checkbox" onclick="isCheck(<?php echo $_smarty_tpl->tpl_vars['rowCount_dept']->value;?>
);" id="check"> Departments
                        </th>
                        <th>Description</th>
                        <th>Controls</th>
                    </tr>
                    <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['myName_dept']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                        <tr>
                            <td>
                                <label class="checkbox">
                                    <input class="Checkbox" type="checkbox" id = '<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' value = <?php echo $_smarty_tpl->tpl_vars['myKey_dept']->value[$_smarty_tpl->tpl_vars['k']->value];?>
 >
                                    <div id="hover_link" onclick="window.location.href = 'department_list_manager.php?action=displayCourse&deptName=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
';" ><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</div>
                                </label>        
                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['desc_dept']->value[$_smarty_tpl->tpl_vars['k']->value];?>
</td>
                            <td>
                                <a href="department_list_manager.php?action=editDepartment&seleted=<?php echo $_smarty_tpl->tpl_vars['myKey_dept']->value[$_smarty_tpl->tpl_vars['k']->value];?>
">
                                    <i class="icon-pencil"></i> Edit
                                </a> &nbsp; <br class="hidden-desktop">
                                <a href="department_list_manager.php?action=displayCourse&deptName=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
                                    <i class="icon-eye-open"></i> View
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

                <!-- Delete Control-->
                <a style="cursor:pointer;" onclick="findCheck('<?php echo $_smarty_tpl->tpl_vars['rowCount_dept']->value;?>
', 'department');" >
                    <i class="icon-remove"></i> Delete Selected
                </a>

                <!-- Pagination-->
                <div class="pull-right">
                    Jump to: <select id="jump" class="input-mini" onchange="jumpToPage();">
                        <option>--</option>
                        <?php $_smarty_tpl->tpl_vars['start'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['start']->step = 1;$_smarty_tpl->tpl_vars['start']->total = (int)ceil(($_smarty_tpl->tpl_vars['start']->step > 0 ? $_smarty_tpl->tpl_vars['dept_length']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['dept_length']->value)+1)/abs($_smarty_tpl->tpl_vars['start']->step));
if ($_smarty_tpl->tpl_vars['start']->total > 0){
for ($_smarty_tpl->tpl_vars['start']->value = 1, $_smarty_tpl->tpl_vars['start']->iteration = 1;$_smarty_tpl->tpl_vars['start']->iteration <= $_smarty_tpl->tpl_vars['start']->total;$_smarty_tpl->tpl_vars['start']->value += $_smarty_tpl->tpl_vars['start']->step, $_smarty_tpl->tpl_vars['start']->iteration++){
$_smarty_tpl->tpl_vars['start']->first = $_smarty_tpl->tpl_vars['start']->iteration == 1;$_smarty_tpl->tpl_vars['start']->last = $_smarty_tpl->tpl_vars['start']->iteration == $_smarty_tpl->tpl_vars['start']->total;?>
                            <option><?php echo $_smarty_tpl->tpl_vars['start']->value;?>
</option>
                        <?php }} ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div><?php }} ?>