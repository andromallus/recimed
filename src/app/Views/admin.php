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
    <div class="centered-div" style="margin-top: -50px; position: relative">
      <div class="logo-container">
        <img
          src="<?php echo base_url();?>/img/logofinal.svg"
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
              onclick="nuevoPaciente()"
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

      <div id="gr" style="display: none">
        <div class="cool-div">
          <h1>Receta Medica</h1>
          <div class="container" style="font-size: 19px; text-align: left">
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
              <div class="col-12"></div>
            </div>

            <div class="row">
              <div class="col-1"></div>
              <div class="col-12">
                <textarea
                  name=""
                  id="diagnostico"
                  cols="78"
                  rows="2"
                ></textarea>
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
              style="width: 247px; height: 70px; text-align: center"
              id="generarRecetaPDF"
            >
              Generar Receta
            </button>
          </div>
        </div>

        <div class="search-container" style="margin-top: 20px">
          <br />
          <br />
          <br />
          <!-- <form action="<?= base_url('SearchController/search') ?>"> -->
          <input
            type="text"
            class="big-search-input"
            style="width: 500px; height: 50px"
            id="busquedaC"
            name="busqueda"
            placeholder="Ingrese el nombre del medicamento"
          />
          <button
            type="text"
            class="search-button"
            onclick="buscarMedicamento()"
            style="width: 200px; height: 70px; text-align: center"
            id="buscarMedicamento"
          >
            Buscar
          </button>

          <!-- </form> -->
        </div>

        <table
          id="resultadoMedicamentos"
          class="table"
          style="margin-top: 30px"
        >
          <tbody></tbody>
        </table>
      </div>

      <div class="container mt-10" id="formaPaciente" style="display: none;font-size:11.5px;width:600px;">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Formulario de Registro de Nuevo Paciente</h1>
            </div>
            <div class="card-body">
                <form action="procesar_registro.php" method="post">
                    <!-- Información del Paciente -->
                    <div class="form-group">
                        <label for="nombre">Nombre(s):</label>
                        <input type="text" class="form-control" id="nombreforma"  required>
                    </div>

                    <div class="form-group">
                      <label for="nombre">Primer apellido:</label>
                      <input type="text" class="form-control" id="primerapforma" required>
                  </div>

                  <div class="form-group">
                    <label for="nombre">Segundo apellido:</label>
                    <input type="text" class="form-control" id="segundoapforma"  required>
                </div>

                    <div class="form-group">
                      <label for="nombre">CURP:</label>
                      <input type="text" class="form-control" id="curp"  required>
                  </div>


                  <div class="form-group">
                    <label for="nombre">Edad:</label>
                    <input type="text" class="form-control" id="edad"  required>
                 </div>

                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                    </div>

                    <div class="form-group">
                        <label for="genero">Género:</label>
                        <select class="form-control" id="genero" name="genero">
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>

                    <!-- Otras secciones del formulario... -->

                    <!-- Consentimiento del Paciente -->
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="consentimiento" name="consentimiento" required>
                        <label class="form-check-label" for="consentimiento" style="margin-left: 20px;">Acepto los términos y condiciones.</label>
                    </div>

                    <div class="text-center mt-4">
                        <button type="button" id="pbutton" onclick="guardarNuevoPaciente()" class="btn btn-primary" style="background-color: #0079bb;">Registrar Paciente</button>
                    </div>
                    <div class="container" style=" display: flex;
                    justify-content: center;">
                    <div class="loading-spinner" id="spinner" style="display: none;"></div></div>
                    
                </form>
            </div>
        </div>
    </div>


        <div class="image-container" id="gifs" style="display: none;">
          <img src="<?php echo base_url();?>/img/check.gif" alt="Your GIF" />
      </div>

      <div style=" display: flex;
      justify-content: center;font-size:20px;color:#0079bb;"><a id="volver" style="display: none;" href="<?php echo base_url();?>/admin">Regresar</a></div>
  
      </div>
      
    </div>

    <script src="<?php echo base_url();?>/js/app.js"></script>
  </body>
</html>
