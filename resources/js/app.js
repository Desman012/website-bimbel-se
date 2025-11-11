import './bootstrap';
import '../css/app.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

let currentSlide = 0;
const sections = document.querySelectorAll('.form-section');
const nextBtns = document.querySelectorAll('.next-btn');
const prevBtns = document.querySelectorAll('.prev-btn');

function showSection(index) {
  sections.forEach((section, i) => {
    section.style.transform = `translateX(${100 * (i - index)}%)`;
  });
}

nextBtns.forEach(btn => btn.addEventListener('click', () => {
  if (currentSlide < sections.length - 1) currentSlide++;
  showSection(currentSlide);
}));

prevBtns.forEach(btn => btn.addEventListener('click', () => {
  if (currentSlide > 0) currentSlide--;
  showSection(currentSlide);
}));

showSection(0);
