<h1><center>{$Dept_name}</center></h1>

<ul class="nav nav-tabs">
    <li class="active"><a href='../administrator/course_list_byDepartment.php'>Courses</a></li>
    <li><a href='../administrator/signatorialList.php'>Signatorial List</a></li>
</ul>

<form class="form-horizontal">
    <input type="hidden" value="filter" name="action">
    <input class="input-xxlarge" id="search" type="text" placeholder="Search..." value ="{$filter}" name="filterName">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i></button>
    <div class="pull-right">   
        <input class="btn" type="button" value="Add Courses" onclick="window.location.href='course_list_byDepartment.php?action=addCourse'">
        <input class="btn" type="button" value="Back" onclick="window.location.href='department_list_manager.php'">    
    </div>
</form>

<table class="table table-hover">     
    <tr>
        <th style="width: 600px;">
            <input type="checkbox" onclick="isCheck({$rowCount_course})" id="check"> Courses
        </th>
        <th><div>Controls</div></th>
    </tr>
{foreach from = $myName_course key = k item = i}
    <tr>
        <td>
            <label class="checkbox">
                <input type="checkbox" id = '{$k}' value = {$myKey_course[$k]} > {$i}
            </label>
        </td>
        <td>
            <div>
                <i class="icon-pencil"></i><a style="cursor:pointer;" onclick="window.location.href='signatory_list_manager.php?action=editSignatory&seleted={$myKey_course[$k]}'"> Edit</a>&nbsp; &nbsp;
            </div>
        </td>
    </tr>
{/foreach}
</table>

<i class="icon-remove"></i><a style="cursor:pointer;" onclick="findCheck('{$rowCount_course}')" >Delete Selected</a>

<div class="pull-right">
    Jump to: <select id="jump" class="input-mini" onchange="jumpToPage()">
        <option>--</option>
        {for $start = 1 to $course_length}
        <option>{$start}</option>
        {/for}
    </select>
</div>


