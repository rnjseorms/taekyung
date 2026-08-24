(function () {
  "use strict";

  // Mobile nav
  var toggle = document.querySelector(".nav-toggle");
  var mobileNav = document.querySelector(".mobile-nav");
  if (toggle && mobileNav) {
    var closeBtn = mobileNav.querySelector(".mobile-nav-close");
    var open = function () {
      mobileNav.classList.add("open");
      toggle.setAttribute("aria-expanded", "true");
    };
    var close = function () {
      mobileNav.classList.remove("open");
      toggle.setAttribute("aria-expanded", "false");
    };
    toggle.addEventListener("click", function () {
      mobileNav.classList.contains("open") ? close() : open();
    });
    if (closeBtn) closeBtn.addEventListener("click", close);
    mobileNav.querySelectorAll("a").forEach(function (a) {
      a.addEventListener("click", close);
    });
  }

  // Back to top
  var backToTop = document.querySelector(".back-to-top");
  if (backToTop) {
    window.addEventListener("scroll", function () {
      backToTop.classList.toggle("show", window.scrollY > 480);
    });
    backToTop.addEventListener("click", function () {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }

  // Lightbox for gallery / certificate images: click, arrow buttons, keyboard, swipe
  var lightbox = document.querySelector(".lightbox");
  if (lightbox) {
    var lightboxImg = lightbox.querySelector("img");
    var lightboxCap = lightbox.querySelector(".lightbox-cap");
    var lightboxItems = Array.prototype.slice.call(document.querySelectorAll("[data-lightbox]"));
    var lightboxIndex = -1;

    var showAt = function (index) {
      if (!lightboxItems.length) return;
      lightboxIndex = (index + lightboxItems.length) % lightboxItems.length;
      var el = lightboxItems[lightboxIndex];
      var full = el.getAttribute("data-lightbox");
      var cap = el.getAttribute("data-caption") || "";
      lightboxImg.src = full;
      lightboxImg.alt = cap;
      if (lightboxCap) lightboxCap.textContent = cap;
      lightbox.classList.add("open");
    };

    var closeLightbox = function () {
      lightbox.classList.remove("open");
      lightboxImg.src = "";
    };

    lightboxItems.forEach(function (el, i) {
      el.addEventListener("click", function () {
        showAt(i);
      });
    });

    var prevBtn = lightbox.querySelector(".lightbox-prev");
    var nextBtn = lightbox.querySelector(".lightbox-next");
    if (prevBtn) {
      prevBtn.addEventListener("click", function (e) {
        e.stopPropagation();
        showAt(lightboxIndex - 1);
      });
    }
    if (nextBtn) {
      nextBtn.addEventListener("click", function (e) {
        e.stopPropagation();
        showAt(lightboxIndex + 1);
      });
    }

    lightbox.addEventListener("click", function (e) {
      if (e.target === lightbox) closeLightbox();
    });
    var closeBtn = lightbox.querySelector(".lightbox-close");
    if (closeBtn) closeBtn.addEventListener("click", closeLightbox);
    document.addEventListener("keydown", function (e) {
      if (!lightbox.classList.contains("open")) return;
      if (e.key === "Escape") closeLightbox();
      if (e.key === "ArrowLeft") showAt(lightboxIndex - 1);
      if (e.key === "ArrowRight") showAt(lightboxIndex + 1);
    });

    // Touch swipe navigation
    var touchStartX = null;
    lightbox.addEventListener("touchstart", function (e) {
      touchStartX = e.changedTouches[0].clientX;
    }, { passive: true });
    lightbox.addEventListener("touchend", function (e) {
      if (touchStartX === null) return;
      var dx = e.changedTouches[0].clientX - touchStartX;
      if (Math.abs(dx) > 40) {
        showAt(lightboxIndex + (dx < 0 ? 1 : -1));
      }
      touchStartX = null;
    }, { passive: true });
  }

  // Gallery filters
  var filterBtns = document.querySelectorAll(".filter-btn");
  if (filterBtns.length) {
    var items = document.querySelectorAll("[data-category]");
    filterBtns.forEach(function (btn) {
      btn.addEventListener("click", function () {
        filterBtns.forEach(function (b) { b.classList.remove("active"); });
        btn.classList.add("active");
        var cat = btn.getAttribute("data-filter");
        items.forEach(function (item) {
          var show = cat === "all" || item.getAttribute("data-category") === cat;
          item.style.display = show ? "" : "none";
        });
      });
    });
  }

  // Video lazy-load: swap thumbnail for iframe on click (saves initial page weight)
  document.querySelectorAll("[data-yt]").forEach(function (el) {
    el.addEventListener("click", function () {
      var id = el.getAttribute("data-yt");
      var iframe = document.createElement("iframe");
      iframe.src = "https://www.youtube.com/embed/" + id + "?autoplay=1";
      iframe.title = el.getAttribute("data-title") || "제품 소개 영상";
      iframe.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
      iframe.allowFullscreen = true;
      el.innerHTML = "";
      el.appendChild(iframe);
    }, { once: true });
  });

  // Local demo video lazy-load: swap poster image for <video> on click
  document.querySelectorAll("[data-video]").forEach(function (el) {
    el.addEventListener("click", function () {
      var src = el.getAttribute("data-video");
      var video = document.createElement("video");
      video.src = src;
      video.controls = true;
      video.autoplay = true;
      video.playsInline = true;
      video.style.width = "100%";
      video.style.height = "100%";
      video.style.objectFit = "cover";
      el.innerHTML = "";
      el.appendChild(video);
    }, { once: true });
  });

  // Hero product slider: auto-advancing, dot navigation, pause on hover
  var slider = document.getElementById("hero-slider");
  if (slider) {
    var track = slider.querySelector(".hero-slides");
    var slides = slider.querySelectorAll(".hero-slide");
    var dots = slider.querySelectorAll(".hero-dot");
    var current = 0;
    var intervalId = null;

    var goTo = function (index) {
      current = (index + slides.length) % slides.length;
      track.style.transform = "translateX(-" + current * 100 + "%)";
      dots.forEach(function (dot, i) {
        dot.classList.toggle("active", i === current);
      });
    };

    var start = function () {
      stop();
      intervalId = setInterval(function () {
        goTo(current + 1);
      }, 4500);
    };
    var stop = function () {
      if (intervalId) clearInterval(intervalId);
    };

    dots.forEach(function (dot) {
      dot.addEventListener("click", function () {
        goTo(parseInt(dot.getAttribute("data-slide"), 10));
        start();
      });
    });

    var prevBtn = slider.querySelector(".hero-slider-prev");
    var nextBtn = slider.querySelector(".hero-slider-next");
    if (prevBtn) {
      prevBtn.addEventListener("click", function () {
        goTo(current - 1);
        start();
      });
    }
    if (nextBtn) {
      nextBtn.addEventListener("click", function () {
        goTo(current + 1);
        start();
      });
    }

    slider.addEventListener("mouseenter", stop);
    slider.addEventListener("mouseleave", start);

    if (slides.length > 1) start();
  }

  // Stat number count-up animation, triggered once when scrolled into view
  document.querySelectorAll(".stat-strip").forEach(function (strip) {
    var counted = false;
    var animateCount = function () {
      if (counted) return;
      counted = true;
      strip.querySelectorAll(".num > span").forEach(function (span) {
        var target = parseInt(span.textContent, 10);
        if (isNaN(target)) return;
        var duration = 1200;
        var startTime = null;
        var step = function (timestamp) {
          if (!startTime) startTime = timestamp;
          var progress = Math.min((timestamp - startTime) / duration, 1);
          var eased = 1 - Math.pow(1 - progress, 3);
          span.textContent = Math.round(eased * target);
          if (progress < 1) requestAnimationFrame(step);
          else span.textContent = target;
        };
        requestAnimationFrame(step);
      });
    };

    if ("IntersectionObserver" in window) {
      var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            animateCount();
            observer.disconnect();
          }
        });
      }, { threshold: 0.4 });
      observer.observe(strip);
    } else {
      animateCount();
    }
  });

  // Contact form -> POST to serverless function, which emails tk5448@naver.com via Resend
  var form = document.querySelector("#inquiry-form");
  if (form) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      var name = form.querySelector("#f-name").value.trim();
      var phone = form.querySelector("#f-phone").value.trim();
      var email = form.querySelector("#f-email").value.trim();
      var subject = form.querySelector("#f-subject").value.trim();
      var message = form.querySelector("#f-message").value.trim();
      var status = form.querySelector(".form-status");
      var submitBtn = form.querySelector('button[type="submit"]');

      if (!name || !phone || !message) {
        if (status) {
          status.textContent = "이름, 연락처, 문의내용은 필수 입력 항목입니다.";
          status.style.color = "#DC2626";
        }
        return;
      }

      if (submitBtn) submitBtn.disabled = true;
      if (status) {
        status.textContent = "문의를 전송하는 중입니다...";
        status.style.color = "";
      }

      fetch("/api/contact", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ name: name, phone: phone, email: email, subject: subject, message: message })
      })
        .then(function (res) {
          return res.json().then(function (data) {
            if (!res.ok) throw new Error(data.error || "전송 실패");
            return data;
          });
        })
        .then(function () {
          if (status) {
            status.textContent = "문의가 정상적으로 접수되었습니다. 빠르게 답변드리겠습니다.";
            status.style.color = "#16A34A";
          }
          form.reset();
        })
        .catch(function (err) {
          if (status) {
            status.textContent = err.message || "전송 중 오류가 발생했습니다. 전화로 문의해 주세요.";
            status.style.color = "#DC2626";
          }
        })
        .finally(function () {
          if (submitBtn) submitBtn.disabled = false;
        });
    });
  }
})();
