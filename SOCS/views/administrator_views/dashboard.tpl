<script>
    function jumpToPage(){
        var jump = document.getElementById("jump").value;
        var search = document.getElementById("search").value;
        window.location.assign("?action=displayTable&filter=" + search +"&page=" + jump);
    }       
        
    function isCheckAll(isChecked){
        for(var i = 0; i <= {$rowCount}; i++){
            document.getElementById("" +i).checked = isChecked;
        }
    }
        
    function findCheck(){
        var valueDeleted = "";
        var count = 0;
        for(var i = 0; i < {$rowCount}; i++){
            if(document.getElementById("" +i).checked == true){
                valueDeleted += document.getElementById("" +i).value + "-";
                count ++;
            }
        }
        window.location.assign("?action=delete&selected=" + valueDeleted);
    }
</script>


<ul class="nav nav-tabs">
    <li class="active"><a href='../administrator/index.php'>User Accounts</a></li>
    <li><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
    <li><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<form class="form-horizontal" method="get" action="?action=filter">
    <input type="hidden" value="filter" name="action">
    <input class="input-xxlarge" id="search" type="text" placeholder="Search..." value ="{$filter}" name="filterName">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i></button>
</form>

<div class="row">
     <div class="span6">
        <input class="btn pull-right" type="button" value="Add User Account">
    </div>
</div>
    
<a href = "javascript:isCheckAll(true)" >Checked All</a> / 
<a href = "javascript:isCheckAll(false)">Unchecked All</a> 

<table class="table table-hover">     
    <tr>
        <th></th>
        <!--<th style="width:100px;"> Pic</th>-->
        <th> User</th>  
        <th> Type</th>  
    </tr>
    {foreach from = $myName key = k item = i}
        <tr>
            <td><input type="checkbox" id = '{$k}' value = {$myKey[$k]}></input></td>
            <!--<td style="width:100px;"><p>{$myPhotos[$k]}</p></td>-->
            <td><p>{$i}</p></td>
            <td><p>{$myType[$k]}</p></td>

        </tr>
    {/foreach}
</table>
<a href="javascript:findCheck()">Delete Selected</a>

<div class="pull-right">
    Jump to: <select id="jump" class="input-mini" onchange="jumpToPage()">
        <option>--</option>
        {for $start = 1 to $end}
        <option>{$start}</option>
        {/for}
    </select>
</div>
