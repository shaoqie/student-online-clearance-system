<!-- Breadcrumb-->
{call name=breadcrumb lvl2=3 lvl3=8 lvl4=1 lvl5=2 activelvl=5 dept_name="{$Dept_name}" course_name="{$editCourse_Name}"}

<div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Departments</h4>
        
        <!-- Admin Navigations--> 
        {call name=nav_admin index=3}

    </div>
    <div class="span9">

        <!-- Header-->
        <div class="well center-text well-small">
            <h4>{$Dept_name} </h4>
            <small>{$Dept_desc}</small>
        </div>

        <!-- Edit Course-->
        <form action="" method='post' class="form-horizontal">
            <legend>Edit Course:</legend>
            <div class="control-group">
                <label class="control-label"><b>Course Name: </b></label>
                <div class="controls">
                    <input class="span5" type ='text' name='course_name' value='{$editCourse_Name}'>
                </div>
            </div>
            <div class="control-group form-inline">
                <div class="controls form-inline">
                    <input type="radio" {if $editCourse_Usability eq "Under Graduate"}checked{/if} name="course_usability" value="Under Graduate"> <label><b>Under Graduate</b></label>
                    <input type="radio" {if $editCourse_Usability eq "Graduate"}checked{/if} name="course_usability" value="Graduate"> <label><b>Graduate </b></label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><b>Description: </b></label>
                <div class="controls">
                    <textarea class="span5" name='course_description' rows="5" cols="50" id='course_desc'>{$editCourse_Desc}</textarea>
                </div>
            </div>
            <div class="control-group form-actions">
                <div class="pull-right">
                    <input class="btn btn-primary" type='Submit' value='Save' name="editSave">
                    <input class="btn" type="button" value="Back" onclick="window.location.href='course_list_byDepartment.php'">
                </div>
            </div>
        </form>
    </div>
</div>

{*
<!-- Back Button-->
<button class="pull-right btn" onclick="window.location.href='course_list_byDepartment.php'">Back</button>

<ul class="nav nav-tabs">
<li class="active"><a href='../administrator/course_list_byDepartment.php'>Courses</a></li>
<li><a href='../administrator/signatorialList.php'>Signatorial List</a></li>
</ul>

<!-- Department Name-->
<div class="row">
<div class="span9 well">
<h1 style="text-align: center;">{$Dept_name}</h1>
<!--<h2 style="text-align: center;">Academic Courses</h2>-->
</div>
</div>

<form action="" method='post' class="form-horizontal">
<legend>Edit Course:</legend>
<div class="control-group">
<label class="control-label">Course Name: </label>
<div class="controls">
<input class="span5" type ='text' name='course_name' value='{$editCourse_Name}'>
</div>
</div>
<div class="control-group">
<label class="control-label">Description: </label>
<div class="controls">
<textarea class="span5" name='course_description' rows="5" cols="50" id='course_desc'>{$editCourse_Desc}</textarea>
</div>
</div>
<div class="control-group">
<div class="controls">
<input class="btn btn-primary" type='Submit' value='Save' name="editSave">
</div>
</div>
</form>
*}