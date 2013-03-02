<div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Students</h4>

        <!-- Navigations-->
        {call name=nav_signatory}

    </div>
    <div class="span9">

        <!-- Header-->
        <h4 class="well center-text well-small">List of Students</h4>

        <!-- Archive Search-->
        {call name=archiveSearch}

        <!-- Search Bar-->
        <span class="pull-right">
            {*{call name=search}*}
            <div class="form-inline">
                <input id="search" class="span3" type="search" placeholder="Search..." value="{$filter}" onkeypress="enterSearch(event);">
                <button class="btn btn-success" type="button" onclick="jumpToPageWithSchoolYear();">
                    <i class="icon-search icon-white"></i>
                </button>
            </div>
            <br/>
        </span>  

        <!-- Student Table-->
        <table class="table table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>Name</th>  
                <th>Status</th>    
            </tr>
            {foreach from = $myName_student_NameUser key = k item = i}
                <tr> 
                    <td style="width:150px">{$myKey_Student_Username[$k]}</td>
                    <td>
                        <div style="text-align: left;">
                            {if isset($myPhotos[$k])}
                                <img src="{$myPhotos[$k]}" style="width:35px; height:35px"/>
                            {else}
                                <img src="{$host}/photos/default_student.png" style="width:35px; height:35px"/>
                            {/if}
                            {$i}
                        </div>
                    </td>
                    <td>
                        <div class="btn-group">
                            {if $myStudent_ClearanceStatus[$k] eq 'Cleared'}
                             <!--   <img style="height: 15px; width: 30px;" src="{$host}/photos/cleared.png" class="img-polaroid" /> -->
                                <a class="btn btn-small btn-success" href="index.php?action=viewClearancePage&stud_id={$myKey_Student_Username[$k]}&sy_sem_id={$sysemid}">
                                    <i class="icon-ok-circle icon-large"></i> Cleared</a>                   
                                {else}
                                  <!--  <img style="height: 15px; width: 30px;" src="{$host}/photos/not cleared.png" class="img-polaroid" /> -->
                                <a class="btn btn-small btn-danger" href="index.php?action=viewClearancePage&stud_id={$myKey_Student_Username[$k]}&sy_sem_id={$sysemid}">
                                    <i class="icon-remove-circle icon-large"></i> Not Cleared</a> 
                                {/if}
                            <button style="height: 26px;"class="btn dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a style="cursor:pointer;" onclick="window.location.href = 'index.php?action=viewStudent_Detail&stud_id={$myKey_Student_Username[$k]}&sy_sem_id={$sysemid}';"> <i  class="icon-info-sign"></i> Detail</a>
                                </li>
                                <li>
                                    <a style="cursor:pointer;" onclick="window.location.href = 'index.php?action=viewClearancePage&stud_id={$myKey_Student_Username[$k]}&sy_sem_id={$sysemid}';"> <i class="icon-zoom-in"></i> Clearance</a>
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
            <select id="jump" class="input-mini" onchange="jumpToPageWithSchoolYear();">
                <option>--</option>
                {for $start = 1 to $signatoryDashboard_length}
                    <option>{$start}</option>
                {/for}
            </select>
        </div>
    </div>
</div>
