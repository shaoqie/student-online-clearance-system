<!-- Breadcrumb-->
{call name=breadcrumb lvl2=3 lvl3=7 activelvl=3}

<div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Departments</h4>

        <!-- Admin Navigations--> 
        {call name=nav_admin index=3}

    </div>
    <div class="span9">

        <!-- Header-->
        <h4 class="well center-text well-small">Add Department</h4>

        {*
        <div class="navbar">
            <div class="navbar-inner">

                {call name=nav_signatories index=2}

            </div>
        </div>
        *}

        <!-- Adding Form-->
        <form action="department_list_manager.php?action=add_department" method='post' class="form-horizontal" enctype="multipart/form-data">
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
            
            <div class="control-group">
                <label class="control-label"><b>Upload Logo: </b></label>
                <div class="controls">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail" style="width: 150px; height: 150px;"></div><br>
                        <span class="btn btn-file">
                            Browse<input type="file" name="dept_logo">
                        </span>
                        <input type="button" class="btn fileupload-exists" value="Cancel" data-dismiss="fileupload" />
                    </div>
                    <span class="help-block">
                        <p class="text-info">Image file shall not exceed to 1MB. Recommended size is 150 x 150</p>
                    </span>
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
