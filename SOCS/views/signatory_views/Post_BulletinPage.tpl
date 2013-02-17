<div class="row">
    <div class="span3">

        <!-- Navigations-->
        <div class="row">
            <div class="span3">
                {call name=nav_signatory index=1}
            </div>
        </div>

    </div>
    <div class="span9">

        <!-- Header-->
        <h2 class="well center-text">Bulletin</h2>

        {*
        <!-- Archive Search Bar-->
        <form class="form-inline" method="post">
        <label >School Year:  </label>
        <select id="school_year" name="school_year" class="span3">
        {foreach from = $mySchool_Year key = k item = i}
        {if $currentSchool_Year eq $i}
        <option selected>{$i}</option>
        {else}
        <option>{$i}</option>
        {/if}
        {/foreach}
        </select>

        <label>Semester: 
        <select id="semester" name="semester" class="span3">
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
        </label>
        *}

        <!-- Post Bulletin-->
        <form class="form-horizontal" method="post">

            <legend>Post Bulletin:</legend>

            <div class="control-group">
                <div class="control-label"><b>Announcement: </b></div>
                <div class="controls">
                    <textarea class="input-block-level" placeholder="Post a bulletin here....." name='post_message' rows="10"></textarea>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label"><b>School Year:  </b></label>
                <div class="controls">
                    <select id="school_year" name="school_year" class="span3">
                        {foreach from = $mySchool_Year key = k item = i}
                            {if $currentSchool_Year eq $i}
                                <option selected>{$i}</option>
                            {else}
                                <option>{$i}</option>
                            {/if}
                        {/foreach}
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label"><b>Semester: </b></label>
                <div class="controls">
                    <select id="semester" name="semester" class="span3">
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
            </div>

            <div class="control-group form-actions">
                <div class="pull-right">
                    <input type="submit" class="btn btn-primary" value="Post" name="postBulletin">
                    <input type="button" class="btn" value="Back" onclick="window.location.href='../signatory/bulletin.php'">
                </div>
            </div>
        </form>
    </div>
</div>

{*
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
<select id="school_year" name="school_year" class="span3">
{foreach from = $mySchool_Year key = k item = i}
{if $currentSchool_Year eq $i}
<option selected>{$i}</option>
{else}
<option>{$i}</option>
{/if}
{/foreach}
</select>

<label>Semester: 
<select id="semester" name="semester" class="span3">
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
*}