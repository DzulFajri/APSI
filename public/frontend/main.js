document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for internal links
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute("href")).scrollIntoView({
                behavior: "smooth",
                block: "start"
            });
        });
    });

    // Mobile menu toggle
    document.getElementById("mobile-menu-toggle").addEventListener("click", function () {
        var mobileMenu = document.getElementById("mobile-menu");
        mobileMenu.classList.toggle("hidden");
    });

    // Debounce function for better performance on scroll events
    const debounce = (func, wait) => {
        let timeout;
        return function (...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), wait);
        };
    };

    // Check if element is in viewport
    function isElementInViewport(el) {
        var rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    // Scroll event handler for triggering animations
    const onScroll = debounce(function () {
        var elements = document.querySelectorAll(".animate__animated");
        elements.forEach(function (el) {
            if (isElementInViewport(el)) {
                if (!el.classList.contains("animate__fadeInUp")) {
                    el.classList.add("animate__fadeInUp");
                }
            } else {
                el.classList.remove("animate__fadeInUp");
            }
        });
    }, 100);

    // Add scroll event listener
    window.addEventListener("scroll", onScroll);

    // Initial check for elements in viewport on page load
    onScroll();
});
