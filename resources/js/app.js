import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {

    /**
     * ヒーロー画像スライドショー（2秒ごとに切り替え）
     */
    var slides = document.querySelectorAll('.hero-slideshow .hero-slide');

    if (slides.length > 0) {
        var index = 0;

        function showNext() {
            slides[index].classList.remove('active');
            index = (index + 1) % slides.length;
            slides[index].classList.add('active');
        }

        slides[0].classList.add('active');
        setInterval(showNext, 6000);
    }

    /**
     * スクロール時のセクション表示アニメーション
     */
    var sections = document.querySelectorAll('main > section:not(.hero-slideshow)');
    if (sections.length === 0) return;

    var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) {
        sections.forEach(function (section) {
            section.classList.add('is-visible');
        });
        return;
    }

    sections.forEach(function (section) {
        section.classList.add('reveal-section');
    });

    var observer = new IntersectionObserver(
        function (entries, currentObserver) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    currentObserver.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.18,
            rootMargin: '0px 0px -8% 0px',
        },
    );

    sections.forEach(function (section) {
        observer.observe(section);
    });

});
