<button class="pull-right btn" onclick="window.location.href='index.php'">Back</button>
<form action='settings.php?action=verify' method='post' class="form-horizontal">

    <legend>Edit Account: </legend>

    <div class="control-group">
        <label class="control-label">Surname: </label>
        <div class="controls">
            <input type ='text' name='surname' value="{$surname}" pattern="[A-Za-z\s]+" required title="Letters and spaces only">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">First Name: </label>
        <div class="controls">
            <input type='text' name='firstname' value="{$firstname}" pattern="[A-Za-z\s]+" required title="Letters and spaces only">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Middle Name: </label>
        <div class="controls">
            <input type='text'name='middleName' value="{$middlename}" pattern="[A-Za-z\s]+" required title="Letters and spaces only">
        </div>
    </div>

    <legend>Change password: </legend>

    <div class="control-group">
        <label class="control-label">New password: </label>
        <div class="controls">
            {literal}
                <input type='password' name='newpass' pattern="^.{7,50}$" title="Password minimum of 7 characters">
            {/literal}
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Confirm new password: </label>
        <div class="controls">
            <input type='password' name='confirmpass'>
        </div>
    </div>

    <legend>Upload Picture</legend>

    <div class="control-group">
        <label class="control-label">Upload Picture: </label>
        <div class="controls">
            <input type="file" name="photo">
        </div>
    </div>

    <legend>Authentication: </legend>

    <div class="control-group">
        <label class="control-label">Old password: </label>
        <div class="controls">
            <input type='password' name='oldpass' required>
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit' value='Save'> &nbsp;
            <a href='/SOCS/'>Cancel</a>
        </div>
    </div>
</form>
