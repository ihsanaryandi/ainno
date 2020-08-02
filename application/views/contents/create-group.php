<?php
	function isSelected($index) {
		$inputs = get_instance()->input->post();


		if(!isset($inputs['cofounder'])) return;
		
		if(isset($inputs['cofounder'][$index])) echo "checked";
	}
?>
<main>
	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="col-md-7">
				<div class="card">
					<form class="card-body" action="" method="POST">
						<h4 class="text-center mb-4">Buat Grup</h4>

						<?= csrf(); ?>

						<div class="form-group">
							<label for="groupName">Nama Grup</label>
							<input class="form-control <?= isError('group-name'); ?>" type="text" name="group-name" id="groupName" value="<?= set_value('group-name'); ?>" autofocus>
							<div class="invalid-feedback"><?= form_error('group-name'); ?></div>
						</div>
						<div class="form-group">
							<label for="desc">Deskripsi</label>
							<textarea class="form-control" type="text" name="desc" id="desc"><?= set_value('desc'); ?></textarea>
						</div>
						<hr>
						<div class="create-group-users mb-3">
							<label>Co-Founders</label>
							<ul class="list-group">

								<?php $i = 0; ?>

								<?php foreach($users as $user) : ?>
									<?php $currentIndex = $i++; ?>

									<?php if($user['user_id'] !== user('user_id')) : ?>

									<label class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between align-items-center m-0" for="user<?= $user['user_id']; ?>" style="cursor: pointer;">
										
										<div class="d-flex align-items-center">
											<img src="<?= img($user['profile_picture']); ?>" style="width: 45px; height: 45px; border-radius: 50%;
											object-fit: cover;">
											<h5 class="text-dark m-0 ml-3"><?= $user['username']; ?></h5>
										</div>
										
										<div class="form-check p-0">
											<input class="form-check-input m-0" 
												   type="checkbox" 
												   name="cofounder[<?= $currentIndex; ?>]" 
												   value="<?= $user['user_id']; ?>" 
												   id="user<?= $user['user_id']; ?>" 
												   style="position: static;" 
												   <?= isSelected($currentIndex); ?>
											>
										</div>
									
									</label>

									<?php endif; ?>

								<?php endforeach; ?>
					        </ul>							
						</div>
						<button class="btn btn-success d-block w-100" type="submit">Buat</button>
						<a href="/group" class="btn btn-outline-success d-block w-100 mt-2">Kembali</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>