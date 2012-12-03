<form action='settings.php?action=verify' method='post' class="form-horizontal">
    
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
            <input class="btn btn-primary" type='Submit'> &nbsp; <a href='/SOCS/'>Cancel</a>
        </div>
    </div>
</form>
