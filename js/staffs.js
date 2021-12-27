/**
 * 
 */
function validate() {
    var staffname = document.getElementById("staffname").value;
    var password = document.getElementById("password").value;
    var age = document.getElementById("age").value;
    var address = document.getElementById("address").value;
    var mobileno = document.getElementById("mobileno").value;
    var emailid = document.getElementById("emailid").value;
    var designation = document.getElementById("designation").value;

    if (staffname == "") {
        alert("Enter  StaffName");
        return false;
    }

    var numbers = /^[0-9]+$/;
    if (staffname.match(numbers))
    {
        alert("Enter Valid Name");
        return false;
    }

    if (password == "") {
        alert("Enter Password");
        return false;
    }

    if (age == "") {
        alert("Enter Age");
        return false;
    }

    if (isNaN(age))
    {
        alert("Enter Valid Age in Numbers");
        return false;
    }

    if (address == "") {
        alert("Enter Address");
        return false;
    }

    if (designation == "") {
        alert("Select Designation");
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

    if (emailid == "") {
        alert("Enter EmailID");
        return false;
    }

    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (reg.test(emailid) == false)
    {
        alert('Invalid Email Address');
        return false;
    }


    return true;
}
