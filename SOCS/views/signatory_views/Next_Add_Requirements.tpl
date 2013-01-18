<div class="row">
    <div class="span4">
        <ul class="nav nav-tabs">
            <li class="dropdown active">
                <a class="dropdown-toggle"
                    data-toggle="dropdown"
                    href="#">
                    Student
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href='../signatory/index.php?action=displayTable&filter=&page=1&finder=not&clearanceStatus=Cleared'  style="color:blue; cursor: pointer;"><i class="icon-check"></i>&nbsp; Cleared</a></li>
                    <li><a href='../signatory/index.php?action=displayTable&filter=&page=1&finder=not&clearanceStatus=Not_Cleared' style="color:red; cursor: pointer;"><i class="icon-remove-circle"></i>&nbsp; Not Cleared</a></li>
                </ul>
            </li>       
            <li class="dropdown-toggle"><a href='../signatory/bulletin.php'>Bulletin</a></li>
            <li><a href='../signatory/index.php?action=viewListOfRequirements'>Requirements</a></li>       
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
        
<input type="button" class="pull-right btn" value="Back" onclick="window.location.href='../signatory/index.php?action=viewAdd_Requirements'"></input>


<form method='post' class="form-horizontal">
          <legend>This Requirements applies to...</legend>

          <div class="row">
<div class="control-group offset1">
        
       <label> <input type="radio" id="example_radio1" name="radioA" /><b> All Students</label>

        <label><input type="radio" id="example_radio2" name="radioA" /> <b>Students from the following department:</label>
            <label class="offset1">
        Department: <select id="" class="input-small">
            <option>Institute of Computing</option>
                         </select>
            </label>
        
        <label><input type="radio" id="example_radio3" name="radioA" /> <b>Students from the following course:</label>
            <label class="offset1">
       Course:<select id="" class="input-small">
            <option>BSIT</option>
                         </select>
            </label> 
        
        <label><input type="radio" id="example_radio4" name="radioA" /> <b>Students from a particular level:</label>
            <label class="offset1">
        Year level: <select id="" class="input-small">
            <option>4th year</option>
                         </select>
            </label>
        
        <label><input type="radio" id="example_radio5" name="radioA" /> <b>Students from a particular program:</label>
            <label class="offset1">
        Year level: <select id="" class="input-small">
            <option>Day</option>
            <option>Evening</option>
                         </select>
            </label>
        
        <label><input type="radio" id="example_radio6" name="radioA" /> <b>Selected students:</label>
  
        <div class="control-group offset1">
            <textarea class="input-xxlarge" name='' rows="5" cols="50"></textarea>
        </div>

        <div class="control-group">
        <label class="control-label offset1">
            <input class="btn btn-primary" type='Submit' value='Add Requirement' name="Save">
        </div>
    </label>
</div>  </div>   

</form>     