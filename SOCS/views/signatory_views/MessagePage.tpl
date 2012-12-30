<div class="row">
    <div class="span4">
        <ul class="nav nav-tabs">
            <li><a href='../signatory/index.php'>Dashboard</a></li>
            <li class="active"><a href='../signatory/Messages.php'>Messages</a></li>
            <li><a href='#'>Requirements</a></li>
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
        
<legend>Messages</legend>
<div class="row">
    <div class="offset1" border="1">
        <table class="table-hover">
            <tr>
                <td>
                    <div class="row">
                        <div class="span5">
                            <h5>Manilic, Maureen Y <i style="font-size: 10px"> Signatory in Charge, USEP Library</i></h5>
                            <p style="margin-left: 50px">Please see Mr. Jhon Tulas for verification of your Library Card</p>
                            <i style="font-size: 9px">Post on Sept. 17, 2012 at 10:30pm</i> 
                        </div>
                        <div class="span1"><i class="icon-remove"></i><a style="cursor: pointer">Delete</a></div>
                    </div>   
                    <hr>
                </td>                  
            </tr>  
            <tr>
                <td>
                    <div class="row">
                        <div class="span5">
                            <h5>Dela Cruz, Juan C. <i style="font-size: 10px"> BSIT, Institute of Computing</i></h5>
                            <p style="margin-left: 50px">Yes Sir...</p>
                            <i style="font-size: 9px">Post on Sept. 18, 2012 at 02:34pm</i> 
                        </div>
                        <div class="span1"><i class="icon-remove"></i><a style="cursor: pointer">Delete</a></div>
                    </div>   
                    <hr>
                </td>                  
            </tr> 
            <tr>
                <td>
                    <div class="row">
                        <div class="span5">
                            <h5>Manilic, Maureen Y <i style="font-size: 10px"> Signatory in Charge, USEP Library</i></h5>
                            <p style="margin-left: 50px">OK..</p>
                            <i style="font-size: 9px">Post on Sept. 18, 2012 at 08:30pm</i> 
                        </div>
                        <div class="span1"><i class="icon-remove"></i><a style="cursor: pointer">Delete</a></div>
                    </div>   
                    <hr>
                </td>                  
            </tr> 
        </table>
    </div>
    <div class="span2 offset1">
        <i class="icon-backward"></i>&nbsp;<a style="cursor: pointer">Previous</a>
    </div>
    <div class="span1 offset3">
        <a style="cursor: pointer">Next</a>&nbsp;<i class="icon-forward"></i>
    </div>
    
</div>

&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

<legend>Send a message</legend>
<div class="row">
    <div class="offset1">
        <textarea class="input-xxlarge" placeholder="Enter message here....." name='post_message' rows="2" cols="30"></textarea>
    </div>  
    <div class="span2 offset5">
        <input type="button" class="btn btn-primary" value="Back" onclick="window.location.href='index.php'">
        <input type="button" class="btn" value="Post" onclick="">
    </div>  
</div>

