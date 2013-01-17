<div class="row">
    <div class="span4">
        <ul class="nav nav-tabs">
            <li><a href='../signatory/index.php'>Dashboard</a></li>
            <li><a href='../signatory/index.php?action=viewPosting_Bulletin'>Bulletin</a></li>
            <li class="active"><a href='../signatory/index.php?action=viewListOfRequirements'>Requirements</a></li>
        </ul>
    </div>    
    <div class="pull-right">
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
        
<button class="pull-right btn" onclick="window.location.href='../signatory/index.php?action=viewAdd_Requirements'">Back</button> 

<form method='post' class="form-horizontal">
          <legend>This Requirements applies to...</legend>

          <div class="row">
<div class="control-group offset1">
        
       <label for="example_radio1"> <input type="radio" id="example_radio1" name="radioA" /> All Students</label>

        <label for="example_radio2"><input type="radio" id="example_radio2" name="radioA" /> Students from the following department:</label>
            Department: <select id="" class="input-small">
            <option>Institute of Computing</option>
                         </select>
        <label for="example_radio3"><input type="radio" id="example_radio3" name="radioA" /> Students from the following course:</label>
            Course: <select id="" class="input-small">
            <option>BSIT</option>
                         </select>
        <label for="example_radio4"><input type="radio" id="example_radio4" name="radioA" /> Students from a particular level:</label>
            Year level: <select id="" class="input-small">
            <option>4th year</option>
                         </select>
        <label for="example_radio5"><input type="radio" id="example_radio5" name="radioA" /> Students from a particular program:</label>
            Year level: <select id="" class="input-small">
            <option>Day</option>
            <option>Evening</option>
                         </select>
        <label for="example_radio6"><input type="radio" id="example_radio6" name="radioA" /> Selected students:</label>
  
        <div class="control-group">
            <textarea class="input-xxlarge" name='' rows="5" cols="50"></textarea>
        </div>

        <div class="control-group">
        <label class="control-label">
            <input class="btn btn-primary" type='Submit' value='Add Requirement' name="Save">
        </div>
    </label>
</div>  </div>   

</form>     