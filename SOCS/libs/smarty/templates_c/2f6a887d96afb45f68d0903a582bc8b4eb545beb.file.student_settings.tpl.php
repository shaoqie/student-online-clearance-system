<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 04:51:50
         compiled from "C:\wamp\www\SOCS\views\student_views\student_settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:460350f4e066b119b5-06078983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f6a887d96afb45f68d0903a582bc8b4eb545beb' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\student_views\\student_settings.tpl',
      1 => 1358225386,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '460350f4e066b119b5-06078983',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f4e066b762a4_56785021',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f4e066b762a4_56785021')) {function content_50f4e066b762a4_56785021($_smarty_tpl) {?><form action='settings.php?action=verify' method='post' class="form-horizontal">
    
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