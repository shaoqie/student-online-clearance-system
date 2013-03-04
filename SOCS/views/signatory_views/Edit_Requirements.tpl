<script>
    //var select = document.getElementById("req_appliesTo").value;
    //alert(select);
    
    function change_req_appliesTo(){
    //var select = document.getElementById("req_appliesTo").value;
        
    var x = document.getElementById("req_appliesTo").selectedIndex;
    var select = document.getElementById("req_appliesTo").options;
        
    var SelectedIndex = select[x].index;
        
    $(document).ready(function(){
    $("#selected_Dept").hide();
    $("#selected_Course").hide();
    $("#selected_YearLevel").hide();
    $("#selected_Program").hide();
        
    if(parseInt(SelectedIndex) == 1){ $("#selected_Dept").show(); 
}else if(parseInt(SelectedIndex) == 2){ $("#selected_Course").show();
}else if(parseInt(SelectedIndex) == 3){ $("#selected_YearLevel").show();
}else if(parseInt(SelectedIndex) == 4){ $("#selected_Program").show();
}  
}); 
}
    
function change_reqType(){
var x = document.getElementById("requirement_type").selectedIndex;
var select = document.getElementById  ("requirement_type").options;
        
var SelectedIndex = select[x].index;
        
$(document).ready(function(){
if(parseInt(SelectedIndex) == 1){ $("#Sign").show(); 
}else { $("#Sign").hide();
}  
}); 
}


function newOptions(finder){
var select = finder == 0 ? document.getElementById("sign_name") : document.getElementById("course_name");
var hide = finder == 0 ? document.getElementById("hide").value : document.getElementById("course_hide").value;
var flag = finder == 0 ? document.getElementById("flag").value : document.getElementById("course_flag").value;
    
var hide_temp = finder == 0 ? document.getElementById("hide") : document.getElementById("course_hide");
var flag_temp = finder == 0 ? document.getElementById("flag"): document.getElementById("course_flag");
    
var newAssignArray = finder == 0 ? newAssignArray = getSignList() : getCourseList();
    
var count = 0;
var temp = 0;
    
if(select.value == "---------Next--------"){ 
var holder = flag == 1 ? parseInt(hide) + 20 : parseInt(hide) + 10;
select.innerHTML = "";

for(var x = 0; x < newAssignArray.length; x ++){
if(count >= (holder - 10) && count <  holder){
select.options[select.options.length] = new Option(newAssignArray[x][0],newAssignArray[x][1]);  temp = count + 1;
}
count ++;
}     
    
//alert(newAssignArray.length % temp);
       
//if(!((newAssignArray.length % temp) == 0 && (temp % 10) > 0)){
//if(!(newAssignArray.length == temp && (temp % 10) == 0)){
select.options[select.options.length] = new Option("---------Back--------");
//}
if(!((newAssignArray.length == temp))){
select.options[select.options.length] = new Option("---------Next--------");
}
//}
        
hide_temp.value = holder;
flag_temp.value = "0";
}else if(select.value == "---------Back--------"){
    
    
var holder = parseInt(flag) == 0 ? parseInt(hide) - 20 : parseInt(hide) - 10;
select.innerHTML = "";
for(var x = 0; x < newAssignArray.length; x ++){
if(count >= holder && count <  holder + 10){
select.options[select.options.length] = new Option(newAssignArray[x][0],newAssignArray[x][1]);  
}
count ++;
}

if(parseInt(holder) != 0){
select.options[select.options.length] = new Option("---------Back--------"); 
}
select.options[select.options.length] = new Option("---------Next--------");

hide_temp.value = holder;
flag_temp.value = "1";
}
}

function getSignList(){
var this_val = new Array();
    
    {assign var=index value=0}
    {foreach from = $listOfSignatory item = i}
this_val[{$index}] = new Array(2);
this_val[{$index}][0] = "{$i}";
this_val[{$index}][1] = {$listOfSignatoryID[$index]};
        {assign var=index value=$index + 1}
    {/foreach}
    
return this_val;
}

function getCourseList(){
var this_val = new Array();
    
    {assign var=index value=0}
    {foreach from = $listOfCourse_UnderSign item = i}
this_val[{$index}] = new Array(2);
this_val[{$index}][0] = "{$i}";
this_val[{$index}][1] = {$listOfCourse_UnderSignID[$index]};
        {assign var=index value=$index + 1}
    {/foreach}
    
return this_val;    
}
</script>

<div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Requirements</h4>

        <!-- Navigations-->
        <div class="row">
            <div class="span3">
                {call name=nav_signatory index=2}
            </div>
        </div>

    </div>
    <div class="span9">

        <!-- Header-->
        <h4 class="well center-text well-small">Edit Requirement</h4>

        <!--Archive Search Bar -->
        <form method='post' class="form-horizontal" action="requirements.php?action=viewEdit_Requirements_submit&id={$req_RequirementID}">

            <legend>Edit Requirement</legend>
            <div class="control-group">
                <label class="control-label"><b>Title: </b></label>
                <div class="controls">
                    <input required class="span5" type ='text' name='requirement_title' value='{$req_Title}'>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><b>Description: </b></label>
                <div class="controls">
                    <textarea required class="span5" name='requirement_description' rows="5" cols="50">{$req_Description}</textarea>
                </div>    
            </div>

            <div class="control-group">
                <label class="control-label"><b>Requirement Type: </b></label>
                <div class="controls">
                    <select id="requirement_type" name="requirement_type" class="select2 input-xlarge" onchange="change_reqType()">
                        <option{if $req_Type eq 'Textual'} selected{/if}>Textual</option>
                        <option{if $req_Type eq 'Prerequisite'} selected{/if}>Prerequisite</option>
                    </select>
                </div>    
            </div>

            <div class="control-group">
                <label class="control-label"><b>School Year: </b></label>
                <div class="controls">
                    <select id="school_year" name="school_year" class="select2 input-xlarge">
                        {foreach from = $mySchool_Year key = k item = i}
                            {if $req_SY eq $i}
                                <option selected>{$i}</option>
                            {else}
                                <option>{$i}</option>
                            {/if}
                        {/foreach}
                    </select>
                    {*{literal}<input type="text" maxlength="9" pattern="[0-9\-]{9}" {/literal}  id="school_year" name="school_year" value="{$req_SY}" autocomplete="off" class="span3" data-provide="typeahead" data-source='[
                    {foreach from=$mySchool_Year key=k item=year}
                    {if $mySchool_Year|@count - 1 eq $k}
                    "{$year}"
                    {else}
                    "{$year}",
                    {/if}
                    {/foreach}
                    ]'>
                 
                 
                    <select id="school_year" name="school_year" class="input-large">
                    {foreach from = $mySchool_Year key = k item = i}
                    {if $currentSchool_Year eq $i}
                    <option selected>{$i}</option>
                    {else}
                    <option>{$i}</option>
                    {/if}
                    {/foreach}
                    </select>
                    *}
                </div>
            </div>

            <div class="control-group">
                <label class="control-label"><b>Semester: </b></label>
                <div class="controls">
                    <select id="semester" name="semester" class="select2 input-xlarge">
                        <option{if $req_Semester eq 'First'} selected{/if}>First</option>
                        <option{if $req_Semester eq 'Second'} selected{/if}>Second</option>
                        <option{if $req_Semester eq 'Summer'} selected{/if}>Summer</option>           
                    </select>
                </div>
            </div>

            <div class="control-group" id="Sign" {if $req_Type eq 'Textual'}hidden{/if}>
                <label class="control-label"><b>Select Signatory: </b></label>
                <div class="controls">
                    {assign var=index value=0}
                    <select id="sign_name" name="signatory" class="select2 input-xlarge" >
                        {foreach from = $listOfSignatory key = k item = i}
                            <option value="{$listOfSignatoryID[$index]}" {if $req_PrereqSignatory eq $listOfSignatoryID[$index]} selected {/if}>{$listOfSignatory[$index]}</option>
                            {assign var=index value=$index + 1}
                        {/foreach}
                    </select>

                    {*<input type=hidden id="hide" value="10">
                    <input type=hidden id="flag" value="0">*}
                </div>    
            </div>    

            <legend>This Requirements applies to...</legend>

            <div class="control-group">
                <label class="control-label"><b> Select: </b></label>
                <div class="controls">
                    <select id="req_appliesTo" name="req_appliesTo" class="select2 input-xlarge" onchange="change_req_appliesTo()">
                        <option value="All" {if $req_Visibility eq 'All'} selected{/if}>All Students:</option>
                        <option value="By Department" {if $req_Visibility eq 'By Department'} selected{/if}>Students from the following department:</option>
                        <option value="By Course" {if $req_Visibility eq 'By Course'} selected{/if}>Students from the following course:</option>
                        <option value="By Year Level" {if $req_Visibility eq 'By Year Level'} selected{/if}>Students from a particular level:</option>
                        <option value="By Program" {if $req_Visibility eq 'By Program'} selected{/if}>Students from a particular program:</option>
                    </select>
                </div>    
            </div>  

            <div class="control-group" id="selected_Dept" 
                 {if $req_Visibility eq 'All' or 
                     $req_Visibility eq 'By Course' or
                     $req_Visibility eq 'By Year Level' or
                     $req_Visibility eq 'By Program'
                 } 
                 hidden
                 {/if}
                     >

                     <label class="control-label"><b> Departments: </b></label>
                     <div class="controls">
                         <select name="Departments" class="select2 input-xlarge">   
                             {foreach from = $listOfDepartments key = k item = i}
                                 <option value="{$listOfDepartmentsID[$k]}" {if $req_Department eq $listOfDepartmentsID[$k]}selected{/if}>{$listOfDepartments[$k]}</option>
                             {/foreach}
                         </select>
                     </div>    
                 </div>

                 <div class="control-group" id="selected_Course"  
                      {if $req_Visibility eq 'All' or 
                     $req_Visibility eq 'By Department' or
                     $req_Visibility eq 'By Year Level' or
                     $req_Visibility eq 'By Program'
                      } 
                      hidden
                      {/if}
                          >
                          <label class="control-label"><b> Courses: </b></label>
                          {*<option value="{$req_Course}">{$req_Course_Name}</option>*}
                          <div class="controls">  
                              {assign var=index value=0}
                              <select id="course_name" name="Courses" class="select2 input-xlarge" onchange="">   
                                  {foreach from = $listOfCourse_UnderSign key = k item = i}
                                      <option value="{$listOfCourse_UnderSignID[$k]}" {if $req_Course eq $listOfCourse_UnderSignID[$k]}selected {/if}>{$listOfCourse_UnderSign[$k]}</option>
                                      {assign var=index value=$index + 1}
                                  {/foreach}
                                  {*<option>---------Next--------</option>*}
                              </select>
                              {*<input type=hidden id="course_hide" value="10">
                              <input type=hidden id="course_flag" value="0">*}
                          </div>    
                      </div>

                      <div class="control-group" id="selected_YearLevel"  
                           {if $req_Visibility eq 'All' or 
                     $req_Visibility eq 'By Course' or
                     $req_Visibility eq 'By Department' or
                     $req_Visibility eq 'By Program'
                           } 
                           hidden
                           {/if}
                               >
                               <label class="control-label"><b> Year level: </b></label>
                               <div class="controls">
                                   <select name="Year_level" class="select2 input-xlarge">   
                                       <option {if $req_YearLevel eq 'First Year'}selected{/if}>First Year</option>
                                       <option {if $req_YearLevel eq 'Second Year'}selected{/if}>Second Year</option>
                                       <option {if $req_YearLevel eq 'Third Year'}selected{/if}>Third Year</option>
                                       <option {if $req_YearLevel eq 'Fourth Year'}selected{/if}>Fourth Year</option>
                                       <option {if $req_YearLevel eq 'Fifth Year'}selected{/if}>Fifth Year</option>
                                   </select>
                               </div>    
                           </div>

                           <div class="control-group" id="selected_Program"  
                                {if $req_Visibility eq 'All' or 
                     $req_Visibility eq 'By Course' or
                     $req_Visibility eq 'By Year Level' or
                     $req_Visibility eq 'By Department'
                                } 
                                hidden
                                {/if}
                                    >
                                    <label class="control-label"><b> Program: </b></label>
                                    <div class="controls">
                                        <select name="Program" class="select2 input-xlarge">   
                                            <option {if $req_Program eq 'Day'}selected{/if}>Day</option>
                                            <option {if $req_Program eq 'Evening'}selected{/if}>Evening</option>
                                        </select>
                                    </div>    
                                </div>


                                <!--
                                <div class="row">
                                <div class="control-group offset1">
                                <div class="control-group">
                                <label class="control-label">Description: </label>
                                <div class="controls">
                                <textarea class="span5" name='requirement_description' rows="5" cols="50"></textarea>
                                </div>    
                                
                                
                                
                                <!--
                                <label> <input type="radio" id="example_radio1" name="radioA" /><b> All Students</label>
                                
                                <label><input type="radio" id="example_radio2" name="radioA" /> <b>Students from the following department:</label>
                                <label class="offset1">
                                Department: <select id="" class="input-medium">
                                <option>Institute of Computing</option>
                                </select>
                                </label>
                                
                                <label><input type="radio" id="example_radio3" name="radioA" /> <b>Students from the following course:</label>
                                <label class="offset1">
                                Course:<select id="" class="input-medium">
                                <option>BSIT</option>
                                </select>
                                </label> 
                                
                                <label><input type="radio" id="example_radio4" name="radioA" /> <b>Students from a particular level:</label>
                                <label class="offset1">
                                Year level: <select id="" class="input-medium">
                                <option>4th year</option>
                                </select>
                                </label>
                                
                                <label><input type="radio" id="example_radio5" name="radioA" /> <b>Students from a particular program:</label>
                                <label class="offset1">
                                Year level: <select id="" class="input-medium">
                                <option>Day</option>
                                <option>Evening</option>
                                </select>
                                </label>
                                
                                
                                
                                </div>  
                                </div>   
                                -->
                                <div class="form-actions control-group">
                                    <div class="pull-right">
                                        <input class="btn btn-primary" type='Submit' value='Save' name="Save">
                                        <button class="btn" type="button" onclick="window.location.href='../signatory/requirements.php'">Back</button> 
                                    </div>
                                </div>
                           </form>
                      </div>
                 </div>

                 {*
                 <!-- Back Button-->
                 <button class="pull-right btn" onclick="window.location.href='../signatory/requirements.php'">Back</button> 
                 
                 <!-- Navigation Tabs-->
                 <ul class="nav nav-tabs">
                 <li><a href='../signatory/index.php'>Student</a></li>       
                 <li><a href='../signatory/bulletin.php'>Bulletin</a></li>
                 <li class="active"><a href='../signatory/requirements.php'>Requirements</a></li>         
                 </ul>
                 
                 <!--Archive Search Bar -->
                 <form method='post' class="form-horizontal" action="requirements.php?action=viewAdd_Requirements_submit">
                 <div class="form-inline">
                 <label >School Year:  </label>
                 <select id="school_year" name="school_year" class="input-large">
                 {foreach from = $mySchool_Year key = k item = i}
                 {if $currentSchool_Year eq $i}
                 <option selected>{$i}</option>
                 {else}
                 <option>{$i}</option>
                 {/if}
                 {/foreach}
                 </select>
                 
                 <label>Semester: </label>
                 <select id="semester" name="semester" class="input-large">
                 {if $currentSemester eq 'First'}
                 <option selected>First</option>
                 <option>Second</option>
                 <option>Summer</option>
                 {elseif $currentSemester eq 'Second'}
                 <option>First</option>
                 <option selected>Second</option>
                 <option>Summer</option>
                 {else}
                 <option>First</option>
                 <option>Second</option>
                 <option selected>Summer</option>
                 {/if}           
                 </select>
                 </div>
                 
                 <legend>Add Requirement:</legend>
                 <div class="control-group">
                 <label class="control-label">Title: </label>
                 <div class="controls">
                 <input class="span5" type ='text' name='requirement_title'>
                 </div>
                 </div>
                 <div class="control-group">
                 <label class="control-label">Description: </label>
                 <div class="controls">
                 <textarea class="span5" name='requirement_description' rows="5" cols="50"></textarea>
                 </div>    
                 </div>
                 
                 <div class="control-group">
                 <label class="control-label">Requirement Type: </label>
                 <div class="controls">
                 <select id="requirement_type" name="requirement_type" class="input-large" onchange="change_reqType()">
                 <option>Textual</option>
                 <option>Prerequisite</option>
                 </select>
                 </div>    
                 </div>
                 
                 <div class="control-group" id="Sign" hidden>
                 <label class="control-label">Select Signatory: </label>
                 <div class="controls">
                 <select name="signatory" class="input-large">
                 {foreach from = $listOfSignatory key = k item = i}
                 {if $thisSignatory != $listOfSignatory[$k]}
                 <option value="{$listOfSignatoryID[$k]}">{$listOfSignatory[$k]}</option>
                 {/if}
                 {/foreach}
                 </select>
                 </div>    
                 </div>    
                 
                 <legend>This Requirements applies to...</legend>
                 
                 
                 <div class="control-group">
                 <label class="control-label"> Select: </label>
                 <div class="controls">
                 <select id="req_appliesTo" name="req_appliesTo" class="input-xlarge" onchange="change_req_appliesTo()">
                 <option value="All">All Students:</option>
                 <option value="By Department">Students from the following department:</option>
                 <option value="By Course">Students from the following course:</option>
                 <option value="By Year Level">Students from a particular level:</option>
                 <option value="By Program">Students from a particular program:</option>
                 </select>
                 </div>    
                 </div>  
                 
                 <div class="control-group" id="selected_Dept" hidden>
                 <label class="control-label" id> Departments: </label>
                 <div class="controls">
                 <select name="Departments" class="input-xlarge">   
                 {foreach from = $listOfDepartments key = k item = i}
                 <option value="{$listOfDepartmentsID[$k]}">{$listOfDepartments[$k]}</option>
                 {/foreach}
                 </select>
                 </div>    
                 </div>
                 
                 <div class="control-group" id="selected_Course" hidden>
                 <label class="control-label" id> Courses: </label>
                 <div class="controls">
                 <select name="Courses" class="input-xlarge">   
                 {foreach from = $listOfCourse_UnderSign key = k item = i}
                 <option value="{$listOfCourse_UnderSignID[$k]}">{$listOfCourse_UnderSign[$k]}</option>
                 {/foreach}
                 </select>
                 </div>    
                 </div>
                 
                 <div class="control-group" id="selected_YearLevel" hidden>
                 <label class="control-label" id> Year level: </label>
                 <div class="controls">
                 <select name="Year_level" class="input-xlarge">   
                 <option>First Year</option>
                 <option>Second Year</option>
                 <option>Third Year</option>
                 <option>Fourth Year</option>
                 <option>Fifth Year</option>
                 </select>
                 </div>    
                 </div>
                 
                 <div class="control-group" id="selected_Program" hidden>
                 <label class="control-label" id> Program: </label>
                 <div class="controls">
                 <select name="Program" class="input-xlarge">   
                 <option>Day</option>
                 <option>Evening</option>
                 </select>
                 </div>    
                 </div>
                 
                 
                 <!--
                 <div class="row">
                 <div class="control-group offset1">
                 <div class="control-group">
                 <label class="control-label">Description: </label>
                 <div class="controls">
                 <textarea class="span5" name='requirement_description' rows="5" cols="50"></textarea>
                 </div>    
                 
                 
                 
                 <!--
                 <label> <input type="radio" id="example_radio1" name="radioA" /><b> All Students</label>
                 
                 <label><input type="radio" id="example_radio2" name="radioA" /> <b>Students from the following department:</label>
                 <label class="offset1">
                 Department: <select id="" class="input-medium">
                 <option>Institute of Computing</option>
                 </select>
                 </label>
                 
                 <label><input type="radio" id="example_radio3" name="radioA" /> <b>Students from the following course:</label>
                 <label class="offset1">
                 Course:<select id="" class="input-medium">
                 <option>BSIT</option>
                 </select>
                 </label> 
                 
                 <label><input type="radio" id="example_radio4" name="radioA" /> <b>Students from a particular level:</label>
                 <label class="offset1">
                 Year level: <select id="" class="input-medium">
                 <option>4th year</option>
                 </select>
                 </label>
                 
                 <label><input type="radio" id="example_radio5" name="radioA" /> <b>Students from a particular program:</label>
                 <label class="offset1">
                 Year level: <select id="" class="input-medium">
                 <option>Day</option>
                 <option>Evening</option>
                 </select>
                 </label>
                 
                 
                 
                 </div>  
                 </div>   
                 -->
                 <div class="control-group">
                 <div class="controls">
                 <input class="btn btn-primary" type='Submit' value='Add Requirement' name="Save">
                 </div>
                 </div>
                 </form>
                 *}