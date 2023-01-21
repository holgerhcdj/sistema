<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Sistema Académico</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
  <!-- CSS Libraries -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('web/css/components.css') }}">
  <!-- Start GA -->
  <link href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">

<style>
    .wizard-step-active:hover{
        cursor: pointer;
        background:#3946B1 !important;
        transition: background 0.4s ease-in-out;
    }
    .wizard-step-active{
        background:#6777ef !important;
        transition: background 0.4s ease-in-out;
        width:250px;
    }
</style>

</head>

<body>
      <div class="container mt-5">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h2>SISTEMA ACADÉMICO</h2>
                  </div>
                  <div class="card-body">
                    <div class="row mt-4">

                      <div class="col-12 col-lg-8 offset-lg-2">
                        <div class="wizard-steps">
                            <a href="{{ route('login',0) }}" target="_blank">
                              <div class="wizard-step wizard-step-active">
                                <div class="wizard-step-icon display-5">
                                  <i class="fas fa-user-secret"></i>
                                </div>
                                <div class="wizard-step-label">
                                      SUPER ADMINISTRADOR
                                </div>
                              </div>
                            </a>
                            <a href="{{ route('login',1) }}" target="_blank">  
                              <div class="wizard-step wizard-step-active">
                                <div class="wizard-step-icon display-5">
                                  <i class="fas fa-user-cog"></i>
                                </div>
                                <div class="wizard-step-label">
                                  ADMINISTRADOR DE CARRERA
                                </div>
                              </div>
                            </a>
                            <a href="{{ route('login',2) }}" target="_blank">
                              <div class="wizard-step wizard-step-active">
                                <div class="wizard-step-icon display-5">
                                  <i class="fas fa-user-graduate"></i>
                                </div>
                                <div class="wizard-step-label">
                                  DOCENTE
                                </div>
                              </div>
                            </a>  
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
      </div>


  <!-- General JS Scripts -->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/popper.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('web/js/stisla.js') }}"></script>

  <script src="{{ asset('assets/js/tooltip.js')}} "></script>
  <script src="{{ asset('assets/js/moment.min.js')}} "></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{ asset('web/js/scripts.js') }}"></script>
  <script src="{{ asset('web/js/custom.js') }}"></script>
</body>
</html>