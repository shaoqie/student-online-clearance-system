<h1><center>{$Dept_name}</center></h1>
<h2><center>Academic Courses</center></h2>

<button class="pull-right btn" onclick="window.location.href='course_list_byDepartment.php'">Back</button>
        
<form action="" method='post' class="form-horizontal">
    <legend>Edit Course:</legend>
    <div class="control-group">
        <label class="control-label">Course Name: </label>
        <div class="controls">
            <input class="input-xxlarge" type ='text' name='course_name' value='{$editCourse_Name}'>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Description: </label>
        <div class="controls">
            <textarea class="input-xxlarge" name='course_description' rows="5" cols="50" id='course_desc'>{$editCourse_Desc}</textarea>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit' value='Save' name="editSave">
        </div>
    </div>
</form>       