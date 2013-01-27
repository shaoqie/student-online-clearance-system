<!--Archive Search Bar -->
<div class="row">
    {call name=archiveSearch}
</div>

<!-- Add Requirements Button-->
<div class="row">
    <input class="btn pull-right" type="button" value="Add Requirements" onclick="window.location.href='../signatory/requirements.php?action=viewAdd_Requirements'">
</div>

<!-- Navigation Tabs-->
<ul class="nav nav-tabs">
    <li><a href='../signatory/index.php'>Student</a></li>       
    <li><a href='../signatory/bulletin.php'>Bulletin</a></li>
    <li class="active"><a href='../signatory/requirements.php'>Requirements</a></li>            
</ul>

<!-- Search Bar-->
{call name=search}