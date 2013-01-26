
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
            <li><a href='../administrator/index.php?account_type=Student'>Student</a></li>
            <li><a href='../administrator/index.php?account_type=Signatory'>Signatory</a></li>
        </ul>
    </li>   
    <li><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
    <li><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<!-- Search Bar-->
{call name=search}

<!-- User Table-->
<table class="table table-hover">     
    <tr>
        <th>
            <input type="checkbox" onclick="isCheck({$rowCount_admin})" id="check"> User
        </th>
        <th>Type</th>
    </tr>
    {foreach from = $myName key = k item = i}
        <tr>
            <td>
                <label class="checkbox">
                    <input class="Checkbox" type="checkbox" id = '{$k}' value = {$myKey_admin[$k]}> {$i}
                </label>
            </td>
            <td>{$myType[$k]}</td>
        </tr>
    {/foreach}
</table>

<!-- Delete Control-->
<a style="cursor:pointer;" onclick="findCheck('{$rowCount_admin}','users')">
    <i class="icon-remove"></i> Delete Selected
</a>

<!-- Pagination -->

<div class="pull-right">
    Jump to: 
    <select id="jump" class="input-mini" onchange="jumpToPageUser('{$account_type}')">
        <option>--</option>
        {for $start = 1 to $admin_length}
        <option>{$start}</option>
        {/for}
    </select>
</div>
