<div class="row">   
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

<hr/>

<div class="pull-right">
    <input class="btn" type="button" value="Back" onclick="window.location.href='index.php'"> 
</div>

<legend>{$sign_name} Bulletin</legend>
<div class="row">
    <table class="table">
        {foreach from = $my_messages key = k item = i}
            <tr>
                <td>
                    <div class="span8 offset1" id="divMessages">
                        <label><i style="font-size: 12px; color:blue;">Posted on {$_date[$k]} at {$_time[$k]}</i></label>
                        <hr/>
                        <p style="margin-left: 50px; font-size: 15px;">{$i}</p>
                    </div>
                </td>
            </tr>
        {/foreach}
    </table>   
    
    <div class="pull-right">
        Jump to: 
        <select id="jump_studMessages" class="input-mini" onchange="jumpToPageMessages({$sign_id})">
            <option>--</option>
            {for $start = 1 to $stud_message_length}
            <option>{$start}</option>
            {/for}
        </select>
    </div>
</div>
    
