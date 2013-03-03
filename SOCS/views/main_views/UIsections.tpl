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
                <i class="icon-building"></i> Departments
            </a>
        </li>
    </ul>
{/function}

{function name=search_input}
    {if isset($filter)}
        <input type="hidden" value="filter" name="action">
        <input id="search" class="span3" type="search" placeholder="Search..." value="{$filter}" name="filterName">
        {if isset($user_type)}
            <input type="hidden" value="{$user_type}" name="user_type">
        {/if}
    {/if}
{/function}

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

            {*<input type="hidden" value="{$clearedStatus}" name="status">*}

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


    {*
    <form class="form-inline" method="post">
    <label><b>School Year:  </b></label>

    <input type="text" maxlength="9" {literal}pattern="[0-9\-]{9}" {/literal}  id="school_year" name="school_year" value="{$currentSchool_Year}" autocomplete="off" class="span3" data-provide="typeahead" data-source='[

    {foreach from=$mySchool_Year key=k item=year}
    {if $mySchool_Year|@count - 1 eq $k}
    "{$year}"
    {else}
    "{$year}",
    {/if}
    {/foreach}
    ]'>

    <label><b>Semester: </b></label>
    <select id="semester" name="semester" class="span3">
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
    *}
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
        <li>
            <a class="tips" href="#upload_excel" data-toggle="modal" title="Upload Enrolled Students">
                <i class="icon-upload-alt"></i> 
            </a>
        </li>
        <li class="dropdown {if $index == 4}active{/if}">
            <a class="tips" href="{$host}/administrator/index.php?action=addSignatoryInCharge" title="Add Signatory-in-charge">
                <i class="icon-plus"></i>
            </a>
        </li>

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
                <i class="icon-plus"></i>
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
                    <i class="icon-plus"></i>
                </a>
            </li>

        {else}

            <li {if $index == 1}class="active"{/if}>
                <a class="tips" data-toggle="tooltip" title="List of Course under {$Dept_name}" href='{$host}/administrator/course_list_byDepartment.php'>
                    <i class="icon-book"></i>
                </a>
            </li>
            <li {if $index == 2}class="active"{/if}>
                <a class="tips" data-toggle="tooltip" title="List of Signatory under {$Dept_name}" href='{$host}/administrator/signatorialList.php'>
                    <i class="icon-pencil"></i>
                </a>
            </li>
            <li class="divider-vertical"></li>
            <li>
                <a class="tips" data-toggle="tooltip" title="Add Course" href='{$host}/administrator/course_list_byDepartment.php?action=addCourse'>
                    <i class="icon-plus"></i>
                </a>
            </li>

        {/if}

        {*
        <li class="dropdown">
        <a class="tips" href="#" title="Delete Selected">
        <i class="icon-trash"></i> 
        </a>
        </li>
        *}

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
                <i class="icon-align-justify"></i> Bulletin
            </a>
        </li>
        <li {if $index == 2}class="active"{/if}>
            <a href='../signatory/requirements.php'>
                <i class="icon-check"></i> Requirements
            </a>
        </li>
        <li {if $index == 3}class="active"{/if}>
            <a href='../signatory/uploadsignature.php'>
                <i class="icon-arrow-up"></i> Upload Signature
            </a>
        </li>
    </ul>
{/function}

{function name="upload_excel"}

    <div id="upload_excel" class="modal hide fade">
        <div class="modal-header">
            <button class="close" data-dismiss="modal"><i class="icon-remove"></i></button>
            <h4>Upload List of Enrolled Students</h4>
        </div>
        <div class="modal-body">

            <div class="fileupload fileupload-new" data-provides="fileupload">

                {if isset($excel_file)}

                    <table class="table table-condensed table-bordered">
                        <tr>
                            <td>Current File: </td>
                            <td><i class="icon-ms-excel"></i> student_current_enroll.xls</td>
                        </tr>
                    </table>
                {/if}

                <form class="form-inline" action="{$host}/administrator/index.php?action=upload_excel_file" method="post" enctype="multipart/form-data">
                    <label>
                        <b>Upload MS Excel File: </b>
                    </label>
                    <span class="btn btn-file">
                        Browse<input type="file" name="excel_file" />
                    </span>

                    <div class="form-actions fileupload-exists">
                        <i class="icon-file-alt icon-2x"></i> 
                        <span class="fileupload-preview"></span>
                        <div class="pull-right">
                            <button class="btn btn-success btn-primary" type="submit" name="save">Upload</button>
                            <button class="btn" data-dismiss="fileupload" type="button">Remove</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary pull-right" data-dismiss="modal">Cancel</button>
        </div>
    </div>
{/function}