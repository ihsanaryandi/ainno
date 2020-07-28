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
         [
            "name" => "Grup",
            "href" => "/group",
            "path" => "group",
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
            <?php if(!user()) : ?>
               <a class="btn btn-primary mr-2" href="/auth/sign_in">Login <span class="sr-only">(current)</span></a>
               <a class="btn btn-success mr-2" href="#chooseRoleModal" data-toggle="modal" data-target="#chooseRoleModal">Daftar</a>
            <?php endif; ?>

            <?php if(user()) : ?>
               <a class="btn btn-danger mr-2" href="/auth/sign_out">Logout</a>
               <a class="btn btn-primary" href="/network_request">Requests</a>
            <?php endif; ?>
         </div>
         <?php if(user()) : ?>
            <div class="navbar-nav">
               <a href="/profile?username=<?= user()['username']; ?>">
                  <img class="profile-picture" src="<?= img(user()['profile_picture']); ?>" title="<?= user()['username']; ?>">
               </a>
            </div>
         <?php endif; ?>
      </div>
   </div>
</nav>