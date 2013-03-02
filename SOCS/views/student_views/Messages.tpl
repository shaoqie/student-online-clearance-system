<!-- Header-->
<h4 class="well well-small center-text">{$sign_name} Bulletin</h4>

<!-- Archive Search Box-->
<div class="form-inline">
    <label>School Year:  </label>
{literal}<input type="text" maxlength="9" pattern="[0-9\-]{9}" {/literal}  id="school_year" name="school_year" value="{$currentSchool_Year}" autocomplete="off" class="span3" data-provide="typeahead" data-source='[

       {foreach from=$mySchool_Year key=k item=year}
           {if $mySchool_Year|@count - 1 eq $k}
               "{$year}"
           {else}
               "{$year}",
           {/if}
       {/foreach}
       ]'>

<label>Semester: </label>
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

<button class="btn btn-primary" type="button" name="GO" onclick="change_schoolYear('0', '{$sign_id}', '1')">
    <i class="icon-search icon-white"></i>
</button>
</div>

    <hr>

{if $my_messages|@count != 0}

    <!-- Announcements-->
    <div class="media">
        {foreach from = $my_messages key = k item = i}
            <div class="media-body well">
                <h6 class="media-heading muted">
                    Posted on {$_date[$k]} at {$_time[$k]}
                </h6>
                <p>{$i}</p>
            </div>
        {/foreach}
    </div>

    <!-- Pagination-->
    <div class="row">
        <div class="span12">
            <div class="pull-right">
                Jump to: 
                <select id="jump_studMessages" class="input-mini" onchange="jumpToPageMessages('0',{$sign_id})">
                    <option>--</option>
                    {for $start = 1 to $stud_message_length}
                        <option>{$start}</option>
                    {/for}
                </select>
            </div>
        </div>
    </div>

{else}
    <p class="text-success">This signatory has no announcements yet.</p>
{/if}

<div class="row">
    <div class="span12">
        <div class="form-actions"> 
            <input class="btn btn-primary pull-right" type="button" value="Back" onclick="window.location.href = 'index.php'">
        </div>
    </div>
</div>