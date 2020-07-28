<main>
	<div class="container my-5">
		<h3 class="mb-4">Grup Bisnismu</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
		<a class="btn btn-primary" href="/group/create">Buat Grup</a>
		<div class="row mt-5">

			<?php if($myGroups) : ?>

				<?php foreach($myGroups as $myGroup) : ?>

					<div class="col-md-4">
						<div class="card group-card">
							<div class="card-body">
								<h5><?= $myGroup['name']; ?></h5>
								<div class="description">
									<small><?= $myGroup['description']; ?></small>
								</div>
								<div class="mt-3">
									<a class="btn btn-primary" href="/group?group_id=<?= $myGroup['group_id']; ?>">Masuk</a>
									<a class="ml-3" href="/group/edit/nama-grup">Edit</a>
								</div>
							</div>
						</div>
					</div>

				<?php endforeach; ?>

			<?php else : ?>

				<div class="col">
					<p class="text-center">Tidak ada grup</p>
				</div>

			<?php endif; ?>

		</div>
		<hr class="my-5">
		<div>
			<h3>Grup lainnya</h3>
			<div class="row mt-5">

				<?php if($otherGroups) : ?>

					<?php foreach($otherGroups as $group) : ?>

						<div class="col-md-4">
							<div class="card group-card">
								<div class="card-body">
									<h5><?= $group['name']; ?></h5>
									<div class="description">
										<small><?= $group['description']; ?></small>
									</div>
									<div class="mt-3">
										<a class="btn btn-primary" href="/group?group_id=<?= $group['group_id']; ?>">Masuk</a>
									</div>
								</div>
							</div>
						</div>

					<?php endforeach; ?>

				<?php else : ?>

					<div class="col">
						<p class="text-center">Tidak ada grup</p>
					</div>

				<?php endif; ?>

			</div>
		</div>
	</div>
</main>