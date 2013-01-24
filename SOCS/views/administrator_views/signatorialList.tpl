<script>  
    function getSignatory(){
    var cmdSignatory = document.getElementById("cmdSignatory").value;
    var cmdIndex = document.getElementById("cmdSignatory").selectedIndex;
    
    if(cmdIndex > 0)window.location.assign("?action=addSignatory&cmdSignatory=" +cmdSignatory);  
}
    
function edit(idEdit, sign_id, length, countSignList){ 
if(parseInt(countSignList) > 0){
var listOfUnSelectSignatory =   "<select class='input-large' id='editSignatorialList'>"
    +"{foreach from = $SignatoryList item = i}"
    +"<option>{$i}</option>"
    +"{/foreach}"
    +"</select>";
var editSignatorialList = "<input type='button' class='btn' value='Confirmed' id='save'> "
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

<!-- Header-->
<h1>
    <center>{$Dept_name}</center>
</h1>

<!-- Navigation Tab-->
<ul class="nav nav-tabs">
    <li><a href='../administrator/course_list_byDepartment.php'>Courses</a></li>
    <li class="active"><a href='../administrator/signatorialList.php'>Signatorial List</a></li>
</ul>

<!-- Inputs -->

{if $countSignList > 0}
    <select class='input-large pull-right' id="cmdSignatory">
        <option>Signatory:</option>
        {foreach from = $SignatoryList item = i}
            <option>{$i}</option>
        {/foreach}
    </select>

{/if}  

<!--Search Bar and other inputs-->
{call name=search}

<div class="pull-right" style="margin-top: -15px; padding-bottom: 20px;">
    <input class="btn" type="button" value="Add" onclick="getSignatory()"> &nbsp;
    <input class="btn pull-right" type="button" value="Back" onclick="window.location.href='department_list_manager.php'"> 
</div>

<table class="table table-hover">    
    <tr>
        <th style="width: 250px;">
            <input type="checkbox" onclick="isCheck({$rowCount_signatorial})" id="check"> Signatories
        </th>
        <th style="width: 340px;"></th>
        <th><div>Controls</div></th>
</tr>
{foreach from = $myName_signatorial key = k item = i} 
    <tr>
        <td>
            <label class="checkbox">
                <input type="hidden" id = 'edit{$k}' value = "{$i}">
                <input class="Checkbox" type="checkbox" id = '{$k}' value = {$myKey_signatorial[$k]} ></input> 
                <div id='unSelectedSignatorialList{$k}'>{$i}</div>
            </label>
        </td>    
        <td><label id="confirmed{$k}"></label></td>
        <td>
            <i class="icon-pencil"></i><a style="cursor:pointer;" href="javascript:edit('{$k}','{$myKey_signatorial[$k]}','{$rowCount_signatorial}','{$countSignList}')"> Edit</a> &nbsp;                     
        </td>    
    </tr>
{/foreach}
</table>

<i class="icon-remove"></i><a style="cursor:pointer;" onclick="findCheck('{$rowCount_signatorial}','signatorial list')" >Delete Selected</a>

<div class="pull-right">
    Jump to: <select id="jump" class="input-mini" onchange="jumpToPage()">
        <option>--</option>
        {for $start = 1 to $signatorial_length}
        <option>{$start}</option>
        {/for}
    </select>
</div>