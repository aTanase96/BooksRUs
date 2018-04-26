function ValidateOrder() {

    var digits = "0123456789";
    var temp;

    if (document.order1.orderbook1.value === "none") {

        alert("Please select at least one book!")
        return false
    }

    if (document.order1.ordername.value === "") {

        alert("Please enter a name!");
        return false
    }

    if (document.order1.orderphone.value === "") {

        alert("Please enter a valid phone number!");
        return false
    }

    if (document.order1.orderemail.value === "") {

        alert("Please enter an email address!");
        return false
    }

    if (document.order1.orderunitnr.value === "") {

        alert("Please enter a valid unit number!")
        return false
    }

    if (document.order1.orderstreet.value === "") {

        alert("Please enter a valid address!")
        return false
    }

    if (document.order1.ordercity.value === "") {

        alert("Please enter a city!")
        return false
    }

    if (document.order1.orderzip.value === "") {

        alert("Please enter a valid postal code!")
        return false
    }


    if (document.order1.ordercardname.value === "") {

        alert("Please enter the cardholders name!")
        return false
    }

    if (document.order1.ordercardnr.value === "") {

        alert("Please enter a valid card number!")
        return false
    }

    if (document.order1.ordercvc.value === "") {

        alert("Please enter a valid CVC!")
        return false
    }


    for (var i = 0; i < document.order1.orderphone.value.length; i++) {
        temp = document.order1.orderphone.value.substring(i, i + 1);
        if (digits.indexOf(temp) == -1) {

            alert("Enter a valid card number !");
            return false
        }
    }

    for (var i = 0; i < document.order1.ordercardnr.value.length; i++) {
        temp = document.order1.ordercardnr.value.substring(i, i + 1);
        if (digits.indexOf(temp) == -1) {

            alert("Enter a valid card number !");
            return false
        }
    }

    for (var i = 0; i < document.order1.orderzip.value.length; i++) {
        temp = document.order1.orderzip.value.substring(i, i + 1);
        if (digits.indexOf(temp) == -1) {

            alert("Enter a valid postal code !");
            return false
        }
    }

    for (var i = 0; i < document.order1.ordercvc.value.length; i++) {
        temp = document.order1.ordercvc.value.substring(i, i + 1);
        if (digits.indexOf(temp) == -1) {

            alert("Enter a valid CVC number !");
            return false
        }
    }

    return true;
} //This is validation for the order form

function ValidateContact() {


    if (document.contact1.contactname.value === "") {

        alert("Please enter a name!")
        return false
    }

    if (document.contact1.contactemail.value === "") {

        alert("Please enter an email!")
        return false
    }

    if (document.contact1.contactsubject.value === "") {

        alert("Please enter a subject!")
        return false
    }

    if (document.contact1.contactmessage.value === "") {

        alert("Please enter a message!")
        return false
    }

    return true
} //This is validation for the contact form
