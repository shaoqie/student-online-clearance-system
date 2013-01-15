<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 08:24:09
         compiled from "C:\wamp\www\SOCS\views\signatory_views\BulletinPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:338150f39cca531c56-24272712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aca4b4f8d6a20e964db653b3dd226e9d4be1f2f6' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\signatory_views\\BulletinPage.tpl',
      1 => 1358238240,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '338150f39cca531c56-24272712',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f39cca588f91_90668028',
  'variables' => 
  array (
    'mySchool_Year' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f39cca588f91_90668028')) {function content_50f39cca588f91_90668028($_smarty_tpl) {?><form method="post">
    <div class="row">
        <div class="span4">
            <ul class="nav nav-tabs">
                <li><a href='../signatory/index.php'>Dashboard</a></li>
                <li class="active"><a href='../signatory/index.php?action=viewPosting_Bulletin'>Bulletin</a></li>
                <li><a href='../signatory/index.php?action=viewListOfRequirements'>Requirements</a></li>
            </ul>
        </div>    
        <div class="span4 offset4">
            School Year:
            <select id="school_year" class="input-small" name="school_year">
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
            
    <legend>Post Bulliten</legend>
    <div class="row">    
            <div class="offset1">
                <textarea class="input-xxlarge" placeholder="Post a bulletin here....." name='post_message' rows="10" cols="30"></textarea>
            </div>  
            <div class="span2 offset6">
                <input type="submit" class="btn btn-primary" value="Post" name="postBulletin">
            </div>  
    </div>
</form>

<?php }} ?>