<!-- Back Button-->
<input class="btn pull-right" type="button" value="Back" onclick="window.location.href='index.php'"> 

<!-- Archive Search Box-->
<form class="form-inline">
    <label>School Year:  </label>
    <select id="school_year" name="school_year" class="span3">
        {foreach from = $mySchool_Year key = k item = i}
            {if $currentSchool_Year eq $i}
                <option selected>{$i}</option>
            {else}
                <option>{$i}</option>
            {/if}
        {/foreach}
    </select>

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

    <button class="btn btn-primary" type="button" name="GO" onclick="change_schoolYear('1','{$sign_id}','1')">
        <i class="icon-search icon-white"></i>
    </button>
</form>

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

