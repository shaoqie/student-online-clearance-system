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
    <i class="icon-print"></i><input class="btn btn-link" type="button" value="Print Preview"> 
    <i class="icon-download"></i><input class="btn btn-link" type="button" value="Export to PDF">
</div>


<div class="row"> 
    <div class="span5 offset2">
        <table class="table-hover">
            <tr>
                <th style="height: 80px;"><h3>Controls</h3></th>
            <th style="height: 80px;"><h3>Signatory</h3></th>
            <th style="height: 80px;"><h3>Status</h3></th>
            </tr>
            {foreach from = $myListOfSign_underDeptName key = k item = i}
                <tr>
                    <td style="width: 300px;"><i class="icon-zoom-in"></i><a style="cursor: pointer" onclick="window.location.href='index.php?action=viewMessages&Tsign_ID={$myKey_signID[$k]}'" >Messages</a></td>    
                    <td style="width: 300px;"><h4><a>{$i}</a></h4></td>
                    <td style="width: 300px;"><img src="{$host}/photos/not cleared.jpg" class="img-polaroid" /></td>
                </tr>
            {/foreach}
        </table>
    </div>    
</div>



