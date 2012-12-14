<h1><center>{$Dept_name}</center></h1>
<h2><center>Academic Courses</center></h2>

<form class="form-horizontal">
    <input type="hidden" value="filter" name="action">
    <input class="input-xxlarge" id="search" type="text" placeholder="Search..." value ="{$filter}" name="filterName">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i></button>
    <div class="pull-right">   
        <input class="btn" type="button" value="Add Courses">
        <input class="btn" type="button" value="Back" onclick="window.location.href='department_list_manager.php'">    
    </div>
</form>

<a href = "javascript:isCheckAll(true, {$rowCount_course})" >Checked All</a> / 
<a href = "javascript:isCheckAll(false, {$rowCount_course})" >Unchecked All</a>

<table class="table table-hover">     
    <tr>
        <th><p class="pull-left">Controls</p></th>
        <th> Courses</th>       
    </tr>
{foreach from = $myName_course key = k item = i}
    <tr>
        <td style="width:400px">
            <div class="pull-left">
                <input type="checkbox" id = '{$k}' value = {$myKey_course[$k]} ></input> &nbsp; &nbsp;
                <i class="icon-pencil"></i><a style="cursor:pointer;"> Edit</a>&nbsp; &nbsp; 
                <i class="icon-remove"></i><a style="cursor:pointer;" onclick="confirmDelete('{$myKey_course[$k]}')"> Delete</a>
            </div>          
        </td>
        <td><p>{$i}</p></td>
    </tr>
{/foreach}
</table>

<a href="#" onclick="findCheck('{$rowCount_course}')" >Delete Selected</a>

<div class="pull-right">
    Jump to: <select id="jump" class="input-mini" onchange="jumpToPage()">
        <option>--</option>
        {for $start = 1 to $course_length}
        <option>{$start}</option>
        {/for}
    </select>
</div>


