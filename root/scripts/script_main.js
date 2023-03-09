var ssFunButton = document.querySelector('.ssFunButton');

ssFunButton.addEventListener('click', function(event) {
  event.preventDefault();
  window.scrollTo({
    top: 0,
    left: 0,
    behavior: 'smooth'
  });
});
