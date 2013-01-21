<ul class="nav nav-tabs">
    <li><a href='../administrator/index.php'>User Accounts</a></li>
    <li><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
    <li class="active"><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<form class="form-horizontal">
    <input type="hidden" value="filter" name="action">
    <input class="input-xxlarge" id="search" type="text" placeholder="Search..." value ="{$filter}" name="filterName">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i></button>
    <input class="btn pull-right" type="button" value="Add Department" onclick="window.location.href='department_list_manager.php?action=addDepartment'">
</form>

<table class="table table-hover">   
    <tr>
        <th style="width: 600px;">
            <input type="checkbox" onclick="isCheck({$rowCount_dept})" id="check"> Departments
        </th>
        <th><div>Controls</div></th>
    </tr>
{foreach from = $myName_dept key = k item = i}
    <tr>
        <td>
            <label class="checkbox">
                <input type="checkbox" id = '{$k}' value = {$myKey_dept[$k]} > <p onclick="window.location.href='department_list_manager.php?action=displayCourse&deptName={$i}'" style="cursor:pointer;" >{$i}</p>
            </label>        
        </td>
        <td>
            <div>
                <i class="icon-pencil"></i><a style="cursor:pointer;" onclick="window.location.href='department_list_manager.php?action=editDepartment&seleted={$myKey_dept[$k]}'"> Edit</a>  
            </div>        
        </td>
    </tr>
{/foreach}
</table>

<i class="icon-remove"></i><a style="cursor:pointer;" onclick="findCheck('{$rowCount_dept}')" >Delete Selected</a>

<div class="pull-right">
    Jump to: <select id="jump" class="input-mini" onchange="jumpToPage()">
        <option>--</option>
        {for $start = 1 to $dept_length}
        <option>{$start}</option>
        {/for}
    </select>
</div>
