<div class="row">
    <div class="span4">
        <ul class="nav nav-tabs">
            <li class="active"><a href='../signatory/index.php'>Student</a></li>   
            <li><a href='../signatory/bulletin.php'>Bulletin</a></li>
            <li><a href='../signatory/requirements.php'>Requirements</a></li>         
        </ul>
    </div>     
</div>

<!--Body content-->
<div class="row">
    {if isset($stud_photo)}
        <div class="span1 offset1"><img src="{$stud_photo}" class="img-polaroid" /></div>
    {else}
        <div class="span1 offset1"><img src="{$host}/photos/default_student.png" class="img-polaroid" /></div>
    {/if}
    <div class="span4">
        <h4>{$student_name}</h4>
        <h5>{$course_name}, {$dept_name}</h5>
    </div>
</div>       
<hr>
<form method='get' class="form-horizontal" action="index.php?action=viewClearancePage_submit&stud_id={$stud_id}">
    <div class="row">
        <div class="span8 offset1">
            <table class="table table-hover">     
                <tr>
                    <th>Checked</th>
                    <th>Requirements</th>       
                </tr>

                {foreach from = $clearanceStatus key = k item = i}
                    <tr>
                        <td><input name="requirements" value="{$clearanceStatus[$k][0]}" id="rq{$clearanceStatus[$k][0]}" type="checkbox"
                        {if $clearanceStatus[$k][3] eq 'Cleared'}
                            checked=""
                        {/if}
                        >
                        </td>
                        <td><p>{$clearanceStatus[$k][1]}</p></td>
                    </tr>
                {/foreach}
            </table> 
        </div>
    </div>

    <div class="row">

        <div class="span2 offset1">
            <input class="btn btn-primary" type='button' value='Save' name="Save" onclick="submitClearanceStatus()">
            <!-- <input type="button" class="btn btn-primary" value="Save" onclick="window.location.href='../signatory/index.php?action=saveClearanceStatus'"> -->
            <input type="button" class="btn btn-primary" value="Back" onclick="window.location.href='../signatory/index.php'">
        </div>   
    </div>
</form> 
            
<script>
    function submitClearanceStatus(){
        var vSelected="";
        {foreach from = $clearanceStatus key = k item = i}
            vSelected += "&rq[{$clearanceStatus[$k][0]}]=" + (document.getElementById("rq{$clearanceStatus[$k][0]}").checked == true ? 1:0);
        {/foreach}
        window.location.assign("index.php?action=viewClearancePage_submit&stud_id={$stud_id}&selected=" + vSelected);
    }
</script>
                