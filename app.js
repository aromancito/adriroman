function toggleDescription(button) {
    const project = button.parentElement;
    project.classList.toggle('open');
}
function closeDescription(closebutton) {
    const project = closebutton.closest('.myproject');
    project.classList.remove('open');
}

function toggleMenu() {
    var menu = document.querySelector('.nav-menu');
    menu.classList.toggle('active');
}
function closeMenu() {
    var menu = document.querySelector('.nav-menu');
    menu.classList.remove('active');
}