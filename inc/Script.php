<script>
    function goBack(e) {
        e.preventDefault();
        alert("Redirigiendo al inicio...");
    }

    // Efecto parallax simple con el mouse
    document.addEventListener('mousemove', (e) => {
        const x = (window.innerWidth - e.pageX) / 50;
        const y = (window.innerHeight - e.pageY) / 50;

        const errorCode = document.querySelector('.error-code');
        // errorCode.style.transform = `translate(${x}px, ${y}px)`;
    });

    (function() {
        const hamburger = document.getElementById("navHamburger");
        const navMenu = document.querySelector(".nav-menu");
        const logoutBtn = document.getElementById("navLogoutBtn");

        hamburger.addEventListener("click", () => {
            hamburger.classList.toggle("active");
            navMenu.classList.toggle("active");
        });

        document.querySelectorAll(".nav-link").forEach(n => n.addEventListener("click", () => {
            hamburger.classList.remove("active");
            navMenu.classList.remove("active");
        }));

        logoutBtn.addEventListener("click", () => {
            alert("Sesión cerrada");
            hamburger.classList.remove("active");
            navMenu.classList.remove("active");
        });
    })();
</script>