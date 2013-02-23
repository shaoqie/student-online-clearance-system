<script>
    function newOptions(){
    var select = document.getElementById("sign_name");
    var hide = document.getElementById("hide").value;
    var flag = document.getElementById("flag").value;
    var count = 0;
    var temp = 0;
    if(select.value == "---------Next--------"){ 
    var holder = flag == 1 ? parseInt(hide) + 20 : parseInt(hide) + 10;
    select.innerHTML = "";
    {foreach from = $ug_signatories item = i}
            if(count >= (holder - 10) && count <  holder){
            select.options[select.options.length] = new Option("{$i}");  temp = count + 1;
        }
        count ++;
    {/foreach} 
        select.options[select.options.length] = new Option("---------Back--------");
        if(temp % 10 == 0){
        select.options[select.options.length] = new Option("---------Next--------");
    }
        
    document.getElementById("hide").value = holder;
    document.getElementById("flag").value = "0";
    }else if(select.value == "---------Back--------"){


    var holder = parseInt(flag) == 0 ? parseInt(hide) - 20 : parseInt(hide) - 10;
    select.innerHTML = "";

        {foreach from = $ug_signatories item = i}
            if(count >= holder && count <  holder + 10){
                select.options[select.options.length] = new Option("{$i}");  
            }
            count ++;
        {/foreach} 

    if(parseInt(holder) != 0){
        select.options[select.options.length] = new Option("---------Back--------"); 
    }
    select.options[select.options.length] = new Option("---------Next--------");

    document.getElementById("hide").value = holder;
    document.getElementById("flag").value = "1";
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

            <div class="control-group">
                <label class="control-label"><b>Signatory: </b></label>
                <div class="controls">

                    {if !isset($signatories)}
                        {assign var=signatories value=["OCSC", "OSS", "CTLC", "ICLC"]}
                    {/if}

                    <select id="sign_name" name="sign_name" required onchange="newOptions()">
                        {foreach from=$ug_signatories item=signatory key=pk}
                        {if $count < 10}<option>{$signatory}</option>{/if}
                        {assign var=count value=$count + 1}
                    {/foreach}
                    <option>---------Next--------</option>
                </select>
                <input type=hidden id="hide" value="10">
                <input type=hidden id="flag" value="0">


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