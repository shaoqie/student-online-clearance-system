<script>
    //var select = document.getElementById("req_appliesTo").value;
    //alert(select);
    
    function change_req_appliesTo(){
        //var select = document.getElementById("req_appliesTo").value;
        
        var x = document.getElementById("req_appliesTo").selectedIndex;
        var select = document.getElementById("req_appliesTo").options;
        
        var SelectedIndex = select[x].index;
        
        $(document).ready(function(){
            $("#selected_Dept").hide();
            $("#selected_Course").hide();
            $("#selected_YearLevel").hide();
            $("#selected_Program").hide();
        
            if(parseInt(SelectedIndex) == 1){ $("#selected_Dept").show(); 
            }else if(parseInt(SelectedIndex) == 2){ $("#selected_Course").show();
            }else if(parseInt(SelectedIndex) == 3){ $("#selected_YearLevel").show();
            }else if(parseInt(SelectedIndex) == 4){ $("#selected_Program").show();
            }  
        }); 
    }
    
    function change_reqType(){
        var x = document.getElementById("requirement_type").selectedIndex;
        var select = document.getElementById  ("requirement_type").options;
        
        var SelectedIndex = select[x].index;
        
        $(document).ready(function(){
            if(parseInt(SelectedIndex) == 1){ $("#Sign").show(); 
            }else { $("#Sign").hide();
            }  
        }); 
    }
</script>


<!-- Back Button-->
<button class="pull-right btn" onclick="window.location.href='../signatory/requirements.php'">Back</button> 

<!-- Navigation Tabs-->
<ul class="nav nav-tabs">
    <li><a href='../signatory/index.php'>Student</a></li>       
    <li><a href='../signatory/bulletin.php'>Bulletin</a></li>
    <li class="active"><a href='../signatory/requirements.php'>Requirements</a></li>         
</ul>

<!--Archive Search Bar -->

<form method='post' class="form-horizontal" action="requirements.php?action=viewAdd_Requirements_submit">
    <div class="form-inline">
        <label >School Year:  </label>
        <select id="school_year" name="school_year" class="input-large">
            {foreach from = $mySchool_Year key = k item = i}
                {if $currentSchool_Year eq $i}
                    <option selected>{$i}</option>
                {else}
                    <option>{$i}</option>
                {/if}
            {/foreach}
        </select>

        <label>Semester: </label>
        <select id="semester" name="semester" class="input-large">
            {if $currentSemester eq 'First'}
                <option selected>First</option>
                <option>Second</option>
                <option>Summer</option>
            {elseif $currentSemester eq 'Second'}
                <option>First</option>
                <option selected>Second</option>
                <option>Summer</option>
            {else}
                <option>First</option>
                <option>Second</option>
                <option selected>Summer</option>
            {/if}           
        </select>
    </div>

    <legend>Add Requirement:</legend>
    <div class="control-group">
        <label class="control-label">Title: </label>
        <div class="controls">
            <input class="span5" type ='text' name='requirement_title'>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Description: </label>
        <div class="controls">
            <textarea class="span5" name='requirement_description' rows="5" cols="50"></textarea>
        </div>    
    </div>

    <div class="control-group">
        <label class="control-label">Requirement Type: </label>
        <div class="controls">
            <select id="requirement_type" name="requirement_type" class="input-large" onchange="change_reqType()">
                <option>Textual</option>
                <option>Pre-requisite</option>
            </select>
        </div>    
    </div>

    <div class="control-group" id="Sign" hidden>
        <label class="control-label">Select Signatory: </label>
        <div class="controls">
            <select name="signatory" class="input-large">
                {foreach from = $listOfSignatory key = k item = i}
                    <option>{$listOfSignatory[$k]}</option>
                {/foreach}
            </select>
        </div>    
    </div>    

    <legend>This Requirements applies to...</legend>


    <div class="control-group">
        <label class="control-label"> Select: </label>
        <div class="controls">
            <select id="req_appliesTo" name="req_appliesTo" class="input-xlarge" onchange="change_req_appliesTo()">
                <option>All Students:</option>
                <option>Students from the following department:</option>
                <option>Students from the following course:</option>
                <option>Students from a particular level:</option>
                <option>Students from a particular program:</option>
            </select>
        </div>    
    </div>  

    <div class="control-group" id="selected_Dept" hidden>
        <label class="control-label" id> Departments: </label>
        <div class="controls">
            <select name="Departments" class="input-xlarge">   
                {foreach from = $listOfDepartments key = k item = i}
                    <option>{$listOfDepartments[$k]}</option>
                {/foreach}
            </select>
        </div>    
    </div>

    <div class="control-group" id="selected_Course" hidden>
        <label class="control-label" id> Courses: </label>
        <div class="controls">
            <select name="Courses" class="input-xlarge">   
                {foreach from = $listOfCourse_UnderSign key = k item = i}
                    <option>{$i}</option>
                {/foreach}
            </select>
        </div>    
    </div>

    <div class="control-group" id="selected_YearLevel" hidden>
        <label class="control-label" id> Year level: </label>
        <div class="controls">
            <select name="Year_level" class="input-xlarge">   
                <option>1st year</option>
                <option>2nd year</option>
                <option>3rd year</option>
                <option>4th year</option>
                <option>5th year</option>
            </select>
        </div>    
    </div>

    <div class="control-group" id="selected_Program" hidden>
        <label class="control-label" id> Program: </label>
        <div class="controls">
            <select name="Program" class="input-xlarge">   
                <option>Day</option>
                <option>Evening</option>
            </select>
        </div>    
    </div>


    <!--
        <div class="row">
            <div class="control-group offset1">
                <div class="control-group">
                    <label class="control-label">Description: </label>
                    <div class="controls">
                        <textarea class="span5" name='requirement_description' rows="5" cols="50"></textarea>
                    </div>    
    
    
    
    <!--
    <label> <input type="radio" id="example_radio1" name="radioA" /><b> All Students</label>

    <label><input type="radio" id="example_radio2" name="radioA" /> <b>Students from the following department:</label>
    <label class="offset1">
        Department: <select id="" class="input-medium">
            <option>Institute of Computing</option>
        </select>
    </label>

    <label><input type="radio" id="example_radio3" name="radioA" /> <b>Students from the following course:</label>
    <label class="offset1">
        Course:<select id="" class="input-medium">
            <option>BSIT</option>
        </select>
    </label> 

    <label><input type="radio" id="example_radio4" name="radioA" /> <b>Students from a particular level:</label>
    <label class="offset1">
        Year level: <select id="" class="input-medium">
            <option>4th year</option>
        </select>
    </label>

    <label><input type="radio" id="example_radio5" name="radioA" /> <b>Students from a particular program:</label>
    <label class="offset1">
        Year level: <select id="" class="input-medium">
            <option>Day</option>
            <option>Evening</option>
        </select>
    </label>

    
   
</div>  
</div>   
    -->
    <div class="control-group">
        <input class="btn btn-primary" type='Submit' value='Add Requirement' name="Save">
    </div>
</form> 