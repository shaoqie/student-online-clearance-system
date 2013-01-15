<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 08:26:22
         compiled from "C:\wamp\www\SOCS\views\signatory_views\Student_Detailed.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1362050f38c633ba7b2-11510443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2736d1cded087346baa9b1cee6008831d4286cbd' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\signatory_views\\Student_Detailed.tpl',
      1 => 1358238380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1362050f38c633ba7b2-11510443',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f38c63474de6_39883373',
  'variables' => 
  array (
    'mySchool_Year' => 0,
    'i' => 0,
    'host' => 0,
    'student_name' => 0,
    'course_name' => 0,
    'dept_name' => 0,
    'stud_gender' => 0,
    'stud_yr_level' => 0,
    'stud_program' => 0,
    'stud_section' => 0,
    'stud_status' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f38c63474de6_39883373')) {function content_50f38c63474de6_39883373($_smarty_tpl) {?><div class="row">
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
        <form class="form-horizontal">
            <legend>Student Detailed</legend>
            <div class="control-group">
                <label class="control-label"><b>Gender:</b></label>
                <label class="control-label"><?php echo $_smarty_tpl->tpl_vars['stud_gender']->value;?>
 </label>                
            </div>
            <div class="control-group">
                <label class="control-label"><b>Year Level:</b></label>
                <label class="control-label"><?php echo $_smarty_tpl->tpl_vars['stud_yr_level']->value;?>
  </label>                
            </div>
            <div class="control-group">
                <label class="control-label"><b>Program:</b></label>
                <label class="control-label"><?php echo $_smarty_tpl->tpl_vars['stud_program']->value;?>
  </label>                
            </div>
            <div class="control-group">
                <label class="control-label"><b>Section:</b></label>
                <label class="control-label"><?php echo $_smarty_tpl->tpl_vars['stud_section']->value;?>
  </label>                
            </div>
            <div class="control-group">
                <label class="control-label"><b>Overall Status:</b></label>
                <?php if ($_smarty_tpl->tpl_vars['stud_status']->value=='Cleared'){?>
                    <label class="control-label" style="color:blue;"> <?php echo $_smarty_tpl->tpl_vars['stud_status']->value;?>
</label>    
                <?php }else{ ?>
                    <label class="control-label" style="color:red;"><?php echo $_smarty_tpl->tpl_vars['stud_status']->value;?>
</label>    
                <?php }?>              
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="span2 offset1">
         <input type="button" class="btn btn-primary" value="Back" onclick="window.location.href='index.php'">
    </div>   
</div>
<?php }} ?>