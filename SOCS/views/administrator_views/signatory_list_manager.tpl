<!-- Navigation Tabs-->
<ul class="nav nav-tabs">
    <li class="dropdown" >
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
    <li class="active"><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
    <li><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<!-- Add Signatory Button-->
<input class="btn" type="button" value="Add Signatory" onclick="window.location.href='signatory_list_manager.php?action=addSignatory'">

<!-- Search Bar-->
<span class="pull-right">
    {call name=search}
</span>

<!-- Signatory Table -->
<table class="table table-hover">     
    <tr>
        <th>
            <input type="checkbox" onclick="isCheck({$rowCount_sign})" id="check"> Signatories
        </th>
        <th>Controls</th>
    </tr>
    {foreach from = $myName_sign key = k item = i}
        <tr>
            <td>
                <label class="checkbox">
                    <input class="Checkbox" type="checkbox" id = '{$k}' value = {$myKey_sign[$k]} > {$i}
                </label>
            </td>
            <td>
                <i class="icon-pencil"></i><a style="cursor:pointer;" onclick="window.location.href='signatory_list_manager.php?action=editSignatory&seleted={$myKey_sign[$k]}'"> Edit</a>
            </td>
        </tr>
    {/foreach}
</table>

<!-- Delete Control-->
<a style="cursor:pointer;" onclick="findCheck('{$rowCount_sign}','signatory')">
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