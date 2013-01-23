<form class="form-inline" method="post">
    <div class="pull-right">
        <label >School Year:  </label>
        <select name="school_year" class="input-medium">
            {foreach from = $mySchool_Year key = k item = i}
                {if $currentSchool_Year eq $i}
                    <option selected>{$i}</option>
                {else}
                    <option>{$i}</option>
                {/if}
            {/foreach}
        </select>


        <label >Semester:  </label>
        <select name="semester" class="input-medium">
            {if $currentSemester eq 'First'}
                <option selected>First</option>
                <option>Second</option>
                <option>Summer</option>
            {elseif $currentSemester eq 'Second'}
                <option>First</option>
                <option selected>Second</option>
                <option>Summer</option>
            {else}
                <option>First</option>
                <option>Second</option>
                <option selected>Summer</option>
            {/if}           
        </select>
    </div>

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
                        <li><a href='../signatory/index.php?action=displayTable&filter=&page=1&finder=not&clearanceStatus='  style="color:blue; cursor: pointer;"><i class="icon-globe"></i>&nbsp; All</a></li>
                        <li><a href='../signatory/index.php?action=displayTable&filter=&page=1&finder=not&clearanceStatus=Cleared'  style="color:blue; cursor: pointer;"><i class="icon-check"></i>&nbsp; Cleared</a></li>
                        <li><a href='../signatory/index.php?action=displayTable&filter=&page=1&finder=not&clearanceStatus=Not_Cleared' style="color:red; cursor: pointer;"><i class="icon-remove-circle"></i>&nbsp; Not Cleared</a></li>
                    </ul>
                </li>       
                <li class="active"><a href='../signatory/bulletin.php'>Bulletin</a></li>
                <li><a href='../signatory/requirements.php'>Requirements</a></li>            
            </ul>
        </div>    
    </div>    

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span8">
                <!--Body content-->
                <input type="button" class="pull-right btn" value="Back" onclick="window.location.href='../signatory/bulletin.php'">               
                <legend>Post Bulletin</legend>
                <div class="row">    
                    <div class="offset1">
                        <textarea class="input-xxlarge" placeholder="Post a bulletin here....." name='post_message' rows="10" cols="30"></textarea>
                    </div>  
                    <div class="pull-right">
                        <input type="submit" class="btn btn-primary" value="Post" name="postBulletin">
                    </div>  
                </div>

            </div>
            <div class="span4">
                <!--Sidebar content-->
                {include file=$calendar}
            </div>
        </div>
    </div>
</form>



