<script>
	function jumpToPage(){
		var jump = document.getElementById("jump").value;
                var search = document.getElementById("search").value;
                window.location.assign("?action=displayTable&filter=" + search +"&page=" + jump);
	}
        
        function mySearch(){
                var search = document.getElementById("search").value.trim();
                window.location.assign("?action=displayTable&filter=" + search + "&page=1");
                
        }

        function mySearch_EnterKey(){
           if (event.keyCode == 13){
                document.getElementById('btnSearch').click();
           }
        }
        
        function isCheckAll(isChecked){
            for(var i = 0; i <= {$rowCount}; i++){
                document.getElementById("" +i).checked = isChecked;
            }
        }
        
        function findCheck(){
            var valueDeleted = "";
            var count = 0;
            for(var i = 0; i <= {$rowCount}; i++){
                if(document.getElementById("" +i).checked == true){
                    valueDeleted += document.getElementById("" +i).value + "-";
                    count ++;
                }
            }
            window.location.assign("?action=delete&selected=" + valueDeleted);
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
    <center><input id = "search" type="text" style="width:500px;" placeholder="Search..." value ="{$filter}" onkeyup="mySearch_EnterKey()"></input><input type="button" value="Go ->" onclick = "mySearch()" id="btnSearch"></input><br>
        <a href = "javascript:isCheckAll(true)" >Checked All</a> / <a href = "javascript:isCheckAll(false)">Unchecked All</a> <input type="button" value="Add User Account"></input><br>
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
                    <td style="width:20px;"><input type="checkbox" id = '{$k}' value = {$myKey[$k]}></input></td>
                    <td>{$myKey[$k]}</td>
                    <td style="width:100px;"><p>{$myPhotos[$k]}</p></td>
                    <td style="width:300px;"><p>{$i}</p></td>
                    <td style="width:100px;"><p>{$myType[$k]}</p></td>
                    
                </tr>
            {/foreach}   
        </table>  
        {$emptyResult}
    </div>      
        
    <a href="javascript:findCheck()">Delete Selected</a>
    Jump to:  <select id = "jump" onchange="jumpToPage()">
        <option>--</option>
        {for $start = 1 to $end}
            <option>{$start}</option>
        {/for}
    </select>
</center>
</div>
