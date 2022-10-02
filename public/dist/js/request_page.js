var type = document.getElementById('type');
var first = document.getElementById('first');
var toggle = document.getElementById('toggle');
var second = document.getElementById('second');
var fname = document.getElementById('fname');
var email = document.getElementById('email');
var nameerror = document.getElementById('nameerror')
var emailerror = document.getElementById('emailerror')
var firstInput = document.getElementById('Mname')
var Mnameerror = document.getElementById('Mnameerror');


function chooseType() {
    if (type.value === "null") {
        fname.disabled = "true";
        email.disabled = "true";
        toggle.style.display = "none";
        nameerror.style.display = 'none';
        emailerror.style.display = 'none';
        Mnameerror.style.display = "none"



    }
    if (type.value === "1") {
        fname.disabled = false;
        email.disabled = false;
        toggle.style.display = "block";
        first.innerHTML = "Movies Name";
        second.innerHTML = "Why do you request this movie?";
        nameerror.style.display = 'none';
        emailerror.style.display = 'none';
        Mnameerror.style.display = "none"
    } else if (type.value === "2") {
        fname.disabled = false;
        email.disabled = false;
        toggle.style.display = "block";
        first.innerHTML = "Products Name";
        second.innerHTML = "About your Ads?";
        nameerror.style.display = 'none';
        emailerror.style.display = 'none';
        Mnameerror.style.display = "none"
    } else if (type.value === "3") {
        fname.disabled = false;
        email.disabled = false;
        toggle.style.display = "none";
        // first.innerHTML = "Ads Name"
        second.innerHTML = "What do you want to suggest?";
        nameerror.style.display = 'none';
        emailerror.style.display = 'none';
        Mnameerror.style.display = "none"
    } else if (type.value === "4") {
        fname.disabled = false;
        email.disabled = false;
        toggle.style.display = "none";
        // first.innerHTML = "Ads Name"
        second.innerHTML = "What's on your mind?"
        nameerror.style.display = 'none';
        emailerror.style.display = 'none';
        Mnameerror.style.display = "none"
    }

}
