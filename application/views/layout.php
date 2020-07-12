<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="<?= css('styles'); ?>">

    <title><?= $title; ?></title>
  </head>
  <body>
    
  	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
         <a class="navbar-brand" href="#">Ainno</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto mr-3">
               <a class="nav-item nav-link active" href="index.html">Home <span class="sr-only">(current)</span></a>
               <a class="nav-item nav-link" href="network.html">Jaringan</a>
               <a class="nav-item nav-link" href="discussion.html">Diskusi</a>
            </div>
            <div class="navbar-nav mr-4">
               <a class="btn btn-primary mr-2" href="login.html">Login <span class="sr-only">(current)</span></a>
               <a class="btn btn-success" href="#chooseRoleModal" data-toggle="modal" data-target="#chooseRoleModal">Daftar</a>
            </div>
            <div class="navbar-nav">
               <a href="profile.html">
                  <img class="profile-picture" src="<?= img('co-founder.jpg'); ?>">
               </a>
            </div>
         </div>
      </div>
   </nav>

    <?php include "contents/$FILE"; ?>

    <!-- Modals -->
	<div class="modal fade" id="chooseRoleModal" tabindex="-1" role="dialog" aria-labelledby="chooseRoleModal" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Apa yang kamu inginkan ?</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
            <div class="list-group">
               <a href="register.html?r=looking_cofounder" class="list-group-item list-group-item-action list-group-item-light">
                  <strong>Mencari Co-Founder</h6><br>
                  <small class="text-muted">Cari Co-Founder yang anda inginkan dengan berbagai macam keahlian.</small>
               </a>
               <a href="register.html?r=looking_adviser" class="list-group-item list-group-item-action list-group-item-light">
                  <strong>Mencari Adviser (Penasihat)</h6><br>
                  <small class="text-muted">Cari Adviser yang anda inginkan untuk membimbing bisnis Anda.</small>
               </a>
               <a href="register.html?r=adviser" class="list-group-item list-group-item-action list-group-item-light">
                  <strong>Adviser (Penasihat)</h6><br>
                  <small class="text-muted">Membantu memberikan saran/nasihat kepada para pebisnis pemula.</small>
               </a>
            </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
         </div>
       </div>
     </div>
   </div>
    <!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  	<script type="module" src="<?= js('script'); ?>"></script>
  </body>
</html>