<script>
	function jumpToPage(){
		var jump = document.getElementById("jump").value;
                var search = document.getElementById("search").value;
                window.location.assign("?action=displayTable&filter=" + search +"&page=" + jump);
	}
        
        function mySearch(){
                var search = document.getElementById("search").value;
                window.location.assign("?action=displayTable&filter=" + search + "&page=1");
        }
</script>

<div style="float:right;">
     <a href='../settings.php'>My Account</a>&nbsp;|&nbsp;<a href='../index.php?action=logout'>Logout</a>
</div>
<center>
    <div style="width:100px;height:100px;border:1px solid gray;">
        <img></img>
    </div>
</center>

<center>
    <div style="width:550px;">
        <Strong><h3>{$user_info}</h3></Strong><br>
        <Strong>Students Online  Clearance System</Strong><br>
        <hr>
    </div>
</center>


<center><div style="width:550px;">
        <a href='../administrator/index.php'>User Accounts</a>&nbsp;&nbsp;<a href='../administrator/signatory_list_manager.php'>Signatories</a>
        &nbsp;&nbsp;<a href='../administrator/department_list_manager.php'>Departments</a></div></center>           
<br> 
<form>
    <center><input id = "search" type="text" style="width:500px;" placeholder="Search..." value = {$filter} ></input><input type="button" value="Go ->" onclick = "mySearch()"></input><br>
        <a href = "#">Checked All</a> / <a href = "#">Unchecked All</a> <input type="button" value="Add User Account"></input><br>
    </center>

</form>

<center>       
    <table border="1 solid gray">     
        <tr>
            <th style="width:20px;"> /\</th>
            <th style="width:100px;"> Pic</th>
            <th style="width:300px;"> User</th>  
            <th style="width:100px;"> Type</th>  
        </tr>
    </table>  

    <div style="overflow:auto;width:550px;height:200px;border:1px;" >
        <table border="1 solid gray">   
            {foreach from = $myName key = k item = i}
                <tr>
                    <td style="width:20px;"><input type="checkbox"></input></td>
                    <td style="width:100px;"><p>{$myPhotos[$k]}</p></td>
                    <td style="width:300px;"><p>{$i}</p></td>
                    <td style="width:100px;"><p>{$myType[$k]}</p></td>
                </tr>
            {/foreach}
        </table>

    </div>      
        
    <a href = "#">Delete Selected</a>
    Jump to:  <select id = "jump" onchange="jumpToPage()">
        <option>--</option>
        {for $start = 1 to $end}
            <option>{$start}</option>
        {/for}
    </select>
</center>
</div>
