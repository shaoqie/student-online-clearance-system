{literal}
    <script type="text/javascript">      
         function changeCourses(){
            var department = document.getElementById("dept"); //alert(document.getElementById("stud_status1").checked);
            department.innerHTML = "";
            if(document.getElementById("stud_status1").checked == true){ var stud_status = "Under Graduate"; 
                document.getElementById("prog_evening").disabled = false;
                                      
                {/literal}
                {foreach from=$depts key=k item=dept}
                    if(document.getElementById("prog_evening").checked){
                        {if $dept eq "University Evening Program"}
                            department.options[department.options.length] = new Option("{$dept}", "{$dept_ID[$k]}");
                        {/if}
                    }else{
                        {if $dept != "University Evening Program"}
                            department.options[department.options.length] = new Option("{$dept}", "{$dept_ID[$k]}");
                        {/if}
                    }
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
                    document.getElementById("prog_evening").checked = false; 
                    document.getElementById("prog_day").checked = true;
            }
            
            //document.getElementById("prog_evening").checked = false; 
            //document.getElementById("prog_day").checked = true;
                
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
<form action='' method='post' class="form-horizontal">  
    <legend>Advance Settings: </legend>

    <div class="control-group">
        <label class="control-label"><b>Year Level: </b></label>
        <div class="controls">
            <select name="year_level" required>
                <option {if $year_level eq "First Year"} selected {/if}>First Year</option>
                <option {if $year_level eq "Second Year"} selected {/if}>Second Year</option>
                <option {if $year_level eq "Third Year"} selected {/if}>Third Year</option>
                <option {if $year_level eq "Fourth Year"} selected {/if}>Fourth Year</option>
                <option {if $year_level eq "Fifth Year"} selected {/if}>Fifth Year</option>
            </select>
        </div>
    </div>

    <div class="control-group form-inline">
        <div class="controls form-inline">
            <input type="radio" {if $gender eq "Male"} checked {/if} name="gender" value="Male"> <label><b>Male</b></label> &nbsp; &nbsp;
            <input type="radio" {if $gender eq "Female"} checked {/if} name="gender" value="Female"> <label><b>Female </b></label>
        </div>
    </div>    

    <div class="control-group form-inline">
        <div class="controls form-inline">
            <input type="radio" onclick="changeCourses()"  id="prog_day" {if $program eq "Day"} checked {/if} name="program" value="Day"> <label><b>Day</b></label> &nbsp; &nbsp; &nbsp;
            <input type="radio" onclick="changeCourses()" id="prog_evening" {if $program eq "Evening"} checked {/if} name="program" value="Evening"> <label><b>Evening </b></label>
        </div>
    </div>  
    
    <div class="control-group form-inline">
        <div class="controls form-inline">
            <input type="radio" onclick="changeCourses()" id="stud_status1" {if $status eq "Under Graduate"} checked {/if} name="Status" value="Under Graduate"> <label><b>Under Graduate</b></label> &nbsp; &nbsp; &nbsp;
            <input type="radio" onclick="changeCourses()" id="stud_status2" {if $status eq "Graduate"} checked {/if} name="Status" value="Graduate"> <label><b>Graduate </b></label>
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
                    <option {if $stud_dept eq  $dept} selected {/if} value="{$dept_ID[$k]}">{$dept}</option>
                {/foreach}

            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label"><b>Course: </b></label>
        <div class="controls">
            <select id="course" name="course" required="">
                <option>{$stud_course}</option>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label"><b>Section: </b></label>
        <div class="controls">
            <input type='text'name='section' value="{$section}" pattern="[0-9A-Za-z\s\-\_]+" required title="Letters and spaces only">
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit' value='Save' name='Save'>
            <a href='/SOCS/settings.php'>Cancel</a>
        </div>
    </div>            
</form>
