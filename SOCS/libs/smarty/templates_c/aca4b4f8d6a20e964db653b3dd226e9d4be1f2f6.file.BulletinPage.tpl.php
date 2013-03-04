<?php /* Smarty version Smarty-3.1.12, created on 2013-03-04 17:55:17
         compiled from "C:\wamp\www\SOCS\views\signatory_views\BulletinPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:74335134e005cd8039-50405790%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aca4b4f8d6a20e964db653b3dd226e9d4be1f2f6' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\signatory_views\\BulletinPage.tpl',
      1 => 1362418954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74335134e005cd8039-50405790',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'host' => 0,
    'filter' => 0,
    'rowCount_bulletin' => 0,
    'myName_messages' => 0,
    'k' => 0,
    'myMessage_ID' => 0,
    'i' => 0,
    'my_dateTime' => 0,
    'bulletin_length' => 0,
    'start' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5134e005db6e35_06632386',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5134e005db6e35_06632386')) {function content_5134e005db6e35_06632386($_smarty_tpl) {?><div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Bulletin</h4>

        <!-- Navigations-->
        <div class="row">
            <div class="span3">
                <?php smarty_template_function_nav_signatory($_smarty_tpl,array('index'=>1));?>

            </div>
        </div>

    </div>
    <div class="span9">

        <!-- Header-->
        <h4 class="well center-text well-small">List of Announcements</h4>

        <!-- Controls-->
        <div class="navbar">
            <div class="navbar-inner">
                
                <ul class="nav">
                    <li class="divider-vertical"></li>
                    <li>
                        <a class="tips" title="Post Annoucements" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/signatory/bulletin.php?action=viewPosting_Bulletin">
                            <i class="icon-bullhorn"></i>
                        </a>
                    </li>
                    <li class="divider-vertical"></li>
                </ul>
                
                <form class="navbar-form pull-right">

                    <?php smarty_template_function_schoolyear_sem_inputs($_smarty_tpl,array());?>


                    <input id="search" class="span3" type="search" placeholder="Search date here  ..." value="<?php echo $_smarty_tpl->tpl_vars['filter']->value;?>
" onkeypress="enterSearch(event);">
                    <button class="btn btn-success" type="button" onclick="jumpToPageWithSchoolYear();">
                        <i class="icon-search icon-white"></i>
                    </button>

                </form>
            </div>
        </div>

        

        

        <!-- Table of Announcements-->
        <table class="table table-bordered table-hover">
            <tr>
                <th>
                    <input type="checkbox" onclick="isCheck(<?php echo $_smarty_tpl->tpl_vars['rowCount_bulletin']->value;?>
);" id="check"></input> Messages
                </th> 
                <th> Post Date and Time</th>
                <th> Message Info.</th>
            </tr>

            <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['myName_messages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                <tr>        
                    <td>
                        <div class="pull-left">
                            <input class="Checkbox" type="checkbox" id = '<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' value = <?php echo $_smarty_tpl->tpl_vars['myMessage_ID']->value[$_smarty_tpl->tpl_vars['k']->value];?>
 ></input> &nbsp; <?php echo $_smarty_tpl->tpl_vars['i']->value;?>

                        </div>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['my_dateTime']->value[$_smarty_tpl->tpl_vars['k']->value];?>
</td>
                    <td>
                        <i class="icon-eye-open"></i>
                        <a style="cursor:pointer;" onclick="window.location.href = '../signatory/bulletin.php?action=viewPosted_Bulletin&key=<?php echo $_smarty_tpl->tpl_vars['myMessage_ID']->value[$_smarty_tpl->tpl_vars['k']->value];?>
';"> View</a>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <!-- Delete Selected Button-->
        <a style="cursor:pointer;" onclick="findCheck('<?php echo $_smarty_tpl->tpl_vars['rowCount_bulletin']->value;?>
', 'Bulletin');">
            <i class="icon-remove"></i> Delete Selected
        </a>

        <div class="pull-right">
            Jump to: <select id="jump" class="input-mini" onchange="jumpToPageWithSchoolYear();">
                <option>--</option>
                <?php $_smarty_tpl->tpl_vars['start'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['start']->step = 1;$_smarty_tpl->tpl_vars['start']->total = (int)ceil(($_smarty_tpl->tpl_vars['start']->step > 0 ? $_smarty_tpl->tpl_vars['bulletin_length']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['bulletin_length']->value)+1)/abs($_smarty_tpl->tpl_vars['start']->step));
if ($_smarty_tpl->tpl_vars['start']->total > 0){
for ($_smarty_tpl->tpl_vars['start']->value = 1, $_smarty_tpl->tpl_vars['start']->iteration = 1;$_smarty_tpl->tpl_vars['start']->iteration <= $_smarty_tpl->tpl_vars['start']->total;$_smarty_tpl->tpl_vars['start']->value += $_smarty_tpl->tpl_vars['start']->step, $_smarty_tpl->tpl_vars['start']->iteration++){
$_smarty_tpl->tpl_vars['start']->first = $_smarty_tpl->tpl_vars['start']->iteration == 1;$_smarty_tpl->tpl_vars['start']->last = $_smarty_tpl->tpl_vars['start']->iteration == $_smarty_tpl->tpl_vars['start']->total;?>
                    <option><?php echo $_smarty_tpl->tpl_vars['start']->value;?>
</option>
                <?php }} ?>
            </select>
        </div>
    </div>
</div>

<?php }} ?>