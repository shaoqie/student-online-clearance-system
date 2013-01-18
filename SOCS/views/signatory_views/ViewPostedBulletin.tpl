<form method="post">
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
            <li><a href='../signatory/requirements.php'>Requirements</a></li>            
        </ul>
        </div>    
        <div class="pull-right">
            School Year:
            <select id="school_year" class="input-small" name="school_year">
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

    <input type="button" class="pull-right btn" value="Back" onclick="window.location.href='../signatory/bulletin.php'">

    <legend>Already Posted Bulletin</legend>
    <div class="row">    
        <div class="span8 offset1" id="divMessages">
            <label><i style="font-size: 12px; color:blue;">Posted on {$date} at {$time}</i></label>
            <hr/>
            <p style="margin-left: 50px; font-size: 15px;">{$message}</p>
        </div>   
    </div>
</form>

