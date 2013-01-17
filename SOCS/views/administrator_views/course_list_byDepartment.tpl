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
        <td> <input type="checkbox" onclick="isCheck({$rowCount_course})" id="check"></input> &nbsp; &nbsp; <i class="icon-check"></i><a>Toggle Check</a></td>      
        <td></td>   <td></td>
    </tr>
    <tr>
        <th><p class="pull-left">Controls</p></th>
        <th> Courses</th>       
    </tr>
{foreach from = $myName_course key = k item = i}
    <tr>
        <td style="width:400px">
            <div class="pull-left">
                <input type="checkbox" id = '{$k}' value = {$myKey_course[$k]} ></input> &nbsp; &nbsp;
                <i class="icon-pencil"></i> <a style="cursor:pointer;" onclick="window.location.href='course_list_byDepartment.php?action=editCourse&seleted={$myKey_course[$k]}'">Edit</a>
            </div>          
        </td>
        <td><p style="cursor:pointer;" onclick="window.location.href='course_list_byDepartment.php?action=editCourse&seleted={$myKey_course[$k]}'">{$i}</p></td>
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


