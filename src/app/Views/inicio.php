<section>
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black chat-box">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">
                <!-- <div class="text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                      style="width: 185px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                  </div> -->

                <form novalidate>
                  <h1 style="font-size: 40px; text-align: center">RECIMED</h1>
                  <br />

                  <!-- <input name="" type="button" onclick="ani()" value="Click">
                  <img id="img" src="https://i.stack.imgur.com/vghKS.png" width="328" height="328" /> -->

             
                  <!-- <div class="typing-container">
                    <div id="output-text" class="typing-text"></div>
                    <div class="typing-cursor"></div>
                  </div>
                  <button type="button" id="startButton">Start Typing</button> -->

                  <div class="text-center pt-1 mb-5 pb-1" id="doc_inicio">
                    <button
                      id="test"
                      class="btn btn-primary btn-block fa-lg blue mb-3"
                      style="background-color: #0079bb"
                      type="button"
                      onclick="mostrarDocLogin()"
                    >
                      Ingresar como doctor
                    </button>
                    <button
                      class="btn btn-primary btn-block fa-lg blue mb-3"
                      style="background-color: #0079bb"
                      type="button"
                      onclick="mostrarFarmaciaLogin()"
                    >
                      Ingresar como farmacia
                    </button>
                    <!-- <a class="text-muted" href="#!">Forgot password?</a> -->
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1" id="doc_login">
                    <div class="form-outline mb-4">
                      <input
                        style="text-align: left"
                        type="email"
                        id="form2Example11"
                        class="form-control"
                        placeholder="
                        Cedula profesional"
                      />
                    </div>

                    <div class="form-outline mb-4">
                      <input
                        style="text-align: left"
                        type="password"
                        id="form2Example11"
                        class="form-control"
                        placeholder="
                      Contrasena"
                      />
                    </div>

                    <button
                      class="btn btn-primary btn-block fa-lg blue mb-3"
                      style="background-color: #0079bb"
                      type="button"
                      onclick="ingresarDoctorT()"
                      id="ingresarDoctor"
                    >
                      Ingresar
                    </button>

                    <div
                      class="d-flex align-items-center justify-content-center pb-4"
                    >
                      <p class="mb-0 me-2">¿No tienes una cuenta?</p>
                      <button
                        type="button"
                        class="btn btn-link"
                        style="color: red"
                      >
                        Crea una nueva
                      </button>
                    </div>

                    <button
                      type="button"
                      class="btn btn-default btn-sm"
                      id="regresarDoc"
                      onclick="regresarDoctor()"
                    >
                      <span class="glyphicon glyphicon-arrow-left"></span>
                      Regresar
                    </button>
                    <!-- <a class="text-muted" href="#!">Forgot password?</a> -->
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1" id="farmacia_login">
                    <div class="form-outline mb-4">
                      <input
                        style="text-align: left"
                        type="email"
                        id="form2Example11"
                        class="form-control"
                        placeholder="
                        RFC"
                      />
                    </div>

                    <div class="form-outline mb-4">
                      <input
                        style="text-align: left"
                        type="email"
                        id="form2Example11"
                        class="form-control"
                        placeholder="
                      Contrasena"
                      />
                    </div>

                    <button
                      class="btn btn-primary btn-block fa-lg blue mb-3"
                      style="background-color: #0079bb"
                      type="button"
                    >
                      Ingresar
                    </button>

                    <div
                      class="d-flex align-items-center justify-content-center pb-4"
                    >
                      <p class="mb-0 me-2">¿No tienes una cuenta?</p>
                      <button
                        type="button"
                        class="btn btn-link"
                        style="color: red"
                      >
                        Crea una nueva
                      </button>
                    </div>

                    <!-- <i class="glyphicon glyphicon-arrow-left"></i> -->

                    <button
                      type="button"
                      class="btn btn-default btn-sm"
                      id="regresarFarmacia()"
                      onclick="regresarFarmacia()"
                    >
                      <span class="glyphicon glyphicon-arrow-left"></span>
                      Regresar
                    </button>
                    <!-- <a class="text-muted" href="#!">Forgot password?</a> -->
                  </div>
                  <!--   
                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2">Don't have an account?</p>
                      <button type="button" class="btn btn-outline-danger">Create new</button>
                    </div> -->
                </form>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center">
              <img
                src="<?php echo base_url();?>/img/ene2.svg"
                style="width: 100%"
              />
              <!-- <h4 class="mb-4">We are more than just a company</h4>
                  <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  .gradient-custom-2 {
    /* fallback for old browsers */
    background: #fccb90;

    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(
      to right,
      #ee7724,
      #d8363a,
      #dd3675,
      #b44593
    );

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
  }

  @media (min-width: 768px) {
    .gradient-form {
      height: 100vh !important;
    }
  }
  @media (min-width: 769px) {
    .gradient-custom-2 {
      border-top-right-radius: 0.3rem;
      border-bottom-right-radius: 0.3rem;
    }
  }
</style>

<script src="<?php echo base_url();?>/js/app.js"></script>