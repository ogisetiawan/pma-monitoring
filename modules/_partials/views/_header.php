  <!--Navbar-->
  <nav class="navbar navbar-dark red-pma navbar-expand-md sticky-top scrolling-navbar">
      <div class="container-fluid">
          <!-- Brand -->
          <a class="navbar-brand waves-effect" href="<?= site_url('') ?>" style="font-weight:600">
              <img src="http://192.168.35.160/portal/monitoring_old/img/blowing.gif" height="30" alt="Pinus Merah Abadi">
          </a>

          <!-- Collapse -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Links -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-size:13px">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                      <a class="nav-link" href="<?= site_url(); ?>">
                          <i class="fas fa-desktop"></i> Monitoring
                          <span class="sr-only">(current)</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="<?= site_url('sales_dailly'); ?>">
                          <i class="fas fa-box-open"></i> Sales Dailly</a>
                  </li>
                  <a id="navbar-static-login" class="btn btn-outline-light btn-sm" data-toggle="modal" style="border-radius:16px" data-target="#modalLogin">
                      Log In&nbsp;&nbsp;<i class="fas fa-sign-in-alt"></i>
                  </a>
                  <a id="navbar-static-login" class="btn btn-outline-light btn-sm" data-toggle="modal" style="border-radius:16px" data-target="#modalAdmin">
                      Log Out&nbsp;&nbsp;<i class="fas fa-sign-in-alt"></i>
                  </a>
              </ul>
          </div>
      </div>
  </nav>
  <!--/.Navbar-->

  <!-- Modalpool:LoginForm-->
  <div class="modal fade right" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true" data-backdrop="false">
      <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
          <div class="modal-content">
              <!--Header-->
              <div class="modal-header" style="background: -webkit-linear-gradient(right, #f05454 0%, #cc0000 65%);">

                  <p class="heading lead text-uppercase">dashboard monitoring</p>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="white-text">×</span>
                  </button>
              </div>
              <!--Body-->
              <div class="modal-body">
                  <!-- Material form register -->
                  <form>
                      <!-- Material outline input with prefix-->
                      <p class="h4 mb-4"><i class="fas fa-sign-in-alt animated rotateIn mr-2"></i>Login Form</p>
                      <div class="md-form md-outline">
                          <i class="fas fa-envelope prefix grey-text"></i>
                          <input type="text" id="inputIconEx1" class="form-control">
                          <label for="inputIconEx1" data-error="wrong" data-success="right">E-mail address</label>
                      </div>
                      <div class="md-form md-outline">
                          <i class="fas fa-lock prefix grey-text"></i>
                          <input type="password" id="inputValidationEx2" class="form-control validate">
                          <label for="inputValidationEx2" data-error="wrong" data-success="right">Your password</label>
                      </div>
                      <div class="d-flex justify-content-around">
                          <div>
                              <!-- Remember me -->
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                                  <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                              </div>
                          </div>
                          <div>
                              <!-- Forgot password -->
                              <a href="">Forgot password?</a>
                          </div>
                      </div>
                      <div class="text-center mt-4">
                          <button class="btn btn-sm btn-cyan text-uppercase" data-dismiss="modal" type="submit">Cancel</button>
                          <button class="btn btn-sm btn-danger text-uppercase" type="submit">Login</button>
                      </div>
                  </form>
                  <!-- Material form register -->
              </div>
          </div>
      </div>
  </div>
  <!-- Modalpool:LoginForm-->

  <!-- Modalpool:AdminDashboard-->
  <div class="modal fade right" id="modalAdmin" tabindex="-1" role="dialog" aria-labelledby="modalAdmin" aria-hidden="true" data-backdrop="false">
      <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
          <div class="modal-content">
              <!--Header-->
              <div class="modal-header" style="background: -webkit-linear-gradient(right, #f05454 0%, #cc0000 65%);">
                  <p class="heading lead text-uppercase">Administrator Monitoring</p>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="white-text">×</span>
                  </button>
              </div>
              <!--Body-->
              <div class="modal-body">
                  <!-- Material form register -->
                  <form>
                      <p class="h4 mb-4"><i class="fas fa-users animated rotateIn mr-2"></i>Hi, Admin</p>
                      <label for="select-depo" class="text-uppercase">Depo</label>
                      <div class="form-group">
                          <select class="tail-select-multiple" id="select-depo" name="lblDepo" multiple placeholder="Select an reason">
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                          </select>
                      </div>
                      <label for="select-reason" class="text-uppercase">Reason</label>
                      <div class="form-group">
                          <select class="tail-select-single" id="select-reason" name="lblReason" multiple placeholder="Select an reason">
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                          </select>
                      </div>
                      <label for="select-modul" class="text-uppercase">Modul</label>
                      <div class="form-group">
                          <select class="tail-select-single" id="select-modul" name="lblModul" multiple placeholder="Select an modul">
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="inputAddress" class="text-uppercase">TRANSACTION DATE</label>
                          <input type="date" id="inputMDEx" class="form-control form-control-sm">
                      </div>
                      <div class="form-group">
                          <label for="inputAddress" class="text-uppercase">Form No Sales </label>
                          <div class="input-group input-group-sm">
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input input-xs" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file..</label>
                              </div>
                          </div>
                      </div>
                      <div class="text-center mt-4">
                          <button type="button" class="btn btn-sm btn-danger btn-block">SUBMIT</button>
                      </div>
                  </form>
                  <!-- Material form register -->
              </div>
          </div>
      </div>
  </div>
  <!-- Modalpool:AdminDashboard-->