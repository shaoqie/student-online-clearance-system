<script>  
    function getSignatory(){
        var cmdSignatory = document.getElementById("cmdSignatory").value;
        window.location.assign("?action=addSignatory&cmdSignatory=" +cmdSignatory);
    }
    
    function edit(idEdit, sign_id){     
        var listOfUnSelectSignatory =   "<select class='input-large' id='editSignatorialList'>"
                                            +"{foreach from = $SignatoryList item = i}"
                                                +"<option>{$i}</option>"
                                            +"{/foreach}"
                                        +"</select>";
        var editSignatorialList = "<input type='button' class='btn' value='Confirmed' id='save'> &nbsp; &nbsp; "
                                   + "<input type='button' class='btn' value='Cancel' id='cancel'>";
                
        $(document).ready(function(){
        
            $("#unSelectedSignatorialList" +idEdit).html(listOfUnSelectSignatory);                         
            $("#confirmed" +idEdit).html(editSignatorialList);        
        
        
            $("#save").click(function(){
                window.location.assign("?action=editSignatorialList&newSign_Name=" +$("#editSignatorialList").val() +"&oldSign_ID=" +sign_id);
            });
            $("#cancel").click(function(){
                $("#unSelectedSignatorialList" +idEdit).html($("#edit" +idEdit).val());
                $("#confirmed" +idEdit).html("");
            });
        });
    }
</script>

<h1><center>{$Dept_name}</center></h1>

<ul class="nav nav-tabs">
    <li><a href='../administrator/course_list_byDepartment.php'>Courses</a></li>
    <li class="active"><a href='../administrator/signatorialList.php'>Signatorial List</a></li>
</ul>
   
<form class="form-horizontal">
    <input type="hidden" value="filter" name="action">
    <input class="input-xxlarge" id="search" type="text" placeholder="Search..." value ="{$filter}" name="filterName">
    <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i></button>
    <div class="pull-right">   
        <label class="control-label">Choose Signatory:</label>
        <div class="controls">
            <select class='input-large' id="cmdSignatory">
                <option>Default &nbsp:</option>
                {foreach from = $SignatoryList item = i}
                    <option>{$i}</option>
                {/foreach}
            </select>
            <input class="btn" type="button" value="Add" onclick="getSignatory()">
            <input class="btn" type="button" value="Back" onclick="window.location.href='department_list_manager.php'"> 
        </div>
    </div>
</form>

<a href = "javascript:isCheckAll(true, {$rowCount_signatorial})" >Checked All</a> / 
<a href = "javascript:isCheckAll(false, {$rowCount_signatorial})" >Unchecked All</a>

<table class="table table-hover">     
    <tr>
        <th><p class="pull-left">Controls</p></th>
        <th> Signatories</th>       
    </tr>
{foreach from = $myName_signatorial key = k item = i} 
    <tr>
        <td style="width:400px">
            <div class="pull-left">
                <input type="hidden" id = 'edit{$k}' value = "{$i}">
                <input type="checkbox" id = '{$k}' value = {$myKey_signatorial[$k]} ></input> &nbsp; &nbsp;
                <i class="icon-pencil"></i><a style="cursor:pointer;" href="javascript:edit('{$k}','{$myKey_signatorial[$k]}')"> Edit</a>&nbsp; &nbsp; 
                <i class="icon-remove"></i><a style="cursor:pointer;" onclick="confirmDelete('{$myKey_signatorial[$k]}')"> Delete</a>
            </div>          
        </td>
        <td><p id='unSelectedSignatorialList{$k}'>{$i}</p></td>
        <td><p id="confirmed{$k}"></p></td>
    </tr>
{/foreach}
</table>

<a style="cursor:pointer;" onclick="findCheck('{$rowCount_signatorial}')" >Delete Selected</a>

<div class="pull-right">
    Jump to: <select id="jump" class="input-mini" onchange="jumpToPage()">
        <option>--</option>
        {for $start = 1 to $signatorial_length}
        <option>{$start}</option>
        {/for}
    </select>
</div>

