<!-- Navigation Tabs-->
<ul class="nav nav-tabs">
    <li><a href='../signatory/index.php'>Student</a></li>       
    <li class="active"><a href='../signatory/bulletin.php'>Bulletin</a></li>
    <li><a href='../signatory/requirements.php'>Requirements</a></li>         
</ul>

<!-- Archive Search-->
{call name=archiveSearch}

<!-- Post Bulletin Button-->
<input class="btn" type="button" value="Post Bulletin" onclick="window.location.href='../signatory/bulletin.php?action=viewPosting_Bulletin'">

<!-- Search Bar-->
<span class="pull-right">
    {call name=search}
</span>

<!-- Table of Announcements-->
<table class="table table-hover">
    <tr>
        <th>
            <input type="checkbox" onclick="isCheck({$rowCount_bulletin})" id="check"></input> Messages
        </th> 
        <th> Post Date and Time</th>
        <th> Message Info.</th>
    </tr>

    {foreach from = $myName_messages key = k item = i}
        <tr>        
            <td>
                <div class="pull-left">
                    <input class="Checkbox" type="checkbox" id = '{$k}' value = {$myMessage_ID[$k]} ></input> &nbsp; {$i}
                </div>
            </td>
            <td>{$my_dateTime[$k]}</td>
            <td>
                <i class="icon-eye-open"></i>
                <a style="cursor:pointer;" onclick="window.location.href='../signatory/bulletin.php?action=viewPosted_Bulletin&key={$myMessage_ID[$k]}'"> View</a>
            </td>
        </tr>
    {/foreach}
</table>

<!-- Delete Selected Button-->
<a style="cursor:pointer;" onclick="findCheck('{$rowCount_bulletin}','Bulletin')">
    <i class="icon-remove"></i> Delete Selected
</a>

<div class="pull-right">
    Jump to: <select id="jump" class="input-mini" onchange="jumpToPageWithSchoolYear()">
        <option>--</option>
        {for $start = 1 to $bulletin_length}
        <option>{$start}</option>
        {/for}
    </select>
</div>