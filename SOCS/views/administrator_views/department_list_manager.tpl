
<!-- Navigation Tabs-->

<ul class="nav nav-tabs">
    <li><a href='../administrator/index.php'>User Accounts</a></li>
    <li><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
    <li class="active"><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<!-- Search Bar and Add Department Button-->

<form class="form-inline">
    <input type="hidden" value="filter" name="action">
    <input id="search" class="input-xlarge" type="text" placeholder="Search..." value ="{$filter}" name="filterName" required>
    <button class="btn btn-primary" id="btnsearch" type="submit"><i class="icon-search icon-white"></i></button>
    <input class="btn pull-right" type="button" value="Add Department" onclick="window.location.href='department_list_manager.php?action=addDepartment'">
</form>

<!-- Department Table-->
    
<table class="table table-hover">   
    <tr>
        <th style="width: 600px;">
            <input type="checkbox" onclick="isCheck({$rowCount_dept})" id="check"> Departments
        </th>
        <th>Controls</th>
    </tr>
{foreach from = $myName_dept key = k item = i}
    <tr>
        <td>
            <label class="checkbox">
                <input class="userCheckbox" type="checkbox" id = '{$k}' value = {$myKey_dept[$k]} >
                <div onclick="window.location.href='department_list_manager.php?action=displayCourse&deptName={$i}'" style="cursor:pointer;" >{$i}</div>
            </label>        
        </td>
            <td><i class="icon-pencil"></i><a style="cursor:pointer;" onclick="window.location.href='department_list_manager.php?action=editDepartment&seleted={$myKey_dept[$k]}'"> Edit</a>  
        </td>
    </tr>
{/foreach}
</table>

<!-- Delete Control-->

<a style="cursor:pointer;" onclick="findCheck('{$rowCount_dept}')" >
    <i class="icon-remove"></i> Delete Selected
</a>

<!-- Pagination-->

<div class="pull-right">
    Jump to: <select id="jump" class="input-mini" onchange="jumpToPage()">
        <option>--</option>
        {for $start = 1 to $dept_length}
        <option>{$start}</option>
        {/for}
    </select>
</div>
