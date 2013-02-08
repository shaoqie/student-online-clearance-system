/*
 *Main JS File
 */

/*
 * Administrator Script Functions
 */

function enterSearch(e){
    if(e.keyCode == 13){
        jumpToPageWithSchoolYear();
    }
}

function change_schoolYear(finder, sign_id, page){
    var sy = document.getElementById("school_year").value;
    var sem = document.getElementById("semester").value;
        
    var sy_sem = sy +"@" +sem;
    
    var control = finder == 0 ? "viewMessages" : "viewRequirements";
    window.location.assign("?action=" +control +"&Tsign_ID=" +sign_id +"&page=" +page + "&sysem=" +sy_sem);
}

function jumpToPageWithSchoolYear(){
    var sy = document.getElementById("school_year").options[document.getElementById("school_year").selectedIndex].text;
    var sem = document.getElementById("semester").options[document.getElementById("semester").selectedIndex].text;
    
    var jump = document.getElementById("jump").value != "--"? document.getElementById("jump").value : 1;
    var search = document.getElementById("search").value;
     
    window.location.assign("?action=displayTable&filter=" + search +"&page=" + jump +"&sy=" +sy +"&sem=" +sem);
}

function jumpToPageMessages(finder, sign_id){
    var jump = document.getElementById("jump_studMessages").value;
    change_schoolYear(finder, sign_id, jump);
} 

function isCheck(rowCount){
    var check = document.getElementById("check").checked;
    isCheckAll(check, rowCount)
}

function jumpToPage(){   
    var jump = document.getElementById("jump").value;
    var search = document.getElementById("search").value;
    window.location.assign("?action=displayTable&filter=" + search +"&page=" + jump);
} 

function jumpToPageUser(user_type){   
    var jump = document.getElementById("jump").value;
    var search = document.getElementById("search").value;
    window.location.assign("?action=displayTable&filter=" + search +"&page=" + jump +"&user_type=" +user_type);
}

function jumpToPageSignatory(status){
    var jump = document.getElementById("jump").value;
    var search = document.getElementById("search").value;
    window.location.assign("?action=displayTable&filter=" + search +"&page=" + jump +"&finder=not&clearanceStatus=" +status);
}
        
function isCheckAll(isChecked, rowCount){
    for(var i = 0; i <= rowCount; i++){
        document.getElementById("" +i).checked = isChecked;
    }
}
        
function findCheck(rowCount, type){
    if($('.Checkbox:checked').length > 0){
        
        bootbox.confirm("<strong>Attempting to delete " + $('.Checkbox:checked').length + " " +type +"/s. Are you sure?</strong>", function(result) {
            if(result == true){
                var valueDeleted = "";
                for(var i = 0; i < rowCount; i++){
                    if(document.getElementById("" +i).checked == true){
                        valueDeleted += document.getElementById("" +i).value + "-";
                    }
                }
                window.location.assign("?action=delete&selected=" + valueDeleted);
            }
        });
    }
}

function findCheckUser(rowCount, type, user_type){
    if($('.Checkbox:checked').length > 0){
        
        bootbox.confirm("<strong>Attempting to delete " + $('.Checkbox:checked').length + " " +type +"/s. Are you sure?</strong>", function(result) {
            if(result == true){
                var valueDeleted = "";
                for(var i = 0; i < rowCount; i++){
                    if(document.getElementById("" +i).checked == true){
                        valueDeleted += document.getElementById("" +i).value + "@";
                    }
                }
                window.location.assign("?action=delete&selected=" + valueDeleted +"&user_type=" +user_type);
            }
        });
    }
}


function confirmDelete(selected){
    var bool = confirm("Are you sure you want delete?");
    
    if(bool == true){
        window.location = "?action=delete&selected=" + selected;
    }
}

function checkPasswordEquality(){
/*
    var pass = $("#password_entered").attr("value");
    var pass_2 = $("#retyped_password_entered").attr("value");
    
    if(pass != pass_2){
        bootbox.alert("Passwords does not matched!");
    }*/
}

function alert_box(msg){
    bootbox.alert(msg)
}

/*=========== for registration purposes =======================*/

