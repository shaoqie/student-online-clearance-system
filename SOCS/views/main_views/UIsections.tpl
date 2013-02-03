{*Search Bar--------------------------------------------------------------------*}

{function name=search}
{if isset($filter)}

    <form class="form-inline">
        <input type="hidden" value="filter" name="action">
        <input id="search" class="input-large" type="search" placeholder="Search..." value="{$filter}" name="filterName">
        {if isset($user_type)}
            <input type="hidden" value="{$user_type}" name="type">
        {/if}

        {*<input type="hidden" value="{$clearedStatus}" name="status">*}

        <button class="btn btn-success" type="submit">
            <i class="icon-search icon-white"></i>
        </button>
    </form>

{/if}
{/function}

{*Clearance Archive Search Bar--------------------------------------------------*}

{function name=archiveSearch}
<form class="form-inline" method="post">
    <label>School Year:  </label>
    <select id="school_year" name="school_year" class="span3">
        {foreach from = $mySchool_Year key = k item = i}
            {if $currentSchool_Year eq $i}
                <option selected>{$i}</option>
            {else}
                <option>{$i}</option>
            {/if}
        {/foreach}
    </select>

    <label>Semester: </label>
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

{function name=nav_admin index=0}

<ul class="nav nav-list well">
    <li class="nav-header">Admin Menu</li>
    <li>
        <a href='../administrator/index.php?user_type=Student'>User Accounts</a>
        <ul class="nav nav-list">
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
    </li>

    <li {if $index == 3}class="active"{/if}>
        <a href='../administrator/signatory_list_manager.php'>Signatories</a>
    </li>
    <li {if $index == 4}class="active"{/if}>
        <a href='../administrator/department_list_manager.php'>Departments</a>
    </li>
</ul>

{/function}