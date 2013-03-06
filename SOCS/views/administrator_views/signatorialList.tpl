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

        <!-- Admin Navigations--> 
        {call name=nav_admin index=3}

    </div>
    <div class="span9">

        <!-- Header-->
        <div class="well center-text well-small">
            <h4>{$Dept_name} </h4>
            <small>{$Dept_desc}</small>
        </div>

        <div class="navbar">
            <div class="navbar-inner">

                {call name=nav_departments index=2}

                {call name=search}

            </div>
        </div>

        <!-- Visibility -->
        <div class="form-inline pull-right">
            <select id="visibility" class="select2 span2" onchange="signatorialList_visibility();">
                <option value="0" {if $index_tabs == 0} selected {/if}>Under Graduate</option>
                <option value="1" {if $index_tabs == 1} selected {/if}>Graduate</option>
            </select>
        </div>

        <form class="form-inline">

            <input type="hidden" name="action" value="addSignatory">

            <select name="cmdSignatory" class="select2 input-large" data-placeholder="Select Signatory" required>
                <option></option>
                {foreach from = $SignatoryList item = i}
                    <option>{$i}</option>
                {/foreach}
            </select>

            <button class="btn btn-success" type="submit">
                <i class="icon-plus"></i> Add
            </button>
        </form>

        <!-- Table of Signatories-->
        <table class="table table-hover table-bordered">    
            <tr>
                <th>
                    <input type="checkbox" onclick="isCheck({$rowCount_signatorial});" id="check"> Signatories
                </th>
                <th>Controls</th>
            </tr>
            {foreach from = $myName_signatorial key = k item = i} 
                <tr>
                    <td>
                        <label class="checkbox">
                            <input type="hidden" id = 'edit{$k}' value = "{$i}">
                            <input class="Checkbox" type="checkbox" id = '{$k}' value = {$myKey_signatorial[$k]} >
                            <div id='unSelectedSignatorialList{$k}'>{$i}</div>
                        </label>
                    </td>    
                    <td>

                        <a href="#edit_dept_signatory" data-toggle="modal" onclick="set_input({$myKey_signatorial[$k]})">
                            <i class="icon-exchange"></i> Replace
                        </a>

                        {*
                        <a style="cursor:pointer;" href="javascript:edit('{$k}','{$myKey_signatorial[$k]}','{$rowCount_signatorial}','{$countSignList}')">
                        <i class="icon-pencil"></i> Edit
                        </a>
                        *}

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