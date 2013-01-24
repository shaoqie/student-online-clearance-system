<ul class="nav nav-tabs">
    <li><a href='../administrator/index.php'>User Accounts</a></li>
    <li><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
    <li class="active"><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<button class="pull-right btn" onclick="window.location.href='department_list_manager.php'">Back</button>

<form action="department_list_manager.php?action=add_department" method='post' class="form-horizontal">
    <legend>Add Department:</legend>
    <div class="control-group">
        <label class="control-label">Department Name: </label>
        <div class="controls">
            <input class="span5" type ='text' name='dept_name'>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Description: </label>
        <div class="controls">
            <textarea class="span5" name='dept_description' rows="5" cols="50"></textarea>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit' value='Save'>
        </div>
    </div>
</form>