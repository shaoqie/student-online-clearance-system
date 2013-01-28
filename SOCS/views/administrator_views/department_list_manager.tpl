<!-- Navigation Tabs-->
<ul class="nav nav-tabs">
    <li class="dropdown">
        <a class="dropdown-toggle"
           data-toggle="dropdown"
           href="#">
            User Accounts
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><a href='../administrator/index.php?user_type=Student'>Student</a></li>
            <li><a href='../administrator/index.php?user_type=Signatory'>confirmed signatory</a></li>
            <li><a href='../administrator/unconfirmed_signatory.php'>unconfirmed signatory</a></li>
        </ul>
    </li>
    <li><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
    <li class="active"><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<!-- Add Department Button-->
<input class="btn" type="button" value="Add Department" onclick="window.location.href='department_list_manager.php?action=addDepartment'">

<!-- Search Bar-->
<span class="pull-right">
    {call name=search}
</span>
    
<!-- Department Table-->
<table class="table table-hover">   
    <tr>
        <th>
            <input type="checkbox" onclick="isCheck({$rowCount_dept})" id="check"> Departments
        </th>
        <th>Controls</th>
    </tr>
    {foreach from = $myName_dept key = k item = i}
        <tr>
            <td>
                <label class="checkbox">
                    <input class="Checkbox" type="checkbox" id = '{$k}' value = {$myKey_dept[$k]} >
                    <div id="hover_link" onclick="window.location.href='department_list_manager.php?action=displayCourse&deptName={$i}'" >{$i}</div>
                </label>        
            </td>
            <td>
                <i class="icon-pencil"></i>
                <a href="department_list_manager.php?action=editDepartment&seleted={$myKey_dept[$k]}"> Edit</a>  
            </td>
        </tr>
    {/foreach}
</table>

<!-- Delete Control-->
<a style="cursor:pointer;" onclick="findCheck('{$rowCount_dept}','department')" >
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
