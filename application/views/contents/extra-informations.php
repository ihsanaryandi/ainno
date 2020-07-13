<main>
	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<form class="card-body" method="POST" action="co-founder-informations.html" enctype="multipart/form-data">
						<h5 class="mb-3 text-center">Profil</h5>
						<h6 class="mb-3">Profil</h6>
						<div class="custom-file mb-3">
							<input type="file" class="custom-file-input" name="profile-picture" id="profilePicture">
							<label class="custom-file-label" for="profilePicture">Pilih foto...</label>
						</div>
						<div class="form-group">
							<label for="bio">Bio</label>
							<textarea class="form-control" name="bio" id="bio" placeholder="Kesankan para co-founder..."></textarea>
						</div>
						<h6 class="mb-3">Keahlian <span class="text-danger">*</span></h6>
						<div class="form-group">
							<input class="form-control is-invalid" 
								   type="text" 
								   placeholder="Software Engineering, Design, etc..." 
								   autocomplete="off"
								   data-autocomplete="#skillsAutocomplete" 
								   data-results-input="#skillsSelectedInput" 
								   data-results-show="#skillsSelectedShow"
							>

							<!------------ If the Actual Skill Results were empty. GIVE THEM A FEEDBACK!!! ------------>
							<div class="invalid-feedback">Keahlian tidak boleh kosong</div>

							<!------------ Actual Skill Results ------------>
                        	<input type="hidden" name="skills-selected" id="skillsSelectedInput">
                        	<!------------ /Actual Skill Results ------------>

							<div class="autocomplete" id="skillsAutocomplete"></div>
						</div>

                        <div class="mb-3" id="skillsSelectedShow"></div>
						
						<!-- <h6 class="mb-3">Kontak</h6>
						<div class="form-group">
							<label for="phone">No. Telp</label>
							<input class="form-control" type="text" id="phone" name="phone" placeholder="08xxxxxxxxx">
						</div> -->

						<h6 class="mb-3">Tempat Tinggal</h6>
						<div class="form-group">
							<label for="city">Kota <span class="text-danger">*</span></label>
							<input class="form-control" type="text" id="city" name="city" placeholder="Kota...">
						</div>
						<button class="btn btn-primary d-block w-100" type="submit">Lanjut</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>