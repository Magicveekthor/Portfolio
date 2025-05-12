const body = document.body;
const sidebar = document.querySelector('.main-sidebar');
const openSidebar = document.querySelector('#openSidebar');
const closeSidebar = document.querySelector('#closeSidebar');
const toggleTheme = document.querySelector('.toggle-theme');
const light = toggleTheme.children[0];
const dark = toggleTheme.children[1];
const inputFields = document.querySelectorAll('.percentage p');

openSidebar.addEventListener('click', openSidebarFunction);
closeSidebar.addEventListener('click', closeSidebarFunction);
toggleTheme.addEventListener('click', changeTheme);

function openSidebarFunction() {
    sidebar.style.left = '0%';
}

function closeSidebarFunction() {
    sidebar.style.left = '-100%';
}

function changeTheme() {
    if (body.classList.contains('dark-mode')) {
        lightMode();
    } else if (!body.classList.contains('dark-mode')) {
        darkMode();
    }
}

if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
    darkMode();
}

function lightMode() {
    body.classList.remove('dark-mode');
    dark.classList.remove('active');
    light.classList.add('active');
}

function darkMode() {
    body.classList.add('dark-mode');
    light.classList.remove('active');
    dark.classList.add('active');
}

