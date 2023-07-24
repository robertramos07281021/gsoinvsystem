



function editForm(){
    document.getElementById("saveForm").style.display="flex";
    document.querySelector("#changePass").style.display = "flex";
    document.getElementById("editButton").hidden = true;
    document.getElementById("firstName").disabled = false;
    document.getElementById("lastName").disabled = false;
    document.getElementById("email").disabled = false;
    document.getElementById("mobileNum").disabled = false;
    document.getElementById("address").disabled = false;
    document.getElementById("userName").disabled = false;
    document.getElementById("role").disabled = false;
    document.getElementById("department").disabled = false;
   
}


function cancelButton(){
    document.getElementById("saveForm").style.display="none";   
    document.getElementById("changePass").style.display="none";   
    document.getElementById("editButton").hidden = false;
    document.getElementById("firstName").disabled = true;
    document.getElementById("lastName").disabled = true;
    document.getElementById("email").disabled = true;
    document.getElementById("mobileNum").disabled = true;
    document.getElementById("address").disabled = true;
    document.getElementById("userName").disabled = true;
    document.getElementById("role").disabled = true;
    document.getElementById("department").disabled = true;
 }

