<?php

session_start();

include "baza.php";?>

<?php



  $err = "";

  if (isset($_POST['prijava'])) 

  {



    $email = trim($_POST['email']);

    $lozinka= md5(trim($_POST['lozinka']));



    $upit = mysqli_query($dbconnection, " SELECT* FROM korisnik WHERE email='$email' AND lozinka='$lozinka'");

    $nadjen = mysqli_num_rows($upit);

    if ($nadjen == 1) 

    {

      $korisnik = mysqli_fetch_assoc($upit);

      $_SESSION['korisnik'] = $korisnik;

      if ($korisnik['uloga'] == 'admin') {

        header("location:administrator.php");

        exit();

      } 

      else{

        header("location:anketar.php");

      }

    } 

    else{

      $err = "Email ili lozinka nisu odgovarajući.";

    }

  }

?>

<?php require_once("include/header.php");?>

  <div class="container-fluid">

    <div calss="row">

      <div class="col-md-12">

        <div class="card">

          <div class="card-header bg-primary">

            <div class="row">

              <div class="col-md-6">

                <div class="card-title"><a href="index.php"><h6>Početna</h6></a></div>

              </div>

            </div>

          </div>

          <form method="POST" action='prijava.php'>

            <div class="card-body">

              <div class="row">

                <div class="col-md-3"></div>

                <div class="col-md-6">

                  <div class="card">

                    <div class="card-header bg-primary">

                      <div class="card-title text-center"><h4 class="text-white">Prijava</h4></div>

                    </div>

                    <div class="card-body">

                      <?php if ($err != "") { ?>

                        <div class="alert alert-danger alert-dismissible fade show" role="alert">

                          <strong><?php echo $err; ?></strong>

                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                          </button>

                        </div>

                      <?php } ?>

                      <div class="form-group">

                        <label>Email</label>

                        <input type="text" class="form-control" name="email">

                      </div>

                      <div class="form-group">

                        <label>Lozinka</label>

                        <input type="password" class="form-control" name="lozinka">

                      </div>

                      </div>

                      <div class="card-footer bg-primary text-center"> 

                        <div class="row">

                          <div class="col">

                          <button class="btn btn-light float-left" type="submit" name="prijava">Prijavite se </button>

                          </div>

                          <div class="col">

                          <span class="float-right text-light align-text-bottom">Nemate nalog? Registrujte se <a href="registracija.php" class="text-dark">ovde</a></span>

                          </div>

                        </div>

                    </div>

                  </form>

                </div>

              </div>

          </div>

        </div>

      </div>

    </div>

  </div>

<?require_once("include/footer.php");?>