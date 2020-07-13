<main>
	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<form class="card-body" action="/auth/extra_informations" method="POST">
						<h5 class="text-center mb-3">Daftar Ke Ainno</h5>
						<input type="hidden" name="TYPE" value="<?= $this->input->get('r'); ?>">
						<div class="form-group">
							<label for="username">Username</label>
							<input class="form-control is-invalid" type="text" id="username" name="username" placeholder="Username...">
							<div class="invalid-feedback">Username tidak boleh mengandung karakter spasi</div>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input class="form-control" type="text" id="email" name="email" placeholder="Email...">
							<div class="invalid-feedback">Email sudah terdaftar</div>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input class="form-control" type="password" id="password" name="password" placeholder="Password...">
							<div class="invalid-feedback">Password minimal 7 karakter</div>
						</div>
						<div class="form-group">
							<label for="passwordConfirm">Konfirmasi Password</label>
							<input class="form-control" type="password" id="passwordConfirm" name="password-confirm" placeholder="Konfirmasi Password...">
							<div class="invalid-feedback">Password tidak sama</div>
						</div>
						<p>Sudah punya akun ? <a href="/auth/login">Masuk</a></p>
						<button class="btn btn-primary d-block w-100" type="submit">Daftar</button>
						<a href="/" class="btn btn-outline-primary d-block w-100 mt-2">Kembali</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>