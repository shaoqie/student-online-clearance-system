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

<div class="row">
    <div class="span3">

        <!-- Navigations-->
        <div class="row">
            <div class="span3">
                {call name=nav_admin index=4}
            </div>
        </div>

    </div>
    <div class="span9">

        <!-- Header-->
        <h2 class="well center-text">{$Dept_name}</h2>

        <!-- Visibility -->
        <div class="form-inline pull-right">
            <label><b>Visibility: </b></label>
            <select id="visibility" class="span2" onchange="signatorialList_visibility()">
                <option value="0" {if $index_tabs == 0} selected {/if}>Under Graduate</option>
                <option value="1" {if $index_tabs == 1} selected {/if}>Graduate</option>
            </select>
        </div>


        <!-- Back Button-->
        <!-- <input class="btn pull-right" type="button" value="Back" onclick="window.location.href='department_list_manager.php'"> -->

        <!-- Navigation Tab-->
        <ul class="nav nav-tabs">
            <li><a href='../administrator/course_list_byDepartment.php'>Courses</a></li>
            <li class="active"><a href='../administrator/signatorialList.php'>Signatorial List</a></li>
        </ul>
       
        <!-- Add Signatory -->
        {if $countSignList > 0}
            <span class="pull-left">
                <form class="form-inline">
                    <label><b>Add Signatory: </b></label>


                    <select class="span2" id="cmdSignatory" required>
                        <option></option>
                        {foreach from = $SignatoryList item = i}
                            <option>{$i}</option>
                        {/foreach}
                    </select>


                    {*
                    <input type="text" id="cmdSignatory" required autocomplete="off" class="span2" data-provide="typeahead" data-source='[
                    {foreach from=$SignatoryList key=k item=i}
                    {if $SignatoryList|@count - 1 eq $k}
                    "{$i}"
                    {else}
                    "{$i}",
                    {/if}
                    {/foreach}
                    ]'>
                    *}     

                    <input class="btn btn-primary" type="button" value="Add" onclick="getSignatory()">
                </form>
            </span>
        {/if}

        <!-- Search Bar-->
        <span class="pull-right">
            {call name=search}
        </span>

        <!-- Table of Signatories-->
        <table class="table table-hover">    
            <tr>
                <th>
                    <input type="checkbox" onclick="isCheck({$rowCount_signatorial})" id="check"> Signatories
                </th>
                <th></th>
                <th>Controls</th>
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
                    <td>
                        <label id="confirmed{$k}"></label>
                    </td>
                    <td>
                        <a style="cursor:pointer;" href="javascript:edit('{$k}','{$myKey_signatorial[$k]}','{$rowCount_signatorial}','{$countSignList}')">
                            <i class="icon-pencil"></i> Edit
                        </a>
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

    </div>
</div>

{*
<!-- Back Button-->
<input class="btn pull-right" type="button" value="Back" onclick="window.location.href='department_list_manager.php'">

<!-- Navigation Tab-->
<ul class="nav nav-tabs">
<li><a href='../administrator/course_list_byDepartment.php'>Courses</a></li>
<li class="active"><a href='../administrator/signatorialList.php'>Signatorial List</a></li>
</ul>

<!-- Header-->
<div class="row">
<div class="span9 well">
<h1 style="text-align: center;">{$Dept_name}</h1>
</div>
</div>

<!-- Add Signatory -->
{if $countSignList > 0}
<span class="pull-left">
<form class="form-inline">
<label>Add Signatory:</label>
<select class="span2" id="cmdSignatory" required>
<option></option>
{foreach from = $SignatoryList item = i}
<option>{$i}</option>
{/foreach}
</select>
<input class="btn btn-primary" type="button" value="Add" onclick="getSignatory()">
</form>
</span>
{/if}

<!-- Search Bar-->
<span class="pull-right">
{call name=search}
</span>

<!-- Table of Signatories-->
<table class="table table-hover">    
<tr>
<th>
<input type="checkbox" onclick="isCheck({$rowCount_signatorial})" id="check"> Signatories
</th>
<th></th>
<th>Controls</th>
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
<td>
<label id="confirmed{$k}"></label>
</td>
<td>
<i class="icon-pencil"></i>
<a style="cursor:pointer;" href="javascript:edit('{$k}','{$myKey_signatorial[$k]}','{$rowCount_signatorial}','{$countSignList}')"> Edit</a>
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
*}