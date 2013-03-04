<?php /* Smarty version Smarty-3.1.12, created on 2013-03-04 17:55:19
         compiled from "C:\wamp\www\SOCS\views\signatory_views\RequirementsPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:192145134e007c878a2-86271453%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2131e9ecf49a675144b8ae96a52aa1cac7e2b0a' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\signatory_views\\RequirementsPage.tpl',
      1 => 1362418954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192145134e007c878a2-86271453',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'host' => 0,
    'filter' => 0,
    'rowCount_requirement' => 0,
    'myName_requirements' => 0,
    'k' => 0,
    'requirement_ID' => 0,
    'i' => 0,
    'myDesc_requirements' => 0,
    'requirement_length' => 0,
    'start' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5134e007d5b2d6_43604948',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5134e007d5b2d6_43604948')) {function content_5134e007d5b2d6_43604948($_smarty_tpl) {?><div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Requirements</h4>

        <!-- Navigations-->
        <div class="row">
            <div class="span3">
                <?php smarty_template_function_nav_signatory($_smarty_tpl,array('index'=>2));?>

            </div>
        </div>

    </div>
    <div class="span9">

        <!-- Header-->
        <h4 class="well center-text well-small">List of Requirements</h4>

        <!-- Controls-->
        <div class="navbar">
            <div class="navbar-inner">

                <ul class="nav">
                    <li class="divider-vertical"></li>
                    <li>
                        <a class="tips" title="Add Requirements" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/signatory/requirements.php?action=viewAdd_Requirements">
                            <i class="icon-plus"></i>
                        </a>
                    </li>
                    <li class="divider-vertical"></li>
                </ul>

                <form class="navbar-form pull-right">

                    <?php smarty_template_function_schoolyear_sem_inputs($_smarty_tpl,array());?>


                    <input id="search" class="span3" type="search" placeholder="Search..." value="<?php echo $_smarty_tpl->tpl_vars['filter']->value;?>
" onkeypress="enterSearch(event);">
                    <button class="btn btn-success" type="button" onclick="jumpToPageWithSchoolYear();">
                        <i class="icon-search icon-white"></i>
                    </button>

                </form>
            </div>
        </div>

        

        <!-- Student Table-->
        <table class="table table-bordered table-hover">
            <tr>
                <th>
                    <input type="checkbox" onclick="isCheck(<?php echo $_smarty_tpl->tpl_vars['rowCount_requirement']->value;?>
)" id="check"> Title
                </th>
                <th>Description</th>
                <th>Controls</th>
            </tr>

            <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['myName_requirements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                <tr> 
                    <td>
                        <label class="checkbox">
                            <input class="Checkbox" type="checkbox" id = '<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' value = <?php echo $_smarty_tpl->tpl_vars['requirement_ID']->value[$_smarty_tpl->tpl_vars['k']->value];?>
>
                            <p><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</p>
                        </label>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['myDesc_requirements']->value[$_smarty_tpl->tpl_vars['k']->value];?>
</td>
                    <td>
                        <a href="?action=viewEdit_Requirements&reqID=<?php echo $_smarty_tpl->tpl_vars['requirement_ID']->value[$_smarty_tpl->tpl_vars['k']->value];?>
">
                            <i class="icon-edit"></i> Edit
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <!-- Delete Selected Button-->
        <a style="cursor:pointer;" onclick="findCheck('<?php echo $_smarty_tpl->tpl_vars['rowCount_requirement']->value;?>
', 'Requirement')">
            <i class="icon-remove"></i> Delete Selected
        </a>

        <!-- Pagination-->
        <div class="pull-right">
            Jump to: 
            <select id="jump" class="input-mini" onchange="jumpToPageWithSchoolYear()">
                <option>--</option>
                <?php $_smarty_tpl->tpl_vars['start'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['start']->step = 1;$_smarty_tpl->tpl_vars['start']->total = (int)ceil(($_smarty_tpl->tpl_vars['start']->step > 0 ? $_smarty_tpl->tpl_vars['requirement_length']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['requirement_length']->value)+1)/abs($_smarty_tpl->tpl_vars['start']->step));
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

<?php }} ?>