<div class="pull-right">
    {include file=$School_year_content}
</div>

<div class="row">
    <div class="span4">
        <ul class="nav nav-tabs">
            <li><a href='../signatory/index.php'>Student</a></li>       
            <li class="active"><a href='../signatory/bulletin.php'>Bulletin</a></li>
            <li><a href='../signatory/requirements.php'>Requirements</a></li>         
        </ul>
    </div> 
</div> 

<!--Body content-->
<form class="form-horizontal" method="get" action="?action=filter">
    <input type="hidden" value="filter" name="action">
    <input class="span5" id="search" type="text" placeholder="Search for data and time here..." value ="{$filter}" name="filterName">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i></button>  
    <input class="btn pull-right" type="button" value="Post Bulletin" onclick="window.location.href='../signatory/bulletin.php?action=viewPosting_Bulletin'">
</form>

<table class="table">
    <tr>
        <th style="width: 200px;"><input type="checkbox" onclick="isCheck({$rowCount_bulletin})" id="check"></input> &nbsp;Messages</th> 
        <th> Post Date and Time</th>
        <th> Message Info.</th>
    </tr>

    {foreach from = $myName_messages key = k item = i}
        <tr>        
            <td>
                <div class="pull-left">
                    <input type="checkbox" id = '{$k}' value = {$myMessage_ID[$k]} ></input> &nbsp; {$i}
                </div>
            </td>
            <td>{$my_dateTime[$k]}</td>
            <td>
                <i class="icon-eye-open"></i><a style="cursor:pointer;" onclick="window.location.href='../signatory/bulletin.php?action=viewPosted_Bulletin&key={$myMessage_ID[$k]}'"> View</a>&nbsp; &nbsp;         
            </td>
        </tr>
    {/foreach}
</table>

<i class="icon-remove"></i><a style="cursor:pointer;" onclick="findCheck('{$rowCount_bulletin}')">Delete Selected</a>

<div class="pull-right">
    Jump to: <select id="jump" class="input-mini" onchange="jumpToPageWithSchoolYear()">
        <option>--</option>
        {for $start = 1 to $bulletin_length}
        <option>{$start}</option>
        {/for}
    </select>
</div>