const menu = document.querySelector('.menu-item');
const menuBtn = document.querySelector('.burger-btn');

const body = document.body;

if (menu && menuBtn) {
  menuBtn.addEventListener('click', () => {
    menu.classList.toggle('active');
    menuBtn.classList.toggle('active');
    body.classList.toggle('lock');
  })
}