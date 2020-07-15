<main>
	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<form class="card-body" action="/auth/sign_up?r=<?= $this->input->get('r'); ?>" method="POST">
						<h5 class="text-center mb-3">Daftar Ke Ainno</h5>
						<input type="hidden" name="TYPE" value="<?= $this->input->get('r'); ?>">
						<div class="form-group">
							<label for="username">Username</label>
							<input class="form-control <?= isError('username'); ?>" 
								   type="text" 
								   id="username" 
								   name="username" 
								   placeholder="Username..." 
								   autocomplete="off"
								   value="<?= set_value('username'); ?>"
							>
							<div class="invalid-feedback"><?= form_error('username'); ?></div>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input class="form-control <?= isError('email'); ?>" type="text" id="email" name="email" placeholder="Email..." autocomplete="off" value="<?= set_value('email'); ?>">
							<div class="invalid-feedback"><?= form_error('email'); ?></div>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input class="form-control <?= isError('password'); ?>" type="password" id="password" name="password" placeholder="Password..." value="<?= set_value('password'); ?>">
							<div class="invalid-feedback"><?= form_error('password'); ?></div>
						</div>
						<div class="form-group">
							<label for="passwordConfirm">Konfirmasi Password</label>
							<input class="form-control <?= isError('password-confirm'); ?>" type="password" id="passwordConfirm" name="password-confirm" placeholder="Konfirmasi Password..." value="<?= set_value('password-confirm'); ?>">
							<div class="invalid-feedback"><?= form_error('password-confirm'); ?></div>
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