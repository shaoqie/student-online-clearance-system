
<!-- Navigation Tabs-->

<ul class="nav nav-tabs">
    <li class="active"><a href='../administrator/index.php'>User Accounts</a></li>
    <li><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
    <li><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<!-- Search Bar and Add User Button-->

<form class="form-horizontal" method="get" action="?action=filter">
    <input type="hidden" value="filter" name="action">
    <input id="search_bar" class="input-xxlarge" id="search" type="text" placeholder="Search..." value ="{$filter}" name="filterName">
    <button id="search_btn" class="btn btn-primary" type="submit">
        <i class="icon-search icon-white"></i>
    </button>
    <input class="btn pull-right" type="button" value="Add User Account" onclick="window.location.href='index.php?action=display_add_edit_account'">
</form>

<!-- User Table-->
    
<table class="table table-hover">     
    <tr>
        <th>
            <input type="checkbox" onclick="isCheck({$rowCount_admin})" id="check"> User
        </th>
        <th>Type</th>
        <th>
            <div class="pull-left">Controls</div>
        </th>
    </tr>
    {foreach from = $myName key = k item = i}
    <tr>
        <td>
            <label class="checkbox">
                <input type="checkbox" id = '{$k}' value = {$myKey_admin[$k]}> {$i}
            </label>
        </td>
        <td>{$myType[$k]}</td>
        <td>
            <div class="pull-left">
                <i class="icon-pencil"></i> <a style="cursor:pointer;" >Edit</a>&nbsp; &nbsp;       
            </div>                
        </td>
    </tr>
    {/foreach}
</table>

<!-- Delete Control-->

<a style="cursor:pointer;" onclick="findCheck('{$rowCount_admin}')">
    <i class="icon-remove"></i> Delete Selected
</a>

<!-- Pagination -->

<div class="pull-right">
    Jump to: 
    <select id="jump" class="input-mini" onchange="jumpToPage()">
        <option>--</option>
        {for $start = 1 to $admin_length}
        <option>{$start}</option>
        {/for}
    </select>
</div>
