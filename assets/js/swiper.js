// import function to register Swiper custom elements
import { register } from 'swiper/element/bundle';
// register Swiper custom elements
register();

const swiperEl = document.querySelector('swiper-container');
const buttonEl = document.querySelector('button');

buttonEl.addEventListener('click', () => {
    swiperEl.swiper.slideNext();
});
