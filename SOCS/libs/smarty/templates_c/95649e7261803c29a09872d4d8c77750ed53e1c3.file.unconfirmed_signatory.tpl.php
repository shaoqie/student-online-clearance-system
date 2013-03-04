<?php /* Smarty version Smarty-3.1.12, created on 2013-03-04 17:56:21
         compiled from "C:\wamp\www\SOCS\views\administrator_views\unconfirmed_signatory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:243605134e04581e778-62822824%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95649e7261803c29a09872d4d8c77750ed53e1c3' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\administrator_views\\unconfirmed_signatory.tpl',
      1 => 1362418954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '243605134e04581e778-62822824',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rowCount_unconfirmedSign' => 0,
    'myName_unconfirmedSign' => 0,
    'k' => 0,
    'myKey_unconfirmedSign' => 0,
    'myPhotos' => 0,
    'host' => 0,
    'i' => 0,
    'assignSignID_unconfirmedSign' => 0,
    'unconfirmedSign_length' => 0,
    'start' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5134e04591e566_22073839',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5134e04591e566_22073839')) {function content_5134e04591e566_22073839($_smarty_tpl) {?><div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">User Accounts</h4>

        <!-- Admin Navigations--> 
        <?php smarty_template_function_nav_admin($_smarty_tpl,array('index'=>1));?>


    </div>
    <div class="span9">

        <!-- Header-->
        <h4 class="well center-text well-small">List of Unconfirmed Signatories-in-charge</h4>

        <div class="navbar">
            <div class="navbar-inner">

                <?php smarty_template_function_nav_user_accounts($_smarty_tpl,array('index'=>3));?>


                <?php smarty_template_function_search($_smarty_tpl,array());?>

            </div>
        </div>

        <div class="row">
            <div class="span9">
                <!-- Signatory Table -->
                <table class="table table-bordered table-hover">     
                    <tr>
                        <th>
                            <input type="checkbox" onclick="isCheck(<?php echo $_smarty_tpl->tpl_vars['rowCount_unconfirmedSign']->value;?>
)" id="check"> Accounts
                        </th>
                        <th>Assigned Signatory</th>
                        <th>Controls</th>
                    </tr>
                    <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['myName_unconfirmedSign']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                        <tr>
                            <td>
                                <label class="checkbox">
                                    <input class="Checkbox" type="checkbox" id = '<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' value = <?php echo $_smarty_tpl->tpl_vars['myKey_unconfirmedSign']->value[$_smarty_tpl->tpl_vars['k']->value];?>
 > 
                                    <?php if (isset($_smarty_tpl->tpl_vars['myPhotos']->value[$_smarty_tpl->tpl_vars['k']->value])){?>
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['myPhotos']->value[$_smarty_tpl->tpl_vars['k']->value];?>
" style="width:35px; height:35px"/>
                                    <?php }else{ ?>
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/photos/default_student.png" style="width:35px; height:35px"/>
                                    <?php }?>
                                    <?php echo $_smarty_tpl->tpl_vars['i']->value;?>

                                </label>
                            </td>
                            <td><label><?php echo $_smarty_tpl->tpl_vars['assignSignID_unconfirmedSign']->value[$_smarty_tpl->tpl_vars['k']->value];?>
</label></td>
                            <td>
                                <a style="cursor:pointer;" onclick="window.location.href = 'unconfirmed_signatory.php?action=confirmedAccount&key=<?php echo $_smarty_tpl->tpl_vars['myKey_unconfirmedSign']->value[$_smarty_tpl->tpl_vars['k']->value];?>
'">
                                    <i class="icon-ok"></i> Confirm
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

                <!-- Delete Control-->
                <a style="cursor:pointer;" onclick="findCheck('<?php echo $_smarty_tpl->tpl_vars['rowCount_unconfirmedSign']->value;?>
', 'unconfirmed signatory')">
                    <i class="icon-remove"></i> Delete Selected
                </a>

                <!-- Pagination-->
                <div class="pull-right">
                    Jump to: <select id="jump" class="input-mini" onchange="jumpToPage()">
                        <option>--</option>
                        <?php $_smarty_tpl->tpl_vars['start'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['start']->step = 1;$_smarty_tpl->tpl_vars['start']->total = (int)ceil(($_smarty_tpl->tpl_vars['start']->step > 0 ? $_smarty_tpl->tpl_vars['unconfirmedSign_length']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['unconfirmedSign_length']->value)+1)/abs($_smarty_tpl->tpl_vars['start']->step));
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