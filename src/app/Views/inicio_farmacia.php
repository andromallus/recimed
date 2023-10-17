<!DOCTYPE html>
<html>
  <head>
    <title>Escaneo de Código QR</title>
    <style>
      body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
      }

      #escanear-container {
        text-align: center;
        max-width: 300px;
        margin: auto;
      }

      #mensaje {
        font-size: 18px;
      }

      #camara-container {
        max-width: 100%;
        display: block;
      }

      .camera-container {
        width: 80%; /* Ancho del contenedor de la cámara */
        max-width: 400px; /* Máximo ancho del contenedor */
        margin: 0 auto; /* Centrar el contenedor horizontalmente */
        border: 2px solid #0079bb; /* Borde del contenedor */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Sombra para el contenedor */
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px; /* Bordes redondeados para el contenedor */
      }
      video {
        width: 100%;
      }

      .round-button {
        display: block;
        width: 80px;
        margin-left: 100px;
        height: 80px;
        line-height: 80px;
        border: 2px solid #0079bb;
        border-radius: 50%;
        color: #f5f5f5;
        text-align: center;
        text-decoration: none;
        background: #0079bb;
        box-shadow: 0 0 3px rgb(0, 0, 0);
        font-size: 12px;
        font-weight: bold;
      }
      .round-button:hover {
        background: #0079bb;
      }
      .btn-circle {
        margin-left: 120px;
        margin-top: 5px;
        width: 100px; /* Adjust the size of the button as needed */
        height: 100px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .btn-circle i {
        font-size: 3em; /* Adjust the size of the icon as needed */
        display: flex;
        justify-content: center;
        align-items: center;
      }
    </style>
  </head>
  <body>
    <div class="centered-div" style="margin-top: -50px; position: relative">
      <div class="logo-container">
        <img
          src="<?php echo base_url();?>/img/ene2.svg"
          class="logo-image"
          alt="Company Logo"
        />
        <h1 class="company-name">RECIMED</h1>
      </div>

      <div id="contenido">
        <div id="escanear-container" class="futuristic-div">
          <div id="mensaje">Por favor acerca el código QR</div>
          <div id="camara-container">
            <video id="camara" autoplay playsinline></video>
          </div>

          <button
            class="btn btn-primary btn-circle"
            id="mostrarReceta"
            onclick="mostrarReceta()"
            style="
              width: 50px; /* Adjust the size as needed */
              height: 50px;
              border-radius: 50%;
              display: flex;
              justify-content: center;
              align-items: center;
            "
          >
            <i class="fas fa-camera" style="width: 100px"></i>
          </button>
        </div>
      </div>

      <div class="container " style="    width: 715px;
      ">
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="card bg-light border-0">
              <div
                id="divreceta"
                style="font-size: 14px;display:none"
                class="card-body"
              ></div>
            </div>
          </div>
        </div>
      </div>

      <table id="data-table" style="display: none;">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Dosis</th>
            <th>ID Receta</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>


    <div style=" 
    justify-content: center;font-size:20px;color:#0079bb;"><a id="volverFarmacia" style="display: none;" href="<?php echo base_url();?>/farmacia">Regresar</a></div>

    </div>

    <br>


    <script>
      const camaraContainer = document.getElementById("camara-container");
      const camara = document.getElementById("camara");

      navigator.mediaDevices
        .getUserMedia({ video: true })
        .then(function (stream) {
          camara.srcObject = stream;
        })
        .catch(function (error) {
          console.error("Error al acceder a la cámara: " + error);
        });
    </script>


    

    <script src="<?php echo base_url();?>/js/app.js"></script>
  </body>
</html>
