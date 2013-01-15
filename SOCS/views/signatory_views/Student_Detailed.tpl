<div class="row">
    <div class="span4">
        <ul class="nav nav-tabs">
            <li class="active"><a href='../signatory/index.php'>Dashboard</a></li>
            <li><a href='../signatory/index.php?action=viewPosting_Bulletin'>Bulletin</a></li>
            <li><a href='../signatory/index.php?action=viewListOfRequirements'>Requirements</a></li>
        </ul>
    </div>    
    <div class="span4 offset4">
        School Year:
        <select id="school_year" class="input-small">
            {foreach from = $mySchool_Year key = k item = i}
                <option>{$i}</option>
            {/foreach}
        </select>
        Semester:
        <select id="semester" class="input-small">
            <option>First</option>
            <option>Second</option>
            <option>Summer</option>
        </select>
    </div> 
</div>
    
<div class="row">
    <div class="span1 offset1"><img src="{$host}/photos/default_student.png" class="img-polaroid" /></div>
    <div class="span3">
        <h4>{$student_name}</h4>
        <h5>{$course_name}, {$dept_name}</h5>
    </div>
</div>       
<hr>
<div class="row">
    <div class="span8 offset1">
        <form class="form-horizontal">
            <legend>Student Detailed</legend>
            <div class="control-group">
                <label class="control-label"><b>Gender:</b></label>
                <label class="control-label">{$stud_gender} </label>                
            </div>
            <div class="control-group">
                <label class="control-label"><b>Year Level:</b></label>
                <label class="control-label">{$stud_yr_level}  </label>                
            </div>
            <div class="control-group">
                <label class="control-label"><b>Program:</b></label>
                <label class="control-label">{$stud_program}  </label>                
            </div>
            <div class="control-group">
                <label class="control-label"><b>Section:</b></label>
                <label class="control-label">{$stud_section}  </label>                
            </div>
            <div class="control-group">
                <label class="control-label"><b>Overall Status:</b></label>
                {if $stud_status eq 'Cleared'}
                    <label class="control-label" style="color:blue;"> {$stud_status}</label>    
                {else}
                    <label class="control-label" style="color:red;">{$stud_status}</label>    
                {/if}              
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="span2 offset1">
         <input type="button" class="btn btn-primary" value="Back" onclick="window.location.href='index.php'">
    </div>   
</div>
