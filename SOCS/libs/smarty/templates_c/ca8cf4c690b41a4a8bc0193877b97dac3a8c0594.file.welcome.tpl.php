<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 06:44:21
         compiled from "C:\wamp\www\SOCS\views\main_views\welcome.tpl" */ ?>
<?php /*%%SmartyHeaderCode:799450f38c538cb425-74738091%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca8cf4c690b41a4a8bc0193877b97dac3a8c0594' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\main_views\\welcome.tpl',
      1 => 1358232167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '799450f38c538cb425-74738091',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f38c538d86a1_53464072',
  'variables' => 
  array (
    'host' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f38c538d86a1_53464072')) {function content_50f38c538d86a1_53464072($_smarty_tpl) {?><div class="hero-unit">
    <div class="row">
        <div class="span3">
            <img src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/public/img/title.png" />
        </div>
        <div class="span6">
            <h1>Welcome to SOCS!</h1>
            <p>The Student Online Clearance System of The University of Southeastern Philippines, Davao City.</p>
            <p><a class="btn btn-primary btn-large">Learn More &raquo;</a></p>
        </div>
    </div>
</div><?php }} ?>