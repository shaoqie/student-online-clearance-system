{literal}
    <script type="text/javascript">      
        function changeCourses(){
            var department = document.getElementById("dept");
            department.innerHTML = "";
            if(document.getElementById("stud_status1").checked == true){ var stud_status = "Under Graduate"; 
                document.getElementById("prog_evening").disabled = false;
                                      
                {/literal}
                {foreach from=$depts key=k item=dept}
                    department.options[department.options.length] = new Option("{$dept}", "{$dept_ID[$k]}");
                {/foreach}
                {literal}
            }else{ var stud_status = "Graduate";    document.getElementById("prog_evening").disabled = true;    
                {/literal}
                {foreach from=$depts key=k item=dept}
                    {if $dept != "University Evening Program"}
                        department.options[department.options.length] = new Option("{$dept}", "{$dept_ID[$k]}");
                    {/if}
                {/foreach}
                {literal}
            }
            
            document.getElementById("prog_evening").checked = false; 
            document.getElementById("prog_day").checked = true;
                
            changeOptions();   
        }    
        
        function changeOptions(){
            if(document.getElementById("stud_status1").checked == true){ var stud_status = "Under Graduate";
            }else{ var stud_status = "Graduate";}
            
            var department = document.getElementById("dept");
            document.getElementById("course").innerHTML = "";
            var select = document.getElementById("course");
            var dept_id = department.options[department.selectedIndex].value;
                
            {/literal}      
            {foreach from=$dept_id_inCourses key=k_course item=item}       
                if(dept_id == {$dept_id_inCourses[$k_course][0]} && stud_status == "{$dept_id_inCourses[$k_course][2]}"){
                select.options[select.options.length] = new Option("{$dept_id_inCourses[$k_course][1]}", "{$dept_id_inCourses[$k_course][1]}");
            }               
            {/foreach}                          
            {literal}    
        }
    </script>
{/literal}
{*<pre>{$dept_id_inCourses|@print_r}</pre> *}

<div class="alert alert-block alert-info">
    Assign as a signatory? <a href="signatory_registration.php">Click Here</a>
</div>

<form method='post' class="form-horizontal" action="/SOCS/index.php?action=student_register">

    <legend>Login Information: </legend>

    <div class="control-group">
        <label class="control-label"><b>Student ID: </b></label>
        <div class="controls">

            {*<select class="input-small" name="stud_id" required>
            <option></option>
            {foreach from=$years key=k item=year}
            <option>{$year}</option>
            {/foreach}
            </select> 
            *}
             
            {literal}
            <input type="text" maxlength="4" pattern="[0-9]{4}" name="stud_id" autocomplete="off" class="input-small" data-provide="typeahead" data-source='[
            {/literal}
                   {foreach from=$years key=k item=year}
                       {if $years|@count - 1 eq $k}
                           "{$year}"
                       {else}
                           "{$year}",
                       {/if}
                   {/foreach}

                   {*
                   "Ahmedabad","Akola","Asansol","Aurangabad","Bangaluru","Baroda","Belgaon","Berhumpur","Calicut","Chennai","Chapra","Cherapunji"
                   *}
                   ]'>
            
            -
            {literal}
                <input class="input-small" type ='text' name='number' value="" maxlength="5" pattern="[0-9]{5}" required title="Numbers Only">
            {/literal}
            <span class="help-block">ID number that has been given by the University after admission. Must be a bonafied student of the University of Southeastern Philippines.</span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label"><b>Password: </b></label>
        <div class="controls">
            {literal}
                <input id="password_entered" type='password' name='password' pattern="^.{7,50}$" title="Password minimum of 7 characters" required>
            {/literal}
        </div>
    </div>

    <div class="control-group">
        <label class="control-label"><b>Re-type Password: </b></label>
        <div class="controls">
            <input id="retyped_password_entered" type='password' name='confirmpass' onblur="checkPasswordEquality()" required>
        </div>
    </div>

    <legend>Personal Information: </legend>

    <div class="control-group">
        <label class="control-label"><b>Surname: </b></label>
        <div class="controls">
            <input type ='text' name='surname' {if isset($s_name)}value="{$s_name}"{/if} pattern="[A-Za-z\s]+" required title="Letters and spaces only">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label"><b>First Name: </b></label>
        <div class="controls">
            <input type='text' name='firstname' {if isset($f_name)}value="{$f_name}"{/if} pattern="[A-Za-z\s]+" required title="Letters and spaces only">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label"><b>Middle Name: </b></label>
        <div class="controls">
            <input type='text'name='middleName' {if isset($m_name)}value="{$m_name}"{/if} pattern="[A-Za-z\s]+" required title="Letters and spaces only">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label"><b>Email Address: </b></label>
        <div class="controls">
            <input type='text'name='emailAdd' {if isset($e_add)}value="{$e_add}"{/if} required>
        </div>
    </div>
    
    <legend>Advance Information: </legend>
    
    <div class="control-group">
        <label class="control-label"><b>Year Level: </b></label>
        <div class="controls">
            <select id="year_level" name="year_level" required onchange="changeCourses()">
                <option></option>
                <option value="1">First Year</option>
                <option value="2">Second Year</option>
                <option value="3">Third Year</option>
                <option value="4">Fourth Year</option>
                <option value="5">Fifth Year</option>
            </select>
        </div>
    </div>
    
    <div class="control-group form-inline">
        <div class="controls form-inline">
            <input type="radio" checked name="gender" value="Male"> <label><b>Male</b></label> &nbsp; &nbsp;
            <input type="radio" name="gender" value="Female"> <label><b>Female </b></label>
        </div>
    </div> 
    
    <div class="control-group form-inline">
        <div class="controls form-inline">
            <input type="radio" id="prog_day" checked name="program" value="Day"> <label><b>Day</b></label> &nbsp; &nbsp; &nbsp;
            <input type="radio" id="prog_evening" name="program" value="Evening"> <label><b>Evening </b></label>
        </div>
    </div>
    
    <div class="control-group form-inline">
        <div class="controls form-inline">
            <input type="radio" checked name="Status" id="stud_status1" onclick="changeCourses()" value="Under Graduate"> <label><b>Under Graduate</b></label> &nbsp; &nbsp; &nbsp;
            <input type="radio" name="Status" id="stud_status2" onclick="changeCourses()" value="Graduate"> <label><b>Graduate </b></label>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label"><b>Department: </b></label>
        <div class="controls">
            <select id="dept" name="dept" onchange="changeOptions()" required>

                <option></option>

                {if !isset($depts)}
                    {assign var=depts value=["CT - College of Technology", "CAS - College of Arts and Sciences", "IC - Institute of Computing", "CE - College of Engineering"]}
                {/if}

                {foreach from=$depts key=k item=dept}
                    <option value="{$dept_ID[$k]}">{$dept}</option>
                {/foreach}

            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label"><b>Course: </b></label>
        <div class="controls">
            <select id="course" name="course" required>
                <option></option>
            </select>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label"><b>Section: </b></label>
        <div class="controls">
            <input id="section" type='text'name='section' value="" pattern="[0-9A-Za-z\s\-\_\(\)]+" required title="Letters and spaces only">
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
            <input class="btn btn-primary" type='Submit' value='Save' name='Save'>
            <a href='/SOCS/index.php'>Cancel</a>
        </div>
    </div>
</form>