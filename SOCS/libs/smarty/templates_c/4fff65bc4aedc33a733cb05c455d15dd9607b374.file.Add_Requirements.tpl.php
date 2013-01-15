<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 08:18:07
         compiled from "C:\wamp\www\SOCS\views\signatory_views\Add_Requirements.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3041250f39f8b7ccf03-45552898%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4fff65bc4aedc33a733cb05c455d15dd9607b374' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\signatory_views\\Add_Requirements.tpl',
      1 => 1358232167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3041250f39f8b7ccf03-45552898',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f39f8b824a28_93834393',
  'variables' => 
  array (
    'mySchool_Year' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f39f8b824a28_93834393')) {function content_50f39f8b824a28_93834393($_smarty_tpl) {?><div class="row">
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
        
<button class="pull-right btn" onclick="window.location.href='../signatory/index.php?action=viewListOfRequirements'">Back</button> 

<form method='post' class="form-horizontal">
    <legend>Add Requirement:</legend>
    <div class="control-group">
        <label class="control-label">Title: </label>
        <div class="controls">
            <input class="input-xxlarge" type ='text' name='requirement_title'>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Description: </label>
        <div class="controls">
            <textarea class="input-xxlarge" name='requirement_description' rows="5" cols="50"></textarea>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit' value='Next' name="Next">
        </div>
    </div>
</form>       <?php }} ?>