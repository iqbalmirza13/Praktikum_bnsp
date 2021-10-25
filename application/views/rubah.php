<div style="margin-left: 40px;">
	<h2 class="mt-4">Arsip Surat >> Rubah</h2>
	<p style="margin-bottom: 0;">Rubah surat yang telah terbit pada form ini untuk diarsipkan<br>Catatan :

	</p>
	<ul style="margin: 0;">
		<li>Gunakan file berformat PDF.</li>
	</ul>
</div>

<div class="row" style="margin-left: 40px;margin-top:5px; margin-right: 30px;">
	<div class="col-md-12 mb-4">
		<form action="<?= base_url('welcome/editData') ?>" method="post" enctype="multipart/form-data" style="margin-top: 35px;">
			<div class="mb-3 row">
				<label for="no" class="col-sm-2 col-form-label">Nomor Surat</label>
				<div class="col-sm-10">
					<input type="text" id="idSurat" name="idSurat" value="<?= $surat->id_surat ?>" readonly hidden>
					<input type="text" class="form-control" style="width:30%;" id="no" name="no" value="<?= $surat->no_surat ?>" required>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="no" class="col-sm-2 col-form-label">Kategori</label>
				<div class="col-sm-10">
					<select name="kategori" id="kategori" class="form-select" style="width: 40%;" required>
						<option <?php if($surat->kategori == "Undangan"){ echo 'selected="selected"'; } ?> value="Undangan">Undangan</option>
						<option <?php if($surat->kategori == "Pengumuman") : echo 'selected="selected"'; endif; ?>value="Pengumuman">Pengumuman</option>
						<option <?php if($surat->kategori == "Nota Dinas") : echo 'selected="selected"'; endif; ?>value="Nota Dinas">Nota Dinas</option>
						<option <?php if($surat->kategori == "Pemberitahuan") : echo 'selected="selected"'; endif; ?>value="Pemberitahuan">Pemberitahuan</option>
					</select>
					
				</div>
			</div>
			<div class="mb-3 row">
				<label for="judul" class="col-sm-2 col-form-label">Judul</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="judul" id="judul" value="<?= $surat->judul ?>" required>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="surat" class="col-sm-2 col-form-label">File Surat (PDF) </label>
				<div class="col-sm-10">
					<input type="file" class="form-control" name="surat" id="surat" accept="application/pdf" style="width: 60%;">
				</div>
			</div>
			<div class="mb-3 row">
				<div class="col-sm-3 mt-3">
					<a href="<?= base_url('welcome/lihat/').$surat->id_surat ?>" class="btn btn-danger me-3"> << Kembali</a>
					<button type="submit" class="btn btn-primary" >Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
