<h1><center>{$Dept_name}</center></h1>
<h2><center>Academic Courses</center></h2>

<ul class="nav nav-tabs">
    <li class="active"><a href='../administrator/course_list_byDepartment.php'>Courses</a></li>
    <li><a href='../administrator/signatorialList.php'>Signatorial List</a></li>
</ul>

<!--Body content-->
<button class="pull-right btn" onclick="window.location.href='course_list_byDepartment.php'">Back</button>

<form action="course_list_byDepartment.php?action=add_course" method='post' class="form-horizontal">
    <legend>Add Course:</legend>
    <div class="control-group">
        <label class="control-label">Course Name: </label>
        <div class="controls">
            <input style="width: 400px;" class="input-xlarge" type ='text' name='course_name'>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Description: </label>
        <div class="controls">
            <textarea style="width: 400px;" class="input-xlarge" name='course_description' rows="5" cols="50"></textarea>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit' value='Save'>
        </div>
    </div>
</form> 