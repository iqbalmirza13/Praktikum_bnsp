<div style="margin-left: 100px;">
	<h1 class="mt-4">Arsip Surat</h1>
	<p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan,<br>Klik "lihat" pada kolom aksi untuk menampilkan surat.</p>
</div>
<form action="" method="get" style="margin-top: 45px;">
	<div class="row" style="margin-left: 50px;">
		<div style="flex: 0 0 auto; width: 10%;">
			<p style="padding-top: 4px; font-weight: bold;">Cari surat: </p>
		</div>
		<div class="col-md-8">
			<div class="form-group has-search">
				<span class="fa fa-search form-control-feedback"></span>
				<input type="text" class="form-control" placeholder="Search" style=" border-radius: 25px;" name="cari">
			</div>
		</div>
		<div class="col-md-2">
			<button class="btn btn-dark" type="submit" style="box-shadow: 2px 2px 2px rgba(0,0,0,0.8);">Cari!</button>
		</div>
	</div>
</form>
<div class="row" style="margin-left: 50px;margin-top:10px; margin-right: 30px;">
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nama Surat</th>
					<th>Kategori</th>
					<th>Judul</th>
					<th>Waktu Pengerjaan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($surat as $s) { ?>
					<tr>
						<td><?= $s->no_surat ?></td>
						<td><?= $s->kategori ?></td>
						<td><?= $s->judul ?></td>
						<td><?= $s->waktu_input ?></td>
						<td>
							<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?=  $s->id_surat  ?>"> Hapus </button>
							<a class="btn btn-warning" href="<?= base_url('welcome/download/'). $s->file_surat ?>"><b>Unduh</b></a>
							<a class="btn btn-primary" href="<?= base_url('welcome/lihat/') . $s->id_surat ?>"><b>Lihat > ></b></a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="col-md-3">
		<a href="<?= base_url('welcome/unggah') ?>" class="btn btn-primary" style="box-shadow: 2px 2px 2px rgba(0,0,0,0.8);">Arsipkan Surat..</a>
	</div>
</div>