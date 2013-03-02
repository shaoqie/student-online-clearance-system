{*
<ul class="breadcrumb">
<li><a href="#">Home</a> <span class="divider"><i class="icon-chevron-right"></i></span></li>
<li><a href="#">Library</a> <span class="divider"><i class="icon-chevron-right"></i></span></li>
<li class="active">Data</li>
</ul>
*}

<div class="row">
    <div class="span3">

        <div class="row">
            <div class="span3">
                <h4 class="well center-text well-small">User Accounts</h4>
            </div>
        </div>

        <!-- Navigations-->
        <div class="row">
            <div class="span3">

                <!-- Admin Navigations--> 
                {call name=nav_admin index=1}

            </div>
        </div>
    </div>

    <div class="span9">

        <div class="row">
            <div class="span9">

                <!-- Header-->
                {if $user_type == 'Signatory'}
                    <h4 class="well center-text well-small">List of Signatories-in-charge</h4>
                {else}
                    <h4 class="well center-text well-small">List of Students</h4>
                {/if}

                <div class="navbar">
                    <div class="navbar-inner">

                        {if $user_type == 'Student'}
                            {call name=nav_user_accounts index=1}
                        {else}
                            {call name=nav_user_accounts index=2}
                        {/if}

                        {call name=search}
                    </div>
                </div>
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
            <a style="cursor:pointer;" onclick="findCheckUser('{$rowCount_admin}', 'users', '{$user_type}');">
                <i class="icon-remove"></i> Delete Selected
            </a>

            <!-- Pagination -->
            <div class="pull-right">
                Jump to: 
                <select id="jump" class="input-mini" onchange="jumpToPageUser('{$user_type}');">
                    <option>--</option>
                    {for $start = 1 to $admin_length}
                        <option>{$start}</option>
                    {/for}
                </select>
            </div>
        </div>
    </div>
</div>