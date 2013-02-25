<script>
    function getSignatory() {
        var cmdSignatory = document.getElementById("cmdSignatory").value;
        var cmdIndex = document.getElementById("cmdSignatory").selectedIndex;

        window.location.assign("?action=addSignatory&cmdSignatory=" + cmdSignatory);
    }

    function edit(idEdit, sign_id, length, countSignList) {
        if (parseInt(countSignList) > 0) {
            var listOfUnSelectSignatory = "<select class='input-large' id='editSignatorialList'>"
                    + "{foreach from = $SignatoryList item = i}"
                    + "<option>{$i}</option>"
                    + "{/foreach}"
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
    {foreach from = $SignatoryList item = i}
            if (count >= (holder - 10) && count < holder) {
                select.options[select.options.length] = new Option("{$i}");
                temp = count + 1;
            }
            count++;
    {/foreach}
            select.options[select.options.length] = new Option("---------Back--------");
            if (temp % 10 == 0) {
                select.options[select.options.length] = new Option("---------Next--------");
            }

            document.getElementById("hide").value = holder;
            document.getElementById("flag").value = "0";
        } else if (select.value == "---------Back--------") {


            var holder = parseInt(flag) == 0 ? parseInt(hide) - 20 : parseInt(hide) - 10;
            select.innerHTML = "";

    {foreach from = $SignatoryList item = i}
            if (count >= holder && count < holder + 10) {
                select.options[select.options.length] = new Option("{$i}");
            }
            count++;
    {/foreach}

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

        <!-- Navigations-->
        <div class="row">
            <div class="span3">
                {call name=nav_admin index=2}
            </div>
        </div>

        <div class="row">
            <div class="span3">
                <!-- Add Signatory -->
                {if $countSignList > 0}
                    <form class="form-inline">
                        <label><b>Add Signatory: </b></label>

                        {assign var=count value=0}
                        <select id="cmdSignatory" required onchange="newOptions();">
                            {foreach from = $SignatoryList item = i}
                            {if $count < 10}<option>{$i}</option>{/if}
                            {assign var=count value=$count + 1}
                        {/foreach}
                        <option>---------Next--------</option>
                    </select>
                    <input type=hidden id="hide" value="10">
                    <input type=hidden id="flag" value="0">

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

                    <button class="btn btn-success" type="button" onclick="getSignatory();">
                        <i class="icon-plus"></i> Add
                    </button>
                </form>
            {/if}
        </div>
    </div>

</div>
<div class="span9">

    <!-- Header-->
    <div class="well center-text well-small">
        <h3>{$Dept_name} </h3>
        <small>{$Dept_desc}</small>
    </div>

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

    <i class="icon-remove"></i>
    <a style="cursor:pointer;" onclick="findCheck('{$rowCount_signatorial}', 'signatorial list');" >Delete Selected
    </a>

    <div class="pull-right">
        Jump to: <select id="jump" class="input-mini" onchange="jumpToPage();">
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