{*Search Bar--------------------------------------------------------------------*}

{function name=search filter=""}
{if isset($filter)}
    <form class="form-inline">
        <input type="hidden" value="filter" name="action">
        <input id="search" class="span5" type="text" placeholder="Search..." value="{$filter}" name="filterName">
        {if isset($user_type)}
            <input type="hidden" value="{$user_type}" name="type">
        {/if}
        
        {*<input type="hidden" value="{$clearedStatus}" name="status">*}
        
        <button class="btn btn-primary" type="submit">
            <i class="icon-search icon-white"></i>
        </button>

        <!--
        <button class="btn btn-primary" type="submit">
            <i class="icon-search icon-white"></i>
        </button>

        <!--
        <div class="btn-group">
            <button class="btn btn-primary" type="submit">
                <i class="icon-search icon-white"></i>
            </button>
            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a href="#">
                        <i class="icon-search"></i> Advance Search
                    </a>
                </li>
            </ul>
        </div>-->

        <!-- Delete this portion
        <input class="btn pull-right" type="button" value="Add User Account" onclick="window.location.href='index.php?action=display_add_edit_account'">
        -->

    </form>
{/if}
{/function}

{*Clearance Archive Search Bar--------------------------------------------------*}

{function name=archiveSearch}
<form class="form-inline pull-right" method="post">
    <label>School Year:  
        <select id="school_year" name="school_year" class="input-medium">
            {foreach from = $mySchool_Year key = k item = i}
                {if $currentSchool_Year eq $i}
                    <option selected>{$i}</option>
                {else}
                    <option>{$i}</option>
                {/if}
            {/foreach}
        </select>
    </label>

    <label>Semester: 
        <select id="semester" name="semester" class="input-medium">
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
    </label>

    <button class="btn btn-primary" type="submit" name="GO">
        <i class="icon-arrow-right icon-white"></i>
    </button>
</form>
{/function}