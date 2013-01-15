<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 07:08:10
         compiled from "C:\wamp\www\SOCS\views\signatory_views\ClearancePage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1626550f5005a1576a2-75778409%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d4f38b81376dafc0e26a161638e9b9122eae554' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\signatory_views\\ClearancePage.tpl',
      1 => 1358232167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1626550f5005a1576a2-75778409',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mySchool_Year' => 0,
    'i' => 0,
    'host' => 0,
    'student_name' => 0,
    'course_name' => 0,
    'dept_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f5005a1c9561_85202608',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f5005a1c9561_85202608')) {function content_50f5005a1c9561_85202608($_smarty_tpl) {?><div class="row">
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
        
    
<div class="row">
    <div class="span1 offset1"><img src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/photos/default_student.png" class="img-polaroid" /></div>
    <div class="span3">
        <h4><?php echo $_smarty_tpl->tpl_vars['student_name']->value;?>
</h4>
        <h5><?php echo $_smarty_tpl->tpl_vars['course_name']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['dept_name']->value;?>
</h5>
    </div>
</div>       
<hr>
<div class="row">
    <div class="span8 offset1">
        <table class="table table-hover">     
            <tr>
                <th>Checked</th>
                <th>Requirements</th>       
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td><p>Paid for Library Card</p></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td><p>Verified Library Card</p></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td><p>Activate the Virtual Library Account</p></td>
            </tr>
        </table> 
    </div>
</div>
<div class="row">
    <div class="span2 offset1">
         <input type="button" class="btn btn-primary" value="Back" onclick="window.location.href='index.php'">
    </div>   
</div>
<?php }} ?>