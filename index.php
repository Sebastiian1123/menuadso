<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema Numérico - Sebastian Santacruz</title>
  <link rel="stylesheet" href="style/style.css">
</head>
<body>
  <div class="header">
    <div class="header-photo"><img src="./style/image1.jpg" alt="Foto"></div>
    <div class="header-title">
      <h1>SISTEMA NUMÉRICO</h1>
      <h2>SEBASTIAN SANTACRUZ</h2>
    </div>
    <div class="header-social">
      <a href="https://wa.me/573017081602" target="_blank">
        <img src="./style/whatsapp.png" alt="WhatsApp" class="social-icon">
      </a>
      <a href="https://www.instagram.com/sebastian_s.n?igsh=bHk3eTlxZ3VreTlq&utm_source=qr" target="_blank">
        <img src="./style/instagram.png" alt="Instagram" class="social-icon">
      </a>
      <a href="https://www.facebook.com/share/16AgJmVmDW/?mibextid=wwXIfr" target="_blank">
        <img src="./style/facebook.png" alt="Facebook" class="social-icon">
      </a>
    </div>
  </div>
  
  <nav class="menu">
    <ul class="main-menu">
      <li><a href="#" class="menu-option" data-action="evaluar">Evaluar Número</a></li>
      <li><a href="#" class="menu-option" data-action="secuencia">Generar Secuencia</a></li>
      <li>
        <a href="#">Opciones ▾</a>
        <ul class="submenu">
          <li><a href="#" class="menu-option" data-action="evaluar">Evaluar</a></li>
          <li><a href="#" class="menu-option" data-action="secuencia">Secuencia</a></li>
          <li><a href="#">Acerca de</a></li>
        </ul>
      </li>
    </ul>
  </nav>

  <div class="main-container">
    <div class="sidebar">
      <div class="sidebar-content">
        <img src="./style/evaluar.png" alt="Icono evaluar" id="sidebarImage">
      </div>
    </div>
    
    <div class="content">
      <div class="form-container">
        <form action="" method="post" id="numberForm">
          <label for="numero">Digite un numero:</label>
          <input type="number" name="numero" id="numero" required>
          <input type="hidden" name="action" id="actionType" value="evaluar">
          <button type="submit">Procesar</button>
        </form>
        
        <div class="result-container">
          <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valor = floatval($_POST["numero"]);
            $action = $_POST["action"] ?? 'evaluar';
            
            if ($action === 'evaluar') {
              if ($valor < 0) {
                echo "<div class='result negative'><p>El valor $valor es negativo</p></div>";
              } elseif ($valor == 0) {
                echo "<div class='result zero'><p>El valor es cero</p></div>";
              } else {
                echo "<div class='result positive'><p>El valor $valor es positivo</p></div>";
              }
            } 
            elseif ($action === 'secuencia') {
              if ($valor <= 0) {
                echo "<div class='result negative'><p>Por favor ingrese un número positivo mayor que cero</p></div>";
              } else {
                $secuencia = '';
                for ($i = 1; $i <= $valor; $i++) {
                  $secuencia .= $i . ' ';
                }
                echo "<div class='result sequence'><p>Secuencia generada: <strong>$secuencia</strong></p></div>";
              }
            }
          } 
          ?>
        </div>
      </div>
    </div>
    
    <div class="sidebar">
      <div class="sidebar-text">
        <p>Esta página permite:</p>
        <ul>
          <li>Evaluar si un número es positivo, negativo o cero</li>
          <li>Generar secuencias numéricas desde 1 hasta el número ingresado</li>
        </ul>
      </div>
    </div>
  </div>
  
  <div class="footer">
    <p>Sistema Numérico © 2023</p>
  </div>

  <script>
    document.querySelectorAll('.menu-option').forEach(option => {
      option.addEventListener('click', function(e) {
        e.preventDefault();
        const action = this.getAttribute('data-action');
        document.getElementById('actionType').value = action;
        const sidebarImage = document.getElementById('sidebarImage');
        
        const submitBtn = document.querySelector('button[type="submit"]');
        if (action === 'evaluar') {
          submitBtn.textContent = 'Evaluar';
          document.querySelector('label[for="numero"]').textContent = 'Digite un numero:';
          sidebarImage.src = './style/evaluar.png';
          sidebarImage.alt = 'Icono evaluar';
        } else if (action === 'secuencia') {
          submitBtn.textContent = 'Generar Secuencia';
          document.querySelector('label[for="numero"]').textContent = 'Hasta qué número generar la secuencia:';
          sidebarImage.src = './style/secuencia.png';
          sidebarImage.alt = 'Icono secuencia';
        }
      });
    });
  </script>
</body>
</html>