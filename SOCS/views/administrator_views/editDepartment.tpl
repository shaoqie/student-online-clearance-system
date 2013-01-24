<ul class="nav nav-tabs">
    <li><a href='../administrator/index.php'>User Accounts</a></li>
    <li><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
    <li class="active"><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<button class="pull-right btn" onclick="window.location.href='department_list_manager.php'">Back</button>

<form action="" method='post' class="form-horizontal">
    <legend>Edit Department:</legend>
    <div class="control-group">
        <label class="control-label">Department Name: </label>
        <div class="controls">
            <input style="width: 400px;" class="input-xlarge" type ='text' name='dept_name' value='{$editDepartment_Name}'>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Description: </label>
        <div class="controls">
            <textarea style="width: 400px;" class="input-xlarge" name='dept_description' rows="5" cols="50">{$editDepartment_Desc}</textarea>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit' value='Save' name="editSave">
        </div>
    </div>
</form>


