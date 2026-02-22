document.addEventListener("DOMContentLoaded", () => {
    const menuToggle = document.getElementById("menu-toggle");
    const mobileMenu = document.getElementById("mobile-menu");
    const menuClose = document.getElementById("menu-close");
    const mobileMenuOverlay = document.getElementById("mobile-menu-overlay");

    if (menuToggle && mobileMenu && mobileMenuOverlay) {
        const setMenuState = (isOpen) => {
            menuToggle.setAttribute("aria-expanded", String(isOpen));
            mobileMenu.classList.toggle("translate-x-full", !isOpen);
            mobileMenuOverlay.classList.toggle("opacity-0", !isOpen);
            mobileMenuOverlay.classList.toggle("pointer-events-none", !isOpen);
            document.body.classList.toggle("overflow-hidden", isOpen);
        };

        menuToggle.addEventListener("click", () => {
            const isOpen = menuToggle.getAttribute("aria-expanded") === "true";
            setMenuState(!isOpen);
        });

        if (menuClose) {
            menuClose.addEventListener("click", () => setMenuState(false));
        }

        mobileMenuOverlay.addEventListener("click", () => setMenuState(false));

        mobileMenu.querySelectorAll("a").forEach((link) => {
            link.addEventListener("click", () => setMenuState(false));
        });

        window.addEventListener("keydown", (event) => {
            if (event.key === "Escape") {
                setMenuState(false);
            }
        });

        window.addEventListener("resize", () => {
            if (window.innerWidth >= 768) {
                setMenuState(false);
            }
        });
    }

    const navTabs = document.querySelector(".nav-tabs");
    if (navTabs instanceof HTMLElement) {
        const navIndicator = navTabs.querySelector(".nav-tab-indicator");
        const navLinks = Array.from(navTabs.querySelectorAll(".nav-tab-link")).filter(
            (link) => link instanceof HTMLElement
        );

        if (navIndicator instanceof HTMLElement && navLinks.length > 0) {
            const activeLink =
                navLinks.find((link) => link.classList.contains("is-active")) || navLinks[0];
            const navTransitionKey = "armaNavPreviousIndex";
            const moveIndicatorTo = (target) => {
                const navRect = navTabs.getBoundingClientRect();
                const targetRect = target.getBoundingClientRect();
                navIndicator.style.width = `${targetRect.width}px`;
                navIndicator.style.height = `${targetRect.height}px`;
                navIndicator.style.transform = `translate3d(${targetRect.left - navRect.left}px, ${targetRect.top - navRect.top}px, 0)`;
            };

            navLinks.forEach((link) => {
                link.addEventListener("click", () => {
                    try {
                        // Store the current page tab as the animation start for next page.
                        sessionStorage.setItem(navTransitionKey, String(navLinks.indexOf(activeLink)));
                    } catch (_error) {
                        // Skip persistence if storage is unavailable.
                    }
                });
            });

            let previousLink = null;
            try {
                const previousIndexRaw = sessionStorage.getItem(navTransitionKey);
                const previousIndex = previousIndexRaw === null ? Number.NaN : Number(previousIndexRaw);
                if (Number.isInteger(previousIndex) && previousIndex >= 0 && previousIndex < navLinks.length) {
                    previousLink = navLinks[previousIndex];
                }
            } catch (_error) {
                previousLink = null;
            }

            // Place indicator instantly on the active tab before enabling transitions.
            navIndicator.style.transition = "none";
            moveIndicatorTo(previousLink || activeLink);
            navIndicator.getBoundingClientRect();
            navTabs.classList.add("is-ready");
            requestAnimationFrame(() => {
                navIndicator.style.removeProperty("transition");
                if (previousLink && previousLink !== activeLink) {
                    moveIndicatorTo(activeLink);
                }
                try {
                    sessionStorage.removeItem(navTransitionKey);
                } catch (_error) {
                    // Ignore storage failures.
                }
            });

            window.addEventListener("resize", () => {
                moveIndicatorTo(activeLink);
            });
        }
    }

    const revealItems = document.querySelectorAll(".reveal");
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-visible");
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.15 }
    );

    revealItems.forEach((item) => observer.observe(item));

    const formDateInput = document.getElementById("form-date");
    const formDateValueInput = document.getElementById("form-date-value");
    const slotTimeInput = document.getElementById("slot-time");
    const slotLoadingState = document.getElementById("slot-loading-state");
    const slotError = document.getElementById("slot-error");
    const appointmentToast = document.getElementById("appointment-toast");
    const config = window.appointmentAvailabilityConfig;

    if (
        config &&
        formDateInput &&
        formDateValueInput &&
        slotTimeInput &&
        slotLoadingState &&
        slotError
    ) {
        const formatAsIsoDate = (date) => {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, "0");
            const day = String(date.getDate()).padStart(2, "0");
            return `${year}-${month}-${day}`;
        };
        const isIsoDate = (value) => /^\d{4}-\d{2}-\d{2}$/.test(value);
        const parseIsoDate = (value) => {
            if (!isIsoDate(value)) {
                return null;
            }

            const [yearRaw, monthRaw, dayRaw] = value.split("-");
            const year = Number(yearRaw);
            const month = Number(monthRaw);
            const day = Number(dayRaw);
            const parsed = new Date(year, month - 1, day);

            if (
                Number.isNaN(parsed.getTime()) ||
                parsed.getFullYear() !== year ||
                parsed.getMonth() + 1 !== month ||
                parsed.getDate() !== day
            ) {
                return null;
            }

            return parsed;
        };

        const now = new Date();
        const today = new Date(now.getFullYear(), now.getMonth(), now.getDate());
        const cutoffTime = new Date(today);
        cutoffTime.setHours(21, 30, 0, 0);
        const tomorrow = new Date(today);
        tomorrow.setDate(today.getDate() + 1);

        const browserMinDate = formatAsIsoDate(today);
        const configuredMinDate =
            typeof config.minDate === "string" && isIsoDate(config.minDate) ? config.minDate : "";
        const minDate = configuredMinDate || browserMinDate;
        const cutoffDefaultDate = now < cutoffTime ? minDate : formatAsIsoDate(tomorrow);
        const configuredInitialDate =
            typeof config.initialDate === "string" && isIsoDate(config.initialDate) ? config.initialDate : "";
        const initialDate = configuredInitialDate !== "" ? configuredInitialDate : cutoffDefaultDate;
        const effectiveInitialDate = initialDate < minDate ? minDate : initialDate;
        const minDateObject = parseIsoDate(minDate);
        const effectiveInitialDateObject = parseIsoDate(effectiveInitialDate);

        let datePicker = null;
        if (window.flatpickr) {
            datePicker = window.flatpickr(formDateInput, {
                dateFormat: "d/m/Y",
                minDate: minDateObject || minDate,
                allowInput: false,
                disableMobile: true,
                defaultDate: effectiveInitialDateObject || effectiveInitialDate,
                onChange: (selectedDates, _dateStr, instance) => {
                    const selected = selectedDates[0];
                    if (!selected) {
                        formDateValueInput.value = "";
                        setDropdownEnabled(false);
                        clearOptions("Select a date first");
                        slotLoadingState.textContent = "Pick a date to load available time slots.";
                        return;
                    }

                    const isoDate = instance.formatDate(selected, "Y-m-d");
                    formDateValueInput.value = isoDate;
                    setDropdownEnabled(true);
                    fetchAvailability(isoDate);
                },
            });

            // Force the intended default in case browser session restore injects an old value.
            if (effectiveInitialDate !== "") {
                datePicker.setDate(effectiveInitialDateObject || effectiveInitialDate, false, "Y-m-d");
            }
        }

        const clearOptions = (placeholderText) => {
            slotTimeInput.innerHTML = "";
            const defaultOption = document.createElement("option");
            defaultOption.value = "";
            defaultOption.textContent = placeholderText;
            slotTimeInput.appendChild(defaultOption);
            slotTimeInput.value = "";
        };

        const setDropdownEnabled = (enabled) => {
            slotTimeInput.disabled = !enabled;
        };

        const showAppointmentToast = (message, isError = false) => {
            const successIcon =
                '<svg viewBox="0 0 20 20" class="appointment-toast-icon" aria-hidden="true" fill="none"><circle cx="10" cy="10" r="8" stroke="currentColor" stroke-width="1.8"></circle><path d="M6 10.2l2.4 2.4L14.2 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path></svg>';
            const errorIcon =
                '<svg viewBox="0 0 20 20" class="appointment-toast-icon" aria-hidden="true" fill="none"><circle cx="10" cy="10" r="8" stroke="currentColor" stroke-width="1.8"></circle><path d="M10 6.2v4.8M10 13.8h.01" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"></path></svg>';
            const toastElement =
                appointmentToast instanceof HTMLElement
                    ? appointmentToast
                    : document.getElementById("appointment-toast-fallback") || document.createElement("div");

            if (!toastElement.id) {
                toastElement.id = "appointment-toast-fallback";
                toastElement.setAttribute("role", "status");
                toastElement.setAttribute("aria-live", "polite");
                document.body.appendChild(toastElement);
            }

            const colors = isError
                ? { bg: "#fef2f2", border: "#fecaca", text: "#b91c1c" }
                : { bg: "#ecfdf5", border: "#a7f3d0", text: "#065f46" };

            toastElement.innerHTML = `<div style="display:flex;align-items:center;gap:0.55rem;">${isError ? errorIcon : successIcon}<span>${message}</span></div>`;
            toastElement.style.position = "fixed";
            toastElement.style.top = "6rem";
            toastElement.style.right = "1rem";
            toastElement.style.zIndex = "9999";
            toastElement.style.maxWidth = "24rem";
            toastElement.style.padding = "0.75rem 1rem";
            toastElement.style.borderRadius = "0.75rem";
            toastElement.style.border = `1px solid ${colors.border}`;
            toastElement.style.background = colors.bg;
            toastElement.style.color = colors.text;
            toastElement.style.boxShadow = "0 10px 24px rgba(71, 52, 37, 0.18)";
            toastElement.style.pointerEvents = "auto";
            toastElement.style.display = "block";
            toastElement.style.opacity = "0";
            toastElement.style.transform = "translateY(-8px)";
            toastElement.style.transition = "opacity 240ms ease, transform 240ms ease";

            window.clearTimeout(showAppointmentToast.dismissTimerId);
            window.clearTimeout(showAppointmentToast.hideTimerId);

            requestAnimationFrame(() => {
                toastElement.style.opacity = "1";
                toastElement.style.transform = "translateY(0)";
            });

            showAppointmentToast.dismissTimerId = window.setTimeout(() => {
                toastElement.style.opacity = "0";
                toastElement.style.transform = "translateY(-8px)";
                showAppointmentToast.hideTimerId = window.setTimeout(() => {
                    toastElement.style.display = "none";
                    toastElement.style.pointerEvents = "none";
                }, 240);
            }, 4200);
        };
        showAppointmentToast.dismissTimerId = 0;
        showAppointmentToast.hideTimerId = 0;

        const renderSlots = (payload, preselectedSlot = "") => {
            clearOptions("Select an available slot");
            slotLoadingState.textContent = `${payload.summary.available} of ${payload.summary.total} slots available for selected date.`;

            payload.slots.forEach((slot) => {
                const option = document.createElement("option");
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
                slotTimeInput.appendChild(option);

                if (slot.available && preselectedSlot !== "" && slot.label === preselectedSlot) {
                    slotTimeInput.value = slot.label;
                }
            });
        };

        const fetchAvailability = async (dateValue, preselectedSlot = "") => {
            slotError.classList.add("hidden");
            slotLoadingState.textContent = "Loading slots for selected date...";
            clearOptions("Loading slots...");
            try {
                const response = await fetch(`${config.endpoint}?date=${encodeURIComponent(dateValue)}`);
                const payload = await response.json();

                if (!response.ok || !payload.ok) {
                    throw new Error(payload.error || "Unable to load slots.");
                }

                renderSlots(payload, preselectedSlot);
            } catch (error) {
                clearOptions("No slots available");
                slotLoadingState.textContent = "Could not load availability.";
                slotError.textContent = error instanceof Error ? error.message : "Unable to load slots.";
                slotError.classList.remove("hidden");
            }
        };

        if (!datePicker) {
            formDateInput.addEventListener("change", () => {
                const dateValue = formDateInput.value;
                formDateValueInput.value = dateValue;
                clearOptions("Select an available slot");
                if (dateValue === "") {
                    setDropdownEnabled(false);
                    clearOptions("Select a date first");
                    slotLoadingState.textContent = "Pick a date to load available time slots.";
                    return;
                }

                setDropdownEnabled(true);
                fetchAvailability(dateValue);
            });
        }

        const initialSlot = config.initialSlot || "";

        if (effectiveInitialDate !== "") {
            formDateValueInput.value = effectiveInitialDate;
            if (!datePicker) {
                formDateInput.value = effectiveInitialDate;
            }
            setDropdownEnabled(true);
            fetchAvailability(effectiveInitialDate, initialSlot);
        } else {
            formDateValueInput.value = "";
            clearOptions("Select an available slot");
            clearOptions("Select a date first");
            setDropdownEnabled(false);
            slotLoadingState.textContent = "Pick a date to load available time slots.";
        }

        const appointmentForm = formDateInput.closest("form");
        const submitButton = appointmentForm?.querySelector('button[type="submit"]');
        const submitLabel = document.getElementById("appointment-submit-label");

        if (appointmentForm instanceof HTMLFormElement && submitButton instanceof HTMLButtonElement) {
            appointmentForm.addEventListener("submit", async (event) => {
                event.preventDefault();

                const fullNameInput = document.getElementById("name");
                const phoneInput = document.getElementById("phone");
                const serviceInput = document.getElementById("service");
                const notesInput = document.getElementById("message");

                const payload = {
                    full_name: fullNameInput instanceof HTMLInputElement ? fullNameInput.value.trim() : "",
                    phone_number: phoneInput instanceof HTMLInputElement ? phoneInput.value.trim() : "",
                    appointment_date: formDateValueInput.value.trim(),
                    appointment_time_slot: slotTimeInput.value.trim(),
                    service_needed: (serviceInput instanceof HTMLSelectElement && serviceInput.value.trim() !== "") ? serviceInput.value.trim() : "General Checkup",
                    additional_notes: notesInput instanceof HTMLTextAreaElement ? notesInput.value.trim() : "",
                };

                if (
                    payload.full_name === "" ||
                    payload.phone_number === "" ||
                    payload.appointment_date === "" ||
                    payload.appointment_time_slot === ""
                ) {
                    showAppointmentToast("Please complete your details, choose a date, and select an available time slot.", true);
                    return;
                }

                submitButton.disabled = true;
                submitButton.classList.add("opacity-80", "cursor-not-allowed");
                let submittingLabelTimerId = 0;
                if (submitLabel instanceof HTMLElement) {
                    const loadingFrames = ["Submitting", "Submitting.", "Submitting..", "Submitting..."];
                    let frameIndex = 0;
                    submitLabel.textContent = loadingFrames[frameIndex];
                    submittingLabelTimerId = window.setInterval(() => {
                        frameIndex = (frameIndex + 1) % loadingFrames.length;
                        submitLabel.textContent = loadingFrames[frameIndex];
                    }, 320);
                }

                try {
                    const response = await fetch(config.requestEndpoint || "/api/website-appointment-requests.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            Accept: "application/json",
                        },
                        body: JSON.stringify(payload),
                    });

                    const responseText = await response.text();
                    let result = null;

                    if (responseText.trim() !== "") {
                        try {
                            result = JSON.parse(responseText);
                        } catch (_error) {
                            result = null;
                        }
                    }

                    if (!response.ok) {
                        const apiError =
                            result && typeof result.error === "string"
                                ? result.error
                                : "Unable to submit appointment request right now.";
                        throw new Error(apiError);
                    }

                    if (result && result.ok === false) {
                        throw new Error(
                            typeof result.error === "string"
                                ? result.error
                                : "Unable to submit appointment request right now."
                        );
                    }

                    showAppointmentToast(
                        "Appointment request submitted. You'll receive a confirmation shortly."
                    );
                    appointmentForm.reset();
                    if (datePicker) {
                        datePicker.setDate(effectiveInitialDateObject || effectiveInitialDate, true, "Y-m-d");
                    } else {
                        formDateInput.value = effectiveInitialDate;
                        formDateValueInput.value = effectiveInitialDate;
                        setDropdownEnabled(true);
                        fetchAvailability(effectiveInitialDate);
                    }
                } catch (error) {
                    showAppointmentToast(
                        error instanceof Error
                            ? error.message
                            : "Unable to submit appointment request right now.",
                        true
                    );
                } finally {
                    if (submittingLabelTimerId !== 0) {
                        window.clearInterval(submittingLabelTimerId);
                    }
                    if (submitLabel instanceof HTMLElement) {
                        submitLabel.textContent = "Submit Request";
                    }
                    submitButton.disabled = false;
                    submitButton.classList.remove("opacity-80", "cursor-not-allowed");
                }
            });
        }
    }
});
