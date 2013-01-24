<div class="pull-right">
    {include file=$School_year_content}
</div>

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
                    <li><a href='../signatory/index.php?action=displayTable&filter=&page=1&finder=not&clearanceStatus='  style="color:blue; cursor: pointer;"><i class="icon-globe"></i>&nbsp; All</a></li>
                    <li><a href='../signatory/index.php?action=displayTable&filter=&page=1&finder=not&clearanceStatus=Cleared'  style="color:blue; cursor: pointer;"><i class="icon-check"></i>&nbsp; Cleared</a></li>
                    <li><a href='../signatory/index.php?action=displayTable&filter=&page=1&finder=not&clearanceStatus=Not Cleared' style="color:red; cursor: pointer;"><i class="icon-remove-circle"></i>&nbsp; Not Cleared</a></li>
                </ul>
            </li>       
            <li><a href='../signatory/bulletin.php'>Bulletin</a></li>
            <li><a href='../signatory/requirements.php'>Requirements</a></li>       
        </ul>
    </div>         
</div>

<!--Body content-->
<form class="form-horizontal" method="get" action="?action=filter">
    <input type="hidden" value="filter" name="action">
    <input class="span5" id="search" type="text" placeholder="Search..." value ="{$filter}" name="filterName">
    <input type="hidden" value="{$clearedStatus}" name="status">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i></button>  
</form>

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