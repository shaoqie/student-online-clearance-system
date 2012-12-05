<ul class="nav nav-tabs">
    <li><a href='../administrator/index.php'>User Accounts</a></li>
    <li><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
    <li class="active"><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<form class="form-horizontal">
    <input class="input-xxlarge" id = "search" type="text" placeholder="Search..." value ="" onkeyup="">
    <button class="btn btn-primary"type="button" id="btnSearch"><i class="icon-search icon-white"></i></button>
</form>

<div class="row">
     <div class="span6">
       <input class="btn pull-right" type="button" value="Add Department">
    </div> 
</div>   
      
<br>

<a href = "#" >Checked All</a> / 
<a href = "#">Unchecked All</a> 

<table class="table table-hover">     
    <tr>
        <th></th>
        <!--<th style="width:100px;"> Pic</th>-->
        <th> User</th>  
        <th> Type</th>  
    </tr>
        <tr>
            <td><input type="checkbox" id = '' value = ></input></td>
            <!--<td style="width:100px;"><p>{$myPhotos[$k]}</p></td>-->
            <td><p>Sample</p></td>
            <td><p>Sample</p></td>

        </tr>
</table>
<a href="#">Delete Selected</a>


<div class="pull-right">
    Jump to: <select id="jump" class="input-mini" onchange="jumpToPage()">
        <option>--</option>
  
    </select>
</div>
