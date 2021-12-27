function onDelete(){
	return confirm("Are you sure want to delete?");
}
function semchange() {
	var sem = document.getElementById("sem").value;
	var target = "managestaffmarks.php";
	
	if (sem != "") {
		target += "?sem=" + sem;
	}
	window.location.href = target + "#content_box";
}


function iachange()
{
	if (document.getElementById("sem").value == "") {
		window.location.href = "managestaffmarks.php";
	} else if (document.getElementById("subject").value == "") {
			//alert("aaaaaa");
			window.location.href = "managestaffmarks.php?sem="
					+ document.getElementById("sem").value;
		} else {
			if (document.getElementById("iatype").value == "") {
				window.location.href = "managestaffmarks.php?sem="
						+ document.getElementById("sem").value + "&subject="
						+ document.getElementById("subject").value;
			}
			else {
					window.location.href = "managestaffmarks.php?sem="
							+ document.getElementById("sem").value
							+ "&subject="
							+ document.getElementById("subject").value
							+ "&iatype="
							+ document.getElementById("iatype").value;
			}
		}
}

function regchange() {
	if (document.getElementById("sem").value == "") {
		window.location.href = "managestaffmarks.php";
	} else {
		if (document.getElementById("subject").value == "") {
			window.location.href = "managestaffmarks.php?sem="
					+ document.getElementById("sem").value;
		} else {
			if (document.getElementById("iatype").value == "") {
				window.location.href = "managestaffmarks.php?sem="
						+ document.getElementById("sem").value + "&subject="
						+ document.getElementById("subject").value;
			} else {
				if (document.getElementById("regno").value == "") {
					window.location.href = "managestaffmarks.php?sem="
							+ document.getElementById("sem").value
							+ "&subject="
							+ document.getElementById("subject").value
							+ "&iatype="
							+ document.getElementById("iatype").value;
				} else {
					window.location.href = "managestaffmarks.php?sem="
							+ document.getElementById("sem").value
							+ "&subject="
							+ document.getElementById("subject").value
							+ "&iatype="
							+ document.getElementById("iatype").value
							+ "&regno="
							+ document.getElementById("regno").value;
				}

			}

		}
	}
}

function validate() {
	var sem = document.getElementById("sem").value;
	var sub = document.getElementById("subject").value;
	var iatype = document.getElementById("iatype").value;
	var studentname = document.getElementById("regno").value;
	var marks = document.getElementById("marks").value;

	if (sem == "") {
		alert("Enter Semester");
		return false;
	}
	if (sub == "") {
		alert("Enter Subject");
		return false;
	}
	if (iatype == "") {
		alert("Enter IA Type");
		return false;
	}
	if (studentname == "") {
		alert("Enter Studentname");
		return false;
	}
	if (marks == "") {
		alert("Enter Marks");
		return false;
	}
	return true;
}