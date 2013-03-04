<?php /* Smarty version Smarty-3.1.12, created on 2013-03-04 17:58:07
         compiled from "C:\wamp\www\SOCS\views\signatory_views\Post_BulletinPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:223415134e0af976743-25312405%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c27af8aac0e4bbadf2a03b31a620e27d3d32d2b4' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\signatory_views\\Post_BulletinPage.tpl',
      1 => 1362418954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '223415134e0af976743-25312405',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'currentSchool_Year' => 0,
    'mySchool_Year' => 0,
    'k' => 0,
    'year' => 0,
    'currentSemester' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5134e0afa2cf06_26888546',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5134e0afa2cf06_26888546')) {function content_5134e0afa2cf06_26888546($_smarty_tpl) {?><div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Bulletin</h4>
        
        <!-- Navigations-->
        <div class="row">
            <div class="span3">
                <?php smarty_template_function_nav_signatory($_smarty_tpl,array('index'=>1));?>

            </div>
        </div>

    </div>
    <div class="span9">

        <!-- Header-->
        <h4 class="well center-text well-small">Post Annoucement</h4>

        

        <!-- Post Bulletin-->
        <form class="form-horizontal" method="post">

            <legend>Announcement Details:</legend>

            <div class="control-group">
                <div class="control-label"><b>Announcement: </b></div>
                <div class="controls">
                    <textarea required class="input-block-level" placeholder="Post a bulletin here....." name='post_message' rows="10"></textarea>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label"><b>School Year:  </b></label>
                <div class="controls">
                <input type="text" maxlength="9" pattern="[0-9\-]{9}"   id="school_year" name="school_year" value="<?php echo $_smarty_tpl->tpl_vars['currentSchool_Year']->value;?>
" autocomplete="off" class="span3" data-provide="typeahead" data-source='[
                       <?php  $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['year']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['mySchool_Year']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['year']->key => $_smarty_tpl->tpl_vars['year']->value){
$_smarty_tpl->tpl_vars['year']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['year']->key;
?>
                           <?php if (count($_smarty_tpl->tpl_vars['mySchool_Year']->value)-1==$_smarty_tpl->tpl_vars['k']->value){?>
                               "<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
"
                           <?php }else{ ?>
                               "<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
",
                           <?php }?>
                       <?php } ?>
                       ]'>
                
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><b>Semester: </b></label>
            <div class="controls">
                <select id="semester" name="semester" class="span3">
                    <?php if ($_smarty_tpl->tpl_vars['currentSemester']->value=='First'){?>
                        <option selected>First</option>
                        <option>Second</option>
                        <option>Summer</option>
                    <?php }elseif($_smarty_tpl->tpl_vars['currentSemester']->value=='Second'){?>
                        <option>First</option>
                        <option selected>Second</option>
                        <option>Summer</option>
                    <?php }else{ ?>
                        <option>First</option>
                        <option>Second</option>
                        <option selected>Summer</option>
                    <?php }?>           
                </select>
            </div>
        </div>

        <div class="control-group form-actions">
            <div class="pull-right">
                <input type="submit" class="btn btn-primary" value="Post" name="postBulletin">
                <input type="button" class="btn" value="Back" onclick="window.location.href='../signatory/bulletin.php'">
            </div>
        </div>
    </form>
</div>
</div>

<?php }} ?>