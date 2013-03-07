<!-- Breadcrumb-->
{call name=breadcrumb lvl2=3 lvl3=8 lvl4=1 lvl5=1 activelvl=5 dept_name="{$Dept_name}"}

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
                    <input class="btn" type="button" value="Back" onclick="window.location.href = 'course_list_byDepartment.php'">
                </div>
            </div>
        </form>
    </div>
</div>