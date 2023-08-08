function noLogout() {
    document.getElementById("logoutModal").style.display="none";
}

 function logoutModal() {
    document.getElementById("logoutModal").style.display="block";
}


function editDetails() {
    document.getElementById("detailDiv").style.display="none";
    document.getElementById("editButton").style.display="none";
    document.getElementById("editDiv").style.display="block";
    document.getElementById("saveButton").style.display="block";
    document.getElementById("cancelButton").style.display="block";
}
function cancelEdit(){
        document.getElementById("detailDiv").style.display="block";
        document.getElementById("editButton").style.display="block";
        document.getElementById("editDiv").style.display="none";
        document.getElementById("saveButton").style.display="none";
        document.getElementById("cancelButton").style.display="none";
}