<div class="row">   
    <div class="pull-right">
        <form class="form-inline" method="post">
            <label>School Year:</label>
            <select id="school_year" name="school_year" class="input-medium">
                {foreach from = $mySchool_Year key = k item = i}
                    {if $currentSchool_Year eq $i}
                        <option selected>{$i}</option>
                    {else}
                        <option>{$i}</option>
                    {/if}        
                {/foreach}
            </select>
            <label>Semester:</label>
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
            <input class="btn btn-primary" type="button" value="GO" name="GO" onclick="change_schoolYear({$sign_id},1)">
        </form>
    </div> 
</div>   

<hr/>
<!--Body content-->
<div class="pull-right">
    <input class="btn" type="button" value="Back" onclick="window.location.href='index.php'"> 
</div>

<h1>{$sign_name} Bulletin</h1>

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

<div class="pull-right">
    Jump to: 
    <select id="jump_studMessages" class="input-mini" onchange="jumpToPageMessages({$sign_id})">
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