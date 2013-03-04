<?php /* Smarty version Smarty-3.1.12, created on 2013-03-04 17:54:53
         compiled from "C:\wamp\www\SOCS\views\signatory_views\Signatorydashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:152795134dfeda9f1f9-89900368%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d4f5d9cff68387d72262217b14738275427c17e' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\signatory_views\\Signatorydashboard.tpl',
      1 => 1362418954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152795134dfeda9f1f9-89900368',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'filter' => 0,
    'myName_student_NameUser' => 0,
    'k' => 0,
    'myKey_Student_Username' => 0,
    'myPhotos' => 0,
    'host' => 0,
    'i' => 0,
    'myStudent_ClearanceStatus' => 0,
    'sysemid' => 0,
    'signatoryDashboard_length' => 0,
    'start' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5134dfedbdbc24_34275365',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5134dfedbdbc24_34275365')) {function content_5134dfedbdbc24_34275365($_smarty_tpl) {?><div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Students</h4>

        <!-- Navigations-->
        <?php smarty_template_function_nav_signatory($_smarty_tpl,array());?>


    </div>
    <div class="span9">

        <!-- Header-->
        <h4 class="well center-text well-small">List of Students</h4>

        <!-- Controls-->
        <div class="navbar">
            <div class="navbar-inner">
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
                <th>ID</th>
                <th>Name</th>  
                <th>Status</th>    
            </tr>
            <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['myName_student_NameUser']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                <tr> 
                    <td style="width:150px"><?php echo $_smarty_tpl->tpl_vars['myKey_Student_Username']->value[$_smarty_tpl->tpl_vars['k']->value];?>
</td>
                    <td>
                        <div style="text-align: left;">
                            <?php if (isset($_smarty_tpl->tpl_vars['myPhotos']->value[$_smarty_tpl->tpl_vars['k']->value])){?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['myPhotos']->value[$_smarty_tpl->tpl_vars['k']->value];?>
" style="width:35px; height:35px"/>
                            <?php }else{ ?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/photos/default_student.png" style="width:35px; height:35px"/>
                            <?php }?>
                            <?php echo $_smarty_tpl->tpl_vars['i']->value;?>

                        </div>
                    </td>
                    <td>
                        <div class="btn-group">
                            <?php if ($_smarty_tpl->tpl_vars['myStudent_ClearanceStatus']->value[$_smarty_tpl->tpl_vars['k']->value]=='Cleared'){?>
                            <!--   <img style="height: 15px; width: 30px;" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/photos/cleared.png" class="img-polaroid" /> -->
                                <a class="btn btn-small btn-success" href="index.php?action=viewClearancePage&stud_id=<?php echo $_smarty_tpl->tpl_vars['myKey_Student_Username']->value[$_smarty_tpl->tpl_vars['k']->value];?>
&sy_sem_id=<?php echo $_smarty_tpl->tpl_vars['sysemid']->value;?>
">
                                    <i class="icon-ok-circle icon-large"></i> Cleared</a>                   
                                <?php }else{ ?>
                                <!--  <img style="height: 15px; width: 30px;" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/photos/not cleared.png" class="img-polaroid" /> -->
                                <a class="btn btn-small btn-danger" href="index.php?action=viewClearancePage&stud_id=<?php echo $_smarty_tpl->tpl_vars['myKey_Student_Username']->value[$_smarty_tpl->tpl_vars['k']->value];?>
&sy_sem_id=<?php echo $_smarty_tpl->tpl_vars['sysemid']->value;?>
">
                                    <i class="icon-remove-circle icon-large"></i> Not Cleared</a> 
                                <?php }?>
                            <button style="height: 26px;"class="btn dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a style="cursor:pointer;" onclick="window.location.href = 'index.php?action=viewStudent_Detail&stud_id=<?php echo $_smarty_tpl->tpl_vars['myKey_Student_Username']->value[$_smarty_tpl->tpl_vars['k']->value];?>
&sy_sem_id=<?php echo $_smarty_tpl->tpl_vars['sysemid']->value;?>
';"> <i  class="icon-info-sign"></i> Detail</a>
                                </li>
                                <li>
                                    <a style="cursor:pointer;" onclick="window.location.href = 'index.php?action=viewClearancePage&stud_id=<?php echo $_smarty_tpl->tpl_vars['myKey_Student_Username']->value[$_smarty_tpl->tpl_vars['k']->value];?>
&sy_sem_id=<?php echo $_smarty_tpl->tpl_vars['sysemid']->value;?>
';"> <i class="icon-zoom-in"></i> Clearance</a>
                                </li>
                            </ul>    
                        </div> 
                    </td>
                </tr>
            <?php } ?>
        </table>

        <!-- Pagination-->
        <div class="pull-right">
            Jump to: 
            <select id="jump" class="input-mini" onchange="jumpToPageWithSchoolYear();">
                <option>--</option>
                <?php $_smarty_tpl->tpl_vars['start'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['start']->step = 1;$_smarty_tpl->tpl_vars['start']->total = (int)ceil(($_smarty_tpl->tpl_vars['start']->step > 0 ? $_smarty_tpl->tpl_vars['signatoryDashboard_length']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['signatoryDashboard_length']->value)+1)/abs($_smarty_tpl->tpl_vars['start']->step));
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