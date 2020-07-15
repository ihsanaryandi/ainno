<!-- Modals -->

<!-- Type Modal -->
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
           <a href="/auth/sign_up?r=looking_cofounder" class="list-group-item list-group-item-action list-group-item-light">
              <strong>Mencari Co-Founder</h6><br>
              <small class="text-muted">Cari Co-Founder yang anda inginkan dengan berbagai macam keahlian.</small>
           </a>
           <a href="/auth/sign_up?r=looking_adviser" class="list-group-item list-group-item-action list-group-item-light">
              <strong>Mencari Adviser (Penasihat)</h6><br>
              <small class="text-muted">Cari Adviser yang anda inginkan untuk membimbing bisnis Anda.</small>
           </a>
           <a href="/auth/sign_up?r=adviser" class="list-group-item list-group-item-action list-group-item-light">
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

<!-- Skill Modal -->
<div class="modal fade" id="changeSkills" tabindex="-1" role="dialog" aria-labelledby="changeSkillsModal" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Keahlian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input class="form-control" 
          type="text" 
          placeholder="Software Engineering, Design, etc..." 
          id="skillsAutocomplete" 
          autocomplete="off" 
          data-results-input="#skillsSelectedInput" 
          data-results-show="#skillsSelectedShow"
          data-autocomplete="#skillsAutocomplete"
          >

          <!------------ If the Actual Skill Results were empty. GIVE THEM A FEEDBACK!!! ------------>
          <div class="invalid-feedback">Keahlian tidak boleh kosong</div>

          <!------------ Actual Skill Results ------------>
          <input type="hidden" name="skills-selected" id="skillsSelectedInput">
          <!------------ /Actual Skill Results ------------>

          <div class="autocomplete" id="skillsAutocomplete">
            <!-- <div class="result" data-value="Web Development">Web Development</div>
            <div class="result" data-value="Marketing">Marketing</div> -->

            <!-- If There are no results -->
            <!-- <div class="no-results"><strong>Tidak ada hasil</strong></div> -->
          </div>
        </div>
        <div id="skillsSelectedShow"></div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">Edit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </form>
  </div>
</div>