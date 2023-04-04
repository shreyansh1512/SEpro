const searchIcon = document.querySelector('.material-icons-outlined');
const searchBar = document.querySelector('.search-bar');
const closeIcon = document.querySelector('.close-icon');
const profileIcon = document.querySelector('.profile-icon');
const dropdownMenu = document.querySelector('.dropdown-menu');

profileIcon.addEventListener('click', () => {
  dropdownMenu.classList.toggle('active');
});

searchIcon.addEventListener('click', () => {
  searchBar.classList.toggle('active');
});


closeIcon.addEventListener('click', () => {
  searchBar.classList.remove('active');
});
