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
    <ul class="nav">
        <li class="dropdown {if $index == 1}active{/if}">
            <a class="dropdown-toggle" data-toggle="dropdown" href='#'>
                <i class="icon-user"></i> User Accounts
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="{$host}/administrator/index.php?user_type=Student">
                        <i class="icon-user"></i> Students
                    </a>
                </li>
                <li>
                    <a href="{$host}/administrator/index.php?user_type=Signatory">
                        <i class="icon-edit"></i> Signatories-in-charge
                    </a>
                </li>
                <li>
                    <a href="{$host}/administrator/unconfirmed_signatory.php">
                        <i class="icon-warning-sign"></i> Unconfirmed Signatories-in-charge
                    </a>
                </li>
            </ul>
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

<!-- Search Bar-->
{function name=search}
    {if isset($filter)}

        <form class="form-inline">
            <input type="hidden" value="filter" name="action">
            <div class="input-append">
                <input id="search" class="span3" type="search" placeholder="Search..." value="{$filter}" name="filterName">
                {if isset($user_type)}
                    <input type="hidden" value="{$user_type}" name="user_type">
                {/if}

                {*<input type="hidden" value="{$clearedStatus}" name="status">*}

                <button class="btn btn-success" type="submit">
                    <i class="icon-search icon-white"></i>
                </button>
            </div>
        </form>

    {/if}
{/function}

<!-- Archive Search Bar-->
{function name=archiveSearch}
    <form class="form-inline" method="post">
        <label><b>School Year:  </b></label>

    {literal}<input type="text" maxlength="9" pattern="[0-9\-]{9}" {/literal}  id="school_year" name="school_year" value="{$currentSchool_Year}" autocomplete="off" class="span3" data-provide="typeahead" data-source='[

           {foreach from=$mySchool_Year key=k item=year}
               {if $mySchool_Year|@count - 1 eq $k}
                   "{$year}"
               {else}
                   "{$year}",
               {/if}
           {/foreach}
           ]'>

    {*
    <select id="school_year" name="school_year" class="span3">
    {foreach from = $mySchool_Year key = k item = i}
    {if $currentSchool_Year eq $i}
    <option selected>{$i}</option>
    {else}
    <option>{$i}</option>
    {/if}
    {/foreach}
    </select>
    *}

    {*
    <input value="{$currentSchool_Year}" class="span2" type="text" maxlength="9" 
    {literal}       
    pattern="[0-9\-]{9}" id="school_year" name="school_year" autocomplete="off" class="input-small" data-provide="typeahead" data-source='[
    {/literal}
    {foreach from=$mySchool_Year key=k item=year}
    {if $mySchool_Year|@count - 1 eq $k}
    "{$year}"
    {else}
    "{$year}",
    {/if}
    {/foreach}
    
    ]'>
    *}

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
        <i class="icon-search icon-white"></i>
    </button>
</form>
{/function}

<!-- Admin Functions-->

<!-- User Accounts Navigation-->
{function name=nav_user_accounts index=0}

    <ul class="nav nav-tabs nav-stacked">
        <li {if $index == 1}class="active"{/if}>
            <a href='{$host}/administrator/index.php?user_type=Student'>
                <i class="icon-user"></i> Students</a>
        </li>
        <li {if $index == 2}class="active"{/if}>
            <a href='{$host}/administrator/index.php?user_type=Signatory'>
                <i class="icon-edit"></i> Signatories-in-Charge</a>
        </li>
        <li {if $index == 3}class="active"{/if}>
            <a href='{$host}/administrator/unconfirmed_signatory.php'>
                <i class="icon-warning-sign"></i> Unconfirmed Signatories-in-charge</a>
        </li>
    </ul>

    <ul class="nav nav-tabs nav-stacked">
        <li {if $index == 4}class="active"{/if}>
            <a href="{$host}/administrator/index.php?action=addSignatoryInCharge">
                <i class="icon-plus"></i> Add Signatory In-Charge
            </a>
        </li>
    </ul>

    <!-- Upload Student List-->
    <form class="form-inline" action="../administrator/index.php?action=upload_excel_file" method="post" enctype="multipart/form-data">

        <label>
            <b>Upload Student List: </b>
            <input type="file" name="excel_file">
        </label>
        <button class="btn btn-primary" type="submit" name="save">
            <i class="icon-upload-alt"></i> Upload
        </button>
    </form>

    {if isset($excel_file)}
        <div style="color: green;">
            <i class="icon-file icon-large"> student_current_enroll.xls</i>
        </div>
    {/if}

    {*
    <ul class="nav nav-tabs nav-stacked">

    <li {if $index == 1}class="active"{/if}>
    <a href='../administrator/index.php?user_type=Student'>
    <i class="icon-user"></i> User Accounts
    </a>
    </li>

    <li {if $index == 2}class="active"{/if}>
    <a href='../administrator/signatory_list_manager.php'>
    <i class="icon-coffee"></i> Signatories
    </a>
    </li>
    <li {if $index == 3}class="active"{/if}>
    <a href='../administrator/department_list_manager.php'>
    <i class="icon-building"></i> Departments
    </a>
    </li>
    </ul>
    *}

{/function}

<!-- Signatories Navigations-->
{function name=nav_signatories index=0}
    <!-- Controls-->
    <ul class="nav nav-tabs nav-stacked">
        <li {if $index == 1}class="active"{/if}>
            <a href="{$host}/administrator/signatory_list_manager.php">
                <i class="icon-list"></i> List of Signatories
            </a>
        </li>
    </ul>

    <ul class="nav nav-tabs nav-stacked">
        <li {if $index == 2}class="active"{/if}>
            <a href="{$host}/administrator/signatory_list_manager.php?action=addSignatory">
                <i class="icon-plus"></i> Add Signatory
            </a>
        </li>
    </ul>
{/function}

<!-- Departments Navigations-->
{function name=nav_departments index=0}
    <!-- Navigations-->
    <ul class="nav nav-tabs nav-stacked">
        <li {if $index == 1}class="active"{/if}>
            <a href="{$host}/administrator/department_list_manager.php">
                <i class="icon-list"></i> List of Departments
            </a>
        </li>
    </ul>
    
    <!-- Controls-->
    <ul class="nav nav-tabs nav-stacked">
        <li {if $index == 2}class="active"{/if}>
            <a href="{$host}/administrator/department_list_manager.php?action=addDepartment">
                <i class="icon-plus"></i> Add Department
            </a>
        </li>
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