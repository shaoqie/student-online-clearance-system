<div class="row">
    <div class="span4">
        <ul class="nav nav-tabs">
            <li class="dropdown active">
                <a class="dropdown-toggle"
                    data-toggle="dropdown"
                    href="#">
                    Student
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href='../signatory/index.php?action=displayTable&filter=&page=1&finder=not&clearanceStatus=Cleared'  style="color:blue; cursor: pointer;"><i class="icon-check"></i>&nbsp; Cleared</a></li>
                    <li><a href='../signatory/index.php?action=displayTable&filter=&page=1&finder=not&clearanceStatus=Not_Cleared' style="color:red; cursor: pointer;"><i class="icon-remove-circle"></i>&nbsp; Not Cleared</a></li>
                </ul>
            </li>       
            <li><a href='../signatory/bulletin.php'>Bulletin</a></li>
            <li><a href='../signatory/requirements.php'>Requirements</a></li>       
        </ul>
    </div>    
    <div class="pull-right">
        School Year:
        <select id="school_year" class="input-small">
            {foreach from = $mySchool_Year key = k item = i}
                <option>{$i}</option>
            {/foreach}
        </select>
        Semester:
        <select id="semester" class="input-small">
            <option>First</option>
            <option>Second</option>
            <option>Summer</option>
        </select>
    </div> 
</div>

<form class="form-horizontal" method="get" action="?action=filter">
    <input type="hidden" value="filter" name="action">
    <input class="input-xxlarge" id="search" type="text" placeholder="Search..." value ="{$filter}" name="filterName">
    <input type="hidden" value="{$clearedStatus}" name="status">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i></button>  
</form>

<table class="table table-hover">     
    <tr>
        <th>Controls</th>
        <th>ID</th>
        <th>Name</th>  
        <th>Status</th>        
    </tr>
{foreach from = $myName_student_NameUser key = k item = i}
    <tr>
        <td style="width:300px">
            <div class="pull-left">
                <i class="icon-info-sign"></i> <a style="cursor:pointer;" onclick="window.location.href='index.php?action=viewStudent_Detail&stud_id={$myKey_Student_Username[$k]}'">Detail</a>&nbsp; &nbsp;
                <i class="icon-zoom-in"></i> <a style="cursor:pointer;" onclick="window.location.href='index.php?action=viewClearavePage&stud_id={$myKey_Student_Username[$k]}'">Clearance</a>
            </div>                
        </td> 
        <td>{$myKey_Student_Username[$k]}</td>
        <td>{$i}</td>
        {if $myStudent_ClearanceStatus[$k] eq 'Cleared'}
            <td style="color:blue;">{$myStudent_ClearanceStatus[$k]}</td>
         {else}
            <td style="color:red;">{$myStudent_ClearanceStatus[$k]}</td>
        {/if}
    </tr>
{/foreach}
</table> 

&nbsp;
<div class="pull-right">
    Jump to: 
    <select id="jump" class="input-mini" onchange="jumpToPageSignatory('{$clearedStatus}')">
        <option>--</option>
        {for $start = 1 to $signatoryDashboard_length}
        <option>{$start}</option>
        {/for}
    </select>
</div>
    