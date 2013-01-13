<div class="row">   
    <div class="span4 offset4 pull-right">
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

<hr/>

<div class="pull-right">
    <input class="btn" type="button" value="Back" onclick="window.location.href='index.php'"> 
</div>

<div class="row">
    <table class="table">
        
    </table>>
</div>