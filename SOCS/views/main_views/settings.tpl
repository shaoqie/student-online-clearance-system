{*
{if $account_type eq "Student"}
<div class="alert alert-block alert-info">
Choose to advance settings? <a href="student/index.php?action=advance_settings">Click Here</a>
</div>  
{/if}
*}

{call name=breadcrumb lvl2=8 activelvl=2}

<div class="row">
    <div class="span3">

        {if $account_type == "System Administrator"}
            <h4 class="well center-text well-small">Settings</h4>
            {call name=nav_admin}
        {elseif $account_type == "Signatory in Charge"}
            <h4 class="well center-text well-small">Settings</h4>
            {call name=nav_signatory index=5}
        {elseif $account_type == "Student"}
            
        {/if}

    </div>
    <div class="span9">

        <h4 class="well center-text well-small">Settings</h4>

        <form action='settings.php?action=verify' method='post' class="form-horizontal" enctype="multipart/form-data">

            <legend>Account Details: </legend>

            {if $account_type eq "Student"}
                <input type="hidden" name="surname" value="{$surname}" />
                <input type="hidden" name="firstname" value="{$firstname}" />
                <input type="hidden" name="middleName" value="{$middlename}" />

            {else}
                <div class="control-group">
                    <label class="control-label"><b>Surname: </b></label>
                    <div class="controls">
                        <input type ='text' name='surname' value="{$surname}" pattern="[A-Za-z\s]+" required title="Letters and spaces only">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label"><b>First Name: </b></label>
                    <div class="controls">
                        <input type='text' name='firstname' value="{$firstname}" pattern="[A-Za-z\s\.]+" required title="Letters and spaces only">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label"><b>Middle Name: </b></label>
                    <div class="controls">
                        <input type='text'name='middleName' value="{$middlename}" pattern="[A-Za-z\s]+" required title="Letters and spaces only">
                    </div>
                </div>
            {/if}

            <div class="control-group">
                <label class="control-label"><b>Email Address: </b></label>
                <div class="controls">
                    <input type='text'name='emailAdd' value="{$email_add}" {literal}pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)"{/literal} required>
                </div>
            </div>

            <legend>Change Password: </legend>

            <div class="control-group">
                <label class="control-label"><b>New password: </b></label>
                <div class="controls">
                    {literal}
                        <input type='password' name='newpass' pattern="^.{7,50}$" title="Password minimum of 7 characters">
                    {/literal}
                </div>
            </div>

            <div class="control-group">
                <label class="control-label"><b>Confirm new password: </b></label>
                <div class="controls">
                    <input type='password' name='confirmpass'>
                </div>
            </div>

            {if $user_type eq "Signatory"}
                <legend>Signatory Designation: </legend>

                <div class="control-group">
                    <label class="control-label"><b>Signatory: </b></label>
                    <div class="controls">
                        <select id="sign_name" name="sign_name" class="select2 input-large"  required>
                            {foreach from=$ug_signatories item=signatory key=pk}
                                <option {if $signatory eq  $current_assignSign}selected{/if}>{$signatory}</option>
                            {/foreach}
                        </select>

                        {*
                        <input type="text" required name="sign_name" autocomplete="off" class="input-large" data-provide="typeahead" data-source='[
                        {foreach from=$signatories key=k item=signatory}
                        {if $signatories|@count - 1 eq $k}
                        "{$signatory}"
                        {else}
                        "{$signatory}",
                        {/if}
                        {/foreach}
                        ]'>
                        
                        *}
                    </div>
                </div>
            {/if}

            <legend>Upload Picture</legend>

            <div class="control-group">
                <label class="control-label"><b>Upload Picture: </b></label>
                <div class="controls">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail" style="width: 256px; height: 256px;"></div><br>
                        <span class="btn btn-file">
                            Browse<input type="file" name="photo">
                        </span>
                        <input type="button" class="btn fileupload-exists" value="Cancel" data-dismiss="fileupload" />
                    </div>
                    <span class="help-block">
                        <p class="text-info">Image file shall not exceed to 1MB. Recommended size is 256 x 256</p>
                    </span>
                </div>
            </div>

            {*
            <div class="control-group">
            <label class="control-label"><b>Upload Picture: </b></label>
            <div class="controls">
            <input type="file" name="photo">
            <span class="help-block">Image file shall not exceed to 1MB</span>
            </div>
            </div>
            *}

            <legend>Authentication: </legend>

            <div class="control-group">
                <label class="control-label"><b>Old password: </b></label>
                <div class="controls">
                    <input type='password' name='oldpass' required>
                </div>
            </div>

            <div class="control-group form-actions">
                <div class="controls pull-right">
                    <input class="btn btn-primary" type='submit' value='Save'>
                    <input class="btn" type='button' value='Cancel' onclick="window.history.back();">
                </div>
            </div>
        </form>
    </div>
</div>