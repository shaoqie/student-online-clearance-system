<div class="row">
    <div class="span3">

        <!-- Navigations-->
        <div class="row">
            <div class="span3">
                {call name=nav_admin index=4}
            </div>
        </div>

    </div>
    <div class="span9">

        <!-- Header-->
        <h2 class="well center-text">{$Dept_name}</h2>
        
        <!-- Navigation Tabs-->
        <ul class="nav nav-tabs">
            <li class="active"><a href='../administrator/course_list_byDepartment.php'>Courses</a></li>
            <li><a href='../administrator/signatorialList.php'>Signatorial List</a></li>
        </ul>

        <!-- Add Course-->
        <form action="course_list_byDepartment.php?action=add_course" method='post' class="form-horizontal">
            <legend>Add Course:</legend>
            <div class="control-group">
                <label class="control-label"><b>Course Name: </b></label>
                <div class="controls">
                    <input style="width: 400px;" class="input-xlarge" type ='text' name='course_name'>
                </div>
            </div>
            <div class="control-group form-inline">
                <div class="controls form-inline">
                    <input type="radio" checked name="course_usability" value="Under Graduate"> <label><b>Under Graduate</b></label>
                    <input type="radio" name="course_usability" value="Graduate"> <label><b>Graduate </b></label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><b>Description: </b></label>
                <div class="controls">
                    <textarea style="width: 400px;" class="input-xlarge" name='course_description' rows="5" cols="50"></textarea>
                </div>
            </div>
            <div class="control-group form-actions">
                <div class="pull-right">
                    <input class="btn btn-primary" type='Submit' value='Save'>
                    <input class="btn" type="button" value="Back" onclick="window.location.href='course_list_byDepartment.php'">
                </div>
            </div>
        </form>
    </div>
</div>

{*
<!--Body content-->
<button class="pull-right btn" onclick="window.location.href='course_list_byDepartment.php'">Back</button>

<!-- Navigation Tabs-->
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

<!-- -->
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
*}