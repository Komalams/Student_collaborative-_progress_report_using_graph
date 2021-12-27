function semchng() {
    var sem = document.getElementById("sem");
    var target = "viewstudents.php";
    if (sem.value != "") {
        target += "?sem=" + sem.value + "#subjectform";
    }
    window.location.href = target;
}