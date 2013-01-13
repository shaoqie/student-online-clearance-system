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
        <table class="table table-hover">     
            <tr>
                <th>Checked</th>
                <th>Requirements</th>       
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td><p>Paid for Library Card</p></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td><p>Verified Library Card</p></td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td><p>Activate the Virtual Library Account</p></td>
            </tr>
        </table> 
    </div>
</div>
<div class="row">
    <div class="span2 offset1">
         <input type="button" class="btn btn-primary" value="Back" onclick="window.location.href='index.php'">
    </div>   
</div>
