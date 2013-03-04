<?php /* Smarty version Smarty-3.1.12, created on 2013-03-04 17:56:51
         compiled from "C:\wamp\www\SOCS\views\administrator_views\signatory_list_manager.tpl" */ ?>
<?php /*%%SmartyHeaderCode:117505134e063f18321-14432001%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc142a51860ca979ce652f19583e686b2c3efde4' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\administrator_views\\signatory_list_manager.tpl',
      1 => 1362418954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117505134e063f18321-14432001',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rowCount_sign' => 0,
    'myName_sign' => 0,
    'k' => 0,
    'myKey_sign' => 0,
    'i' => 0,
    'desc_sign' => 0,
    'index_tabs' => 0,
    'sign_length' => 0,
    'start' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5134e0640c8dc2_24311253',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5134e0640c8dc2_24311253')) {function content_5134e0640c8dc2_24311253($_smarty_tpl) {?><div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Signatories</h4>

        <!-- Admin Navigations--> 
        <?php smarty_template_function_nav_admin($_smarty_tpl,array('index'=>2));?>


    </div>
    <div class="span9">

        <div class="row">
            <div class="span9">

                <!-- Header-->
                <h4 class="well center-text well-small">List of Signatories</h4>

                <div class="navbar">
                    <div class="navbar-inner">

                        <?php smarty_template_function_nav_signatories($_smarty_tpl,array('index'=>0));?>

                        
                        <?php smarty_template_function_search($_smarty_tpl,array());?>


                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="span9">
                <!-- Signatory Table -->
                <table class="table table-bordered table-hover">     
                    <tr>
                        <th>
                            <input type="checkbox" onclick="isCheck(<?php echo $_smarty_tpl->tpl_vars['rowCount_sign']->value;?>
);" id="check"> Signatories
                        </th>
                        <th>Description</th>
                        <th>Controls</th>
                    </tr>
                    <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['myName_sign']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                        <tr>
                            <td>
                                <label class="checkbox">
                                    <input class="Checkbox" type="checkbox" id = '<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' value = <?php echo $_smarty_tpl->tpl_vars['myKey_sign']->value[$_smarty_tpl->tpl_vars['k']->value];?>
 > <?php echo $_smarty_tpl->tpl_vars['i']->value;?>

                                </label>
                            </td>
                            <td><label><?php echo $_smarty_tpl->tpl_vars['desc_sign']->value[$_smarty_tpl->tpl_vars['k']->value];?>
</label></td>
                            <td>
                                <a style="cursor:pointer;" <?php if ($_smarty_tpl->tpl_vars['index_tabs']->value==0){?> onclick="window.location.href = 'signatory_list_manager.php?action=editSignatory&seleted=<?php echo $_smarty_tpl->tpl_vars['myKey_sign']->value[$_smarty_tpl->tpl_vars['k']->value];?>
';" <?php }?> <?php if ($_smarty_tpl->tpl_vars['index_tabs']->value==1){?> onclick="window.location.href = 'grad_signatory_list_manager.php?action=editSignatory&seleted=<?php echo $_smarty_tpl->tpl_vars['myKey_sign']->value[$_smarty_tpl->tpl_vars['k']->value];?>
';" <?php }?>><i class="icon-pencil"></i> Edit</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

                <!-- Delete Control-->
                <a style="cursor:pointer;" onclick="findCheck('<?php echo $_smarty_tpl->tpl_vars['rowCount_sign']->value;?>
', 'signatory');">
                    <i class="icon-remove"></i> Delete Selected
                </a>

                <!-- Pagination-->
                <div class="pull-right">
                    Jump to: <select id="jump" class="input-mini" onchange="jumpToPage();">
                        <option>--</option>
                        <?php $_smarty_tpl->tpl_vars['start'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['start']->step = 1;$_smarty_tpl->tpl_vars['start']->total = (int)ceil(($_smarty_tpl->tpl_vars['start']->step > 0 ? $_smarty_tpl->tpl_vars['sign_length']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['sign_length']->value)+1)/abs($_smarty_tpl->tpl_vars['start']->step));
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