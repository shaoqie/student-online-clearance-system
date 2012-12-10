<div style="float:right;">
    <a href='../settings.php'>My Account</a>&nbsp;&nbsp;<a href='../index.php?action=logout'>Logout</a></div>

<center><div style="width:100px;height:100px;border:1px solid gray;"><img></img></div></center>

<center><div style="width:550px;"><Strong><h3>{$user_info}</h3></Strong><br>
        <Strong>Students Online  Clearance System</Strong><br><hr></div></center>


<center><div style="width:550px;">
        <a href='#'>User Accounts</a>&nbsp;&nbsp;<a href='#'>Signatories</a>
        &nbsp;&nbsp;<a href='#'>Departments</a></div></center>           
<br> 


<form action="index.php?action=add_user" method='post'>
    <legend>Add Account:</legend>
    <div class="control-group">
        <label class="control-label">Username: </label>
        <div class="controls">
            <input type ='text' name='username'>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Surname: </label>
        <div class="controls">
            <input type ='text' name='surname'>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">First Name: </label>
        <div class="controls">
            <input type='text' name='firstname'>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Middle Name: </label>
        <div class="controls">
            <input type='text'name='middleName'>
        </div>
    </div>

    <legend>Account password: </legend>
    <div class="control-group">
        <label class="control-label">Password: </label>
        <div class="controls">
            <input type='password' name='password'>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Confirm password: </label>
        <div class="controls">
            <input type='password' name='confirmpass'>
        </div>
    </div>

    <legend>Account type: </legend>
    <div class="control-group">
        <div class="controls">
            <input type="radio" name="account_type" value="Signatory" checked> Signatory in-charge
        </div>
        <div class="controls">
            <label class="control-label"> Assigned signatory: </label>
            <select>
                <option>OSS</option>
                <option>OCSC</option>
                <option>Evening College</option>
                <option>Library</option>
            </select>
        </div>
        <div class="controls">
            <input type="radio" name="account_type" value="Admin">System Administrator
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit' value='Add Account'>
        </div>
    </div>
</form>