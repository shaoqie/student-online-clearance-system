
<form method='post' class="form-horizontal" action="{$host}/signatory_registration.php?action=register">

    <legend>Login Information: </legend>

    <div class="control-group">
        <label class="control-label">Username: </label>
        <div class="controls">
            {literal}
                <input type ='text' name='uname' maxlength="15" title="Letters and spaces only">
            {/literal}
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Password: </label>
        <div class="controls">
            {literal}
                <input id="password_entered" type='password' name='newpass' title="Password minimum of 7 characters">
            {/literal}
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Re-type Password: </label>
        <div class="controls">
            {literal}
                <input id="retyped_password_entered" type='password' name='confirmpass' onblur="checkPasswordEquality()">
            {/literal}
        </div>
    </div>

    <legend>Personal Information: </legend>

    <div class="control-group">
        <label class="control-label">Surname: </label>
        <div class="controls">
            <input type ='text' name='surname' title="Letters and spaces only">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">First Name: </label>
        <div class="controls">
            <input type='text' name='firstname' value="" title="Letters and spaces only">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Middle Name: </label>
        <div class="controls">
            <input type='text'name='middleName' value="" title="Letters and spaces only">
        </div>
    </div>

    <legend>Signatory Designation: </legend>

    <div class="control-group">
        <label class="control-label">Signatory: </label>
        <div class="controls">

            {if !isset($signatories)}
                {assign var=signatories value=["OCSC", "OSS", "CTLC", "ICLC"]}
            {/if}

            <select name="sign_name" required>
                <option></option>
                {foreach from=$signatories item=signatory}
                    <option>{$signatory}</option>
                {/foreach}
            </select>
        </div>
    </div>

    <legend>Personal Identification: </legend>

    <div class="control-group">
        <label class="control-label">Upload Picture: </label>
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

<!--
<form method='post' class="form-horizontal" action="{$host}/signatory_registration.php?action=register">

    <legend>Login Information: </legend>

    <div class="control-group">
        <label class="control-label">Username: </label>
        <div class="controls">
            {literal}
                <input type ='text' name='uname' value="" maxlength="15" pattern="[0-9a-zA-Z]+" required title="Letters and spaces only">
            {/literal}
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Password: </label>
        <div class="controls">
            {literal}
                <input id="password_entered" type='password' name='newpass' pattern="[0-9a-zA-Z]{7,50}" title="Password minimum of 7 characters" required>
            {/literal}
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Re-type Password: </label>
        <div class="controls">
            {literal}
                <input id="retyped_password_entered" type='password' name='confirmpass' pattern="[0-9a-zA-Z]{7,50}" onblur="checkPasswordEquality()" required>
            {/literal}
        </div>
    </div>

    <legend>Personal Information: </legend>

    <div class="control-group">
        <label class="control-label">Surname: </label>
        <div class="controls">
            <input type ='text' name='surname' value="" pattern="[A-Za-z\s]+" required title="Letters and spaces only">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">First Name: </label>
        <div class="controls">
            <input type='text' name='firstname' value="" pattern="[A-Za-z\s]+" required title="Letters and spaces only">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Middle Name: </label>
        <div class="controls">
            <input type='text'name='middleName' value="" pattern="[A-Za-z\s]+" required title="Letters and spaces only">
        </div>
    </div>

    <legend>Signatory Designation: </legend>

    <div class="control-group">
        <label class="control-label">Signatory: </label>
        <div class="controls">

            {if !isset($signatories)}
                {assign var=signatories value=["OCSC", "OSS", "CTLC", "ICLC"]}
            {/if}

            <select name="sign_name" required>
                <option></option>
                {foreach from=$signatories item=signatory}
                    <option>{$signatory}</option>
                {/foreach}
            </select>
        </div>
    </div>

    <legend>Personal Identification: </legend>

    <div class="control-group">
        <label class="control-label">Upload Picture: </label>
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
</form>-->