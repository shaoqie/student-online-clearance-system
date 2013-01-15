<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 08:26:52
         compiled from "C:\wamp\www\SOCS\views\signatory_views\Next_Add_Requirements.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2626350f512cc2402b5-37440838%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07ff84a897194dd930663fc98e560f78a6823b6b' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\signatory_views\\Next_Add_Requirements.tpl',
      1 => 1358232167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2626350f512cc2402b5-37440838',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mySchool_Year' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f512cc299e96_96817142',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f512cc299e96_96817142')) {function content_50f512cc299e96_96817142($_smarty_tpl) {?><div class="row">
    <div class="span4">
        <ul class="nav nav-tabs">
            <li><a href='../signatory/index.php'>Dashboard</a></li>
            <li><a href='../signatory/index.php?action=viewPosting_Bulletin'>Bulletin</a></li>
            <li class="active"><a href='../signatory/index.php?action=viewListOfRequirements'>Requirements</a></li>
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
        
<button class="pull-right btn" onclick="window.location.href='../signatory/index.php?action=viewAdd_Requirements'">Back</button> 

<form method='post' class="form-horizontal">
    <legend>This Requirements applies to...</legend>
   
</form>      <?php }} ?>