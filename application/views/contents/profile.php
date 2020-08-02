<main>
	<div class="container my-5">
		<div class="row justify-content-center">
			<?php if($user) : ?>
				<div class="col-md-8 mb-4 text-center profile">
					<div class="card">
						<div class="card-body">
							<div class="profile-picture">
								<img src="<?= img($user['profile_picture']); ?>">
							</div>
							<div class="username mb-2">
								<?= $user['username']; ?>  <!-- USERNAME -->
								<?php if($user['name'] != '') : ?>
									<strong class="name">(<?= $user['name']; ?>)</strong>  <!-- NAME : not required -->
								<?php endif ?>
							</div>
							
							<p><strong class="city"><?= $user['city']; ?></strong></p>
							<p class="bio"><?= $user['bio']; ?></p>

							<?php if($user['user_id'] === user('user_id')) : ?>
								<a href="/profile/edit" class="btn btn-secondary w-50 m-auto">Edit Profil</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-md-8 mb-4">
					<div class="card">
						<div class="card-header d-flex align-items-center justify-content-between">
							<h5 class="m-0">Keahlian</h5>
							<?php if($user['user_id'] === user('user_id')) : ?>
								<a href="#changeSkills" data-toggle="modal" data-modal="#changeSkills">Edit</a>
							<?php endif; ?>
						</div>
						<div class="card-body">
							<?php foreach($userSkills as $userSkill) : ?>
								<div class="badge badge-pill badge-dark py-2 px-3 mb-2"><?= $userSkill['skill_name']; ?></div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
				<div class="col-md-8 mb-4">
					<div class="card">
						<div class="card-header d-flex align-items-center justify-content-between">
							<h5 class="m-0">Mencari Co-Founder dengan keahlian</h5>

							<?php if($user['user_id'] === user('user_id')) : ?>
								<a href="#changeSkills" data-toggle="modal" data-modal="#changeSkills">Edit</a>
							<?php endif; ?>
						</div>
						<div class="card-body">
							<?php foreach ($wantedSkills as $wantedSkill) : ?>
								<div class="badge badge-pill badge-dark py-2 px-3 mb-2"><?= $wantedSkill['skill_name']; ?></div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>

			<?php else : ?>

				<h1>Pengguna tidak ditemukan</h1>

			<?php endif; ?>
		</div>
	</div>
</main>