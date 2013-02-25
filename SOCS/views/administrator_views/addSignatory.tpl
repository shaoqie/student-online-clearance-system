<div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Signatories</h4>

        <!-- Navigations-->
        <div class="row">
            <div class="span3">
                {call name=nav_admin index=0}
            </div>
        </div>

        <!-- Controls-->
        <ul class="nav nav-tabs nav-stacked">
            <li class="active">
                <a href="{$host}/administrator/signatory_list_manager.php?action=addSignatory">
                    <i class="icon-group"></i> Add Signatory
                </a>
            </li>
        </ul>

    </div>
    <div class="span9">

        <!-- Adding Form-->
        <form {if $index_tabs == 0} action="signatory_list_manager.php?action=add_signatory" {/if} {if $index_tabs == 1} action="grad_signatory_list_manager.php?action=add_signatory" {/if} method='post' class="form-horizontal">
            <legend>Signatory Information: </legend>
            <div class="control-group">
                <label class="control-label"><b>Signatory Name: </b></label>
                <div class="controls">
                    <input class="span5" type ='text' name='sign_name'>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><b>Description: </b></label>
                <div class="controls">
                    <textarea class="span5" name='sign_description' rows="5"></textarea>
                </div>
            </div>
            <div class="form-actions control-group">
                <div class="pull-right">
                    <input class="btn btn-primary" type='Submit' value='Save' />
                    <button class="btn" type="button" onclick="window.history.back();">Back</button>
                </div>
            </div>
        </form>
    </div>
</div>