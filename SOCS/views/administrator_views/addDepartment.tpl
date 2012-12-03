    
<div style="float:right;">
     <a href='../settings.php'>My Account</a>&nbsp;&nbsp;<a href='../index.php?action=logout'>Logout</a></div>

<center><div style="width:100px;height:100px;border:1px solid gray;"><img></img></div></center>
     
<center><div style="width:550px;"><Strong><h3>{$user_info}</h3></Strong><br>
        <Strong>Students Online  Clearance System</Strong><br><hr></div></center>
        
     
<center><div style="width:550px;">
     <a href='#'>User Accounts</a>&nbsp;&nbsp;<a href='#'>Signatories</a>
&nbsp;&nbsp;<a href='#'>Departments</a></div></center>           
        <br> 
        
        
       <center> <form action='#' method='post'>
    Add Department:
    <p>Department name: <input type ='text' name='depname'> <br /><br />
        
       Description:<br /> 
        <form action="#">
        <textarea name="myTextBox" cols="50" rows="5">
        Enter some description here..
        </textarea>
        <br />
        <input type="submit" value="Add Signatory"/>&nbsp; <a href='settings.php?action=cancel'>Cancel</a>
        </form>

    </p>
        </form></center>