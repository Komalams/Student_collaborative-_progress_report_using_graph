/**
 * 
 */

function validate() {
    var sem = document.getElementById("sem").value;
    var subject = document.getElementById("subject").value;

    if (sem == "") {
        alert("Select Semester");
        return false;
    }

    if (subject == "") {
        alert("Enter SubjectName");
        return false;
    }
    return true;
}

function validateup() {

    var subject = document.getElementById("subject_up").value;
    if (subject == "") {
        alert("Enter SubjectName");
        return false;
    }
    return true;
}

function semchng() {
    var sem = document.getElementById("sem");
    var target = "managesubjects.php";
    if (sem.value != "") {
        target += "?sem=" + sem.value + "#subjectform";
    }
    window.location.href = target;
}