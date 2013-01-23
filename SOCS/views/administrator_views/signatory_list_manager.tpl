
<!-- Navigation Tabs-->

<ul class="nav nav-tabs">
    <li><a href='../administrator/index.php'>User Accounts</a></li>
    <li class="active"><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
    <li><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<!-- Search Bar and Add Signatory Button-->

<form class="form-inline">
    <input type="hidden" value="filter" name="action">
    <input class="span5" id="search" type="text" placeholder="Search..." value ="{$filter}" name="filterName">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i></button>
    <input class="btn pull-right" type="button" value="Add Signatory" onclick="window.location.href='signatory_list_manager.php?action=addSignatory'">
</form>

<!-- Signatory Table-->

<table class="table table-hover">     
    <tr>
        <th style="width: 600px;">
            <input type="checkbox" onclick="isCheck({$rowCount_sign})" id="check"> Signatories
        </th>
        <th>Controls</th>
    </tr>
    {foreach from = $myName_sign key = k item = i}
        <tr>
            <td>
                <label class="checkbox">
                    <input class="userCheckbox" type="checkbox" id = '{$k}' value = {$myKey_sign[$k]} > {$i}
                </label>
            </td>
            <td>
                <i class="icon-pencil"></i><a style="cursor:pointer;" onclick="window.location.href='signatory_list_manager.php?action=editSignatory&seleted={$myKey_sign[$k]}'"> Edit</a>
            </td>
        </tr>
    {/foreach}
</table>

<!-- Delete Control-->

<a style="cursor:pointer;" onclick="findCheck('{$rowCount_sign}')">
    <i class="icon-remove"></i> Delete Selected
</a>

<!-- Pagination-->

<div class="pull-right">
    Jump to: <select id="jump" class="input-mini" onchange="jumpToPage()">
        <option>--</option>
        {for $start = 1 to $sign_length}
        <option>{$start}</option>
        {/for}
    </select>
</div>