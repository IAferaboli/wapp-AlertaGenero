<header>
        <div class="header-left">
            <div class="logo">
                <a href="../controladores/createUsuarie.php"><img src="../src/alertagenero_logo.png" alt="Logo-alerta_genero"></a>
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="../controladores/createUsuarie.php">Inicio</a>
                    </li>
                    <li>
                        <a href="../controladores/createUsuarie.php">Capacitación</a>
                    </li>
                    <li>
                        <a href="../controladores/createUsuarie.php">Politica de privacidad</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="header-right">
            <div class="hamburger">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </header>
    <script>
        hamburger = document.querySelector(".hamburger");
        nav = document.querySelector("nav");
        hamburger.onclick = function() {
            nav.classList.toggle("active");
        }
    </script>