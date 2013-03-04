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

<form method='post' class="form-horizontal" action="{$host}/signatory_registration.php?action=register" enctype="multipart/form-data">
    {literal}
        <legend>Login Information: </legend>

        <div class="control-group">
            <label class="control-label"><b>Username: </b></label>
            <div class="controls">
                <input type ='text' name='uname' value="" maxlength="15" pattern="[0-9a-zA-Z]{4,32}" required title="Letters and numbers only.">
            
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><b>Password: </b></label>
            <div class="controls">

                <input id="password_entered" type='password' name='newpass' pattern=".{4,32}" title="Minimum 4 characters" required> 
                
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><b>Re-type Password: </b></label>
            <div class="controls">
                <input id="retyped_password_entered" type='password' name='confirmpass' pattern=".{4,32}" onblur="checkPasswordEquality()" required>
            </div>
        </div>

        <legend>Personal Information: </legend>

        <div class="control-group">
            <label class="control-label"><b>Surname: </b></label>
            <div class="controls">
                <input type ='text' name='surname' {/literal}{if isset($s_name)} value="{$s_name}" {/if}{literal} pattern="[A-Za-z\s\-]{2,32}" required title="Letters and spaces only">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><b>First Name: </b></label>
            <div class="controls">
                <input type='text' name='firstname' {/literal}{if isset($f_name)} value="{$f_name}" {/if}{literal} pattern="[A-Za-z\s\.\-]{2,32}" required title="Letters and spaces only">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><b>Middle Initial: </b></label>
            <div class="controls">
                <input type='text'name='middleName' maxlength="1" {/literal}{if isset($m_name)} value="{$m_name}" {/if}{literal} pattern="[A-Z\s]{1,32}" required title="Letters and spaces only">
            </div>
        </div>

    <div class="control-group">
        <label class="control-label"><b>Email Address: </b></label>
        <div class="controls">
            <input type='text'name='emailAdd' {/literal}{if isset($e_add)} value="{$e_add}" {/if}{literal} pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)"{/literal} required>
        </div>
    </div>

    <legend>Signatory Designation: </legend>

    <div class="control-group">
        <label class="control-label"><b>Signatory: </b></label>
        <div class="controls">
            {assign var=count value=0}
            <select id="sign_name" name="sign_name" class="select2 input-large" required onchange="">
                {foreach from=$ug_signatories item=signatory key=pk}
                    <option>{$signatory}</option>
                    {assign var=count value=$count + 1}
                {/foreach}
                {*<option>---------Next--------</option>*}
            </select>
            {*<input type=hidden id="hide" value="10">
            <input type=hidden id="flag" value="0">*}

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