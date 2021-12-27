function semchng() {
    var sem = document.getElementById("sem");
    var target = "viewprogress.php";
    if (sem.value != "") {
        target += "?sem=" + sem.value + "#subjectform";
    }
    window.location.href = target;
}

function iachange()
{
    if (document.getElementById("sem").value == "") {
        window.location.href = "viewprogress.php";
    } else if (document.getElementById("iatype").value == "") {
        //alert("aaaaaa");
        window.location.href = "viewprogress.php?sem="
                + document.getElementById("sem").value;
    } else {
        window.location.href = "viewprogress.php?sem="
                + document.getElementById("sem").value
                + "&iatype="
                + document.getElementById("iatype").value;
    }
}



