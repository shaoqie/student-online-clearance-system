/*
 *Main JS File
 */

/*
 * Administrator Script Functions
 */

function jumpToPageMessages(sign_id){
    var jump = document.getElementById("jump_studMessages").value;
    window.location.assign("?action=viewMessages&Tsign_ID=" +sign_id +"&page=" +jump);
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
        
function findCheck(rowCount){

    if($('.userCheckbox:checked').length > 0){
        var bool = confirm("Attempting to delete " + $('.userCheckbox:checked').length + " user/s. Are you sure?");
    
        if(bool == true){
            var valueDeleted = "";
            for(var i = 0; i < rowCount; i++){
                if(document.getElementById("" +i).checked == true){
                    valueDeleted += document.getElementById("" +i).value + "-";
                }
            }
            window.location.assign("?action=delete&selected=" + valueDeleted);
        }
    }
}

function confirmDelete(selected){
    var bool = confirm("Are you sure you want delete?");
    
    if(bool == true){
        window.location = "?action=delete&selected=" + selected;
    }
}