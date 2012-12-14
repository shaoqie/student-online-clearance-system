<ul class="nav nav-tabs">
    <li class="active"><a href='../administrator/index.php'>User Accounts</a></li>
    <li><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
    <li><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<form class="form-horizontal" method="get" action="?action=filter">
    <input type="hidden" value="filter" name="action">
    <input class="input-xxlarge" id="search" type="text" placeholder="Search..." value ="{$filter}" name="filterName">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i></button>
    <input class="btn pull-right" type="button" value="Add User Account" onclick="window.location.href='index.php?action=display_add_edit_account'">
</form>

<a href = "javascript:isCheckAll(true, {$rowCount_admin})" >Checked All</a> / 
<a href = "javascript:isCheckAll(false, {$rowCount_admin})">Unchecked All</a>

<table class="table table-hover">     
    <tr>
        <th><p class="pull-left">Controls</p></th>
        <th> User</th>  
        <th> Type</th>        
    </tr>
{foreach from = $myName key = k item = i}
    <tr>
        <td style="width:400px">
            <div class="pull-left">
                <input type="checkbox" id = '{$k}' value = {$myKey_admin[$k]}></input>&nbsp; &nbsp; 
                <i class="icon-pencil"></i> <a style="cursor:pointer;" >Edit</a>&nbsp; &nbsp;
                <i class="icon-remove"></i> <a style="cursor:pointer;" onclick="confirmDelete('{$myKey_admin[$k]}')">Delete</a>
            </div>                
        </td>       
        <td><p>{$i}</p></td>
        <td><p>{$myType[$k]}</p></td>
    </tr>
{/foreach}
</table>
<a href="#" onclick="findCheck('{$rowCount_admin}')"> Delete Selected</a>

<div class="pull-right">
    Jump to: 
    <select id="jump" class="input-mini" onchange="jumpToPage()">
        <option>--</option>
        {for $start = 1 to $admin_length}
        <option>{$start}</option>
        {/for}
    </select>
</div>
    