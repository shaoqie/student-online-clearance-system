<div class="row">
    <div class="span4">
        <ul class="nav nav-tabs">
            <li class="dropdown">
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
            <li class="active"><a href='../signatory/bulletin.php'>Bulletin</a></li>
            <li><a href='../signatory/index.php?action=viewListOfRequirements'>Requirements</a></li>       
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
    <input class="input-xxlarge" id="search" type="text" placeholder="Search for data and time here..." value ="{$filter}" name="filterName">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i></button>  
    <input class="btn pull-right" type="button" value="Post Bulletin" onclick="window.location.href='../signatory/bulletin.php?action=viewPosting_Bulletin'">
</form>
    

        
<table class="table">
    <tr>
        <td> <input type="checkbox" onclick="isCheck({$rowCount_bulletin})" id="check"></input> &nbsp; &nbsp; <i class="icon-check"></i><a>Toggle Check</a></td>      
        <td></td>   <td></td>
    </tr>
    <tr>
        <th style="width: 200px;"><p class="pull-left">Controls</p></th>
        <th>Messages</th> 
        <th> Post Date and Time</th>
    </tr>
    
    {foreach from = $myName_messages key = k item = i}
        <tr>
            <td>
                <div class="pull-left">
                    <input type="checkbox" id = '{$k}' value = {$myMessage_ID[$k]} ></input> &nbsp; &nbsp;
                    <i class="icon-eye-open"></i><a style="cursor:pointer;" onclick="window.location.href='../signatory/bulletin.php?action=viewPosted_Bulletin&key={$myMessage_ID[$k]}'"> View</a>&nbsp; &nbsp;
                </div>
            </td>
            <td>{$i}</td>
            <td>{$my_dateTime[$k]}</td>
        </tr>
    {/foreach}
</table>

<i class="icon-remove"></i><a style="cursor:pointer;" onclick="findCheck('{$rowCount_bulletin}')">Delete Selected</a>

<div class="pull-right">
    Jump to: <select id="jump" class="input-mini" onchange="jumpToPage()">
        <option>--</option>
        {for $start = 1 to $bulletin_length}
        <option>{$start}</option>
        {/for}
    </select>
</div>