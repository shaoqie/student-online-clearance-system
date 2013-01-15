<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 07:07:47
         compiled from "C:\wamp\www\SOCS\views\main_views\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1212550f38cd5518024-25477022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca42a090bb81e1eb990e6d2adf13939be96d6f41' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\main_views\\login.tpl',
      1 => 1358232167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1212550f38cd5518024-25477022',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f38cd555f5b8_46625217',
  'variables' => 
  array (
    'host' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f38cd555f5b8_46625217')) {function content_50f38cd555f5b8_46625217($_smarty_tpl) {?><div class="row">
    <div class="span3">
        <img src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/public/img/title.png" />
    </div>
    <div class="span6">
        <form action="index.php?action=login" method="post" class="form-horizontal">
            <legend>Login</legend>
            <div class="control-group">
                <label class="control-label">Username: </label>
                <div class="controls">
                    <input type="text" placeholder="Enter Your Username" name = "username" autofocus>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Password: </label>
                <div class="controls">
                    <input type="password" placeholder="Enter Your Password" name = "password">
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <button class="btn btn-primary" type="submit"><i class="icon-check icon-white"></i>  Login</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php }} ?>