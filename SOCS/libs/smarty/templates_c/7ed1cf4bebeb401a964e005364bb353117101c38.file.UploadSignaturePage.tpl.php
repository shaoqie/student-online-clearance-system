<?php /* Smarty version Smarty-3.1.12, created on 2013-03-04 17:57:41
         compiled from "C:\wamp\www\SOCS\views\signatory_views\UploadSignaturePage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:275805134e0955139d0-75209932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ed1cf4bebeb401a964e005364bb353117101c38' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\signatory_views\\UploadSignaturePage.tpl',
      1 => 1362418954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '275805134e0955139d0-75209932',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'signatureImage' => 0,
    'hasImageSet' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5134e095572315_78386319',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5134e095572315_78386319')) {function content_5134e095572315_78386319($_smarty_tpl) {?><div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Upload Signature</h4>

        <!-- Navigations-->
        <div class="row">
            <div class="span3">
                <?php smarty_template_function_nav_signatory($_smarty_tpl,array('index'=>3));?>

            </div>
        </div>

    </div>
    <div class="span9">

        <!-- Header-->
        <h4 class="well center-text well-small">Signature</h4>

        <legend>Current signature image</legend>
        <img src="<?php echo $_smarty_tpl->tpl_vars['signatureImage']->value;?>
" class="img-polaroid" width="200" height="35"></br>
    <?php if ($_smarty_tpl->tpl_vars['hasImageSet']->value=='1'){?><a href="uploadSignature.php?action=reset">Remove Signature</a><?php }?>

    <legend>Upload new signature</legend>

    <form action='UploadSignature.php?action=uploadSignature' method='post' class="form-horizontal" enctype="multipart/form-data">
        <div class="control-group">
            <label class="control-label"><b>Upload Picture: </b></label>
            <div class="controls">
                <input type="file" name="signatureimage">
                <span class="help-block">Only 200 x 35 image dimensions are allowed. Max 1MB size.</span>
            </div>
        </div>

        <div class="form-actions">
            <div class="pull-right">
                <input class="btn btn-primary" type='Submit' value='Upload' name='upload' />
                <button class="btn" type="button" onclick="window.history.back();">Back</button>
            </div>
        </div>
    </form>


</div>
</div>

<?php }} ?>