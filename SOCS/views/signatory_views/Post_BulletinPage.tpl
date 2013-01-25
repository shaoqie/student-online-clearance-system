<form class="form-inline" method="post">
    <div class="pull-right">
        <label >School Year:  </label>
        <select name="school_year" class="input-medium">
            {foreach from = $mySchool_Year key = k item = i}
                {if $currentSchool_Year eq $i}
                    <option selected>{$i}</option>
                {else}
                    <option>{$i}</option>
                {/if}
            {/foreach}
        </select>
        
        <label >Semester:  </label>
        <select name="semester" class="input-medium">
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
    </div>

    <ul class="nav nav-tabs">
        <li><a href='../signatory/index.php'>Student</a></li>       
        <li class="active"><a href='../signatory/bulletin.php'>Bulletin</a></li>
        <li><a href='../signatory/requirements.php'>Requirements</a></li>            
    </ul>
<form>
    <!--Body content-->
    <input type="button" class="pull-right btn" value="Back" onclick="window.location.href='../signatory/bulletin.php'">               
    <legend>Post Bulletin</legend>
    <textarea class="input-xxlarge" placeholder="Post a bulletin here....." name='post_message' rows="10" cols="30"></textarea>
    <input type="submit" class="btn btn-primary" value="Post" name="postBulletin">
</form>



