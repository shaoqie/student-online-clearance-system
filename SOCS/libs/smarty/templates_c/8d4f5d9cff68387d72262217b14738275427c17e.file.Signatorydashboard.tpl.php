<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 07:08:00
         compiled from "C:\wamp\www\SOCS\views\signatory_views\Signatorydashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2458350f38c5f71e5f2-39751460%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d4f5d9cff68387d72262217b14738275427c17e' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\signatory_views\\Signatorydashboard.tpl',
      1 => 1358232167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2458350f38c5f71e5f2-39751460',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f38c5f83aec3_93815370',
  'variables' => 
  array (
    'mySchool_Year' => 0,
    'i' => 0,
    'filter' => 0,
    'myName_student_NameUser' => 0,
    'k' => 0,
    'myKey_Student_Username' => 0,
    'myStudent_ClearanceStatus' => 0,
    'signatoryDashboard_length' => 0,
    'start' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f38c5f83aec3_93815370')) {function content_50f38c5f83aec3_93815370($_smarty_tpl) {?><div class="row">
    <div class="span4">
        <ul class="nav nav-tabs">
            <li class="active"><a href='../signatory/index.php'>Dashboard</a></li>
            <li><a href='../signatory/index.php?action=viewPosting_Bulletin'>Bulletin</a></li>
            <li><a href='../signatory/index.php?action=viewListOfRequirements'>Requirements</a></li>
        </ul>
    </div>    
    <div class="span4 offset4">
        School Year:
        <select id="school_year" class="input-small">
            <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['mySchool_Year']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                <option><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
            <?php } ?>
        </select>
        Semester:
        <select id="semester" class="input-small">
            <option>First</option>
            <option>Second</option>
            <option>Summer</option>
        </select>
    </div> 
</div>

<form class="form-horizontal" method="get" action="?action=filter">
    <input type="hidden" value="filter" name="action">
    <input class="input-xxlarge" id="search" type="text" placeholder="Search..." value ="<?php echo $_smarty_tpl->tpl_vars['filter']->value;?>
" name="filterName">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i></button>  
</form>

<table class="table table-hover">     
    <tr>
        <th>Controls</th>
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
        <td style="width:300px">
            <div class="pull-left">
                <i class="icon-info-sign"></i> <a style="cursor:pointer;" onclick="window.location.href='index.php?action=viewStudent_Detail&stud_id=<?php echo $_smarty_tpl->tpl_vars['myKey_Student_Username']->value[$_smarty_tpl->tpl_vars['k']->value];?>
'">Detail</a>&nbsp; &nbsp;
                <i class="icon-zoom-in"></i> <a style="cursor:pointer;" onclick="window.location.href='index.php?action=viewClearavePage&stud_id=<?php echo $_smarty_tpl->tpl_vars['myKey_Student_Username']->value[$_smarty_tpl->tpl_vars['k']->value];?>
'">Clearance</a>
            </div>                
        </td> 
        <td><?php echo $_smarty_tpl->tpl_vars['myKey_Student_Username']->value[$_smarty_tpl->tpl_vars['k']->value];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
        <?php if ($_smarty_tpl->tpl_vars['myStudent_ClearanceStatus']->value[$_smarty_tpl->tpl_vars['k']->value]=='Cleared'){?>
            <td style="color:blue;"><?php echo $_smarty_tpl->tpl_vars['myStudent_ClearanceStatus']->value[$_smarty_tpl->tpl_vars['k']->value];?>
</td>
         <?php }else{ ?>
            <td style="color:red;"><?php echo $_smarty_tpl->tpl_vars['myStudent_ClearanceStatus']->value[$_smarty_tpl->tpl_vars['k']->value];?>
</td>
        <?php }?>
    </tr>
<?php } ?>
</table> 

&nbsp;
<div class="pull-right">
    Jump to: 
    <select id="jump" class="input-mini" onchange="jumpToPage()">
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
    <?php }} ?>