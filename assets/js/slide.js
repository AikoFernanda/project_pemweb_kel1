const slider = document.querySelector('.slider');
const dots = document.querySelectorAll('.slider-dot');
let currentIndex = 0;

function showSlide(index) {
    slider.style.transform = `translateX(-${index * 100}%)`;
    dots.forEach(dot => dot.classList.remove('active'));
    dots[index].classList.add('active');
}

dots.forEach(dot => {
    dot.addEventListener('click', () => {
        const index = parseInt(dot.getAttribute('data-index'));
        currentIndex = index;
        showSlide(index);
    });
});

setInterval(() => {
    currentIndex = (currentIndex + 1) % dots.length;
    showSlide(currentIndex);
}, 5000); // slide ganti setiap 5 detik