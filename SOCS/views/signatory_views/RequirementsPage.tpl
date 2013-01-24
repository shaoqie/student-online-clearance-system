<div class="pull-right">
    {include file=$School_year_content}
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
            <li><a href='../signatory/bulletin.php'>Bulletin</a></li>
            <li class="active"><a href='../signatory/requirements.php'>Requirements</a></li>            
        </ul>
    </div>       
</div>

<!-- Add Requirements Button-->
<input class="btn pull-right" type="button" value="Add Requirements" onclick="window.location.href='../signatory/requirements.php?action=viewAdd_Requirements'">

<!-- Search Bar-->
{call name=search}