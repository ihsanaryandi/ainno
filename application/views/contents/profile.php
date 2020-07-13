<main>
	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="col-md-8 mb-4 text-center profile">
				<div class="card">
					<div class="card-body">
						<div class="profile-picture">
							<img src="<?= img('co-founder.jpg'); ?>">
						</div>
						<div class="username mb-2">
							shuzolotova  <!-- USERNAME -->
							<strong class="name">(Sasha Zotova)</strong>  <!-- NAME : not required --> 
						</div>
						<p><strong class="city">Bandung, Indonesia</strong></p>
						<p class="bio">Founder of Google</p>
						<a href="/profile/edit?username=shuzolotova" class="btn btn-secondary w-50 m-auto">Edit Profil</a>
					</div>
				</div>
			</div>
			<div class="col-md-8 mb-4">
				<div class="card">
					<div class="card-header d-flex align-items-center justify-content-between">
						<h5 class="m-0">Keahlian</h5>
						<a href="#changeSkills" data-toggle="modal" data-modal="#changeSkills">Edit</a>
					</div>
					<div class="card-body">
						<div class="badge badge-pill badge-dark py-2 px-3 mb-2">Web Development</div>
						<div class="badge badge-pill badge-dark py-2 px-3 mb-2">Frontend Development</div>
						<div class="badge badge-pill badge-dark py-2 px-3 mb-2">Backend Development</div>
						<div class="badge badge-pill badge-dark py-2 px-3 mb-2">HTML, CSS, Javascript</div>
					</div>
				</div>
			</div>
			<div class="col-md-8 mb-4">
				<div class="card">
					<div class="card-header d-flex align-items-center justify-content-between">
						<h5 class="m-0">Mencari Co-Founder dengan keahlian</h5>
						<a href="#changeSkills" data-toggle="modal" data-modal="#changeSkills">Edit</a>
					</div>
					<div class="card-body">
						<div class="badge badge-pill badge-dark py-2 px-3 mb-2">Design</div>
						<div class="badge badge-pill badge-dark py-2 px-3 mb-2">Web Design</div>
						<div class="badge badge-pill badge-dark py-2 px-3 mb-2">UI/UX Designer</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>