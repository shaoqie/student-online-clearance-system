<!-- Navigation Tabs-->
<ul class="nav nav-tabs">       
    <li class="active"><a href='../signatory/index.php'>Student</a></li>
    <li><a href='../signatory/bulletin.php'>Bulletin</a></li>
    <li><a href='../signatory/requirements.php'>Requirements</a></li>       
</ul>

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

<!--Search Bar-->
<form class="form-horizontal" method="get" action="?action=filter">
    <input type="hidden" value="filter" name="action">
    <input class="span4" id="search" type="text" placeholder="Search..." value ="{$filter}" name="filterName">
    <input type="hidden" value="{$clearedStatus}" name="status">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i></button>  
</form>

<!-- Student Table-->
<table class="table table-hover">     
    <tr>
        <th>ID</th>
        <th>Name</th>  
        <th>Status</th>    
    </tr>
    {foreach from = $myName_student_NameUser key = k item = i}
        <tr> 
            <td style="width:150px">{$myKey_Student_Username[$k]}</td>
            <td>{$i}</td>
            <td>
                <div class="btn-group">
                    {if $myStudent_ClearanceStatus[$k] eq 'Cleared'}
                        <img style="height: 15px; width: 30px;" src="{$host}/photos/cleared.png" class="img-polaroid" />
                    {else}
                        <img style="height: 15px; width: 30px;" src="{$host}/photos/not cleared.png" class="img-polaroid" />
                    {/if}
                    <button style="height: 25px;"class="btn dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a style="cursor:pointer;" onclick="window.location.href='index.php?action=viewStudent_Detail&stud_id={$myKey_Student_Username[$k]}'"> <i  class="icon-info-sign"></i> Detail</a>
                        </li>
                        <li>
                            <a style="cursor:pointer;" onclick="window.location.href='index.php?action=viewClearavePage&stud_id={$myKey_Student_Username[$k]}'"> <i class="icon-zoom-in"></i> Clearance</a>
                        </li>
                    </ul>    
                </div> 
            </td>
        </tr>
    {/foreach}
</table> 

<!-- Pagination-->
<div class="pull-right">
    Jump to: 
    <select id="jump" class="input-mini" onchange="jumpToPageWithSchoolYear()">
        <option>--</option>
        {for $start = 1 to $signatoryDashboard_length}
        <option>{$start}</option>
        {/for}
    </select>
</div>
