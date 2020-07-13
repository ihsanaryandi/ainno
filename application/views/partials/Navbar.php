<?php 
		$navLinks = [
			[
				"name" => "Home",
				"href" => "/home",
            "path" => "home",
            "active" => ""
			],
			[
				"name" => "Jaringan",
				"href" => "/network",
            "path" => "network",
            "active" => ""
			],
			[
				"name" => "Diskusi",
				"href" => "/discussion",
            "path" => "discussion",
            "active" => ""
			],
		];
      
      for ($i=0; $i < count($navLinks); $i++) { 
         if(uri_string() === '') 
         {
            $navLinks[0]['active'] = 'active';
            break;
         }
         else if($navLinks[$i]['path'] === uri_string()) 
         {
            $navLinks[$i]['active'] = 'active';
         }
      }
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <div class="container">
      <a class="navbar-brand" href="/">Ainno</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
         <div class="navbar-nav ml-auto mr-3">
            <?php foreach($navLinks as $navLink) : ?>
               <a class="nav-item nav-link <?= $navLink['active']; ?>" href="<?= $navLink['href']; ?>"><?= $navLink['name']; ?></a>
            <?php endforeach; ?>
         </div>
         <div class="navbar-nav mr-4">
            <a class="btn btn-primary mr-2" href="/auth/login">Login <span class="sr-only">(current)</span></a>
            <a class="btn btn-success mr-2" href="#chooseRoleModal" data-toggle="modal" data-target="#chooseRoleModal">Daftar</a>
            <a class="btn btn-danger" href="#">Logout</a>
         </div>
         <div class="navbar-nav">
            <a href="/profile?username=shuzolotova">
               <img class="profile-picture" src="<?= img('co-founder.jpg'); ?>">
            </a>
         </div>
      </div>
   </div>
</nav>