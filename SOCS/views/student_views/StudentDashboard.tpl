{assign var=num_cleared value=0}

{foreach from = $myListOfSign_underDeptName key = k item = i}

    {if $myStudent_ClearanceStatus[$k] == 'Cleared' || $myStudent_ClearanceStatus[$k] == 'No Requirements'}
        {assign var=num_cleared value=$num_cleared+1}
    {/if}

{/foreach}

<!-- Header-->
<h4 class="well well-small center-text">Student's Clearance</h4>

<!-- Archive Search Box-->
<div class="navbar">
    <div class="navbar-inner">

        <form class="navbar-form pull-right" method="post">

            {call name=schoolyear_sem_inputs}

            <button class="btn btn-success" type="submit" name="GO">
                <i class="icon-search"></i>
            </button>

        </form>

        <ul class="nav">

            <li class="divider-vertical"></li>
            <li>
                {if $num_cleared == ($myListOfSign_underDeptName|@count)}
                    <a class="tips" title="Export the clearance file" href="export1.php?sy_sem_id={$sy_sem_id}&status={$status}" target="_blank"> 
                        <i class="icon-socs-export"></i>
                    </a>
                {else}
                    <a class="tips" title="Export the clearance file" href="#" onclick="bootbox.alert('<div class=\'alert alert-info alert-block\'><i class=\'icon-info-sign\'></i> <strong>Oops!</strong> Must clear all signatories before can download the clearance form.</div>');"> 
                        <i class="icon-socs-export"></i>
                    </a>
                {/if}
            </li>
            <li class="divider-vertical"></li>
        </ul>

    </div>
</div>

{*
<!-- Export Link-->
<div class="row">
<div class="span12">
{if $num_cleared == ($myListOfSign_underDeptName|@count)}
<a class="pull-right" href="export1.php?sy_sem_id={$sy_sem_id}&status={$status}"> 
<i class="icon-socs-export icon-large"></i> Export to PDF
</a>
{else}
<a class="pull-right" href="#" onclick="bootbox.alert('<div class=\'alert alert-info alert-block\'><i class=\'icon-info-sign\'></i> <strong>Oops!</strong> Must clear all signatories before can download the clearance form.</div>');"> 
<i class="icon-socs-export icon-large"></i> Export to PDF
</a>
{/if}
</div>
</div>
*}

<p>Clearance Overall Status: </p>
<div class="progress">
    <div id="clearance_status" class="bar" data-percentage="{math equation="(c / i) * 100" i=($myListOfSign_underDeptName|@count) c=$num_cleared format="%d"}"></div>
</div>

<!-- Clearance-->
<div class="row">

    {foreach from = $myListOfSign_underDeptName key = k item = i}

        <div class="span3">

            <table class="table table-bordered">
                <tr class="info">
                    <td colspan="2">
                        <div id="hover_link" onclick='window.location.href = "index.php?action=viewRequirements&Tsign_ID={$myKey_signID[$k]}&page=1";'>{$i} </div>
                    </td>
                </tr>
                <tr>
                    <td>Status: </td>
                    <td>
                        {if $myStudent_ClearanceStatus[$k] eq 'Cleared' or $myStudent_ClearanceStatus[$k] eq 'No Requirements'}
                            <span class="label label-success hidden-tablet">{$myStudent_ClearanceStatus[$k]}</span>
                            <span class="badge badge-success visible-tablet"><i class="icon-check"></i></span>
                            {else}
                            <span class="label label-important hidden-tablet">{$myStudent_ClearanceStatus[$k]}</span>
                            <span class="badge badge-important visible-tablet"><i class="icon-remove"></i></span>
                            {/if}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div id="hover_link" onclick="window.location.href = 'index.php?action=viewRequirements&Tsign_ID={$myKey_signID[$k]}&page=1';">
                            <i class="icon-list-alt"></i> Requirements
                        </div>

                        <div id="hover_link" onclick="window.location.href = 'index.php?action=viewMessages&Tsign_ID={$myKey_signID[$k]}&page=1';">
                            <i class="icon-bullhorn"></i> Announcements
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    {/foreach}
</div>