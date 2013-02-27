<div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Upload Signature</h4>

        <!-- Navigations-->
        <div class="row">
            <div class="span3">
                {call name=nav_signatory index=3}
            </div>
        </div>

    </div>
    <div class="span9">

        <!-- Header-->
        <h4 class="well center-text well-small">Signature</h4>

        <legend>Current signature image</legend>
        <img src="{$signatureImage}" class="img-polaroid" width="200" height="35"></br>
    {if $hasImageSet eq '1'}<a href="uploadSignature.php?action=reset">Remove Signature</a>{/if}

    <legend>Upload new signature</legend>

    <form action='UploadSignature.php?action=uploadSignature' method='post' class="form-horizontal" enctype="multipart/form-data">
        <div class="control-group">
            <label class="control-label"><b>Upload Picture: </b></label>
            <div class="controls">
                <input type="file" name="signatureimage">
                <span class="help-block">Only 200 x 35 image dimensions are allowed. Max 1MB size.</span>
            </div>
        </div>

        <div class="form-actions">
            <div class="pull-right">
                <input class="btn btn-primary" type='Submit' value='Upload' name='upload' />
                <button class="btn" type="button" onclick="window.history.back();">Back</button>
            </div>
        </div>
    </form>


</div>
</div>

{*
<!-- Navigation Tabs-->
<ul class="nav nav-tabs">
<li><a href='../signatory/index.php'>Student</a></li>       
<li class="active"><a href='../signatory/bulletin.php'>Bulletin</a></li>
<li><a href='../signatory/requirements.php'>Requirements</a></li>         
</ul>

<!-- Archive Search-->
{call name=archiveSearch}

<!-- Post Bulletin Button-->
<input class="btn" type="button" value="Post Bulletin" onclick="window.location.href='../signatory/bulletin.php?action=viewPosting_Bulletin'">

<!-- Search Bar-->
<span class="pull-right">
<form class="form-inline">
<input type="hidden" value="filter" name="action">
<input id="search" class="input-large" type="search" placeholder="Search date here  ..." value="{$filter}" name="filterName">
<button class="btn btn-success" type="submit">
<i class="icon-search icon-white"></i>
</button>
</form>
</span>

<!-- Table of Announcements-->
<table class="table table-hover">
<tr>
<th>
<input type="checkbox" onclick="isCheck({$rowCount_bulletin})" id="check"></input> Messages
</th> 
<th> Post Date and Time</th>
<th> Message Info.</th>
</tr>

{foreach from = $myName_messages key = k item = i}
<tr>        
<td>
<div class="pull-left">
<input class="Checkbox" type="checkbox" id = '{$k}' value = {$myMessage_ID[$k]} ></input> &nbsp; {$i}
</div>
</td>
<td>{$my_dateTime[$k]}</td>
<td>
<i class="icon-eye-open"></i>
<a style="cursor:pointer;" onclick="window.location.href='../signatory/bulletin.php?action=viewPosted_Bulletin&key={$myMessage_ID[$k]}'"> View</a>
</td>
</tr>
{/foreach}
</table>

<!-- Delete Selected Button-->
<a style="cursor:pointer;" onclick="findCheck('{$rowCount_bulletin}','Bulletin')">
<i class="icon-remove"></i> Delete Selected
</a>

<div class="pull-right">
Jump to: <select id="jump" class="input-mini" onchange="jumpToPageWithSchoolYear()">
<option>--</option>
{for $start = 1 to $bulletin_length}
<option>{$start}</option>
{/for}
</select>
</div>
*}