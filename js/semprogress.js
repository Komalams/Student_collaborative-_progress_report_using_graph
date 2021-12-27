function semchng() {
    var sem = document.getElementById("sem");
    var target = "semprogress.php";
    if (sem.value != "") {
        target += "?sem=" + sem.value + "#subjectform";
    }
    window.location.href = target;
}

function onSubChange() {
    var sem = document.getElementById("sem").value;
    var subid = document.getElementById("subjectId").value;

    var target = "semprogress.php?sem=" + sem;
    if (subid != "") {
        target += "&subid=" + subid + "#subjectform";
    }
    window.location.href = target;
}


function iachange() {
    var sem = document.getElementById("sem").value;
    var subid = document.getElementById("subjectId").value;
    var ia = document.getElementById("iatype").value;

    var target = "semprogress.php?sem=" + sem;

    if (subid != "") {
        target += "&subid=" + subid ;
        if (ia != "") {
            target += "&ia=" + ia;
        }
    }
    window.location.href = target + "#subjectform";
}
