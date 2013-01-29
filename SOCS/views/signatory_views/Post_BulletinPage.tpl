<!-- Back Button-->
<input type="button" class="pull-right btn" value="Back" onclick="window.location.href='../signatory/bulletin.php'">

<!-- Navigation Tabs-->
<ul class="nav nav-tabs">
    <li><a href='../signatory/index.php'>Student</a></li>       
    <li class="active"><a href='../signatory/bulletin.php'>Bulletin</a></li>
    <li><a href='../signatory/requirements.php'>Requirements</a></li>            
</ul>

<!-- Archive Search Bar-->
<form class="form-inline" method="post">
    <label >School Year:  </label>
    <select id="school_year" name="school_year" class="input-medium">
        {foreach from = $mySchool_Year key = k item = i}
            {if $currentSchool_Year eq $i}
                <option selected>{$i}</option>
            {else}
                <option>{$i}</option>
            {/if}
        {/foreach}
    </select>

    <label>Semester: 
        <select id="semester" name="semester" class="input-medium">
            {if $currentSemester eq 'First'}
                <option selected>First</option>
                <option>Second</option>
                <option>Summer</option>
            {elseif $currentSemester eq 'Second'}
                <option>First</option>
                <option selected>Second</option>
                <option>Summer</option>
            {else}
                <option>First</option>
                <option>Second</option>
                <option selected>Summer</option>
            {/if}           
        </select>
        <input class="btn btn-primary" type="submit" value="GO" name="GO">
    </label>

<!-- Post Bulletin-->

    <legend>Post Bulletin:</legend>

    <div class="control-group">
        <textarea class="input-block-level" placeholder="Post a bulletin here....." name='post_message' rows="10" cols="30"></textarea>
    </div>

    <div class="form-actions">
        <input type="submit" class="btn btn-primary pull-right" value="Post" name="postBulletin">
    </div>
</form>



