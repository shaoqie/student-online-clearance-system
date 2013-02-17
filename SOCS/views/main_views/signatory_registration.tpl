<form method='post' class="form-horizontal" action="{$host}/signatory_registration.php?action=register" enctype="multipart/form-data">
    {literal}
        <legend>Login Information: </legend>

        <div class="control-group">
            <label class="control-label"><b>Username: </b></label>
            <div class="controls">
                <input type ='text' name='uname' value="" maxlength="15" pattern="[0-9a-zA-Z]{7,32}" required title="Letters and numbers only">

            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><b>Password: </b></label>
            <div class="controls">

                <input id="password_entered" type='password' name='newpass' pattern="[0-9a-zA-Z]{7,32}" title="Password minimum of 7 characters" required>

            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><b>Re-type Password: </b></label>
            <div class="controls">
                <input id="retyped_password_entered" type='password' name='confirmpass' pattern="[0-9a-zA-Z]{7,50}" onblur="checkPasswordEquality()" required>
            </div>
        </div>

        <legend>Personal Information: </legend>

        <div class="control-group">
            <label class="control-label"><b>Surname: </b></label>
            <div class="controls">
                <input type ='text' name='surname' value="" pattern="[A-Za-z\s]{2,15}" required title="Letters and spaces only">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><b>First Name: </b></label>
            <div class="controls">
                <input type='text' name='firstname' value="" pattern="[A-Za-z\s]{2,15}" required title="Letters and spaces only">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><b>Middle Name: </b></label>
            <div class="controls">
                <input type='text'name='middleName' value="" pattern="[A-Za-z\s]{1,15}" required title="Letters and spaces only">
            </div>
        </div>
    {/literal}
    <div class="control-group">
        <label class="control-label"><b>Email Address: </b></label>
        <div class="controls">
            <input type='text'name='emailAdd' value="" {literal}pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)"{/literal} required>
        </div>
    </div>

    <legend>Signatory Designation: </legend>

    <div class="control-group">
        <label class="control-label"><b>Signatory: </b></label>
        <div class="controls">
            {*
            {if !isset($signatories)}
                {assign var=signatories value=["OCSC", "OSS", "CTLC", "ICLC"]}
            {/if}

            <select name="sign_name" required>
                <option></option>
                {foreach from=$signatories item=signatory key=pk}
                    <option value="{$signatory_keys[$pk]}">{$signatory}</option>
                {/foreach}
            </select>
            *}
            
            <input type="text" required name="sign_name" autocomplete="off" class="input-large" data-provide="typeahead" data-source='[
                   {foreach from=$signatories key=k item=signatory}
                       {if $signatories|@count - 1 eq $k}
                           "{$signatory}"
                       {else}
                           "{$signatory}",
                       {/if}
                   {/foreach}
                   ]'>
        </div>
    </div>

    <legend>Personal Identification: </legend>

    <div class="control-group">
        <label class="control-label"><b>Upload Picture: </b></label>
        <div class="controls">
            <input type="file" name="photo">
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit' value='Register' name='Register'>
            <a href='/SOCS/index.php'> Cancel</a>
        </div>
    </div>
</form>