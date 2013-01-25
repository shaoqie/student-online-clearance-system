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

<!-- Add Requirements Button-->
<input class="btn pull-right" type="button" value="Add Requirements" onclick="window.location.href='../signatory/requirements.php?action=viewAdd_Requirements'">

<!-- Search Bar-->
{call name=search}