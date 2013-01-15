<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 04:53:39
         compiled from "C:\wamp\www\SOCS\views\signatory_views\signatory_settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1061050f4e0d3835100-22039864%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17a16ef757b03dc5891dde19146071532ab20251' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\signatory_views\\signatory_settings.tpl',
      1 => 1358225386,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1061050f4e0d3835100-22039864',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f4e0d38911e7_25164674',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f4e0d38911e7_25164674')) {function content_50f4e0d38911e7_25164674($_smarty_tpl) {?><form action='settings.php?action=verify' method='post' class="form-horizontal">
    
    <legend>Edit Account: </legend>
    
    <div class="control-group">
        <label class="control-label">Surname: </label>
        <div class="controls">
            <input type ='text' name='surname'>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label">First Name: </label>
        <div class="controls">
            <input type='text' name='firstname'>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label">Middle Name: </label>
        <div class="controls">
            <input type='text'name='middleName'>
        </div>
    </div>
    
    <legend>Change password: </legend>
    
    <div class="control-group">
        <label class="control-label">Old password: </label>
        <div class="controls">
            <input type='password' name='oldpass'>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label">New password: </label>
        <div class="controls">
            <input type='password' name='newpass'>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label">Confirm new password: </label>
        <div class="controls">
            <input type='password' name='confirmpass'>
        </div>
    </div>
    
    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit'> &nbsp; <a href='/SOCS/'>Cancel</a>
        </div>
    </div>
</form>
<?php }} ?>