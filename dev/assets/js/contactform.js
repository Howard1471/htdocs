

$(document).ready(function(){
    //Document ready for the whole dashboard


    //control handles for all the dash panels
    var contactSendBtn = document.getElementById('newsItemInsertButton');


    //Insert news Item
    $(contactSendBtn).click(function(){
        //get all the items from the form
        var contactName = document.getElementById('contactName').value;
        var contactEmail = document.getElementById('contactEmail').value;
        var contactSubject = document.getElementById('contactSubject').value;
        var contactMessage = document.getElementById('contactMessage').value;


        var postString = "contactName=" + contactName
            + "&contactEmail=" + contactEmail
            + "&contactSubject=" + contactSubject
            + "&contactMessage=" + contactMessage;
        //alert("outgoing URL:\r\n" + "vm/insertNewsItem.php" + postString);

        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "vm/email_contact_form.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(postString);

        // clear the form input data
        document.getElementById('contactName').value = "";
        document.getElementById('contactEmail').value = "";
        document.getElementById('contactSubject').value = "";
        document.getElementById('contactMessage').value = "";

    });

});