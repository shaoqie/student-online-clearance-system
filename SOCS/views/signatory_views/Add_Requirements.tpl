<!-- Back Button-->
<button class="pull-right btn" onclick="window.location.href='../signatory/requirements.php'">Back</button> 

<!-- Navigation Tabs-->
<ul class="nav nav-tabs">
    <li><a href='../signatory/index.php'>Student</a></li>       
    <li><a href='../signatory/bulletin.php'>Bulletin</a></li>
    <li class="active"><a href='../signatory/requirements.php'>Requirements</a></li>         
</ul>

<!--Archive Search Bar -->
{call name=archiveSearch}

<form method='post' class="form-horizontal">
    <legend>Add Requirement:</legend>
    <div class="control-group">
        <label class="control-label">Title: </label>
        <div class="controls">
            <input class="span5" type ='text' name='requirement_title'>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Description: </label>
        <div class="controls">
            <textarea class="span5" name='requirement_description' rows="5" cols="50"></textarea>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit' value='Next' name="Next">
        </div>
    </div>
</form> 