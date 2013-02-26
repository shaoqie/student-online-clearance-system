<div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">User Accounts</h4>

        <!-- Navigations-->
        <div class="row">
            <div class="span3">
                {call name=nav_user_accounts index=3}
            </div>
        </div>

    </div>
    <div class="span9">

        <!-- Header-->
        <h4 class="well center-text well-small">Unconfirmed Signatories-in-charge</h4>
        
        {*
        <!-- Navigation Tab-->
        {call name=nav_user_accounts index=2}
        *}

        <!-- Search Bar-->
        <div class="row">
            <div class="span9">
                <span class="pull-right">
                    {call name=search}
                </span>
            </div>
        </div>

        <div class="row">
            <div class="span9">
                <!-- Signatory Table -->
                <table class="table table-bordered table-hover">     
                    <tr>
                        <th>
                            <input type="checkbox" onclick="isCheck({$rowCount_unconfirmedSign})" id="check"> Accounts
                        </th>
                        <th>Assigned Signatory</th>
                        <th>Controls</th>
                    </tr>
                    {foreach from = $myName_unconfirmedSign key = k item = i}
                        <tr>
                            <td>
                                <label class="checkbox">
                                    <input class="Checkbox" type="checkbox" id = '{$k}' value = {$myKey_unconfirmedSign[$k]} > 
                                    {if isset($myPhotos[$k])}
                                        <img src="{$myPhotos[$k]}" style="width:35px; height:35px"/>
                                    {else}
                                        <img src="{$host}/photos/default_student.png" style="width:35px; height:35px"/>
                                    {/if}
                                    {$i}
                                </label>
                            </td>
                            <td><label>{$assignSignID_unconfirmedSign[$k]}</label></td>
                            <td>
                                <a style="cursor:pointer;" onclick="window.location.href = 'unconfirmed_signatory.php?action=confirmedAccount&key={$myKey_unconfirmedSign[$k]}'">
                                    <i class="icon-ok"></i> Confirm
                                </a>
                            </td>
                        </tr>
                    {/foreach}
                </table>

                <!-- Delete Control-->
                <a style="cursor:pointer;" onclick="findCheck('{$rowCount_unconfirmedSign}', 'unconfirmed signatory')">
                    <i class="icon-remove"></i> Delete Selected
                </a>

                <!-- Pagination-->
                <div class="pull-right">
                    Jump to: <select id="jump" class="input-mini" onchange="jumpToPage()">
                        <option>--</option>
                        {for $start = 1 to $unconfirmedSign_length}
                            <option>{$start}</option>
                        {/for}
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>