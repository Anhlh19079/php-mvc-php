const SignUp = document.getElementById('register');
const SignIn = document.getElementById('login');
const container = document.getElementById('containermd');
const modal = document.getElementById('modal');
SignUp.addEventListener('click', () => {
    container.classList.add('active');
});

SignIn.addEventListener('click', () => {
    container.classList.remove('active');
});

window.onclick = function(event) {
    var overlay = document.getElementById('overlay');

    if (event.target == overlay) {
        modal.style.display = 'none';
    }
};

const buttonform = document.getElementById('formlayout');
// buttonform.onmouseenter = function(event) {

//         var login = document.getElementById('linkform-login');
//         var register = document.getElementById('linkform-rgt');
//         if (event.target == buttonform || event.target == login || event.target == register) {
//             // var modal = document.getElementById('modal');
//             modal.style.display = 'flex';
//         }
//     }
// buttonform.onmouseleave = function(event) {

//     var login = document.getElementById('linkform-login');
//     var register = document.getElementById('linkform-rgt');
//     if (event.target == buttonform || event.target == login || event.target == register) {
//         // var modal = document.getElementById('modal');
//         modal.style.display = 'flex';
//     }
// }
buttonform.addEventListener('click', () => {
    modal.classList.add('appear');
});

function appear() {
    modal.style.display = 'flex';
}