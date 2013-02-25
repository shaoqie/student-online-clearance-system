<div class="row">
    <div class="span3">

        <div class="row">
            <div class="span3">

                <h4 class="well center-text well-small">User Accounts</h4>

                {*
                {if $user_type == 'Signatory'}
                <h4 class="well center-text well-small">Signatories-in-charge</h4>
                {else}
                <h4 class="well center-text well-small">Students</h4>
                {/if}
                *}
            </div>
        </div>

        <!-- Navigations-->
        <div class="row">
            <div class="span3">
                {call name=nav_admin index=1}
            </div>
        </div>

        {if $user_type == 'Signatory'}
            <!-- Controls-->
            <div class="row">
                <div class="span3">
                    <ul class="nav nav-tabs nav-stacked">
                        <li>
                            <a href="{$host}/administrator/index.php?action=addSignatoryInCharge">
                                <i class="icon-check"></i> Add Signatory In-Charge
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        {else}
            <!-- Upload Student List-->
            <form class="form-inline" action="../administrator/index.php?action=upload_excel_file" method="post" enctype="multipart/form-data">

                <label>
                    <b>Upload Student List: </b>
                    <input type="file" name="excel_file">
                </label>
                <button class="btn btn-primary" type="submit" name="save">
                    <i class="icon-upload-alt"></i> Upload
                </button>
            </form>
        {/if}

        {if isset($excel_file)}
            <div style="color: green;">
                <i class="icon-file icon-large"> student_current_enroll</i>
            </div>
        {/if}

    </div>
    <div class="span9">

        <div class="row">
            <div class="span9">

                <!-- Navigation Tabs-->
                {if $user_type == 'Signatory'}
                    {call name=nav_user_accounts index=1}
                {else}
                    {call name=nav_user_accounts index=0}
                {/if}

                <!-- Search Bar-->
                <span class="pull-right">
                    {call name=search}
                </span>

                {*
                <div class="row">
                <div class="span5">
                {if $user_type == 'Signatory'}
                <!-- Add Signatory In-charge Button-->
                <input class="btn" type="button" value="Add Signatory In-Charge" onclick="window.location.href = '../administrator/index.php?action=addSignatoryInCharge'">
                {/if}
                </div>
                *}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="span9">
            <!-- User Table-->
            <table class="table table-bordered table-hover">     
                <tr>
                    <th>
                        <input type="checkbox" onclick="isCheck({$rowCount_admin});" id="check" /> User
                    </th>
                    <th>{$courseORsign}</th>
                        {if isset($status)}
                        <th>Status</th>
                        {/if}
                    <!-- <th>Type</th> -->
                    {*if $user_type == 'Signatory'}<th>Usability</th>{/if*}
                </tr>
                {foreach from = $myName key = k item = i}
                    <tr>
                        <td>
                            <label class="checkbox">
                                <input class="Checkbox" type="checkbox" id = '{$k}' value = {$myKey_admin[$k]}>
                                {if isset($myPhotos[$k])}
                                    <img src="{$myPhotos[$k]}" style="width:35px; height:35px"/>
                                {else}
                                    <img src="{$host}/photos/default_student.png" style="width:35px; height:35px"/>
                                {/if}
                                {$i}
                            </label>
                        </td>
                        <td style="max-width: 300px;">{$my_courseORsign[$k]}</td>

                        {if isset($status)} 
                            <td>{$stud_status[$k]}</td> 
                        {/if}

                        {*if $user_type == 'Signatory'}<td>{$myUsability[$k]}</td>{/if*}
                    </tr>
                {/foreach}
            </table>

            <!-- Delete Control-->
            <a style="cursor:pointer;" onclick="findCheckUser('{$rowCount_admin}', 'users', '{$user_type}')">
                <i class="icon-remove"></i> Delete Selected
            </a>

            <!-- Pagination -->

            <div class="pull-right">
                Jump to: 
                <select id="jump" class="input-mini" onchange="jumpToPageUser('{$user_type}')">
                    <option>--</option>
                    {for $start = 1 to $admin_length}
                        <option>{$start}</option>
                    {/for}
                </select>
            </div>
        </div>
    </div>
</div>
</div>

{*
<!-- Navigation Tabs-->
<ul class="nav nav-tabs">
<li class="dropdown active" >
<a class="dropdown-toggle"
data-toggle="dropdown"
href="#">
User Accounts
<b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a href='../administrator/index.php?user_type=Student'>Student</a></li>
<li><a href='../administrator/index.php?user_type=Signatory'>Confirmed Signatory</a></li>
<li><a href='../administrator/unconfirmed_signatory.php'>Unconfirmed Signatory</a></li>
</ul>
</li>   
<li><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
<li><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<!-- Search Bar-->
{if $user_type == 'Signatory'}
<input class="btn" type="button" value="Add Signatory In-Charge" onclick="window.location.href='../administrator/index.php?action=addSignatoryInCharge'">
{/if}
<span class="pull-right">
{call name=search}
</span>

<!-- User Table-->
<table class="table table-hover">     
<tr>
<th>
<input type="checkbox" onclick="isCheck({$rowCount_admin})" id="check"> User
</th>
<th>{$courseORsign}</th>
<th>Type</th>
</tr>
{foreach from = $myName key = k item = i}
<tr>
<td>
<label class="checkbox">
<input class="Checkbox" type="checkbox" id = '{$k}' value = {$myKey_admin[$k]}> {$i}
</label>
</td>
<td>{$my_courseORsign[$k]}</td>
<td>{$myType[$k]}</td>
</tr>
{/foreach}
</table>

<!-- Delete Control-->
<a style="cursor:pointer;" onclick="findCheckUser('{$rowCount_admin}','users','{$user_type}')">
<i class="icon-remove"></i> Delete Selected
</a>

<!-- Pagination -->

<div class="pull-right">
Jump to: 
<select id="jump" class="input-mini" onchange="jumpToPageUser('{$user_type}')">
<option>--</option>
{for $start = 1 to $admin_length}
<option>{$start}</option>
{/for}
</select>
</div>
*}