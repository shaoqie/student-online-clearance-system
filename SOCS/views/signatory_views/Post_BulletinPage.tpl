<form method="post">
    <div class="row">
        <div class="span4">
            <ul class="nav nav-tabs">
            <li class="dropdown">
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
            <li class="active"><a href='../signatory/bulletin.php'>Bulletin</a></li>
            <li><a href='../signatory/requirements.php'>Requirements</a></li>            
        </ul>
        </div>    
        <div class="pull-right">
            {include file=$School_year_content}
        </div> 
    </div>    
      
    <input type="button" class="pull-right btn" value="Back" onclick="window.location.href='../signatory/bulletin.php'">
    
    <legend>Post Bulletin</legend>
    <div class="row">    
            <div class="offset1">
                <textarea class="input-xxlarge" placeholder="Post a bulletin here....." name='post_message' rows="10" cols="30"></textarea>
            </div>  
            <div class="span2 offset6">
                <input type="submit" class="btn btn-primary" value="Post" name="postBulletin">
            </div>  
    </div>
</form>

