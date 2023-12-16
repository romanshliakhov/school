import Swiper from "../vendor/swiper";
import vars from "../_vars";

const {teamSections} = vars;


if (teamSections) {
  teamSections.forEach(function(item){
    const slider     = item.querySelector('.swiper-container');
    const sliderPrev = item.querySelector('.team-section__prev');
    const sliderNext = item.querySelector('.team-section__next');

    new Swiper(slider, {
      slidesPerView: 1,
      speed: 1000,
      spaceBetween: 70,
      observer: true,
      observeParents: true,
      // loop: true,
      // autoplay: {
      //   delay: 4000,
      // },
      navigation: {
        nextEl: sliderNext,
        prevEl: sliderPrev,
      },
      watchOverflow: true,

    });


    

    
  })
}











