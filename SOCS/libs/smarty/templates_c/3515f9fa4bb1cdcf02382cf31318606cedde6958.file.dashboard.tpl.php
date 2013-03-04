<?php /* Smarty version Smarty-3.1.12, created on 2013-03-04 17:55:39
         compiled from "C:\wamp\www\SOCS\views\administrator_views\dashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:192605134e01b3d37f7-49418652%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3515f9fa4bb1cdcf02382cf31318606cedde6958' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\administrator_views\\dashboard.tpl',
      1 => 1362418954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192605134e01b3d37f7-49418652',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_type' => 0,
    'rowCount_admin' => 0,
    'courseORsign' => 0,
    'status' => 0,
    'myName' => 0,
    'k' => 0,
    'myKey_admin' => 0,
    'myPhotos' => 0,
    'host' => 0,
    'i' => 0,
    'my_courseORsign' => 0,
    'stud_status' => 0,
    'admin_length' => 0,
    'start' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5134e01b52e671_72351588',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5134e01b52e671_72351588')) {function content_5134e01b52e671_72351588($_smarty_tpl) {?>

<div class="row">
    <div class="span3">

        <div class="row">
            <div class="span3">
                <h4 class="well center-text well-small">User Accounts</h4>
            </div>
        </div>

        <!-- Navigations-->
        <div class="row">
            <div class="span3">

                <!-- Admin Navigations--> 
                <?php smarty_template_function_nav_admin($_smarty_tpl,array('index'=>1));?>


            </div>
        </div>
    </div>

    <div class="span9">

        <div class="row">
            <div class="span9">

                <!-- Header-->
                <?php if ($_smarty_tpl->tpl_vars['user_type']->value=='Signatory'){?>
                    <h4 class="well center-text well-small">List of Signatories-in-charge</h4>
                <?php }else{ ?>
                    <h4 class="well center-text well-small">List of Students</h4>
                <?php }?>

                <div class="navbar">
                    <div class="navbar-inner">

                        <?php if ($_smarty_tpl->tpl_vars['user_type']->value=='Student'){?>
                            <?php smarty_template_function_nav_user_accounts($_smarty_tpl,array('index'=>1));?>

                        <?php }else{ ?>
                            <?php smarty_template_function_nav_user_accounts($_smarty_tpl,array('index'=>2));?>

                        <?php }?>

                        <?php smarty_template_function_search($_smarty_tpl,array());?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="span9">
            <!-- User Table-->
            <table class="table table-bordered table-hover">
                <tr>
                    <th>
                        <input type="checkbox" onclick="isCheck(<?php echo $_smarty_tpl->tpl_vars['rowCount_admin']->value;?>
);" id="check" /> User
                    </th>
                    <th><?php echo $_smarty_tpl->tpl_vars['courseORsign']->value;?>
</th>
                        <?php if (isset($_smarty_tpl->tpl_vars['status']->value)){?>
                        <th>Status</th>
                        <?php }?>
                    <!-- <th>Type</th> -->
                    
                </tr>
                <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['myName']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                    <tr>
                        <td>
                            <label class="checkbox">
                                <input class="Checkbox" type="checkbox" id = '<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' value = <?php echo $_smarty_tpl->tpl_vars['myKey_admin']->value[$_smarty_tpl->tpl_vars['k']->value];?>
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
                        <td style="max-width: 300px;"><?php echo $_smarty_tpl->tpl_vars['my_courseORsign']->value[$_smarty_tpl->tpl_vars['k']->value];?>
</td>

                        <?php if (isset($_smarty_tpl->tpl_vars['status']->value)){?> 
                            <td><?php echo $_smarty_tpl->tpl_vars['stud_status']->value[$_smarty_tpl->tpl_vars['k']->value];?>
</td> 
                        <?php }?>

                        
                    </tr>
                <?php } ?>
            </table>

            <!-- Delete Control-->
            <a style="cursor:pointer;" onclick="findCheckUser('<?php echo $_smarty_tpl->tpl_vars['rowCount_admin']->value;?>
', 'users', '<?php echo $_smarty_tpl->tpl_vars['user_type']->value;?>
');">
                <i class="icon-remove"></i> Delete Selected
            </a>

            <!-- Pagination -->
            <div class="pull-right">
                Jump to: 
                <select id="jump" class="input-mini" onchange="jumpToPageUser('<?php echo $_smarty_tpl->tpl_vars['user_type']->value;?>
');">
                    <option>--</option>
                    <?php $_smarty_tpl->tpl_vars['start'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['start']->step = 1;$_smarty_tpl->tpl_vars['start']->total = (int)ceil(($_smarty_tpl->tpl_vars['start']->step > 0 ? $_smarty_tpl->tpl_vars['admin_length']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['admin_length']->value)+1)/abs($_smarty_tpl->tpl_vars['start']->step));
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
</div><?php }} ?>