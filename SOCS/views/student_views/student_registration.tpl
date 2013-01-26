
{if !isset($years)}
    {assign var=years value=[2009, 2010, 2011, 2012, 2013]}
{/if}

<form method='post' class="form-horizontal">

    <legend>Login Information: </legend>

    <div class="control-group">
        <label class="control-label">Student ID: </label>
        <div class="controls">
            <select class="input-small" required>
                <option></option>
                {foreach from=$years item=year}
                    <option>{$year}</option>
                {/foreach}
            </select> - 
            {literal}
                <input class="input-small" type ='text' name='surname' value="" maxlength="5" pattern="[0-9]{5}" required title="Letters and spaces only">
            {/literal}
            <span class="help-block">ID number that has been given by the University after admission.</span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Password: </label>
        <div class="controls">
            {literal}
                <input id="password_entered" type='password' name='newpass' pattern="^.{7,50}$" title="Password minimum of 7 characters" required>
            {/literal}
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Re-type Password: </label>
        <div class="controls">
            <input id="retyped_password_entered" type='password' name='confirmpass' onblur="checkPasswordEquality()" required>
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

    <div class="control-group">
        <label class="control-label">Gender: </label>
        <div class="controls">
            <select>
                <option></option>
                <option>Male</option>
                <option>Female</option>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Year Level: </label>
        <div class="controls">
            <select>
                <option></option>
                <option>First Year</option>
                <option>Second Year</option>
                <option>Third Year</option>
                <option>Fourth Year</option>
                <option>Fifth Year</option>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Program: </label>
        <div class="controls">
            <select>
                <option></option>
                <option>Day</option>
                <option>Evening</option>
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
            <input class="btn btn-primary" type='Submit' value='Save'>
            <a href='/SOCS/index.php'>Cancel</a>
        </div>
    </div>
</form>