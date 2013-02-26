<div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Departments</h4>

        <!-- Navigations and Controls-->
        {call name=nav_departments index=2}
    </ul>
        
    </div>
    <div class="span9">

        <!-- Header-->
        <h4 class="well center-text well-small">Add Department</h4>
        
        <!-- Adding Form-->
        <form action="department_list_manager.php?action=add_department" method='post' class="form-horizontal">
            <legend>Department Information: </legend>
            <div class="control-group">
                <label class="control-label"><b>Department Name: </b></label>
                <div class="controls">
                    <input class="span5" type ='text' name='dept_name'>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><b>Description: </b></label>
                <div class="controls">
                    <textarea class="span5" name='dept_description' rows="5" cols="50"></textarea>
                </div>
            </div>
            <div class="form-actions control-group">
                <div class="pull-right">
                    <input class="btn btn-primary" type='Submit' value='Save' />
                    <button class="btn" type="button" onclick="window.history.back();">Back</button>
                </div>
            </div>
        </form>
    </div>
</div>
