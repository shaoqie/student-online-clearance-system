<ul class="nav nav-tabs">
    <li><a href='../administrator/index.php'>User Accounts</a></li>
    <li class="active"><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
    <li><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<form class="form-horizontal">
    <input type="hidden" value="filter" name="action">
    <input class="input-xxlarge" id="search" type="text" placeholder="Search..." value ="{$filter}" name="filterName">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i></button>
    <input class="btn pull-right" type="button" value="Add Signatory">
</form>

<a href = "javascript:isCheckAll(true, {$rowCount_sign})" >Checked All</a> / 
<a href = "javascript:isCheckAll(false, {$rowCount_sign})">Unchecked All</a>

<table class="table table-hover">     
    <tr>
        <th><p class="pull-left">Controls</p></th>
        <th>Signatories</th>       
    </tr>
    {foreach from = $myName_sign key = k item = i}
        <tr>
            <td style="width:400px">
                <div class="pull-left">
                    <input type="checkbox" id = '{$k}' value = {$myKey_sign[$k]} ></input> &nbsp; &nbsp;
                    <i class="icon-pencil"></i><a style="cursor:pointer;"> Edit</a>&nbsp; &nbsp;
                    <i class="icon-remove"></i><a style="cursor:pointer;" onclick="confirmDelete('{$myKey_sign[$k]}')"> Delete</a>
                </div>
            </td>    
            <td><p>{$i}</p></td>
        </tr>
    {/foreach}
</table>

<a href="#" onclick="findCheck('{$rowCount_sign}')">Delete Selected</a>

<div class="pull-right">
    Jump to: <select id="jump" class="input-mini" onchange="jumpToPage()">
        <option>--</option>
        {for $start = 1 to $sign_length}
        <option>{$start}</option>
        {/for}
    </select>
</div>
