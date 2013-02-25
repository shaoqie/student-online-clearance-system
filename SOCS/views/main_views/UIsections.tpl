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

<!-- Navigation Admin-->
{function name=nav_admin index=0}

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

{/function}

<!-- Navigation Signatory-->
{function name=nav_signatory index=0}
    <ul class="nav nav-tabs nav-stacked">
        <li {if $index == 0}class="active"{/if}>
            <a href='../signatory/index.php'>
                <i class="icon-user"></i> Student
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
    </ul>
{/function}

<!-- Navigation Tabs User Accounts-->
{function name="nav_user_accounts" index=0}
    <ul class="nav nav-tabs">
        <li {if $index == 0}class="active"{/if}>
            <a href='../administrator/index.php?user_type=Student'>Students</a>
        </li>
        <li {if $index == 1}class="active"{/if}>
            <a href='../administrator/index.php?user_type=Signatory'>Signatories-in-Charge</a>
        </li>
        <li {if $index == 2}class="active"{/if}>
            <a href='../administrator/unconfirmed_signatory.php'>Unconfirmed Signatories-in-charge</a>
        </li>
    </ul>
{/function}

<!-- Upload Student Lists-->
{function name="upload_excel"}
    <form class="form-inline" action="../administrator/index.php?action=upload_excel_file" method="post" enctype="multipart/form-data">

        <label>Upload Student List: 
            <input type="file" name="excel_file">
        </label>
        <button class="btn btn-primary" type="submit" name="save">
            <i class="icon-upload-alt"></i> Upload
        </button>
    </form>

    {if isset($excel_file)}
        <div style="color: green;">
            <i class="icon-file icon-large"> student_current_enroll</i>
        </div>
    {/if}
{/function}
