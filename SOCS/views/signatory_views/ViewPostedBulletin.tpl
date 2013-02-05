
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

<div class="media">
    <div class="media-body well">
        <h6 class="media-heading muted">
            Posted on {$date} at {$time}
        </h6>
        <pre>
        <p>{$message}</p>
    </div>
</div>
