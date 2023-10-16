<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RECIMED</title>
    <link rel="stylesheet" href="styles.css" />
    <!-- Include your CSS file here -->
  </head>
  <body>
    <div class="centered-div" style="margin-top: -50px;position:relative;">
      <div class="logo-container">
        <img
          src="<?php echo base_url();?>/img/ene2.svg"
          class="logo-image"
          alt="Company Logo"
        />
        <h1 class="company-name">RECIMED</h1>
      </div>

      <div id="contenido">
        <button
          type="button"
          class="cool-futuristic-button"
          style="width: 500px; background-color: #0079bb"
          onclick="mostrarListaRecetas()"
        >
          Verificar status
        </button>
        <br />
        <br />
        <div class="btn-group">
          <button
            type="button"
            class="cool-futuristic-button dropdown-toggle"
            style="width: 500px; background-color: #0079bb"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            Generar receta
          </button>
          <div class="dropdown-menu" style="background-color: transparent">
            <a
              class="cool-futuristic-dropdown-item"
              href="#"
              onclick="guardarNuevoPaciente()"
              >Nuevo paciente</a
            >
            <a
              class="cool-futuristic-dropdown-item"
              href="#"
              onclick="listapaciente()"
              >Lista de pacientes</a
            >
          </div>
        </div>
      </div>

      <div id="recetas" style="display: none">
        <br />
        <div class="search-container">
          <!-- <form action="<?= base_url('SearchController/search') ?>"> -->
          <input
            type="text"
            class="big-search-input"
            id="busqueda"
            name="busqueda"
            placeholder="Ingrese el nombre del paciente"
          />
          <button
            type="text"
            class="search-button"
            onclick="buscarPaciente()"
            id="buscarPaciente"
          >
            Buscar
          </button>

          <!-- </form> -->
        </div>
        <br />
      </div>

      <div id="listapacientes" style="display: none">
        <br />
        <div class="search-container">
          <!-- <form action="<?= base_url('SearchController/search') ?>"> -->
          <input
            type="text"
            class="big-search-input"
            id="busquedab"
            name="busquedab"
            placeholder="Ingrese el nombre del paciente"
          />
          <button
            type="text"
            class="search-button"
            onclick="buscarPacienteB()"
            id="buscarPaciente"
          >
            Buscar
          </button>

          <!-- </form> -->
        </div>
        <br />
      </div>

      <table id="resultadoPacientes" class="table">
        <tbody></tbody>
      </table>

      <div>
        <p id="noResults" style="font-size: 20px"></p>
      </div>

      <div id="regresar"></div>

      <div id="gr" style="display: none; ">
        <div class="cool-div">
          <h1>Receta Medica</h1>
          <div class="container" style="font-size: 19px; text-align:left;">
            <div class="row">
              <div class="col-6">Dr. Yahir Bautista</div>
              <div class="col-6">Cedula profesional : 1234567</div>
            </div>

            <div class="row">
              <div class="col-6">
                Paciente :
                <span id="paciente"></span>
              </div>
              <div class="col-5">
                Edad :
                <span id="edadpaciente"></span>
                
              </div>

              <div class="col-5">
                ID :
                <span id="idpaciente"></span>
                
              </div>
            </div>

            <div class="row">
              <div class="col-6">
                Fecha:
                <span id="">
                  <?php
                               echo  date("Y-m-d") 
                  ?>
                </span>
              </div>
              <div class="col-6"></div>
            </div>

            <div class="row">
              <div class="col-1">Diagnostico</div>
              <div class="col-12">
               
              </div>
            </div>

            <div class="row">
              <div class="col-1"></div>
              <div class="col-12">
                <textarea name="" id="diagnostico" cols="78" rows="2"></textarea>
              </div>
            </div>

            <div class="scrollable-div">
            <table id="medicamentosReceta" class="table medicamentosReceta">
              <tbody>
                <tr>
                  <th>Nombre</th>
                  <th>Tipo</th>
                  <th>Dosis</th>

                  <th>Opcion</th>
                </tr>
              </tbody>
            </table>

          </div>

            <button
            type="text"
            class="search-button"
            onclick="generarRecetaPDF()"
            style="width: 247px;height:70px;text-align:center;"

            id="generarRecetaPDF"
          >
            Generar Receta
          </button>
          </div>
        </div>

        <div class="search-container" style="margin-top: 20px;">
          <br>
          <br>
          <br>
          <!-- <form action="<?= base_url('SearchController/search') ?>"> -->
          <input
            type="text"
            class="big-search-input"
            style="width: 500px;height:50px;"
            id="busquedaC"
            name="busqueda"
            placeholder="Ingrese el nombre del medicamento"
          />
          <button
            type="text"
            class="search-button"
            onclick="buscarMedicamento()"
            style="width: 200px;height:70px;text-align:center;"

            id="buscarMedicamento"
          >
            Buscar
          </button>

          <!-- </form> -->
        </div>

        <table id="resultadoMedicamentos" class="table" style="margin-top: 30px;">
          <tbody></tbody>
        </table>
      </div>
    </div>

    <script src="<?php echo base_url();?>/js/app.js"></script>
  </body>
</html>
