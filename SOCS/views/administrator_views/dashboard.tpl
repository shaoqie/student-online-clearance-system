{*
<div class="row">
<div class="span3 well">

<!-- Search Bar-->
<div class="row">
<div class="span3">
{call name=search}
</div>
</div>

<!-- Navigations-->
<div class="row">
<div class="span3">
{call name=nav_admin index=0}
</div>
</div>

</div>
<div class="span8">

<h1 class="well">Students</h1>

<!-- Add Signatory In-charge Button-->
<div class="row">
<div class="span8">
{if $user_type == 'Signatory'}
<input class="btn pull-right" type="button" value="Add Signatory In-Charge" onclick="window.location.href='../administrator/index.php?action=addSignatoryInCharge'">
{/if}
</div>
</div>

<hr>

<div class="row">
<div class="span8">
<!-- User Table-->
<table class="table table-bordered">     
<tr>
<th>
<input type="checkbox" onclick="isCheck({$rowCount_admin})" id="check"> User
</th>
<th>{$courseORsign}</th>
<th>Type</th>
</tr>
{foreach from = $myName key = k item = i}
<tr>
<td>
<label class="checkbox">
<input class="Checkbox" type="checkbox" id = '{$k}' value = {$myKey_admin[$k]}> {$i}
</label>
</td>
<td>{$my_courseORsign[$k]}</td>
<td>{$myType[$k]}</td>
</tr>
{/foreach}
</table>

<!-- Delete Control-->
<a style="cursor:pointer;" onclick="findCheckUser('{$rowCount_admin}','users','{$user_type}')">
<i class="icon-remove"></i> Delete Selected
</a>

<!-- Pagination -->

<div class="pull-right">
Jump to: 
<select id="jump" class="input-mini" onchange="jumpToPageUser('{$user_type}')">
<option>--</option>
{for $start = 1 to $admin_length}
<option>{$start}</option>
{/for}
</select>
</div>
</div>
</div>
</div>
</div>
*}

<!-- Navigation Tabs-->
<ul class="nav nav-tabs">
    <li class="dropdown active" >
        <a class="dropdown-toggle"
           data-toggle="dropdown"
           href="#">
            User Accounts
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><a href='../administrator/index.php?user_type=Student'>Student</a></li>
            <li><a href='../administrator/index.php?user_type=Signatory'>Confirmed Signatory</a></li>
            <li><a href='../administrator/unconfirmed_signatory.php'>Unconfirmed Signatory</a></li>
        </ul>
    </li>   
    <li><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
    <li><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<!-- Search Bar-->
{if $user_type == 'Signatory'}
    <input class="btn" type="button" value="Add Signatory In-Charge" onclick="window.location.href='../administrator/index.php?action=addSignatoryInCharge'">
{/if}
<span class="pull-right">
    {call name=search}
</span>

<!-- User Table-->
<table class="table table-hover">     
    <tr>
        <th>
            <input type="checkbox" onclick="isCheck({$rowCount_admin})" id="check"> User
        </th>
        <th>{$courseORsign}</th>
        <th>Type</th>
    </tr>
    {foreach from = $myName key = k item = i}
        <tr>
            <td>
                <label class="checkbox">
                    <input class="Checkbox" type="checkbox" id = '{$k}' value = {$myKey_admin[$k]}> {$i}
                </label>
            </td>
            <td>{$my_courseORsign[$k]}</td>
            <td>{$myType[$k]}</td>
        </tr>
    {/foreach}
</table>

<!-- Delete Control-->
<a style="cursor:pointer;" onclick="findCheckUser('{$rowCount_admin}','users','{$user_type}')">
    <i class="icon-remove"></i> Delete Selected
</a>

<!-- Pagination -->

<div class="pull-right">
    Jump to: 
    <select id="jump" class="input-mini" onchange="jumpToPageUser('{$user_type}')">
        <option>--</option>
        {for $start = 1 to $admin_length}
        <option>{$start}</option>
        {/for}
    </select>
</div>