<!-- Back Button-->
<input type="button" class="pull-right btn" value="Back" onclick="window.location.href='../signatory/bulletin.php'">

<!-- Navigation Tabs-->
<ul class="nav nav-tabs">
    <li><a href='../signatory/index.php'>Student</a></li>       
    <li class="active"><a href='../signatory/bulletin.php'>Bulletin</a></li>
    <li><a href='../signatory/requirements.php'>Requirements</a></li>            
</ul>

<!-- Archive Search Bar-->
{call name=archiveSearch}

<!-- Post Bulletin-->
<form class="form-horizontal">

    <legend>Post Bulletin:</legend>

    <div class="control-group">
        <textarea class="input-block-level" placeholder="Post a bulletin here....." name='post_message' rows="10" cols="30"></textarea>
    </div>

    <div class="form-actions">
        <input type="submit" class="btn btn-primary pull-right" value="Post" name="postBulletin">
    </div>
</form>



