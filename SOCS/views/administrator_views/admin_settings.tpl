<form action='settings.php?action=verify' method='post' class="form-horizontal">
    
    <legend>Edit Account: </legend>
    
    <div class="control-group">
        <label class="control-label">Surname: </label>
        <div class="controls">
            <input type ='text' name='surname' value="{$surname}">
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label">First Name: </label>
        <div class="controls">
            <input type='text' name='firstname' value="{$firstname}">
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label">Middle Name: </label>
        <div class="controls">
            <input type='text'name='middleName' value="{$middlename}">
        </div>
    </div>
    
    <legend>Change password: </legend>
    
    <div class="control-group">
        <label class="control-label">Old password: </label>
        <div class="controls">
            <input type='password' name='oldpass'>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label">New password: </label>
        <div class="controls">
            <input type='password' name='newpass'>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label">Confirm new password: </label>
        <div class="controls">
            <input type='password' name='confirmpass'>
        </div>
    </div>
    
    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit' value='Save'> &nbsp; <a href='/SOCS/'>Cancel</a>
        </div>
    </div>
</form>
