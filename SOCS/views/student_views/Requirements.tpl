<!-- Header-->
<h4 class="well well-small center-text">{$sign_name} Clearance Requirements</h4>

<!-- Archive Search Box-->
<div class="navbar">
    <div class="navbar-inner">

        <form class="navbar-form" method="post">

            {call name=schoolyear_sem_inputs}

            <button class="btn btn-success" type="button" name="GO" onclick="change_schoolYear('1', '{$sign_id}', '1');">
                <i class="icon-search icon-white"></i>
            </button>

        </form>
    </div>
</div>

{*
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

<button class="btn btn-primary" type="button" name="GO" onclick="change_schoolYear('1', '{$sign_id}', '1');">
<i class="icon-search icon-white"></i>
</button>
</div>
*}

<!-- Requirements Table-->
{if $n_count eq 0}
    <p class="text-success">This signatory has no requirements yet.</p>
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

<div class="form-actions">
    <!-- Back Button-->
    <input class="btn btn-primary pull-right" type="button" value="Back" onclick="window.location.href = 'index.php'">
</div>