<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 08:16:53
         compiled from "C:\wamp\www\SOCS\views\student_views\StudentDashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1249850f38cd9b0e7a4-31242563%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21c702a9fa7bb53596684a01da58270de214d140' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\student_views\\StudentDashboard.tpl',
      1 => 1358237811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1249850f38cd9b0e7a4-31242563',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f38cd9ba0184_64556094',
  'variables' => 
  array (
    'mySchool_Year' => 0,
    'i' => 0,
    'myListOfSign_underDeptName' => 0,
    'k' => 0,
    'myKey_signID' => 0,
    'host' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f38cd9ba0184_64556094')) {function content_50f38cd9ba0184_64556094($_smarty_tpl) {?><div class="row">   
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
    <i class="icon-print"></i><input class="btn btn-link" type="button" value="Print Preview"> 
    <i class="icon-download"></i><input class="btn btn-link" type="button" value="Export to PDF">
</div>


<div class="row"> 
    <div class="span8 offset2">
        <table class="table-hover">
            <tr>
                <th style="height: 80px;"><div class="pull-left"><h3>Controls</h3></div></th>
                <th style="height: 80px;"><div class="pull-left"><h3>Signatory</h3></div></th>
                <th style="height: 80px;"><div class="pull-left"><h3>Status</h3></div></th>
            </tr>
            <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['myListOfSign_underDeptName']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                <tr>
                    <td style="width:400px">
                        <div class="pull-left">
                            <i class="icon-zoom-in"></i> <a style="cursor:pointer;" onclick="window.location.href=''">Requirements</a>
                            <i class="icon-zoom-in"></i> <a style="cursor:pointer;" onclick="window.location.href='index.php?action=viewMessages&Tsign_ID=<?php echo $_smarty_tpl->tpl_vars['myKey_signID']->value[$_smarty_tpl->tpl_vars['k']->value];?>
&page=1'" >Messages</a> &nbsp;                           
                        </div>                
                    </td>    
                    <td style="width: 300px;"><h4><a><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></h4></td>
                    <td style="width: 300px;"><img src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/photos/not cleared.jpg" class="img-polaroid" /></td>
                </tr>
            <?php } ?>
        </table>
    </div>    
</div>



<?php }} ?>