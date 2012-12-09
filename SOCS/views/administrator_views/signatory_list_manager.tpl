<script>
    function jumpToPage(){
        var jump = document.getElementById("jump").value;
        var search = document.getElementById("search").value;
        window.location.assign("?action=displayTable&filter=" + search +"&page=" + jump);
    }
    
    function isCheckAll(isChecked){
        for(var i = 0; i <= {$rowCount_sign}; i++){
            document.getElementById("" +i).checked = isChecked;
        }
    }
    
    function findCheck(){
        var valueDeleted = "";
        for(var i = 0; i < {$rowCount_sign}; i++){
            if(document.getElementById("" +i).checked == true){
                valueDeleted += document.getElementById("" +i).value + "-";
            }
        }
        window.location.assign("?action=delete&selected=" + valueDeleted);
    }
</script>

<ul class="nav nav-tabs">
    <li><a href='../administrator/index.php'>User Accounts</a></li>
    <li class="active"><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
    <li><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<form class="form-horizontal">
    <input type="hidden" value="filter" name="action">
    <input class="input-xxlarge" id="search" type="text" placeholder="Search..." value ="{$filter}" name="filterName">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i></button>
</form>
   
<div class="row">
     <div class="span6">
       <input class="btn pull-right" type="button" value="Add Signatory">
    </div>
</div>

<br>

<a href = "javascript:isCheckAll(true)" >Checked All</a> / 
<a href = "javascript:isCheckAll(false)">Unchecked All</a> 

<table class="table table-hover">     
    <tr>
        <th></th>
        <!--<th style="width:100px;"> Pic</th>-->
        <th> Signatories</th>  
    </tr>
    {foreach from = $myName_sign key = k item = i}
        <tr>
            <td width="300px"><input type="checkbox" id = '{$k}' value = {$myKey_sign[$k]} ></input></td>
            <td><p>{$i}</p></td>

        </tr>
    {/foreach}
</table>
<a href = "javascript:findCheck()" >Delete Selected</a>


<div class="pull-right">
    Jump to: <select id="jump" class="input-mini" onchange="jumpToPage()">
        <option>--</option>
        {for $start = 1 to $sign_length}
            <option>{$start}</option>
        {/for}
    </select>
</div>
