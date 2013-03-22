<!-- Breadcrumb-->
{call name=breadcrumb lvl2=3 lvl3=6 activelvl=3 dept_name="{$editDepartment_Name}"}

<div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Departments</h4>

        <!-- Admin Navigations--> 
        {call name=nav_admin index=3}

    </div>
    <div class="span9">

        <!-- Header-->
        <h4 class="well center-text well-small">Edit Department</h4>
        
        <!-- Edit Form-->
        <form action="" method='post' class="form-horizontal" enctype="multipart/form-data">
            <legend>Department Information:</legend>
            <div class="control-group">
                <label class="control-label"><b>Department Name: </b></label>
                <div class="controls">
                    <input class="span5" type ='text' name='dept_name' value='{$editDepartment_Name}' required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><b>Description: </b></label>
                <div class="controls">
                    <textarea class="span5" name='dept_description' rows="5" cols="50" required>{$editDepartment_Desc}</textarea>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label"><b>Upload Logo: </b></label>
                <div class="controls">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail" style="width: 150px; height: 150px;"></div>
                        {if $dept_logo != null}
                            <div class="thumbnail" style="width: 150px; height: 150px;">
                                <img src="{$dept_logo}" />
                            </div>
                        {/if}
                        <br>
                        <span class="btn btn-file">
                            Browse<input type="file" name="dept_logo" required />
                        </span>
                        <input type="button" class="btn fileupload-exists" value="Cancel" data-dismiss="fileupload" />
                    </div>

                    <span class="help-block">
                        <p class="text-info">Image file shall not exceed to 1MB. Recommended size is 150 x 150</p>
                    </span>
                </div>
            </div>

            <div class="control-group form-actions">
                <div class="pull-right">
                    <input class="btn btn-primary" type='Submit' value='Save' name="editSave">
                    <button class="btn" type="button" onclick="window.location.href = 'department_list_manager.php'">Back</button>
                </div>
            </div>
        </form>
    </div>
</div>

{*
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
*}