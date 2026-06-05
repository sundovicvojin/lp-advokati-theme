const header = document.querySelector("[data-header]");
const navToggle = document.querySelector(".nav-toggle");
const navLinks = document.querySelectorAll(".nav-links a");

function syncHeader() {
  if (!header) {
    return;
  }

  header.classList.toggle("is-scrolled", window.scrollY > 12);
}

if (navToggle && header) {
  navToggle.addEventListener("click", () => {
    const isOpen = navToggle.getAttribute("aria-expanded") === "true";
    navToggle.setAttribute("aria-expanded", String(!isOpen));
    header.classList.toggle("menu-open", !isOpen);
  });
}

navLinks.forEach((link) => {
  link.addEventListener("click", () => {
    if (!navToggle || !header) {
      return;
    }

    navToggle.setAttribute("aria-expanded", "false");
    header.classList.remove("menu-open");
  });
});

syncHeader();
window.addEventListener("scroll", syncHeader, { passive: true });

// LP Animations Start
(() => {
  const reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)");

  function isReducedMotion() {
    return reducedMotion.matches;
  }

  function getHeaderOffset() {
    return header ? header.getBoundingClientRect().height + 14 : 0;
  }

  function setupSmoothScroll() {
    if (isReducedMotion()) {
      return;
    }

    document.addEventListener("click", (event) => {
      if (!(event.target instanceof Element)) {
        return;
      }

      const link = event.target.closest('a[href*="#"]');

      if (!link) {
        return;
      }

      const href = link.getAttribute("href");

      if (!href || href === "#") {
        return;
      }

      let targetUrl;

      try {
        targetUrl = new URL(href, window.location.href);
      } catch (error) {
        return;
      }

      const isSamePage =
        targetUrl.origin === window.location.origin &&
        targetUrl.pathname === window.location.pathname &&
        targetUrl.search === window.location.search;

      if (!isSamePage || !targetUrl.hash) {
        return;
      }

      let target = null;

      try {
        target =
          document.getElementById(decodeURIComponent(targetUrl.hash.slice(1))) ||
          document.querySelector(targetUrl.hash);
      } catch (error) {
        return;
      }

      if (!target) {
        return;
      }

      event.preventDefault();

      const top =
        target.getBoundingClientRect().top +
        window.scrollY -
        getHeaderOffset();

      window.scrollTo({
        top,
        behavior: "smooth",
      });

      if (history.pushState) {
        history.pushState(null, "", targetUrl.hash);
      }
    });
  }

  function markAnimatedElement(element, delay = 0) {
    if (!element || element.classList.contains("lp-animate")) {
      return;
    }

    element.classList.add("lp-animate");
    element.style.setProperty("--lp-animation-delay", `${delay}ms`);
  }

  function setupScrollAnimations() {
    if (isReducedMotion()) {
      return;
    }

    const animatedSelectors = [
      ".hero .eyebrow",
      ".hero h1",
      ".hero-copy",
      ".hero-actions",
      ".trust-strip",
      ".section-heading",
      ".section-text",
      ".contact-copy",
      ".feature-band > div",
      ".feature-band > .button",
      ".practice-areas-header",
      ".team-hero-intro__content",
      ".empty-state",
    ];

    const staggerSelectors = [
      ".trust-strip > div",
      ".intro-panel > div",
      ".practice-grid > article",
      ".practice-areas-grid > article",
      ".archive-card-grid > article",
      ".contact-details > *",
    ];

    document.body.classList.add("lp-animations-ready");

    animatedSelectors.forEach((selector) => {
      document.querySelectorAll(selector).forEach((element) => {
        markAnimatedElement(element);
      });
    });

    staggerSelectors.forEach((selector) => {
      document.querySelectorAll(selector).forEach((element, index) => {
        markAnimatedElement(element, Math.min(index * 90, 450));
      });
    });

    const animatedElements = document.querySelectorAll(".lp-animate");

    if (!("IntersectionObserver" in window)) {
      animatedElements.forEach((element) => {
        element.classList.add("is-visible");
      });
      return;
    }

    const observer = new IntersectionObserver(
      (entries, currentObserver) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) {
            return;
          }

          entry.target.classList.add("is-visible");
          currentObserver.unobserve(entry.target);
        });
      },
      {
        rootMargin: "0px 0px -12% 0px",
        threshold: 0.12,
      }
    );

    animatedElements.forEach((element) => {
      observer.observe(element);
    });
  }

  function setupFrontPageParallax() {
    const frontPage = document.querySelector("main#top");

    if (isReducedMotion() || !frontPage) {
      return;
    }

    const parallaxItems = [
      {
        element: frontPage.querySelector(".hero-media img"),
        strength: 34,
      },
      {
        element: frontPage.querySelector(".team > img"),
        strength: 18,
      },
    ].filter((item) => item.element);

    if (!parallaxItems.length) {
      return;
    }

    const activeItems = new Set();
    let ticking = false;

    function updateParallax() {
      const viewportHeight = window.innerHeight || document.documentElement.clientHeight;

      activeItems.forEach((item) => {
        const rect = item.element.getBoundingClientRect();
        const elementCenter = rect.top + rect.height / 2;
        const viewportCenter = viewportHeight / 2;
        const progress = (elementCenter - viewportCenter) / viewportHeight;
        const offset = Math.max(-item.strength, Math.min(item.strength, progress * item.strength * -1));

        item.element.style.setProperty("--lp-parallax-y", `${offset.toFixed(2)}px`);
      });

      ticking = false;
    }

    function requestParallaxUpdate() {
      if (ticking) {
        return;
      }

      ticking = true;
      window.requestAnimationFrame(updateParallax);
    }

    parallaxItems.forEach((item) => {
      item.element.classList.add("lp-front-parallax");
    });

    if (!("IntersectionObserver" in window)) {
      parallaxItems.forEach((item) => {
        activeItems.add(item);
        item.element.classList.add("is-parallax-active");
      });
      requestParallaxUpdate();
    } else {
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            const item = parallaxItems.find((parallaxItem) => parallaxItem.element === entry.target);

            if (!item) {
              return;
            }

            if (entry.isIntersecting) {
              activeItems.add(item);
              item.element.classList.add("is-parallax-active");
              requestParallaxUpdate();
              return;
            }

            activeItems.delete(item);
            item.element.classList.remove("is-parallax-active");
          });
        },
        {
          rootMargin: "18% 0px",
          threshold: 0,
        }
      );

      parallaxItems.forEach((item) => {
        observer.observe(item.element);
      });
    }

    window.addEventListener("scroll", requestParallaxUpdate, { passive: true });
    window.addEventListener("resize", requestParallaxUpdate);
    requestParallaxUpdate();
  }

  setupSmoothScroll();
  setupScrollAnimations();
  setupFrontPageParallax();
})();
// LP Animations End
