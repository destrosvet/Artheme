/**
 * Replace string in particular mailpoet page
 */
$(document).ready(function () {
    document.body.innerHTML = document.body.innerHTML.replace('Need to change your email address? Unsubscribe here, then simply sign up again.', 'Chcete změnit svoji emailovou adresu? Odhlašte se na této stránce a pak se s novou adresou přihlašte.');
    document.body.innerHTML = document.body.innerHTML.replace('First name', 'Jméno');
    document.body.innerHTML = document.body.innerHTML.replace('Last name', 'Příjmení');
    document.body.innerHTML = document.body.innerHTML.replace('Status', 'Stav');
    document.body.innerHTML = document.body.innerHTML.replace('Your lists', 'Váš list');
    document.body.innerHTML = document.body.innerHTML.replace('Edit your profile', 'Nastavit profil');
    document.body.innerHTML = document.body.innerHTML.replace('to update your email.', 'pro upravení emailu.');
    document.body.innerHTML = document.body.innerHTML.replace('Subscribed', 'Přihlášen');
    document.body.innerHTML = document.body.innerHTML.replace('Unsubscribed', 'Odhlášen');
    document.body.innerHTML = document.body.innerHTML.replace('Save', 'Uložit');

});