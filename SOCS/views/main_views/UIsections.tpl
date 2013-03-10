<!-- Welcome Navigations-->
{function name=welcome_navigations}
    <ul class="nav">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a href="index.php?action=student_registrationForm">Register</a>
        </li>
    </ul>
{/function}

<!-- Admin Navigations-->
{function name="nav_admin" index=0}
    <ul class="nav nav-tabs nav-stacked">
        <li class="{if $index == 1}active{/if}">
            <a href='{$host}/administrator/index.php?user_type=Student'>
                <i class="icon-user"></i> User Accounts
            </a>
        </li>
        <li {if $index == 2}class="active"{/if}>
            <a href="{$host}/administrator/signatory_list_manager.php">
                <i class="icon-edit"></i> Signatories
            </a>
        </li>
        <li {if $index == 3}class="active"{/if}>
            <a href="{$host}/administrator/department_list_manager.php">
                <i class="icon-socs-library"></i> Departments
            </a>
        </li>
    </ul>
{/function}

<!-- Search Inputs-->
{function name=search_input}
    {if isset($filter)}
        <input type="hidden" value="filter" name="action">
        <input id="search" class="span3" type="search" placeholder="Search..." value="{$filter}" name="filterName">
        {if isset($user_type)}
            <input type="hidden" value="{$user_type}" name="user_type">
        {/if}
    {/if}
{/function}

<!-- School Year and Semester Inputs-->
{function name=schoolyear_sem_inputs}

    <select id="school_year" class="select2 input-medium" name="school_year">
        {foreach from=$mySchool_Year key=k item=year}
            {if $year eq $currentSchool_Year}
                <option selected>{$year}</option>
            {else}
                <option>{$year}</option>
            {/if}
        {/foreach}
    </select>

    <select id="semester" class="select2 input-medium" name="semester">
        {if $currentSemester eq 'First'}
            <option selected>First</option>
            <option>Second</option>
            <option>Summer</option>
        {elseif $currentSemester eq 'Second'}
            <option>First</option>
            <option selected>Second</option>
            <option>Summer</option>
        {else}
            <option>First</option>
            <option>Second</option>
            <option selected>Summer</option>
        {/if}           
    </select>

{/function}

<!-- Search Bar-->
{function name=search}
    {if isset($filter)}

        <form class="navbar-form pull-right">
            <input type="hidden" value="filter" name="action">
            <input id="search" class="span3" type="search" placeholder="Search..." value="{$filter}" name="filterName">
            {if isset($user_type)}
                <input type="hidden" value="{$user_type}" name="user_type">
            {/if}

            {if isset($clearedStatus)}
                <input type="hidden" value="{$clearedStatus}" name="status">
            {/if}

            <button class="btn btn-success" type="submit">
                <i class="icon-search icon-white"></i>
            </button>
        </form>

    {/if}
{/function}

<!-- Archive Search Bar-->
{function name=archiveSearch}

    <form class="navbar-form pull-right" method="post">

        <select id="school_year" class="select2 input-large" name="school_year">
            {foreach from=$mySchool_Year key=k item=year}
                {if $year eq $currentSchool_Year}
                    <option selected>{$year}</option>
                {else}
                    <option>{$year}</option>
                {/if}
            {/foreach}
        </select>

        <select class="select2 input-large" id="semester" name="semester">
            {if $currentSemester eq 'First'}
                <option selected>First</option>
                <option>Second</option>
                <option>Summer</option>
            {elseif $currentSemester eq 'Second'}
                <option>First</option>
                <option selected>Second</option>
                <option>Summer</option>
            {else}
                <option>First</option>
                <option>Second</option>
                <option selected>Summer</option>
            {/if}           
        </select>

        <button class="btn btn-primary" type="submit" name="GO">
            <i class="icon-search"></i>
        </button>
    </form>

{/function}

<!-- Admin Functions-->

<!-- User Accounts Navigation-->
{function name=nav_user_accounts index=0}

    <ul class="nav">

        <li class="divider-vertical"></li>

        {if $index == 4}
            <li>
                <a class="tips" href="#" title="Back">
                    <i class="icon-arrow-left"></i> 
                </a>
            </li>

            <li class="divider-vertical"></li>
            {/if}

        <li {if $index == 1}class="active"{/if}>
            <a class="tips" href="{$host}/administrator/index.php?user_type=Student" title="List of Students">
                <i class="icon-user"></i>
            </a>
        </li>
        <li {if $index == 2}class="active"{/if}>
            <a class="tips" href="{$host}/administrator/index.php?user_type=Signatory" title="List of Signatories-in-charge">
                <i class="icon-coffee"></i> 
            </a>
        </li>
        <li {if $index == 3}class="active"{/if}>
            <a class="tips" href="{$host}/administrator/unconfirmed_signatory.php" title="List of Unconformed Signatories-in-charge">
                <i class="icon-warning-sign"></i>
            </a>
        </li>
        <li class="divider-vertical"></li>

        {if $index==1}
            <li class="dropdown">
                <a class="tips" href="#upload_excel" data-toggle="modal" title="Upload Enrolled Students">
                    <i class="icon-user"></i><i class="icon-arrow-up icon-tail"></i> 
                </a>
            </li>
        {/if}

        {if $index!=1}
            <li class="dropdown">
                <a class="tips" href="{$host}/administrator/index.php?action=addSignatoryInCharge" title="Add Signatory-in-charge">
                    <i class="icon-coffee"></i><i class="icon-plus icon-tail"></i>
                </a>
            </li>
        {/if}

        {if $index != 4}
            {*
            <li class="dropdown">
            <a class="tips" href="#" title="Delete Selected">
            <i class="icon-trash"></i> 
            </a>
            </li>
            *}
        {/if}

        <li class="divider-vertical"></li>
    </ul>
{/function}

<!-- Signatories Navigations-->
{function name=nav_signatories index=0}

    <ul class="nav">

        <li class="divider-vertical"></li>

        {if $index == 2}
            <li>
                <a class="tips" href="#" title="Back">
                    <i class="icon-arrow-left"></i> 
                </a>
            </li>

            <li class="divider-vertical"></li>
            {/if}

        <li {if $index == 2}class="active"{/if}>
            <a class="tips" title="Add Signatory" href="{$host}/administrator/signatory_list_manager.php?action=addSignatory">
                <i class="icon-edit"></i><i class="icon-plus icon-tail"></i>
            </a>
        </li>

        {if $index != 2}
            {*
            <li class="dropdown">
            <a class="tips" href="#" title="Delete Selected">
            <i class="icon-trash"></i> 
            </a>
            </li>
            *}
        {/if}

        <li class="divider-vertical"></li>
    </ul>
{/function}

<!-- Departments Navigations-->
{function name=nav_departments flag=0 index=0}

    <ul class="nav">
        <li class="divider-vertical"></li>

        {if $flag == 1}

            <li>
                <a class="tips" data-toggle="tooltip" title="Add Department" href="{$host}/administrator/department_list_manager.php?action=addDepartment">
                    <i class="icon-socs-library"></i><i class="icon-plus icon-tail"></i>
                </a>
            </li>

        {else}

            <li {if $index == 1}class="active"{/if}>
                <a class="tips" data-toggle="tooltip" title="List of Course under {$Dept_name}" href='{$host}/administrator/course_list_byDepartment.php'>
                    <i class="icon-book"></i>
                </a>
            </li>
            <li {if $index == 2}class="active"{/if}>
                <a class="tips" data-toggle="tooltip" title="List of Signatory for undergraduates under {$Dept_name}" href='{$host}/administrator/signatorialList.php'>
                    <i class="icon-socs-profile"></i>
                </a>
            </li>
            <li {if $index == 3}class="active"{/if}>
                <a class="tips" data-toggle="tooltip" title="List of Signatory for graduates under {$Dept_name}" href='{$host}/administrator/Grad_SignatorialList.php'>
                    <i class="icon-socs-graduate"></i>
                </a>
            </li>
            <li class="divider-vertical"></li>

            {if $index==1}
                <li class="dropdown">
                    <a class="tips" data-toggle="tooltip" title="Add Course under {$Dept_name}" href='{$host}/administrator/course_list_byDepartment.php?action=addCourse'>
                        <i class="icon-book"></i><i class="icon-plus icon-tail"></i>
                    </a>
                </li>
            {/if}

            {if $index!=1}
                <li class="dropdown">
                    <a class="tips" data-toggle="modal" title="Add Signatory under {$Dept_name}" href='#add_dept_signatory'>
                        <i class="icon-edit"></i><i class="icon-plus icon-tail"></i>
                    </a>
                </li>
            {/if}
        {/if}
        <li class="divider-vertical"></li>
    </ul>

{/function}

<!-- Signatory-in-charge Functions-->

<!-- Signatory Navigation-->
{function name=nav_signatory index=0}
    <ul class="nav nav-tabs nav-stacked">
        <li {if $index == 0}class="active"{/if}>
            <a href='../signatory/index.php'>
                <i class="icon-user"></i> Students
            </a>
        </li>
        <li {if $index == 1}class="active"{/if}>
            <a href='../signatory/bulletin.php'>
                <i class="icon-bullhorn"></i> Bulletin
            </a>
        </li>
        <li {if $index == 2}class="active"{/if}>
            <a href='../signatory/requirements.php'>
                <i class="icon-socs-folder-check"></i> Requirements
            </a>
        </li>
        <li {if $index == 3}class="active"{/if}>
            <a href='../signatory/uploadsignature.php'>
                <i class="icon-upload-alt"></i> Upload Signature
            </a>
        </li>
    </ul>
{/function}

<!-- Upload Signatory Modal-->
{function name="upload_excel"}

    <div id="upload_excel" class="modal hide fade">
        <div class="modal-header">
            <button class="close" data-dismiss="modal"><i class="icon-remove"></i></button>
            <h4>Upload List of Enrolled Students</h4>
        </div>

        <div class="fileupload fileupload-new" data-provides="fileupload">
            <form class="form-horizontal" action="{$host}/administrator/index.php?action=upload_excel_file" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    {if isset($excel_file)}

                        <div class="control-group">
                            <label class="control-label">
                                <b>Current File: </b>
                            </label>
                            <div class="controls">
                                <i class="icon-ms-excel" style="font-size: 22px;"></i> student_current_enroll.xls
                            </div>
                        </div>

                        {*
                        <table class="table table-condensed table-bordered">
                        <tr>
                        <td>Current File: </td>
                        <td><i class="icon-ms-excel"></i> student_current_enroll.xls</td>
                        </tr>
                        </table>
                        *}

                    {/if}

                    <div class="control-group">
                        <label class="control-label">
                            <b>Upload MS Excel File: </b>
                        </label>
                        <div class="controls">
                            <span class="btn btn-file">
                                Browse<input type="file" name="excel_file" />
                            </span>
                        </div>
                    </div>

                    <div class="control-group fileupload-exists alert alert-info">
                        <label class="control-label">
                            <b>To be uploaded file: </b></label>
                        <div class="controls">
                            <i class="icon-file-alt icon-2x"></i>
                            <span class="fileupload-preview"></span>
                            <div class="pull-right">
                                <button class="btn pull-right" data-dismiss="fileupload" type="button">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary fileupload-exists" type="submit" name="save">Upload</button>
                    <button class="btn pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
{/function}

<!-- Replace Signatory in departmet Modal-->
{function name="replace_dept_signatory"}
    <div id="edit_dept_signatory" class="modal hide fade">
        <div class="modal-header">
            <button class="close" data-dismiss="modal">
                <i class="icon-remove"></i>
            </button>
            <h4>Replace <span id="signatory_name"></span> Signatory</h4>
        </div>

        <form class="form-horizontal">
            <div class="modal-body" style="min-height: 75px;">
                <div class="control-group">
                    <label class="control-label"><b> Signatory Name: </b></label>
                    <div class="controls">
                        <input type="hidden" name="action" value="editSignatorialList" />
                        {if isset($SignatoryList)}
                            <select class='select2 input-large' id='editSignatorialList' name="newSign_Name" data-placeholder="Select Signatory" required>
                                <option></option>
                                {foreach from = $SignatoryList item = i}
                                    <option>{$i}</option>
                                {/foreach}
                            </select>
                        {/if}
                        <span id="hidden_input"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type='submit' class='btn btn-primary' value='Save' id='save'>
                <input type='button' class='btn' value='Cancel' data-dismiss="modal">
            </div>
        </form>
    </div>
{/function}

<!-- Add Signatory to a department Modal-->
{function name="add_dept_signatory"}
    <div id="add_dept_signatory" class="modal hide fade">
        <div class="modal-header">
            <button class="close" data-dismiss="modal">
                <i class="icon-remove"></i>
            </button>
            <h4>Add Signatory</h4>
        </div>

        <form class="form-horizontal">
            <div class="modal-body" style="min-height: 75px;">
                <label class="control-label">
                    <b>Signatory Name</b>
                </label>
                <div class="controls">
                    <input type="hidden" name="action" value="addSignatory">

                    {if isset($SignatoryList)}
                        <select name="cmdSignatory" class="select2 input-large" data-placeholder="Select Signatory" required>
                            <option></option>
                            {foreach from = $SignatoryList item = i}
                                <option>{$i}</option>
                            {/foreach}
                        </select>
                    {/if}
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Add</button>
                <button type='button' class='btn' data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
{/function}

<!-- Breadcrumb-->
{function name=breadcrumb lvl2=0 lvl3=0 lvl4=0 lvl5=0 activelvl=0 sig_name="" dept_name="" course_name=""}

    {assign var=arr_level2 value=['', 'User Accounts', 'Signatories', 'Department', 
'Students', 'Bulletin', 'Requirements', 'Upload Signature']}
    {assign var=arr_level2_links value=['','administrator/index.php', 'administrator/signatory_list_manager.php', 'administrator/department_list_manager.php', 
'signatory/index.php', 'signatory/bulletin.php', 'signatory/requirements.php', 'signatory/uploadsignature.php']}

    {assign var=arr_level3 value=['', 'List of Students', 'List of Signatories-in-charge', 
'Add Signatory-in-charge', 'List of Unconfirmed Signatories-in-charge', 'Add Signatory', 
'Edit ', 'Add Department', '', 
'Post Announcement', 'View Announcement', 'Edit Requirement', 'Add Requirement']}

    {assign var=arr_level4 value=['', 'Courses', 'Signatories for Undergraduates', 'Signatories for Graduates']}

    {assign var=arr_level5 value=['', 'Add Course', 'Edit ']}

    <ul class="breadcrumb">
        <li>

            {if lvl2>4}
                <a href="{$host}/signatory/index.php">Home</a>
            {else}
                <a href="{$host}/administrator/index.php">Home</a>
            {/if}

            <span class="divider">
                <i class="icon-chevron-right"></i>
            </span>
        </li>

        {if $activelvl==2 && $lvl2!=0}
            <li class="active">{$arr_level2[$lvl2]}</li>
            {elseif $lvl2!=0}
            <li>
                <a href="{$host}/{$arr_level2_links[$lvl2]}">{$arr_level2[$lvl2]}</a> 
                <span class="divider">
                    <i class="icon-chevron-right"></i>
                </span>
            </li>
        {/if}

        {if $activelvl==3 && $lvl3!=0}
            <li class="active">{$arr_level3[$lvl3]}{$sig_name}{$dept_name}</li>
            {elseif $lvl3!=0}
            <li>
                <a href="{$host}/administrator/course_list_byDepartment.php">{$arr_level3[$lvl3]}{$dept_name}</a> 
                <span class="divider">
                    <i class="icon-chevron-right"></i>
                </span>
            </li>
        {/if}

        {if $activelvl==4 && $lvl4!=0}
            <li class="active">{$arr_level4[$lvl4]}</li>
            {elseif $lvl4!=0}
            <li>
                <a href="{$host}/administrator/course_list_byDepartment.php">{$arr_level4[$lvl4]}</a> 
                <span class="divider">
                    <i class="icon-chevron-right"></i>
                </span>
            </li>
        {/if}

        {if $activelvl==5 && $lvl5!=0}
            <li class="active">{$arr_level5[$lvl5]}{$course_name}</li>
            {/if}
    </ul>

{/function}