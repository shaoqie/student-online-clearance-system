<form method="post">
    <div class="row">
        <div class="span4">
            <ul class="nav nav-tabs">
                <li><a href='../signatory/index.php'>Dashboard</a></li>
                <li class="active"><a href='../signatory/bulletin.php'>Bulletin</a></li>
                <li><a href='../signatory/index.php?action=viewListOfRequirements'>Requirements</a></li>
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
    
    <legend>Post Bulletin</legend>
    <div class="row">    
            <div class="offset1">
                <textarea class="input-xxlarge" placeholder="Post a bulletin here....." name='post_message' rows="10" cols="30"></textarea>
            </div>  
            <div class="span2 offset6">
                <input type="submit" class="btn btn-primary" value="Post" name="postBulletin">
            </div>  
    </div>
</form>

