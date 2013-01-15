<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 06:44:36
         compiled from "C:\wamp\www\SOCS\views\administrator_views\signatorialList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:545950f39ee0551321-61326019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa5576d8108afd69150b74da09752cb2250c8cc5' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\administrator_views\\signatorialList.tpl',
      1 => 1358232167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '545950f39ee0551321-61326019',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f39ee0682568_01765404',
  'variables' => 
  array (
    'SignatoryList' => 0,
    'i' => 0,
    'Dept_name' => 0,
    'filter' => 0,
    'countSignList' => 0,
    'rowCount_signatorial' => 0,
    'myName_signatorial' => 0,
    'k' => 0,
    'myKey_signatorial' => 0,
    'signatorial_length' => 0,
    'start' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f39ee0682568_01765404')) {function content_50f39ee0682568_01765404($_smarty_tpl) {?><script>  
    function getSignatory(){
        var cmdSignatory = document.getElementById("cmdSignatory").value;
        window.location.assign("?action=addSignatory&cmdSignatory=" +cmdSignatory);
    }
    
    function edit(idEdit, sign_id, length, countSignList){ 
		if(parseInt(countSignList) > 0){
			var listOfUnSelectSignatory =   "<select class='input-large' id='editSignatorialList'>"
												+"<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SignatoryList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
?>"
													+"<option><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>"
												+"<?php } ?>"
											+"</select>";
			var editSignatorialList = "<input type='button' class='btn' value='Confirmed' id='save'> &nbsp; &nbsp; "
									   + "<input type='button' class='btn' value='Cancel' id='cancel'>";
			
			hideAll(length);               
			$(document).ready(function(){
				$("#unSelectedSignatorialList" +idEdit).html(listOfUnSelectSignatory);                         
				$("#confirmed" +idEdit).html(editSignatorialList);        
			
			
				$("#save").click(function(){
					window.location.assign("?action=editSignatorialList&newSign_Name=" +$("#editSignatorialList").val() +"&oldSign_ID=" +sign_id);
				});
				$("#cancel").click(function(){
					$("#unSelectedSignatorialList" +idEdit).html($("#edit" +idEdit).val());
					$("#confirmed" +idEdit).html("");
				});
			});
		}else{
			window.location.assign("?action=cannotEdit");
		}
    }
    
    function hideAll(Tlength){
        $(document).ready(function(){
            for(var x = 0; x < Tlength; x ++){
                $("#unSelectedSignatorialList" +x).html($("#edit" +x).val());
                $("#confirmed" +x).html("");
            }
        });
    }
</script>

<h1><center><?php echo $_smarty_tpl->tpl_vars['Dept_name']->value;?>
</center></h1>

<ul class="nav nav-tabs">
    <li><a href='../administrator/course_list_byDepartment.php'>Courses</a></li>
    <li class="active"><a href='../administrator/signatorialList.php'>Signatorial List</a></li>
</ul>
   
<form class="form-horizontal">
    <input type="hidden" value="filter" name="action">
    <input class="input-xxlarge" id="search" type="text" placeholder="Search..." value ="<?php echo $_smarty_tpl->tpl_vars['filter']->value;?>
" name="filterName">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i></button>
    <div class="pull-right">   
        <?php if ($_smarty_tpl->tpl_vars['countSignList']->value>0){?>
			<label class="control-label">Choose Signatory:</label>
		<?php }?>      
        <div class="controls">
			<?php if ($_smarty_tpl->tpl_vars['countSignList']->value>0){?>
				<select class='input-large' id="cmdSignatory">
                <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SignatoryList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
?>
                    <option><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                <?php } ?>
				</select>
				<input class="btn" type="button" value="Add" onclick="getSignatory()">
			<?php }?>            
            <input class="btn" type="button" value="Back" onclick="window.location.href='department_list_manager.php'"> 
        </div>
    </div>
</form>

<a href = "javascript:isCheckAll(true, <?php echo $_smarty_tpl->tpl_vars['rowCount_signatorial']->value;?>
)" >Checked All</a> / 
<a href = "javascript:isCheckAll(false, <?php echo $_smarty_tpl->tpl_vars['rowCount_signatorial']->value;?>
)" >Unchecked All</a>

<table class="table table-hover">     
    <tr>
        <th><p class="pull-left">Controls</p></th>
        <th> Signatories</th>       
    </tr>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['myName_signatorial']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?> 
    <tr>
        <td style="width:400px">
            <div class="pull-left">
                <input type="hidden" id = 'edit<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' value = "<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
                <input type="checkbox" id = '<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' value = <?php echo $_smarty_tpl->tpl_vars['myKey_signatorial']->value[$_smarty_tpl->tpl_vars['k']->value];?>
 ></input> &nbsp; &nbsp;
                <i class="icon-pencil"></i><a style="cursor:pointer;" href="javascript:edit('<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['myKey_signatorial']->value[$_smarty_tpl->tpl_vars['k']->value];?>
','<?php echo $_smarty_tpl->tpl_vars['rowCount_signatorial']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['countSignList']->value;?>
')"> Edit</a>&nbsp; &nbsp; 
                <i class="icon-remove"></i><a style="cursor:pointer;" onclick="confirmDelete('<?php echo $_smarty_tpl->tpl_vars['myKey_signatorial']->value[$_smarty_tpl->tpl_vars['k']->value];?>
')"> Delete</a>
            </div>          
        </td>
        <td><p id='unSelectedSignatorialList<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</p></td>
        <td><p id="confirmed<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"></p></td>
    </tr>
<?php } ?>
</table>

<a style="cursor:pointer;" onclick="findCheck('<?php echo $_smarty_tpl->tpl_vars['rowCount_signatorial']->value;?>
')" >Delete Selected</a>

<div class="pull-right">
    Jump to: <select id="jump" class="input-mini" onchange="jumpToPage()">
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

<?php }} ?>