const toggleMenu = document.querySelector('#toggle');
const menu = document.querySelector('#menu');

toggleMenu.addEventListener('click', function () {
  const open = JSON.parse(toggleMenu.getAttribute('aria-expanded'));
  toggleMenu.setAttribute('aria-expanded', !open);
  menu.hidden = !menu.hidden;

});

const toggleSubMenu = document.querySelector('#categories')
const subMenu = document.querySelector('#categories-sub')

toggleSubMenu.addEventListener('keydown', function () {
  const open = JSON.parse(toggleSubMenu.getAttribute('aria-expanded'));
  toggleSubMenu.setAttribute('aria-expanded', !open);
  subMenu.hidden = !subMenu.hidden;
  subMenu.classList.add('flex');
})