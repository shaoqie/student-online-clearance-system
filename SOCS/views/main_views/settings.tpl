{if $account_type != "System Administrator" || $account_type != "Signatory in Charge"}
    {call name=settings}
{else}
    
    {call name=breadcrumb lvl2=8 activelvl=2}
    
    <div class="row">
        <div class="span3">
            {if $account_type == "System Administrator"}
                <h4 class="well center-text well-small">Settings</h4>
                {call name=nav_admin}
            {elseif $account_type == "Signatory in Charge"}
                <h4 class="well center-text well-small">Settings</h4>s
                {call name=nav_signatory index=5}
            {/if}

        </div>
        <div class="span9">
            {call name=settings}
        </div>
    </div>
{/if}