<div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Departments</h4>

        <!-- Admin Navigations--> 
        {call name=nav_admin index=3}

        <!-- Another Controls-->
        <ul class="nav nav-tabs nav-stacked">
            <li>
                <a href="{$host}/administrator/course_list_byDepartment.php?action=addCourse">
                    <i class="icon-plus"></i> Add Course
                </a>
            </li>

    </div>
    <div class="span9">

        <!-- Header-->
        <div class="well center-text well-small">
            <h4>{$Dept_name} </h4>
            <small>{$Dept_desc}</small>
        </div>

        <div class="navbar">
            <div class="navbar-inner">

                {call name=nav_departments index=0}

                {call name=search}

            </div>
        </div>

        <!-- Navigation Tabs-->
        <ul class="nav nav-tabs">
            <li class="active"><a href='{$host}/administrator/course_list_byDepartment.php'>Courses</a></li>
            <li><a href='{$host}/administrator/signatorialList.php'>Signatorial List</a></li>
        </ul>

        <!-- Course List Table-->
        <table class="table table-hover table-bordered">     
            <tr>
                <th>
                    <input type="checkbox" onclick="isCheck({$rowCount_course})" id="check"> Courses
                </th>
                <th>Description</th>
                <th>Usability</th> 
                <th>Controls</th>
            </tr>
            {foreach from = $myName_course key = k item = i}
                <tr>
                    <td>
                        <label class="checkbox">
                            <input class="Checkbox" type="checkbox" id = '{$k}' value = {$myKey_course[$k]} > {$i}
                        </label>
                    </td>
                    <td><label>{$desc_course[$k]}</label></td>    
                    <td><label>{$usability_course[$k]}  {*if $usability_course[$k] eq "Under Graduate"} UG {/if} {if $usability_course[$k] eq "Graduate"} G {/if*}</label></td>
                    <td>
                        <div>
                            <a style="cursor:pointer;" onclick="window.location.href = 'course_list_byDepartment.php?action=editCourse&seleted={$myKey_course[$k]}'">
                                <i class="icon-pencil"></i> Edit
                            </a>
                        </div>
                    </td>
                </tr>
            {/foreach}
        </table>

        <!-- Delete Button-->
        <a style="cursor:pointer;" onclick="findCheck('{$rowCount_course}', 'course')" >
            <i class="icon-remove"></i> Delete Selected
        </a>

        <!-- Pagination-->
        <div class="pull-right">
            Jump to: <select id="jump" class="input-mini" onchange="jumpToPage()">
                <option>--</option>
                {for $start = 1 to $course_length}
                    <option>{$start}</option>
                {/for}
            </select>
        </div>

    </div>
</div>

{*
<!-- Back Button-->
<input class="btn pull-right" type="button" value="Back" onclick="window.location.href='department_list_manager.php'">

<!-- Navigation Tabs-->
<ul class="nav nav-tabs">
<li class="active"><a href='../administrator/course_list_byDepartment.php'>Courses</a></li>
<li><a href='../administrator/signatorialList.php'>Signatorial List</a></li>
</ul>

<!-- Department Name-->
<div class="row">
<div class="span9 well">
<h1 style="text-align: center;">{$Dept_name}</h1>
</div>
</div>


<!-- Add Courses Button-->
<input class="btn" type="button" value="Add Courses" onclick="window.location.href='course_list_byDepartment.php?action=addCourse'">

<!-- Search Bar-->
<span class="pull-right">
{call name=search}
</span>

<!-- Course List Table-->
<table class="table table-hover">     
<tr>
<th>
<input type="checkbox" onclick="isCheck({$rowCount_course})" id="check"> Courses
</th>
<th>Description</th>
<th>Controls</th>
</tr>
{foreach from = $myName_course key = k item = i}
<tr>
<td>
<label class="checkbox">
<input class="Checkbox" type="checkbox" id = '{$k}' value = {$myKey_course[$k]} > {$i}
</label>
</td>
<td><label>{$desc_course[$k]}</label></td>
<td>
<div>
<a style="cursor:pointer;" onclick="window.location.href='course_list_byDepartment.php?action=editCourse&seleted={$myKey_course[$k]}'">
<i class="icon-pencil"></i> Edit
</a>
</div>
</td>
</tr>
{/foreach}
</table>

<!-- Delete Button-->
<a style="cursor:pointer;" onclick="findCheck('{$rowCount_course}','course')" >
<i class="icon-remove"></i> Delete Selected
</a>

<!-- Pagination-->
<div class="pull-right">
Jump to: <select id="jump" class="input-mini" onchange="jumpToPage()">
<option>--</option>
{for $start = 1 to $course_length}
<option>{$start}</option>
{/for}
</select>
</div>
*}