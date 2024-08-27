<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data Komik</h2>

            <form action="/komik/save" method="post" enctype="multipart/from-data">
                <?= csrf_field(); ?>
  <div class="row mb-3">
    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10 ">
      <!-- <= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?> -->
      <input type="text" 
      class="form-control is-invalid"
        id="judul" name="judul"   autofocus value="<?= old('judul');
      ?>">
      <!-- <= $validation->getError('judul'); ?> -->
      <div class="invalid-feedback">
      Tidak boleh kosong / sama judulnya 
    </div>
    </div>
  </div>
  <div class="row mb-3">
    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="penulis" name="penulis" value="<?= old('penulis');
      ?>">
    </div>
  </div>
  <div class="row mb-3">
    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= old('penerbit');
      ?>">
    </div>
  </div>
  <div class="row mb-3">
    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
    <div class="col-sm-10">
    <div class="input-group mb-3">
  <input type="file" class="form-control is-invalid" id="sampul" name="sampul">
  <label class="input-group-text" for="Sampul">Pilih gambar...</label>
</div>

    </div>
  </div>
  <div class="form-group row">
  <div class="col-sm-10">
  <button type="submit" class="btn btn-primary">Tambah Data</button>
</form>
</div>
</div>
</div>
<?= $this->endSection(); ?>