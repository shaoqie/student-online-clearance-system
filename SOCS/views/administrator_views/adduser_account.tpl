<div style="float:right;">
     <a href='../settings.php'>My Account</a>&nbsp;&nbsp;<a href='../index.php?action=logout'>Logout</a></div>

<center><div style="width:100px;height:100px;border:1px solid gray;"><img></img></div></center>
     
<center><div style="width:550px;"><Strong><h3>{$user_info}</h3></Strong><br>
        <Strong>Students Online  Clearance System</Strong><br><hr></div></center>
        
     
<center><div style="width:550px;">
     <a href='#'>User Accounts</a>&nbsp;&nbsp;<a href='#'>Signatories</a>
&nbsp;&nbsp;<a href='#'>Departments</a></div></center>           
        <br> 

        
      <center>  <form action='#' method='post'>
    Add Account:
    <p>Username: <input type ='text' name='username'> <br /><br />
        
        Surname: <input type ='text' name='surname'> <br />
        First Name: <input type='text' name='firstname'> <br />
        Middle Name: <input type='text'name='middleName'> <br />
    </p>

    Account password:
    <p>
        Password: <input type='password' name='password'> <br />
        Confirm password: <input type='password' name='confirmpass'> <br />
    </p>

        Account type:
    <p>
       <form action="">
           
        <input type="radio" name="signin-charge" value="signin-charge">Signatory in-charge<br>
        Assigned signatory: <select>
            <option>OSS</option>
            <option>OCSC</option>
            <option>Evening College</option>
            <option>Library</option>
            <option>Guard Bugo</option>
         </select>
        <br />
        <input type="radio" name="sysadmin" value="sysadmin">System Administrator
        </form>
    
    </p>

    <p>
           Account Picture Preview: <img> <br />
        image file : <input type='file'> <br />
        <input type='Submit' value='Add Account'> &nbsp; <a href='settings.php?action=cancel'>Cancel</a>
    </p>

</form></center>