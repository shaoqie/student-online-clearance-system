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

    <div class="control-group">
         <label class="controls"><input type="radio">  All Students</label>
       
    </div>
    
    <div class="control-group">
        <label class="controls"> <input type="radio">  Students from the following department: </label>
        <label class="controls"> 
           Department: <select id="" class="input-small">
            <option>Institute of Computing</option>
        </select> </label>
     
    </div>
    
    <div class="control-group">
        <label class="controls"> <input type="radio">  Students from the following course: </label>
        <label class="controls"> 
            Course: <select id="" class="input-small">
            <option>BSIT</option>
        </select></label>
    </div>
    
    <div class="control-group">
        <label class="controls"> <input type="radio">  Students from a particular level: </label>
        <label class="controls"> Year level: <select id="" class="input-small">
            <option>4th year</option>
        </select></label>
    </div>
    
    <div class="control-group">
        <label class="controls"> <input type="radio">  Students from a particular program: </label>
   <label class="controls"> Year level: <select id="" class="input-small">
            <option>Day</option>
             <option>Evening</option>
        </select></label>
    </div>
    
     <div class="control-group">
        <label class="controls">Selected students: </label>
     
        <div class="controls">
            <textarea class="input-xxlarge" name='' rows="5" cols="50"></textarea>
        </div>

    </div>
    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit' value='Add Requirement' name="Save">
        </div>
    </div>
    
</form>     