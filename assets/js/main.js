const menuButton = document.getElementById('menu-toggle');
const mobileMenu = document.getElementById('mobile-menu');
const menuClose = document.getElementById('menu-close');
const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');

if (menuButton && mobileMenu && mobileMenuOverlay) {
  const setMenuState = (isOpen) => {
    menuButton.setAttribute('aria-expanded', String(isOpen));
    mobileMenu.classList.toggle('open', isOpen);
    mobileMenuOverlay.classList.toggle('open', isOpen);
    document.body.classList.toggle('menu-open', isOpen);
  };

  menuButton.addEventListener('click', () => {
    const isOpen = menuButton.getAttribute('aria-expanded') === 'true';
    setMenuState(!isOpen);
  });

  if (menuClose) {
    menuClose.addEventListener('click', () => setMenuState(false));
  }

  mobileMenuOverlay.addEventListener('click', () => setMenuState(false));

  mobileMenu.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => setMenuState(false));
  });

  window.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
      setMenuState(false);
    }
  });

  window.addEventListener('resize', () => {
    if (window.innerWidth >= 761) {
      setMenuState(false);
    }
  });
}

const form = document.querySelector('.appointment-form[data-whatsapp-form="true"]');
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

const appointmentConfig = window.appointmentAvailabilityConfig || null;
const appointmentApiForm = document.getElementById('appointment-api-form');
const dateInput = document.getElementById('form-date');
const dateValueInput = document.getElementById('form-date-value');
const slotSelect = document.getElementById('slot-time');
const slotState = document.getElementById('slot-loading-state');
const slotError = document.getElementById('slot-error');
const submitLabel = document.getElementById('appointment-submit-label');
const appointmentToast = document.getElementById('appointment-toast');

if (
  appointmentConfig &&
  appointmentApiForm instanceof HTMLFormElement &&
  dateInput instanceof HTMLInputElement &&
  dateValueInput instanceof HTMLInputElement &&
  slotSelect instanceof HTMLSelectElement &&
  slotState instanceof HTMLElement &&
  slotError instanceof HTMLElement
) {
  const setToast = (message, isError = false) => {
    if (!appointmentToast) return;
    appointmentToast.textContent = message;
    appointmentToast.style.background = isError ? '#ffe9ec' : '#eafcf7';
    appointmentToast.style.border = `1px solid ${isError ? '#f3b6c0' : '#b6eadc'}`;
    appointmentToast.style.color = isError ? '#8d1d2c' : '#0b5d49';
    appointmentToast.style.pointerEvents = 'auto';
    appointmentToast.style.opacity = '1';
    window.clearTimeout(window.__appointmentToastTimer__);
    window.__appointmentToastTimer__ = window.setTimeout(() => {
      appointmentToast.style.opacity = '0';
      appointmentToast.style.pointerEvents = 'none';
    }, 3600);
  };

  const setLoading = (loading) => {
    const submitButton = appointmentApiForm.querySelector('button[type="submit"]');
    if (!(submitButton instanceof HTMLButtonElement)) return;
    submitButton.disabled = loading;
    if (submitLabel) {
      submitLabel.textContent = loading ? 'Submitting...' : 'Submit Request';
    }
  };

  const resetSlotOptions = (placeholder) => {
    slotSelect.innerHTML = '';
    const option = document.createElement('option');
    option.value = '';
    option.textContent = placeholder;
    slotSelect.appendChild(option);
    slotSelect.value = '';
  };

  const renderSlots = (payload) => {
    resetSlotOptions('Select an available slot');
    slotState.textContent = `${payload.summary.available} of ${payload.summary.total} slots available for selected date.`;

    payload.slots.forEach((slot) => {
      const option = document.createElement('option');
      option.value = slot.label;
      if (slot.available) {
        option.textContent = `${slot.label} (Available)`;
      } else if (slot.booked) {
        option.textContent = `${slot.label} (Booked)`;
        option.disabled = true;
      } else {
        option.textContent = `${slot.label} (Unavailable)`;
        option.disabled = true;
      }
      slotSelect.appendChild(option);
    });
  };

  const fetchAvailability = async (dateValue) => {
    slotError.classList.add('hidden');
    slotState.textContent = 'Loading slots for selected date...';
    resetSlotOptions('Loading slots...');
    slotSelect.disabled = true;

    try {
      const res = await fetch(`${appointmentConfig.endpoint}?date=${encodeURIComponent(dateValue)}`);
      const payload = await res.json();
      if (!res.ok || !payload.ok) {
        throw new Error(payload.error || 'Unable to load slots.');
      }
      slotSelect.disabled = false;
      renderSlots(payload);
    } catch (error) {
      slotState.textContent = 'Could not load availability.';
      resetSlotOptions('No slots available');
      slotError.textContent = error instanceof Error ? error.message : 'Unable to load slots.';
      slotError.classList.remove('hidden');
    }
  };

  dateInput.addEventListener('change', () => {
    const selected = dateInput.value.trim();
    dateValueInput.value = selected;
    if (!selected) {
      slotSelect.disabled = true;
      resetSlotOptions('Select a date first');
      slotState.textContent = 'Pick a date to load available time slots.';
      return;
    }
    fetchAvailability(selected);
  });

  const initialDate = appointmentConfig.initialDate || '';
  if (initialDate) {
    dateInput.value = initialDate;
    dateValueInput.value = initialDate;
    fetchAvailability(initialDate);
  }

  appointmentApiForm.addEventListener('submit', async (event) => {
    event.preventDefault();

    const payload = {
      full_name: (document.getElementById('name')?.value || '').trim(),
      phone_number: (document.getElementById('phone')?.value || '').trim(),
      appointment_date: dateValueInput.value.trim(),
      appointment_time_slot: slotSelect.value.trim(),
      service_needed: (document.getElementById('service')?.value || 'General Checkup').trim(),
      additional_notes: (document.getElementById('message')?.value || '').trim()
    };
    const selectedDoctor = (document.getElementById('doctor')?.value || '').trim();
    if (selectedDoctor) {
      payload.additional_notes = payload.additional_notes
        ? `Doctor Preference: ${selectedDoctor}\n${payload.additional_notes}`
        : `Doctor Preference: ${selectedDoctor}`;
    }

    if (!payload.full_name || !payload.phone_number || !payload.appointment_date || !payload.appointment_time_slot) {
      setToast('Please complete your details, choose a date, and select an available time slot.', true);
      return;
    }

    setLoading(true);
    try {
      const res = await fetch(appointmentConfig.requestEndpoint, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          Accept: 'application/json'
        },
        body: JSON.stringify(payload)
      });
      const result = await res.json();
      if (!res.ok || !result.ok) {
        throw new Error(result.error || 'Unable to submit appointment request right now.');
      }
      setToast("Appointment request submitted. You'll receive a confirmation shortly.");
      appointmentApiForm.reset();
      if (initialDate) {
        dateInput.value = initialDate;
        dateValueInput.value = initialDate;
        fetchAvailability(initialDate);
      } else {
        slotSelect.disabled = true;
        resetSlotOptions('Select a date first');
        slotState.textContent = 'Pick a date to load available time slots.';
      }
    } catch (error) {
      setToast(error instanceof Error ? error.message : 'Unable to submit appointment request right now.', true);
    } finally {
      setLoading(false);
    }
  });
}

const galleryLightbox = document.getElementById('gallery-lightbox');
const galleryLightboxImage = document.getElementById('gallery-lightbox-image');
const galleryLightboxClose = document.getElementById('gallery-lightbox-close');
const galleryOpenButtons = document.querySelectorAll('[data-gallery-open]');

if (
  galleryLightbox instanceof HTMLElement &&
  galleryLightboxImage instanceof HTMLImageElement &&
  galleryOpenButtons.length > 0
) {
  const closeLightbox = () => {
    galleryLightbox.classList.add('hidden');
    galleryLightboxImage.src = '';
    galleryLightboxImage.alt = '';
    document.body.classList.remove('menu-open');
  };

  galleryOpenButtons.forEach((button) => {
    button.addEventListener('click', () => {
      const imageSrc = button.getAttribute('data-gallery-open') || '';
      const imageAlt = button.getAttribute('data-gallery-alt') || 'Clinic image';
      if (!imageSrc) return;
      galleryLightboxImage.src = imageSrc;
      galleryLightboxImage.alt = imageAlt;
      galleryLightbox.classList.remove('hidden');
      document.body.classList.add('menu-open');
    });
  });

  galleryLightbox.addEventListener('click', (event) => {
    if (event.target === galleryLightbox) {
      closeLightbox();
    }
  });

  if (galleryLightboxClose instanceof HTMLElement) {
    galleryLightboxClose.addEventListener('click', closeLightbox);
  }

  window.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && !galleryLightbox.classList.contains('hidden')) {
      closeLightbox();
    }
  });
}

const revealItems = document.querySelectorAll('[data-reveal]');
if (revealItems.length > 0) {
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (reduceMotion || !('IntersectionObserver' in window)) {
    revealItems.forEach((item) => item.classList.add('is-revealed'));
  } else {
    const revealObserver = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          entry.target.classList.add('is-revealed');
          observer.unobserve(entry.target);
        });
      },
      { threshold: 0.15, rootMargin: '0px 0px -20px 0px' }
    );

    revealItems.forEach((item, index) => {
      item.style.transitionDelay = `${Math.min(index * 60, 220)}ms`;
      revealObserver.observe(item);
    });
  }
}
