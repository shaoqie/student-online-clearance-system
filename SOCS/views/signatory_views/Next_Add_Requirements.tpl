<div class="pull-right">
    {include file=$School_year_content}
</div> 

<div class="row">
    <div class="span4">
        <ul class="nav nav-tabs">
            <li><a href='../signatory/index.php'>Student</a></li>       
            <li><a href='../signatory/bulletin.php'>Bulletin</a></li>
            <li class="active"><a href='../signatory/requirements.php'>Requirements</a></li>           
        </ul>
    </div>       
</div>
<!--Body content-->
<input type="button" class="pull-right btn" value="Back" onclick="window.location.href='../signatory/requirements.php'"></input>


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

            <div class="control-group">
                <label class="control-label offset1">
                    <input class="btn btn-primary" type='Submit' value='Add Requirement' name="Save">
                    </div>
                </label>
            </div>  </div>   

</form>