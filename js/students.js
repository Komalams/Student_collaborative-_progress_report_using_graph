function validate() {
    var regno = document.getElementById("regno").value;
    var studentname = document.getElementById("studentname").value;
    var dob = document.getElementById("dob").value;
    var parentname = document.getElementById("parentname").value;
    var parentemail = document.getElementById("parentemail").value;
    var sem = document.getElementById("sem").value;
    var emailid = document.getElementById("emailid").value;
    var address = document.getElementById("address").value;
    var mobileno = document.getElementById("mobileno").value;

    if (regno == "") {
        alert("Enter Student RegNumber");
        return false;
    }

    var numbers = /^[0-9]+$/;
    if (studentname.match(numbers))
    {
        alert("Enter Valid Name");
        return false;
    }


    if (studentname == "") {
        alert("Enter StudentNAme");
        return false;
    }

    if (dob == "") {
        alert("Enter Date of Birth");
        return false;
    }

    if (parentname == "") {
        alert("Enter ParentName");
        return false;
    }

    var numbers = /^[0-9]+$/;
    if (parentname.match(numbers))
    {
        alert("Enter Valid Name");
        return false;
    }

    if (parentemail == "") {
        alert("Enter ParentEmail");
        return false;
    }

    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (reg.test(parentemail) == false)
    {
        alert('Invalid Email Address');
        return false;
    }


    if (sem == "") {
        alert("Enter Semester");
        return false;
    }

    var numbers = /^[0-9]+$/;
    if (!sem.match(numbers))
    {
        alert("Semester should not be in Characters");
        return false;
    }



    if (emailid == "") {
        alert("Enter Student EmailID");
        return false;
    }

    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (reg.test(emailid) == false)
    {
        alert('Invalid Email Address');
        return false;
    }

    if (address == "") {
        alert("Enter Address");
        return false;
    }

    if (mobileno == "") {
        alert("Enter MobileNo");
        return false;
    }

    if (isNaN(mobileno))
    {
        alert("Enter Valid Mobile No");
        return false;
    }

     if (mobileno.length > 10)
    {
        alert("Mobile Should Not Exceed 10 numbers");
        return false;
    }
    return true;
}
