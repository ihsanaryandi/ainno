<main>
  <div class="container my-5">
     <div class="row justify-content-center">
        <div class="col-md-4" style="border-right: 1px solid rgba(0, 0, 0, 0.2);">
           <div class="card mb-3">
              <div class="card-body">
                 <div class="form-group">
                    <label for="skill">Keahlian</label>
                    <input class="form-control" 
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

                 <!------------ Selected Skills ------------>
                 <div id="skillsSelectedShow"></div>
              </div>
           </div>
           <div class="card mb-3">
              <div class="card-body">
                 <div class="form-group">
                    <label for="city">Kota</label>
                    <input class="form-control" 
                           type="text" 
                           name="city"
                           id="cityAutocompleteInput" 
                           autocomplete="off"
                           placeholder="Kota..."
                           data-results-input="#selectedCitiesInput"
                           data-results-show="#selectedCities"
                           data-autocomplete="#cityResults"
                    >
                    <input type="hidden" name="cities-selected" id="selectedCitiesInput">
                    <div class="autocomplete" id="cityResults">
                       <div class="result" data-value="Bandung">Bandung</div>
                       <div class="result" data-value="Jakarta">Jakarta</div>
                    </div>
                 </div>
                 <div id="selectedCities"></div>
              </div>
           </div>
        </div>
        <div class="col-md-8">
           <div class="form-group">
              <label for="coFounder">Cari Co-Founder</label>
              <input class="form-control" type="text" name="coFounder" id="coFounder" placeholder="Username...">
           </div>
           <div class="mt-5" id="coFounderResults">
              <?php foreach($users as $user) : ?>
                
                <?php if($user['username'] !== user('username')) : ?>
                  <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <a href="/profile?username=<?= $user['username']; ?>">
                          <img src="<?= img($user['profile_picture']); ?>" class="card-img" alt="<?= $user['username']; ?>" title="<?= $user['username']; ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        </a>
                      </div>
                      <div class="col-md-8">       
                        <div class="card-body">
                          <h5 class="card-title">
                             <a class="text-decoration-none text-dark d-block" href="/profile?username=<?= $user['username']; ?>"><?= $user['username']; ?></a>

                             <?php if($user['name']) : ?>
                               <strong style="font-size: .9rem; color: #777;">(<?= $user['name']; ?>)</strong>
                             <?php endif; ?>

                          </h5>
                          <p class="card-text"><?= $user['bio']; ?></p>
                          <p class="card-text">
                             <small class="text-muted"><?= $user['city']; ?></small>
                          </p>

                          <?php if(user()) : ?>

                            <?php if((int) $this->Network->isConnected($user['username'])) : ?>
                              
                              <button class="btn btn-primary disabled">Terhubung</button>
                            
                            <?php else : ?>

                              <form class="d-inline" action="/network/connect" method="POST">  
                                <?= csrf(); ?>

                                <input type="hidden" name="username" value="<?= $user['username']; ?>">
                                <button class="btn btn-primary" type="submit">Hubungkan</button>
                              </form>

                            <?php endif; ?>
                          
                          <?php endif; ?>
                          
                          <a class="btn btn-outline-secondary" href="/profile?username=<?= $user['username']; ?>">Lihat Profil</a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>     
              
              <?php endforeach; ?>
           </div>
        </div>
     </div>
  </div>
</main>