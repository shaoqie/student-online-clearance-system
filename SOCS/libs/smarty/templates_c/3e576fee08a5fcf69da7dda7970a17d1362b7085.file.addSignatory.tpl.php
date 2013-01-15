<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 07:05:41
         compiled from "C:\wamp\www\SOCS\views\administrator_views\addSignatory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:865850f4ffc5ed6d29-68560097%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e576fee08a5fcf69da7dda7970a17d1362b7085' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\administrator_views\\addSignatory.tpl',
      1 => 1358232167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '865850f4ffc5ed6d29-68560097',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f4ffc5f0cf14_21489556',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f4ffc5f0cf14_21489556')) {function content_50f4ffc5f0cf14_21489556($_smarty_tpl) {?><ul class="nav nav-tabs">
    <li><a href='../administrator/index.php'>User Accounts</a></li>
    <li  class="active"><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
    <li><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<button class="pull-right btn" onclick="window.location.href='signatory_list_manager.php'">Back</button>
        
<form action="signatory_list_manager.php?action=add_signatory" method='post' class="form-horizontal">
    <legend>Add Signatory:</legend>
    <div class="control-group">
        <label class="control-label">Signatory Name: </label>
        <div class="controls">
            <input class="input-xxlarge" type ='text' name='sign_name'>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Description: </label>
        <div class="controls">
            <textarea class="input-xxlarge" name='sign_description' rows="5" cols="50"></textarea>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit' value='Save'>
        </div>
    </div>
</form>       <?php }} ?>