<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 07:36:26
         compiled from "C:\wamp\www\SOCS\views\student_views\Messages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3011550f38cf9592738-63653996%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98b5043ced68a956dd55649311101e068df55088' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\student_views\\Messages.tpl',
      1 => 1358235357,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3011550f38cf9592738-63653996',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f38cf95ece68_91591721',
  'variables' => 
  array (
    'mySchool_Year' => 0,
    'i' => 0,
    'sign_name' => 0,
    'my_messages' => 0,
    'k' => 0,
    '_date' => 0,
    '_time' => 0,
    'sign_id' => 0,
    'stud_message_length' => 0,
    'start' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f38cf95ece68_91591721')) {function content_50f38cf95ece68_91591721($_smarty_tpl) {?><div class="row">   
    <div class="span4 offset4 pull-right">
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

<hr/>

<div class="pull-right">
    <input class="btn" type="button" value="Back" onclick="window.location.href='index.php'"> 
</div>

<legend><?php echo $_smarty_tpl->tpl_vars['sign_name']->value;?>
 Bulletin</legend>
<div class="row">
    <table class="table">
        <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['my_messages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
            <tr>
                <td>
                    <div class="span8 offset1">
                        <label><i style="font-size: 12px; color:blue;">Posted on <?php echo $_smarty_tpl->tpl_vars['_date']->value[$_smarty_tpl->tpl_vars['k']->value];?>
 at <?php echo $_smarty_tpl->tpl_vars['_time']->value[$_smarty_tpl->tpl_vars['k']->value];?>
</i></label>
                        <p style="margin-left: 50px; font-size: 15px;"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</p>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>   
    
    <div class="pull-right">
        Jump to: 
        <select id="jump_studMessages" class="input-mini" onchange="jumpToPageMessages(<?php echo $_smarty_tpl->tpl_vars['sign_id']->value;?>
)">
            <option>--</option>
            <?php $_smarty_tpl->tpl_vars['start'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['start']->step = 1;$_smarty_tpl->tpl_vars['start']->total = (int)ceil(($_smarty_tpl->tpl_vars['start']->step > 0 ? $_smarty_tpl->tpl_vars['stud_message_length']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['stud_message_length']->value)+1)/abs($_smarty_tpl->tpl_vars['start']->step));
if ($_smarty_tpl->tpl_vars['start']->total > 0){
for ($_smarty_tpl->tpl_vars['start']->value = 1, $_smarty_tpl->tpl_vars['start']->iteration = 1;$_smarty_tpl->tpl_vars['start']->iteration <= $_smarty_tpl->tpl_vars['start']->total;$_smarty_tpl->tpl_vars['start']->value += $_smarty_tpl->tpl_vars['start']->step, $_smarty_tpl->tpl_vars['start']->iteration++){
$_smarty_tpl->tpl_vars['start']->first = $_smarty_tpl->tpl_vars['start']->iteration == 1;$_smarty_tpl->tpl_vars['start']->last = $_smarty_tpl->tpl_vars['start']->iteration == $_smarty_tpl->tpl_vars['start']->total;?>
            <option><?php echo $_smarty_tpl->tpl_vars['start']->value;?>
</option>
            <?php }} ?>
        </select>
    </div>
</div>
    
<?php }} ?>