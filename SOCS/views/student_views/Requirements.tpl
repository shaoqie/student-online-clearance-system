<!-- Back Button-->
<input class="btn pull-right" type="button" value="Back" onclick="window.location.href='index.php'"> 

<!-- Archive Search Box-->
<div class="form-inline">
    <label><b>School Year:  </b></label>
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
    
    <label><b>Semester: </b></label>
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

    <button class="btn btn-primary" type="button" name="GO" onclick="change_schoolYear('1','{$sign_id}','1')">
        <i class="icon-search icon-white"></i>
    </button>
</div>

<!-- Header-->
<h2>{$sign_name} Clearance Requirements</h2>

<!-- Requirements Table-->
{if $n_count eq 0}
    <p>This signatory has no requirements yet.</p>
{else}
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Requirement</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        {foreach from = $clearanceList key = k item = i}
            <tr>
                <td>{$clearanceList[$k][1]}</td>
                <td>{$clearanceList[$k][3]}</td>
            </tr>
        {/foreach}
        </tbody>
    </table>
{/if}
       



{*
{foreach from = $my_messages key = k item = i}
    <div class="media">
        <div class="media-body well">
            <h6 class="media-heading muted">
                Posted on {$_date[$k]} at {$_time[$k]}
            </h6>
            <p>{$i}</p>
        </div>
    </div>
{/foreach}
*}

