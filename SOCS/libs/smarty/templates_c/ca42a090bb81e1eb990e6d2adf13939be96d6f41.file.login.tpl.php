<?php /* Smarty version Smarty-3.1.12, created on 2013-03-04 17:55:34
         compiled from "C:\wamp\www\SOCS\views\main_views\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:269275134e0163fdff1-31800984%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca42a090bb81e1eb990e6d2adf13939be96d6f41' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\main_views\\login.tpl',
      1 => 1362418952,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '269275134e0163fdff1-31800984',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'host' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5134e016443dd0_13080633',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5134e016443dd0_13080633')) {function content_5134e016443dd0_13080633($_smarty_tpl) {?><script>
    function view_ForgotPass(){
        
        
        $(document).ready(function(){ 
        
        
            $("#forgotPass").toggle();
            $("#forgotOk").toggle();
        }); 
    }
</script>

<div class="row">
    <div class="span3">
        <img src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/public/img/title.png" />
    </div>
    <div class="span5">
        <form action="index.php?action=login" method="post" class="form-horizontal">
            <legend>Login</legend>
            <div class="control-group">
                <label class="control-label">Username: </label>
                <div class="controls">
                    <input type="text" placeholder="Enter Your Username" name = "username" autofocus required>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Password: </label>
                <div class="controls">
                    <input type="password" placeholder="Enter Your Password" name = "password" required>
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <button class="btn btn-primary" type="submit"><i class="icon-check icon-white"></i>  Login</button>
                </div>
            </div>    
        </form>
        
        <form class="form-horizontal" method="post" action="index.php?action=ForgotPass">
            <div class="control-group">
                <div class="controls">
                    <input type="button" href="" class="btn btn-link" onclick="view_ForgotPass()" value="Forgot your password?">
                </div>
            </div>
            <div class="control-group" id="forgotPass" hidden>
                <label class="control-label">Username: </label>
                <div class="controls">
                    <input type="text" placeholder="Enter Your Username" name="ForgotPass">
                </div>
            </div>
            <div class="control-group" id="forgotOk" hidden>
                <label class="control-label"></label>
                <div class="controls">
                    <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                </div>
            </div>
        </form> 
            
            
    </div>
</div>

<?php }} ?>