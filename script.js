// script.js
const navLinks = document.querySelectorAll('nav a');
const sections = document.querySelectorAll('section');

navLinks.forEach((link) => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        const targetSection = document.querySelector(`#${link.href.split('#')[1]}`);
        targetSection.scrollIntoView({ behavior: 'smooth' });
    });
});

sections.forEach((section) => {
    section.addEventListener('scroll', () => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.offsetHeight;
        const windowTop = window.scrollY;
        const windowHeight = window.innerHeight;

        if (windowTop + windowHeight > sectionTop && windowTop + windowHeight < sectionTop + sectionHeight) {
            section.classList.add('active');
        } else {
            section.classList.remove('active');
        }
    });
});

const contactForm = document.querySelector('.contact-form form');

contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    // Here, you can add your logic to send the form data to a server or email
    console.log('Form submitted:', { name, email, message });
    contactForm.reset();
});