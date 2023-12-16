// Подключение плавной прокрутки к якорям
// https://github.com/cferdinandi/smooth-scroll
import SmoothScroll from 'smooth-scroll';
const scroll = new SmoothScroll('a[href*="#"]', {
  speed: 800,
  offset: 50
});



