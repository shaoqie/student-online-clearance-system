
<div class="row">
    <div class="span4">
        <ul class="nav nav-tabs">
            <li><a href='../signatory/index.php'>Student</a></li>       
            <li class="active"><a href='../signatory/bulletin.php'>Bulletin</a></li>
            <li><a href='../signatory/requirements.php'>Requirements</a></li>            
        </ul>
    </div>    
</div> 

<input type="button" class="pull-right btn" value="Back" onclick="window.location.href='../signatory/bulletin.php'">

<legend>Already Posted Bulletin</legend>
<div class="row">    
    <div class="span11 offset1" id="divMessages">
        <label><i style="font-size: 12px; color:blue;">Posted on {$date} at {$time}</i></label>
        <hr/>
        <p style="margin-left: 50px; font-size: 15px;">{$message}</p>
    </div>   
</div>
