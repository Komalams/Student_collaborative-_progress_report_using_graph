/**
 * 
 */
function validate() {
	var sem = document.getElementById("sem").value;
	var sub = document.getElementById("subjectId").value;
	var staff = document.getElementById("staffId").value;

	if (sem == "") {
		alert("Select Semester");
		return false;
	}
	if (sub == "") {
		alert("Select Subject");
		return false;
	}
	if (staff == "") {
		alert("Select staff");
		return false;
	}
	return true;
}

function semchng() {
	var sem = document.getElementById("sem");
	var target = "managesublect.php";
	if (sem.value != "") {
		target += "?sem=" + sem.value + "#subjectform";
	}
	window.location.href = target;
}

function onSubChange() {
	var sem = document.getElementById("sem").value;
	var subid = document.getElementById("subjectId").value;
	var target = "managesublect.php?sem=" + sem;
	if (subid != "") {
		target += "&subid=" + subid + "#subjectform" ;
	}
	window.location.href = target;
}