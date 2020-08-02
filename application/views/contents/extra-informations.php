<main>
	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<form class="card-body" method="POST" action="" enctype="multipart/form-data">
						<h5 class="mb-3 text-center">Profil</h5>
						
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
							<input class="form-control" name="name" id="name" value="<?= user('name'); ?>">
						</div>
						<div class="form-group">
							<label for="bio">Bio</label>
							<textarea class="form-control" name="bio" id="bio" placeholder="Kesankan para co-founder..."><?= user('bio'); ?></textarea>
						</div>
						<div class="form-group">
							<label for="skills">Keahlian <span class="text-danger">*</span></label>
							<input class="form-control <?= isError('skills-selected'); ?>" 
								   type="text" 
								   placeholder="Software Engineering, Design, dll..." 
								   autocomplete="off"
								   id="skills" 
								   data-autocomplete="#skillsAutocomplete"
								   data-results-input="#skillsSelectedInput"
								   data-results-show="#skillsSelectedShow"
							>

							<!------------ If the Actual Skill Results were empty. GIVE THEM A FEEDBACK!!! ------------>
							<div class="invalid-feedback"><?= form_error('skills-selected'); ?></div>

							<!------------ Actual Skill Results ------------>
                        	<input type="hidden" name="skills-selected" id="skillsSelectedInput">
                        	<!------------ /Actual Skill Results ------------>

							<div class="autocomplete" id="skillsAutocomplete"></div>
						</div>

                        <div class="mb-3" id="skillsSelectedShow"></div>

						<div class="form-group">
							<label for="city">Kota <span class="text-danger">*</span></label>
							<input class="form-control <?= isError('city'); ?>" type="text" id="city" name="city" placeholder="Kota..." autocomplete="off" data-autocomplete="#citiesAutocomplete">
							
							<div class="autocomplete" id="citiesAutocomplete"></div>
							<div class="invalid-feedback"><?= form_error('city'); ?></div>
						</div>
						<button class="btn btn-primary d-block w-100" type="submit">Kirim</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>