<?php /* Smarty version Smarty-3.1.12, created on 2013-03-04 17:55:46
         compiled from "C:\wamp\www\SOCS\views\administrator_views\signatorialList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:269555134e02257a638-85404495%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa5576d8108afd69150b74da09752cb2250c8cc5' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\administrator_views\\signatorialList.tpl',
      1 => 1362418954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '269555134e02257a638-85404495',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SignatoryList' => 0,
    'i' => 0,
    'Dept_name' => 0,
    'Dept_desc' => 0,
    'index_tabs' => 0,
    'rowCount_signatorial' => 0,
    'myName_signatorial' => 0,
    'k' => 0,
    'myKey_signatorial' => 0,
    'countSignList' => 0,
    'signatorial_length' => 0,
    'start' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5134e022713b91_57720594',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5134e022713b91_57720594')) {function content_5134e022713b91_57720594($_smarty_tpl) {?><script>
    function getSignatory() {
        var cmdSignatory = document.getElementById("cmdSignatory").value;
        var cmdIndex = document.getElementById("cmdSignatory").selectedIndex;

        window.location.assign("?action=addSignatory&cmdSignatory=" + cmdSignatory);
    }

    function edit(idEdit, sign_id, length, countSignList) {
        if (parseInt(countSignList) > 0) {
            var listOfUnSelectSignatory = "<select class='input-large' id='editSignatorialList'>"
                    + "<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SignatoryList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
?>"
                    + "<option><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>"
                    + "<?php } ?>"
                    + "</select>";
            var editSignatorialList = "<input type='button' class='btn' value='Confirmed' id='save'> "
                    + "<input type='button' class='btn' value='Cancel' id='cancel'>";

            hideAll(length);
            $(document).ready(function() {
                $("#unSelectedSignatorialList" + idEdit).html(listOfUnSelectSignatory);
                $("#confirmed" + idEdit).html(editSignatorialList);


                $("#save").click(function() {
                    window.location.assign("?action=editSignatorialList&newSign_Name=" + $("#editSignatorialList").val() + "&oldSign_ID=" + sign_id);
                });
                $("#cancel").click(function() {
                    $("#unSelectedSignatorialList" + idEdit).html($("#edit" + idEdit).val());
                    $("#confirmed" + idEdit).html("");
                });
            });
        } else {
            window.location.assign("?action=cannotEdit");
        }
    }

    function hideAll(Tlength) {
        $(document).ready(function() {
            for (var x = 0; x < Tlength; x++) {
                $("#unSelectedSignatorialList" + x).html($("#edit" + x).val());
                $("#confirmed" + x).html("");
            }
        });
    }

    function newOptions() {
        var select = document.getElementById("cmdSignatory");
        var hide = document.getElementById("hide").value;
        var flag = document.getElementById("flag").value;
        var count = 0;
        var temp = 0;
        if (select.value == "---------Next--------") {
            var holder = flag == 1 ? parseInt(hide) + 20 : parseInt(hide) + 10;
            select.innerHTML = "";
    <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SignatoryList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
?>
            if (count >= (holder - 10) && count < holder) {
                select.options[select.options.length] = new Option("<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
");
                temp = count + 1;
            }
            count++;
    <?php } ?>
            select.options[select.options.length] = new Option("---------Back--------");
            if (temp % 10 == 0) {
                select.options[select.options.length] = new Option("---------Next--------");
            }

            document.getElementById("hide").value = holder;
            document.getElementById("flag").value = "0";
        } else if (select.value == "---------Back--------") {


            var holder = parseInt(flag) == 0 ? parseInt(hide) - 20 : parseInt(hide) - 10;
            select.innerHTML = "";

    <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SignatoryList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
?>
            if (count >= holder && count < holder + 10) {
                select.options[select.options.length] = new Option("<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
");
            }
            count++;
    <?php } ?>

            if (parseInt(holder) != 0) {
                select.options[select.options.length] = new Option("---------Back--------");
            }
            select.options[select.options.length] = new Option("---------Next--------");

            document.getElementById("hide").value = holder;
            document.getElementById("flag").value = "1";
        }
    }
</script>

<div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Departments</h4>

        <!-- Admin Navigations--> 
        <?php smarty_template_function_nav_admin($_smarty_tpl,array('index'=>3));?>


    </div>
    <div class="span9">

        <!-- Header-->
        <div class="well center-text well-small">
            <h4><?php echo $_smarty_tpl->tpl_vars['Dept_name']->value;?>
 </h4>
            <small><?php echo $_smarty_tpl->tpl_vars['Dept_desc']->value;?>
</small>
        </div>

        <div class="navbar">
            <div class="navbar-inner">

                <?php smarty_template_function_nav_departments($_smarty_tpl,array('index'=>2));?>


                <?php smarty_template_function_search($_smarty_tpl,array());?>


            </div>
        </div>

        <!-- Visibility -->
        <div class="form-inline pull-right">
            <select id="visibility" class="select2 span2" onchange="signatorialList_visibility();">
                <option value="0" <?php if ($_smarty_tpl->tpl_vars['index_tabs']->value==0){?> selected <?php }?>>Under Graduate</option>
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['index_tabs']->value==1){?> selected <?php }?>>Graduate</option>
            </select>
        </div>

        <form class="form-inline">

            <input type="hidden" name="action" value="addSignatory">
            
            <select name="cmdSignatory" class="select2 input-large" data-placeholder="Select Signatory" required>
                <option></option>
                <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SignatoryList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
?>
                    <option><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                <?php } ?>
            </select>

            <button class="btn btn-success" type="submit">
                <i class="icon-plus"></i> Add
            </button>
        </form>

        

        <!-- Table of Signatories-->
        <table class="table table-hover">    
            <tr>
                <th>
                    <input type="checkbox" onclick="isCheck(<?php echo $_smarty_tpl->tpl_vars['rowCount_signatorial']->value;?>
);" id="check"> Signatories
                </th>
                <th></th>
                <th>Controls</th>
            </tr>
            <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['myName_signatorial']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?> 
                <tr>
                    <td>
                        <label class="checkbox">
                            <input type="hidden" id = 'edit<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' value = "<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
                            <input class="Checkbox" type="checkbox" id = '<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' value = <?php echo $_smarty_tpl->tpl_vars['myKey_signatorial']->value[$_smarty_tpl->tpl_vars['k']->value];?>
 ></input> 
                            <div id='unSelectedSignatorialList<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</div>
                        </label>
                    </td>    
                    <td>
                        <label id="confirmed<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"></label>
                    </td>
                    <td>
                        <a style="cursor:pointer;" href="javascript:edit('<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['myKey_signatorial']->value[$_smarty_tpl->tpl_vars['k']->value];?>
','<?php echo $_smarty_tpl->tpl_vars['rowCount_signatorial']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['countSignList']->value;?>
')">
                            <i class="icon-pencil"></i> Edit
                        </a>
                    </td>    
                </tr>
            <?php } ?>
        </table>

        <i class="icon-remove"></i>
        <a style="cursor:pointer;" onclick="findCheck('<?php echo $_smarty_tpl->tpl_vars['rowCount_signatorial']->value;?>
', 'signatorial list');" >Delete Selected
        </a>

        <div class="pull-right">
            Jump to: <select id="jump" class="input-mini" onchange="jumpToPage();">
                <option>--</option>
                <?php $_smarty_tpl->tpl_vars['start'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['start']->step = 1;$_smarty_tpl->tpl_vars['start']->total = (int)ceil(($_smarty_tpl->tpl_vars['start']->step > 0 ? $_smarty_tpl->tpl_vars['signatorial_length']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['signatorial_length']->value)+1)/abs($_smarty_tpl->tpl_vars['start']->step));
if ($_smarty_tpl->tpl_vars['start']->total > 0){
for ($_smarty_tpl->tpl_vars['start']->value = 1, $_smarty_tpl->tpl_vars['start']->iteration = 1;$_smarty_tpl->tpl_vars['start']->iteration <= $_smarty_tpl->tpl_vars['start']->total;$_smarty_tpl->tpl_vars['start']->value += $_smarty_tpl->tpl_vars['start']->step, $_smarty_tpl->tpl_vars['start']->iteration++){
$_smarty_tpl->tpl_vars['start']->first = $_smarty_tpl->tpl_vars['start']->iteration == 1;$_smarty_tpl->tpl_vars['start']->last = $_smarty_tpl->tpl_vars['start']->iteration == $_smarty_tpl->tpl_vars['start']->total;?>
                    <option><?php echo $_smarty_tpl->tpl_vars['start']->value;?>
</option>
                <?php }} ?>
            </select>
        </div>

    </div>
</div><?php }} ?>