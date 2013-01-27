<!-- Navigation Tabs-->
<ul class="nav nav-tabs">
    <li><a href='../signatory/index.php'>Student</a></li>       
    <li><a href='../signatory/bulletin.php'>Bulletin</a></li>
    <li class="active"><a href='../signatory/requirements.php'>Requirements</a></li>            
</ul>

<!--Archive Search Bar -->
{call name=archiveSearch}

<!-- Add Requirements Button-->
<input class="btn" type="button" value="Add Requirements" onclick="window.location.href='../signatory/requirements.php?action=viewAdd_Requirements'">

<!-- Search Bar-->
<span class="pull-right">
    {call name=search}
</span>