<main>
	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="col-md-7">
				<div class="card mb-5">
					<div class="card-body">
						<h5 class="text-center mb-4">Permintaan Jaringan</h5>

						<?php foreach($networkRequests as $request) : ?>

							<div class="user d-flex justify-content-between align-items-center mb-3">
								<a class="d-flex align-items-center text-dark" href="/profile?username=<?= $request['username']; ?>">
									<img src="<?= img($request['profile_picture']); ?>" style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover;">
									<h6 class="ml-3"><?= $request['username']; ?></h6>
								</a>
								<div class="cta">
									<form class="d-inline" action="/network_request/accept" method="POST">
										<?= csrf(); ?>
										<?= method('PUT'); ?>
										<input type="hidden" name="user-id" value="<?= $request['user_id']; ?>">
										<button class="btn btn-primary">Terima</button>
									</form>
									
									<form class="d-inline" action="/network_request/decline" method="POST">
										<?= csrf(); ?>
										<?= method('DELETE'); ?>
										<input type="hidden" name="user-id" value="<?= $request['user_id']; ?>">
										<button class="btn btn-outline-primary">Tolak</button>
									</form>
								</div>
							</div>

						<?php endforeach; ?>

						<?php if(empty($networkRequests)) : ?>

							<p class="text-center">Tidak ada permintaan jaringan</p>

						<?php endif; ?>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<h5 class="text-center mb-4">Jaringan</h5>

						<?php foreach($connectedNetworks as $network) : ?>

							<div class="user d-flex justify-content-between align-items-center mb-3">
								<a class="d-flex align-items-center text-dark" href="/profile?username=<?= $network['username']; ?>">
									<img src="<?= img($network['profile_picture']); ?>" style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover;">
									<h6 class="ml-3"><?= $network['username']; ?></h6>
								</a>
								<div class="cta">
									<form class="d-inline" action="/network/disconnect" method="POST">
										<?= csrf(); ?>
										<?= method('DELETE'); ?>
										<input type="hidden" name="user-id" value="<?= $network['user_id']; ?>">
										<button class="btn btn-primary">Putuskan</button>
									</form>
								</div>
							</div>

						<?php endforeach; ?>

						<?php if(empty($connectedNetworks)) : ?>

							<p class="text-center">Tidak ada jaringan</p>

						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>