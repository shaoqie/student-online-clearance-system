<?php /* Smarty version Smarty-3.1.12, created on 2013-03-04 17:54:49
         compiled from "C:\wamp\www\SOCS\views\main_views\welcome.tpl" */ ?>
<?php /*%%SmartyHeaderCode:224145134dfe95386e9-97749387%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca8cf4c690b41a4a8bc0193877b97dac3a8c0594' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\main_views\\welcome.tpl',
      1 => 1362418952,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '224145134dfe95386e9-97749387',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'host' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5134dfe9559a56_42133896',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5134dfe9559a56_42133896')) {function content_5134dfe9559a56_42133896($_smarty_tpl) {?><div id="socs-carousel" class="carousel slide">
    <div class="carousel-inner">
        <div class="item active">
            <div class="container">
                <img class="carousel-images" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/public/img/carousel/1.jpg" alt="" />

                <div class="carousel-caption socs-welcome hero-unit">
                    <h1>Welcome to SOCS!</h1>
                    <p class="lead">The Student Online Clearance System of The University of Southeastern Philippines, Davao City.</p>
                    <button class="btn btn-primary btn-large">Learn More &raquo;</button><br>
                </div>

            </div>
        </div>
        <div class="item">
            <div class="container">
                <img class="carousel-images" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/public/img/carousel/2.jpg" alt="" />
                
            </div>
        </div>
        <div class="item">
            <div class="container">
                <img class="carousel-images" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/public/img/carousel/3.jpg" alt="" />
                
            </div>
        </div>
    </div>
    <a class="carousel-control left" href="#socs-carousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#socs-carousel" data-slide="next">&rsaquo;</a>
</div>


<?php }} ?>