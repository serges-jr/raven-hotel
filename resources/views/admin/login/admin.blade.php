@extends('layout.login')
@section('title','admin')
@section('content')
<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Raven Admin</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Connexion Au Dashboard</h5>
                  <p class="text-center small">Entrer Le Speudo & Mot De Passe</p>
                </div>

                <form class="row g-3 needs-validation" novalidate method="post" enctype="multipart/form-data">
                    @csrf

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Speudo</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="name" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Entrer Le Speudo.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Mot De Passe</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Entrer Le Mot De Passe!</div>
                  </div>

                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Connexion</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

  </div>
@endsection
