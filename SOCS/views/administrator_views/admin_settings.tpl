    {$alert}
<form action='adminSettings.php?action=verify' method='post'>
    Edit Account:
    <p>Surname: <input type ='text' name='surname'> <br />
        First Name: <input type='text' name='firstname'> <br />
        Middle Name: <input type='text'name='middleName'> <br />
    </p>

    Change password:
    <p>
        Old password: <input type='password' name='oldpass'> <br />
        New password: <input type='password' name='newpass'> <br />
        Confirm new password: <input type='password' name='confirmpass'> <br />
    </p>

    Change Picture

    <p>
        Preview Picture : <img> <br />
        image file : <input type='file'> <br />
        <input type='Submit'> &nbsp; <a href='settings.php?action=cancel'>Cancel</a>
    </p>

</form>