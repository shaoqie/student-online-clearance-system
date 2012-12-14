<script>
    function aJaxStyle(){
        var accountType = document.getElementById("accountType").value
        var str = "";
        if(accountType == "Signatory In-Charge"){
                str = "<label class='control-label'> Assigned signatory: </label>";
                str += "<div class='controls'>";
                    str += "<select id='jump' class='input-large'>";
                        str += "<option>Default &nbsp:</option>";
                        {foreach from = $mySignatory item = i}
                            str += "<option>{$i}</option>";
                        {/foreach}
                    str += "</select>";
                str += "</div>";
        }
        
        document.getElementById("assignSign").innerHTML = str;
    }
</script>


<ul class="nav nav-tabs">
    <li class="active"><a href='../administrator/index.php'>User Accounts</a></li>
    <li><a href='../administrator/signatory_list_manager.php'>Signatories</a></li>
    <li><a href='../administrator/department_list_manager.php'>Departments</a></li>
</ul>

<button class="pull-right btn" onclick="window.location.href='index.php'">Back</button>

<form action="index.php?action=add_user" method='post' class="form-horizontal">
    <legend>Add Account:</legend>
    <div class="control-group">
        <label class="control-label">Username: </label>
        <div class="controls">
            <input type ='text' name='username'>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Surname: </label>
        <div class="controls">
            <input type ='text' name='surname'>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">First Name: </label>
        <div class="controls">
            <input type='text' name='firstname'>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Middle Name: </label>
        <div class="controls">
            <input type='text'name='middleName'>
        </div>
    </div>

    <legend>Account type: </legend> 
    <div class="control-group">
        <label class="control-label"> Account Type: </label>
        <div class="controls">
            <select class="input-large" id="accountType" onchange="aJaxStyle()">
                <option>Default &nbsp:</option>
                <option>System Administrator</option>
                <option>Signatory In-Charge</option>
            </select>
        </div>   
    </div>
    <div class="control-group" id="assignSign">
         
    </div>

    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit' value='Save'>
        </div>
    </div>
</form>