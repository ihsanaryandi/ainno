<main>
	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="card">
					<form class="card-body" action="" method="POST" enctype="multipart/form-data">
						<h5 class="text-center mb-3">Edit Profil</h5>
						
						<?= csrf(); ?>

						<?= method('PUT'); ?>
						<div class="form-group">
							<label for="profilePicture">Foto Profil</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="profile-picture" id="profilePicture">
								<label class="custom-file-label" for="profilePicture">Pilih foto...</label>
							</div>
						</div>
						<div class="form-group">
							<label for="name">Nama</label>
							<input class="form-control" type="text" id="name" name="name" placeholder="Nama..." value="<?= user('name'); ?>">
						</div>
						<div class="form-group">
							<label for="city">Kota</label>
							<input class="form-control" type="text" id="city" name="city" placeholder="City..." value="<?= user('city'); ?>">
						</div>
						<div class="form-group">
							<label for="bio">Bio</label>
							<textarea class="form-control" name="bio" id="bio" placeholder="Kesankan para Co-Founder..."><?= user('bio'); ?></textarea>
						</div>
						<button class="btn btn-primary d-block w-100" type="submit">Edit</button>
						<a href="/profile?username=shuzolotova" class="btn btn-outline-primary d-block w-100 mt-2">Kembali</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>