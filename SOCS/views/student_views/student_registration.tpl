<form method='post' class="form-horizontal">

    <legend>Login Information: </legend>

    <div class="control-group">
        <label class="control-label">Student ID: </label>
        <div class="controls">
            <select class="input-small" name="stud_id" required>
                <option></option>

                {if !isset($years)}
                    {assign var=years value=[2009, 2010, 2011, 2012, 2013]}
                {/if}

                {foreach from=$years item=year}
                    <option>{$year}</option>
                {/foreach}
            </select> - 
            {literal}
                <input class="input-small" type ='text' name='surname' value="" maxlength="5" pattern="[0-9]{5}" required title="Numbers Only">
            {/literal}
            <span class="help-block">ID number that has been given by the University after admission.</span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Password: </label>
        <div class="controls">
            {literal}
                <input id="password_entered" type='password' name='password' pattern="^.{7,50}$" title="Password minimum of 7 characters" required>
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
        <label class="control-label">Section: </label>
        <div class="controls">
            <input type='text'name='section' value="" pattern="[A-Za-z\s]+" required title="Letters and spaces only">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Gender: </label>
        <div class="controls">
            <select name="gender" required>
                <option></option>
                <option>Male</option>
                <option>Female</option>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Year Level: </label>
        <div class="controls">
            <select name="year" required>
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
            <select name="program" required>
                <option></option>
                <option>Day</option>
                <option>Evening</option>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Department: </label>
        <div class="controls">
            <select name="dept" required>
                <option></option>

                {if !isset($depts)}
                    {assign var=depts value=["CT - College of Technology", "CAS - College of Arts and Sciences", "IC - Institute of Computing", "CE - College of Engineering"]}
                {/if}

                {foreach from=$depts item=dept}
                    <option>{$dept}</option>
                {/foreach}

            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Course: </label>
        <div class="controls">
            <select name="course" required>
                <option></option>

                {if !isset($courses)}
                    {assign var=courses value=["BSIT", "BSCS", "BCT", "DT", "BIT", "BTTE"]}
                {/if}

                {foreach from=$courses item=course}
                    <option>{$course}</option>
                {/foreach}

            </select>
        </div>
    </div>

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