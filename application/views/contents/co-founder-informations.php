<main>
	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<form class="card-body" method="POST" action="">
						<h5 class="text-center">Co Founder</h5>
						<small class="d-block text-center mb-3">Co Founder seperti apa yang anda inginkan ?</small>
						
						<?= csrf(); ?>
						<div class="form-group">
							<label for="skills">Keahlian <span class="text-danger">*</span></label>
							<input class="form-control <?= isError('skills-selected'); ?>" 
								   type="text" 
								   placeholder="Software Engineering, Design, etc..." 
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
							<label for="city">Kota</label>
							<input class="form-control" 
								   type="text" 
								   id="city" 
								   autocomplete="off" 
								   placeholder="Bandung, Jakarta, etc..." 
								   data-autocomplete="#coFounderCitiesAutocomplete" 
								   data-results-show="#citiesSelected"
								   data-results-input="#citiesSelectedInput"
							>
							
							<!------------ Actual Cities Input ------------>
							<input type="hidden" name="cities-selected" id="citiesSelectedInput">

							<div class="autocomplete" id="coFounderCitiesAutocomplete"></div>
						</div>
						<div class="mb-3" id="citiesSelected"></div>
						<button class="btn btn-primary d-block w-100" type="submit">Lanjut</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>