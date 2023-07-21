


function editForm(){

   document.getElementById("saveButton").style.display="inline";
   document.getElementById("cancelButton").style.display="inline";
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
    document.getElementById("saveButton").style.display="none";
    document.getElementById("cancelButton").style.display="none";
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

