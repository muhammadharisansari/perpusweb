<main class="main" id="top">
	<section class="py-5 overflow-hidden bg-primary" id="home">
		<div class="container mt-6 mb-7">
			<div class="row flex-center">
				<div class="col-md-5 col-lg-6 order-0 order-md-1 mt-5 mt-md-0"><a class="img-landing-banner" href="#!"><img class="img-fluid" src="<?php echo base_url() ?>assets/front/img/gallery/buku_jangan_dihapus.png" alt="hero-header" /></a></div>
				<div class="col-md-7 col-lg-6 py-8 mb-4 text-md-start text-center">
					<h1 class="display-1 fs-md-5 fs-lg-6 fs-xl-8 text-light">Mau cari buku ?</h1>
					<h1 class="text-800 mb-5 fs-4">Sebutkan judul buku atau no ISBN</h1>
					<div class="card w-xxl-75">
						<div class="card-body mt-2 mb-2">
							<div class="tab-content" id="nav-tabContent">
								<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<form class="row gx-2 gy-2 align-items-center" action="<?= base_url('front/hasil') ?>" method="POST" enctype="application/x-www-form-urlencoded">
										<div class="col">
											<div class="input-group-icon">
												<i class="fas fa-check text-danger input-box-icon"></i>
												<input class="form-control input-box form-foodwagon-control" id="inputDelivery" type="text" name="cari" placeholder="Pencarian.." />
											</div>
										</div>
										<div class="d-grid gap-3 col-sm-auto"><button class="btn btn-danger" type="submit">Cari</button></div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>