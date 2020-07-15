<main>
	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<form class="card-body" method="POST" action="">
						<h5 class="text-center">Co Founder</h5>
						<small class="d-block text-center mb-3">Co Founder seperti apa yang anda inginkan ?</small>
						<div class="form-group">
							<label for="skills">Keahlian</label>
							<input class="form-control is-invalid" 
								   type="text" 
								   placeholder="Software Engineering, Design, etc..." 
								   autocomplete="off"
								   id="skills"
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
						<div class="form-group">
							<label for="city">Kota</label>
							<input class="form-control" type="text" id="city" autocomplete="off" placeholder="Bandung, Jakarta, etc..." data-autocomplete="#cityResults" data-results-show="#citiesSelected" data-results-input="#citiesSelectedInput">
							
							<!------------ Actual Cities Input ------------>
							<input type="hidden" name="cities-selected" id="citiesSelectedInput">

							<div class="autocomplete" id="cityResults">
								<div class="result" data-value="Bandung">Bandung</div>
								<div class="result" data-value="Jakarta">Jakarta</div>
								
								<!-- If There are no results -->
	                           	<!-- <div class="no-results"><strong>Tidak ada hasil</strong></div> -->
							</div>
						</div>
						<div class="mb-3" id="citiesSelected"></div>
						<button class="btn btn-primary d-block w-100" type="submit">Lanjut</button>
						<a href="/network" class="btn btn-outline-primary d-block w-100 mt-1">Lewati</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>