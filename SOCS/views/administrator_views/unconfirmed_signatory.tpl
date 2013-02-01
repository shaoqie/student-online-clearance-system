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
<div class="pull-right">
    {call name=search}
</div>

<!-- Signatory Table -->
<table class="table table-hover">     
    <tr>
        <th>
            <input type="checkbox" onclick="isCheck({$rowCount_unconfirmedSign})" id="check"> Accounts
        </th>
        <th>Assigned Signatory</th>
        <th>Controls</th>
    </tr>
    {foreach from = $myName_unconfirmedSign key = k item = i}
        <tr>
            <td>
                <label class="checkbox">
                    <input class="Checkbox" type="checkbox" id = '{$k}' value = {$myKey_unconfirmedSign[$k]} > {$i}
                </label>
            </td>
            <td><label>{$assignSignID_unconfirmedSign[$k]}</label></td>
            <td>
                <i class="icon-ok"></i>
                <a style="cursor:pointer;" onclick="window.location.href='unconfirmed_signatory.php?action=confirmedAccount&key={$myKey_unconfirmedSign[$k]}'"> Confirm</a>
            </td>
        </tr>
    {/foreach}
</table>

<!-- Delete Control-->
<a style="cursor:pointer;" onclick="findCheck('{$rowCount_unconfirmedSign}','unconfirmed signatory')">
    <i class="icon-remove"></i> Delete Selected
</a>

<!-- Pagination-->
<div class="pull-right">
    Jump to: <select id="jump" class="input-mini" onchange="jumpToPage()">
        <option>--</option>
        {for $start = 1 to $unconfirmedSign_length}
        <option>{$start}</option>
        {/for}
    </select>
</div>

