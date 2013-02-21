<script>
    function changeSignatory(){
    if(document.getElementById("stud_status1").checked == true){ var stud_status = "Under Graduate";
}else{ var stud_status = "Graduate"; }
        
document.getElementById("sign_name").innerHTML = "";
var select = document.getElementById("sign_name");

if(stud_status == "Graduate"){
    {foreach from=$g_signatories item=signatory key=pk}
        select.options[select.options.length] = new Option("{$signatory}");
    {/foreach}
}else{
    {foreach from=$ug_signatories item=signatory key=pk}
         select.options[select.options.length] = new Option("{$signatory}");       
    {/foreach}
}
        
}
</script>


<form method='post' class="form-horizontal" action="{$host}/signatory_registration.php?action=register" enctype="multipart/form-data">
    {literal}
        <legend>Login Information: </legend>

        <div class="control-group">
            <label class="control-label"><b>Username: </b></label>
            <div class="controls">
                <input type ='text' name='uname' value="" maxlength="15" pattern="[0-9a-zA-Z]{7,32}" required title="Letters and numbers only">

            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><b>Password: </b></label>
            <div class="controls">

                <input id="password_entered" type='password' name='newpass' pattern="[0-9a-zA-Z]{7,32}" title="Password minimum of 7 characters" required>

            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><b>Re-type Password: </b></label>
            <div class="controls">
                <input id="retyped_password_entered" type='password' name='confirmpass' pattern="[0-9a-zA-Z]{7,50}" onblur="checkPasswordEquality()" required>
            </div>
        </div>

        <legend>Personal Information: </legend>

        <div class="control-group">
            <label class="control-label"><b>Surname: </b></label>
            <div class="controls">
                <input type ='text' name='surname' value="" pattern="[A-Za-z\s]{2,15}" required title="Letters and spaces only">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><b>First Name: </b></label>
            <div class="controls">
                <input type='text' name='firstname' value="" pattern="[A-Za-z\s]{2,15}" required title="Letters and spaces only">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><b>Middle Name: </b></label>
            <div class="controls">
                <input type='text'name='middleName' value="" pattern="[A-Za-z\s]{1,15}" required title="Letters and spaces only">
            </div>
        </div>
    {/literal}
    <div class="control-group">
        <label class="control-label"><b>Email Address: </b></label>
        <div class="controls">
            <input type='text'name='emailAdd' value="" {literal}pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)"{/literal} required>
        </div>
    </div>

    <legend>Signatory Designation: </legend>

    <div class="control-group form-inline">
        <div class="controls form-inline">
            <input type="radio" checked name="sign_usability" id="stud_status1" onclick="changeSignatory()" value="Under Graduate"> <label><b>Under Graduate</b></label> &nbsp; &nbsp; &nbsp;
            <input type="radio" name="sign_usability" id="stud_status2" onclick="changeSignatory()" value="Graduate"> <label><b>Graduate </b></label>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label"><b>Signatory: </b></label>
        <div class="controls">
            <select id="sign_name" name="sign_name" required>
                <option></option>
                {foreach from=$ug_signatories item=signatory key=pk}
                    <option>{$signatory}</option>
                {/foreach}
            </select>

            {*
            <input type="text" required name="sign_name" autocomplete="off" class="input-large" data-provide="typeahead" data-source='[
            {foreach from=$signatories key=k item=signatory}
            {if $signatories|@count - 1 eq $k}
            "{$signatory}"
            {else}
            "{$signatory}",
            {/if}
            {/foreach}
            ]'>
            
            *}
        </div>
    </div>

    <legend>Personal Identification: </legend>

    <div class="control-group">
        <label class="control-label"><b>Upload Picture: </b></label>
        <div class="controls">
            <input type="file" name="photo">
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit' value='Register' name='Register'>
            <a href='/SOCS/index.php'> Cancel</a>
        </div>
    </div>
</form>