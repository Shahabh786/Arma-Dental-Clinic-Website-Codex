const menuButton = document.querySelector('.menu-toggle');
const siteNav = document.querySelector('.site-nav');

if (menuButton && siteNav) {
  menuButton.addEventListener('click', () => {
    const open = siteNav.classList.toggle('open');
    menuButton.setAttribute('aria-expanded', String(open));
  });

  siteNav.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => {
      siteNav.classList.remove('open');
      menuButton.setAttribute('aria-expanded', 'false');
    });
  });
}

const form = document.querySelector('.appointment-form');
if (form) {
  form.addEventListener('submit', (event) => {
    event.preventDefault();

    const name = form.querySelector('#name')?.value.trim();
    const phone = form.querySelector('#phone')?.value.trim();
    const service = form.querySelector('#service')?.value.trim();
    const note = form.querySelector('#note')?.value.trim();

    if (!name || !phone || !service) {
      return;
    }

    const message = [
      'Hi Arma Dental Clinic, I want to book an appointment.',
      `Name: ${name}`,
      `Phone: ${phone}`,
      `Treatment: ${service}`,
      note ? `Message: ${note}` : ''
    ]
      .filter(Boolean)
      .join('\n');

    const base = form.getAttribute('action') || '';
    const url = `${base}?text=${encodeURIComponent(message)}`;
    window.open(url, '_blank', 'noopener');
  });
}
