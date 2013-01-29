<!-- Back Button-->
<input class="btn pull-right" type="button" value="Back" onclick="window.location.href='index.php'"> 

<!-- Archive Search Box-->
{call name=archiveSearch}

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

