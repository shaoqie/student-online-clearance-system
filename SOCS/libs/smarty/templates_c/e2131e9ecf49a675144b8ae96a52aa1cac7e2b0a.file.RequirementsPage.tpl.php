<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 07:08:04
         compiled from "C:\wamp\www\SOCS\views\signatory_views\RequirementsPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3015450f39d85667ba5-70984906%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2131e9ecf49a675144b8ae96a52aa1cac7e2b0a' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\signatory_views\\RequirementsPage.tpl',
      1 => 1358232167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3015450f39d85667ba5-70984906',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f39d856c6730_49136244',
  'variables' => 
  array (
    'mySchool_Year' => 0,
    'i' => 0,
    'filter' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f39d856c6730_49136244')) {function content_50f39d856c6730_49136244($_smarty_tpl) {?><div class="row">
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

<form class="form-horizontal" method="get" action="?action=filter">
    <input type="hidden" value="filter" name="action">
    <input class="input-xxlarge" id="search" type="text" placeholder="Search..." value ="<?php echo $_smarty_tpl->tpl_vars['filter']->value;?>
" name="filterName">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i></button>  
    <input class="btn pull-right" type="button" value="Add Requirements" onclick="window.location.href='../signatory/index.php?action=viewAdd_Requirements'">
</form><?php }} ?>