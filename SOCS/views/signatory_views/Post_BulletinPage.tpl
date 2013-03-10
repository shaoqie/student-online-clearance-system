<!-- Breadcrumb-->
{call name=breadcrumb lvl2=5 lvl3=9 activelvl=3}
<div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Bulletin</h4>

        <!-- Navigations-->
        <div class="row">
            <div class="span3">
                {call name=nav_signatory index=1}
            </div>
        </div>

    </div>
    <div class="span9">

        <!-- Header-->
        <h4 class="well center-text well-small">Post Announcement</h4>

        <!-- Post Bulletin-->
        <form class="form-horizontal" method="post">

            <legend>Announcement Details:</legend>

            <div class="control-group">
                <div class="control-label"><b>Announcement: </b></div>
                <div class="controls">
                    <textarea required class="input-block-level" placeholder="Post a bulletin here....." name='post_message' rows="10"></textarea>
                </div>
            </div>
            
            <!-- Temporary kani lng sah... wala pa mn nnu nakapa ang backend-->
            <input type="hidden" name="school_year" value="{$currentSchool_Year}" />
            
            <!-- Temporary kani lng sah... wala pa mn nnu nakapa ang backend-->
            <input type="hidden" name="semester" value="{$currentSemester}" />

            {*
            <div class="control-group">
                <label class="control-label"><b>School Year:  </b></label>
                <div class="controls">
                    <select id="school_year" name="school_year" class="select2 input-xlarge">
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
                <label class="control-label"><b>Semester:  </b></label>
                <div class="controls">
                    <select id="semester" class="select2 input-xlarge" name="semester">
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
            *}

            <div class="control-group form-actions">
                <div class="pull-right">
                    <input type="submit" class="btn btn-primary" value="Post" name="postBulletin">
                    <input type="button" class="btn" value="Back" onclick="window.location.href = '../signatory/bulletin.php'">
                </div>
            </div>
        </form>
    </div>
</div>