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