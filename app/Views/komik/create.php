<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data Komik</h2>
            <!-- enctype="multipart/from-data" -->
            <form action="/komik/save" method="post" enctype="multipart/from-data">
                <?= csrf_field(); ?>
  <div class="row mb-3">
    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10 ">

      <input type="text" 
      class="form-control <?= ($validation->hasError('judul'))?'is-invalid':'';?>"
        id="judul" name="judul" value="<?= old('judul'); ?>" autofocus aria-describedby="judulFeedback">
      <div class="invalid-feedback">
      <?= $validation->getError('judul'); ?>
    </div>
    </div>
  </div>
  <div class="row mb-3">
    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="penulis" name="penulis" value="<?= old('penulis');  ?>">
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
    <div class="custom-file">
  <input type="text" class="form-control 
      <?= ($validation->hasError('sampul'))?'is-invalid' : ''; ?>" id="sampul" name="sampul" 
      >
      <!-- multiple required name="sampul" onchange="previewImg() -->
      <div class="invalid-feedback">
      <?= $validation->getError('sampul');?>
    </div>
      
  <!-- <label class="custom-file-label" for="Sampul">Pilih gambar...</label> -->
</div>
    </div>
  </div>
  <div class="form-group row">
  <div class="col-sm-10">
  <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
</form>
</div>
</div>
</div>
<?= $this->endSection(); ?>