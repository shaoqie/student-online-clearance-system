<!-- Archive Search-->
<div class="row">
    {call name=archiveSearch}
</div>

<!-- Navigation Tabs-->
<ul class="nav nav-tabs">       
    <li class="active"><a href='../signatory/index.php'>Student</a></li>
    <li><a href='../signatory/bulletin.php'>Bulletin</a></li>
    <li><a href='../signatory/requirements.php'>Requirements</a></li>       
</ul>

<!--Search Bar-->
{call name=search}

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
