<div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Signatories</h4>

        <!-- Signatories Navigations-->
        {call name=nav_signatories index=1}
        
    </div>
    <div class="span9">

        <div class="row">
            <div class="span9">

                <!-- Header-->
                <h4 class="well center-text well-small">List of Signatories</h4>

                {*
                <!-- Add Signatory Button-->
                <input class="btn" type="button" value="Add Signatory" {if $index_tabs == 0} onclick="window.location.href='signatory_list_manager.php?action=addSignatory'" {/if} {if $index_tabs == 1} onclick="window.location.href='grad_signatory_list_manager.php?action=addSignatory'" {/if}>
                *}

                <!-- Search Bar-->
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
                            <input type="checkbox" onclick="isCheck({$rowCount_sign});" id="check"> Signatories
                        </th>
                        <th>Description</th>
                        <th>Controls</th>
                    </tr>
                    {foreach from = $myName_sign key = k item = i}
                        <tr>
                            <td>
                                <label class="checkbox">
                                    <input class="Checkbox" type="checkbox" id = '{$k}' value = {$myKey_sign[$k]} > {$i}
                                </label>
                            </td>
                            <td><label>{$desc_sign[$k]}</label></td>
                            <td>
                                <a style="cursor:pointer;" {if $index_tabs == 0} onclick="window.location.href = 'signatory_list_manager.php?action=editSignatory&seleted={$myKey_sign[$k]}';" {/if} {if $index_tabs == 1} onclick="window.location.href = 'grad_signatory_list_manager.php?action=editSignatory&seleted={$myKey_sign[$k]}';" {/if}><i class="icon-pencil"></i> Edit</a>
                            </td>
                        </tr>
                    {/foreach}
                </table>

                <!-- Delete Control-->
                <a style="cursor:pointer;" onclick="findCheck('{$rowCount_sign}', 'signatory');">
                    <i class="icon-remove"></i> Delete Selected
                </a>

                <!-- Pagination-->
                <div class="pull-right">
                    Jump to: <select id="jump" class="input-mini" onchange="jumpToPage();">
                        <option>--</option>
                        {for $start = 1 to $sign_length}
                            <option>{$start}</option>
                        {/for}
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>