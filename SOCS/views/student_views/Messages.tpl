<!-- Back Button-->
<input class="btn pull-right" type="button" value="Back" onclick="window.location.href='index.php'"> 

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
    
    {*
    <select id="school_year" name="school_year" class="span3">
        {foreach from = $mySchool_Year key = k item = i}
            {if $currentSchool_Year eq $i}
                <option selected>{$i}</option>
            {else}
                <option>{$i}</option>
            {/if}
        {/foreach}
    </select>
    *}
    
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

    <button class="btn btn-primary" type="button" name="GO" onclick="change_schoolYear('0','{$sign_id}','1')">
        <i class="icon-search icon-white"></i>
    </button>
</div>

<!-- Header-->
<h1>{$sign_name} Announcements</h1>

<!-- Announcements-->
{foreach from = $my_messages key = k item = i}
    <div class="media">
        <div class="media-body well">
            <h6 class="media-heading muted">
                Posted on {$_date[$k]} at {$_time[$k]}
            </h6>
            <pre>
            <p>{$i}</p>
        </div>
    </div>
{/foreach}

<!-- Pagination-->
<div class="pull-right">
    Jump to: 
    <select id="jump_studMessages" class="input-mini" onchange="jumpToPageMessages('0',{$sign_id})">
        <option>--</option>
        {for $start = 1 to $stud_message_length}
        <option>{$start}</option>
        {/for}
    </select>
</div>

{*
<legend>{$sign_name} Bulletin</legend>
<div class="row">
<table class="table">
{foreach from = $my_messages key = k item = i}
<tr>
<td>
<div class="" id="divMessages">
<label><i style="font-size: 12px; color:blue;">Posted on {$_date[$k]} at {$_time[$k]}</i></label>
<hr/>
<p style="margin-left: 50px; font-size: 15px;">{$i}</p>
</div>
</td>
</tr>
{/foreach}
</table>
</div>*}