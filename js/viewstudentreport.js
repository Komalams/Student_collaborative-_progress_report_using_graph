function iachange()
{    
    var ia = document.getElementById("iatype");
    
    var target = "viewstudentreport.php";
    if (ia.value != "") {
        target += "?iatype=" + ia.value + "#subjectform";
    }
    window.location.href = target;
}

