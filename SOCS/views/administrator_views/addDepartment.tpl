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
        <h2 class="well center-text">Add Department</h2>

        <!-- Adding Form-->
        <form action="department_list_manager.php?action=add_department" method='post' class="form-horizontal">
            <legend>Department Information: </legend>
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
            <div class="form-actions control-group">
                <div class="pull-right">
                    <input class="btn btn-primary" type='Submit' value='Save' />
                    <button class="btn" type="button" onclick="window.location.href='department_list_manager.php'">Back</button>
                </div>
            </div>
        </form>
    </div>
</div>

{*
<!-- Back Button-->
<button class="pull-right btn" onclick="window.location.href='department_list_manager.php'">Back</button>

<!-- Navigation Tabs-->
<ul class="nav nav-tabs">
<li class="dropdown">
<a class="dropdown-toggle"
data-toggle="dropdown"
href="#">
User Accounts
<b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a href='../administrator/index.php?user_type=Student'>Student</a></li>
<li><a href='../administrator/index.php?user_type=Signatory'>confirmed signatory</a></li>
<li><a href='../administrator/unconfirmed_signatory.php'>unconfirmed signatory</a></li>
</ul>
</li>
<li><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
<li class="active"><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<!-- Adding Form-->
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
*}