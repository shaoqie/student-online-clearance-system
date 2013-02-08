<div class="row">
    <div class="span3">

        <!-- Navigations-->
        <div class="row">
            <div class="span3">
                {call name=nav_signatory index=2}
            </div>
        </div>

    </div>
    <div class="span9">

        <!-- Header-->
        <h2 class="well center-text">Requirements</h2>

        <!--Archive Search Bar -->
        {call name=archiveSearch}

        <!-- Add Requirements Button-->
        <input class="btn" type="button" value="Add Requirements" onclick="window.location.href='../signatory/requirements.php?action=viewAdd_Requirements'">


        <!-- Search Bar-->
        <span class="pull-right">
            {call name=search}
        </span>

        <!-- Student Table-->
        <table class="table table-hover">
            <tr>
                <th>
                    <input type="checkbox" onclick="isCheck({$rowCount_requirement})" id="check"> Title
                </th>
                <th>Description</th>    
            </tr>

            {foreach from = $myName_requirements key = k item = i}
                <tr> 
                    <td>
                        <label class="checkbox">
                            <input class="Checkbox" type="checkbox" id = '{$k}' value = {$requirement_ID[$k]}> {$i}
                        </label>
                    </td>
                    <td>{$myDesc_requirements[$k]}</td>
                </tr>
            {/foreach}
        </table>

        <!-- Delete Selected Button-->
        <a style="cursor:pointer;" onclick="findCheck('{$rowCount_requirement}','Requirements')">
            <i class="icon-remove"></i> Delete Selected
        </a>

        <!-- Pagination-->
        <div class="pull-right">
            Jump to: 
            <select id="jump" class="input-mini" onchange="jumpToPageWithSchoolYear()">
                <option>--</option>
                {for $start = 1 to $requirement_length}
                <option>{$start}</option>
                {/for}
            </select>
        </div>
    </div>
</div>

{*
<!-- Navigation Tabs-->
<ul class="nav nav-tabs">
<li><a href='../signatory/index.php'>Student</a></li>       
<li><a href='../signatory/bulletin.php'>Bulletin</a></li>
<li class="active"><a href='../signatory/requirements.php'>Requirements</a></li>            
</ul>

<!--Archive Search Bar -->
{call name=archiveSearch}

<!-- Add Requirements Button-->
<input class="btn" type="button" value="Add Requirements" onclick="window.location.href='../signatory/requirements.php?action=viewAdd_Requirements'">


<!-- Search Bar-->
<span class="pull-right">
{call name=search}
</span>

<!-- Student Table-->
<table class="table table-hover">
<tr>
<th>
<input type="checkbox" onclick="isCheck({$rowCount_requirement})" id="check"> Title
</th>
<th>Description</th>    
</tr>

{foreach from = $myName_requirements key = k item = i}
<tr> 
<td>
<label class="checkbox">
<input class="Checkbox" type="checkbox" id = '{$k}' value = {$requirement_ID[$k]}> {$i}
</label>
</td>
<td>{$myDesc_requirements[$k]}</td>
</tr>
{/foreach}
</table>

<!-- Delete Selected Button-->
<a style="cursor:pointer;" onclick="findCheck('{$rowCount_requirement}','Requirements')">
<i class="icon-remove"></i> Delete Selected
</a>

<!-- Pagination-->
<div class="pull-right">
Jump to: 
<select id="jump" class="input-mini" onchange="jumpToPageWithSchoolYear()">
<option>--</option>
{for $start = 1 to $requirement_length}
<option>{$start}</option>
{/for}
</select>
</div>
*}