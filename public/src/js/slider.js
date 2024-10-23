const slider = document.getElementById('slider');
let index = 0;

function slide() {

    const slides = slider.children.length;

    index = (index + 1) % slides;
    const translateX = -index * 100;

    slider.style.transform = `translateX(${translateX}%)`;
}


setInterval(slide, 4000);
