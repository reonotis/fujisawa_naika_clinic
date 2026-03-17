import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {

    /**
     * ヒーロー画像スライドショー（2秒ごとに切り替え）
     */
    var slides = document.querySelectorAll('.hero-slideshow .hero-slide');
    if (slides.length === 0) return;

    var index = 0;

    function showNext() {
        slides[index].classList.remove('active');
        index = (index + 1) % slides.length;
        slides[index].classList.add('active');
    }

    slides[0].classList.add('active');
    setInterval(showNext, 6000);

});
