<script>
    function changeSignatory(){
    if(document.getElementById("stud_status1").checked == true){ var stud_status = "Under Graduate";
    }else{ var stud_status = "Graduate"; }

    document.getElementById("sign_name").innerHTML = "";
    var select = document.getElementById("sign_name");
    select.options[select.options.length] = new Option("");

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

<div class="row">
    <div class="span3">

        <!-- Navigations-->
        <div class="row">
            <div class="span3">
                {call name=nav_admin index=0}
            </div>
        </div>

    </div>
    <div class="span9">
        <!-- Header-->
        <h2 class="well center-text">Add Signatory in-Charge</h2>

        <form method='post' class="form-horizontal">
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

                    {if !isset($signatories)}
                        {assign var=signatories value=["OCSC", "OSS", "CTLC", "ICLC"]}
                    {/if}

                    <select id="sign_name" name="sign_name" required>
                        <option></option>
                        {foreach from=$ug_signatories item=signatory key=pk}
                            <option>{$signatory}</option>
                        {/foreach}
                    </select>


                    {*
                    <input type="text" id="sign_name" required name="sign_name" autocomplete="off" class="input-large" data-provide="typeahead" data-source='[
                    {foreach from=$ug_signatories key=k item=signatory}
                    {if $ug_signatories|@count - 1 eq $k}
                    "{$signatory}"
                    {else}
                    "{$signatory}",
                    {/if}
                    {/foreach}
                    ]'>
                    *}
                </div>
            </div>

            <div class="form-actions control-group">
                <div class="pull-right">
                    <input class="btn btn-primary" type='Submit' value='Register' name='Register'>
                    <button class="btn" onclick="window.location.href='index.php?user_type=Signatory'">Back</button>
                </div>
            </div>
        </form>
    </div>
</div>

{*
<form method='post' class="form-horizontal">
<h2><legend>Adding Signatory In-Charge: </legend></h2>
{literal}
<legend>Login Information: </legend>

<div class="control-group">
<label class="control-label">Username: </label>
<div class="controls">
<input type ='text' name='uname' value="" maxlength="15" pattern="[0-9a-zA-Z]{7,32}" required title="Letters and numbers only">

</div>
</div>

<div class="control-group">
<label class="control-label">Password: </label>
<div class="controls">

<input id="password_entered" type='password' name='newpass' pattern="[0-9a-zA-Z]{7,32}" title="Password minimum of 7 characters" required>

</div>
</div>

<div class="control-group">
<label class="control-label">Re-type Password: </label>
<div class="controls">
<input id="retyped_password_entered" type='password' name='confirmpass' pattern="[0-9a-zA-Z]{7,50}" onblur="checkPasswordEquality()" required>
</div>
</div>

<legend>Personal Information: </legend>

<div class="control-group">
<label class="control-label">Surname: </label>
<div class="controls">
<input type ='text' name='surname' value="" pattern="[A-Za-z\s]{2,15}" required title="Letters and spaces only">
</div>
</div>

<div class="control-group">
<label class="control-label">First Name: </label>
<div class="controls">
<input type='text' name='firstname' value="" pattern="[A-Za-z\s]{2,15}" required title="Letters and spaces only">
</div>
</div>

<div class="control-group">
<label class="control-label">Middle Name: </label>
<div class="controls">
<input type='text'name='middleName' value="" pattern="[A-Za-z\s]{2,15}" required title="Letters and spaces only">
</div>
</div>
{/literal}

<legend>Signatory Designation: </legend>

<div class="control-group">
<label class="control-label">Signatory: </label>
<div class="controls">

{if !isset($signatories)}
{assign var=signatories value=["OCSC", "OSS", "CTLC", "ICLC"]}
{/if}

<select name="sign_name" required>
<option></option>
{foreach from=$signatories item=signatory key=pk}
<option value="{$signatory_keys[$pk]}">{$signatory}</option>
{/foreach}
</select>
</div>
</div>

<div class="control-group">
<div class="controls">
<input class="btn btn-primary" type='Submit' value='Register' name='Register'>
<a href='/SOCS/index.php'> Cancel</a>
</div>
</div>
</form>
*}