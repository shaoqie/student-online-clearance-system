/*
 *Main JS File
 */

$(document).ready(function() {

    $('.tips').tooltip();

    $('#clearance_status').progressbar({
        display_text: 1
    });

    $('.select2').select2();

    $('#socs-alert').modal('show');

});

/*
function check_clearance(num_cleared, num_dept, current_sy, current_sem, sy_sem_id, status) {

    var sy = $('#school_year').val();
    var sem = $('#semester').val();

    if (current_sy === sy && current_sem === sem && num_cleared === num_dept) {
        window.open("export1.php?sy_sem_id=" + sy_sem_id + "&status=" + status);
    } else {
        bootbox.alert('<div class=\'alert alert-info\'><i class=\'icon-info-sign\'></i> <strong>Oops!</strong> Must clear all signatories before can download the clearance form. You can only download ' + current_sy + ' ' + current_sem + ' Semester issued clearance</div>');
    }
}
*/

function set_input(id, name) {
    $("#hidden_input").html("<input type='hidden' name='oldSign_ID' value='" + id + "'>");
    $("#signatory_name").text(name);
}

function changeVisibility() {
    var visibility = parseInt(document.getElementById("sign_visibility").value);
    if (visibility === 0) {
        window.location.assign("../administrator/index.php?action=addSignatoryInCharge&used_for=UnderGrad");
    } else {
        window.location.assign("../administrator/index.php?action=addSignatoryInCharge&used_for=Grad");
    }
}

function signatorialList_visibility() {
    var visibility = parseInt(document.getElementById("visibility").value);
    if (visibility === 0) {
        window.location.assign("signatorialList.php");
    } else {
        window.location.assign("Grad_SignatorialList.php");
    }
}

function enterSearch(e) {
    if (e.keyCode === 13) {
        jumpToPageWithSchoolYear();
    }
}

function change_schoolYear(finder, sign_id, page) {
    var sy = document.getElementById("school_year").value;
    var sem = document.getElementById("semester").value;

    var sy_sem = sy + "@" + sem;

    var control = finder === 0 ? "viewMessages" : "viewRequirements";
    window.location.assign("?action=" + control + "&Tsign_ID=" + sign_id + "&page=" + page + "&sysem=" + sy_sem);
}

function jumpToPageWithSchoolYear() {
    //var sy = document.getElementById("school_year").options[document.getElementById("school_year").selectedIndex].text;
    var sy = document.getElementById("school_year").value;
    var sem = document.getElementById("semester").options[document.getElementById("semester").selectedIndex].text;

    var jump = document.getElementById("jump").value !== "--" ? document.getElementById("jump").value : 1;
    var search = document.getElementById("search").value;

    window.location.assign("?action=displayTable&filter=" + search + "&page=" + jump + "&sy=" + sy + "&sem=" + sem);
}

function jumpToPageMessages(finder, sign_id) {
    var jump = document.getElementById("jump_studMessages").value;
    change_schoolYear(finder, sign_id, jump);
}

function isCheck(rowCount) {
    var check = document.getElementById("check").checked;
    isCheckAll(check, rowCount);
}

function jumpToPage() {
    var jump = document.getElementById("jump").value;
    var search = document.getElementById("search").value;
    window.location.assign("?action=displayTable&filter=" + search + "&page=" + jump);
}

function jumpToPageUser(user_type) {
    var jump = document.getElementById("jump").value;
    var search = document.getElementById("search").value;
    window.location.assign("?action=displayTable&filter=" + search + "&page=" + jump + "&user_type=" + user_type);
}

function jumpToPageSignatory(status) {
    var jump = document.getElementById("jump").value;
    var search = document.getElementById("search").value;
    window.location.assign("?action=displayTable&filter=" + search + "&page=" + jump + "&finder=not&clearanceStatus=" + status);
}

function isCheckAll(isChecked, rowCount) {
    for (var i = 0; i <= rowCount; i++) {
        document.getElementById("" + i).checked = isChecked;
    }
}

function findCheck(rowCount, type) {
    if ($('.Checkbox:checked').length > 0) {

        bootbox.confirm("<div class='alert'><i class='icon-question-sign'></i> <strong>Warning!</strong> Attempting to delete " + $('.Checkbox:checked').length + " " + type + "/s, are you sure?</div>", function(result) {
            if (result === true) {
                var valueDeleted = "";
                for (var i = 0; i < rowCount; i++) {
                    if (document.getElementById("" + i).checked === true) {
                        valueDeleted += document.getElementById("" + i).value + "-";
                    }
                }
                window.location.assign("?action=delete&selected=" + valueDeleted);
            }
        });
    }
}

function findCheckUser(rowCount, type, user_type) {
    if ($('.Checkbox:checked').length > 0) {

        bootbox.confirm("<div class='alert'><i class='icon-question-sign'></i> <strong>Warning!</strong> Attempting to delete " + $('.Checkbox:checked').length + " " + type + "/s. Are you sure?</div>", function(result) {
            if (result === true) {
                var valueDeleted = "";
                for (var i = 0; i < rowCount; i++) {
                    if (document.getElementById("" + i).checked === true) {
                        valueDeleted += document.getElementById("" + i).value + "@";
                    }
                }
                window.location.assign("?action=delete&selected=" + valueDeleted + "&user_type=" + user_type);
            }
        });
    }
}


function confirmDelete(selected) {
    var bool = confirm("Are you sure you want delete?");

    if (bool === true) {
        window.location = "?action=delete&selected=" + selected;
    }
}

function checkPasswordEquality() {
    /*
     var pass = $("#password_entered").attr("value");
     var pass_2 = $("#retyped_password_entered").attr("value");
     
     if(pass != pass_2){
     bootbox.alert("Passwords does not matched!");
     }*/
}

function alert_box(msg) {
    bootbox.alert(msg);
}

/*=========== for registration purposes =======================*/

