document.addEventListener('DOMContentLoaded', function() {
  var header = document.querySelector('header'); // Замените 'header' на ваш селектор
  var headerHeight = header.offsetHeight; // Высота хедера

  window.addEventListener('scroll', function() {
    if (window.pageYOffset > headerHeight) {
      header.classList.add('bg'); // 'your-class' - класс, который нужно добавить
    } else {
      header.classList.remove('bg');
    }
  });
});