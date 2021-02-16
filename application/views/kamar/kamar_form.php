<div class="container-fluid">
    <h1 class="mt-4"><i class="fas fa-door-open"></i> Tambah Kamar</h1>
    <hr>
    <br>
    <div class="container">
    <div class="row">
        <div class="col-sm-12 text-right">
            <a href="<?= site_url('kamar') ;?>" class="btn btn-warning ml-auto"><i class="fa fa-undo"></i> Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="<?= site_url('kamar/proses') ;?>" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label for="">No Kamar</label>
                    <input type="text" name="no_kamar" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Type</label>
                    <select name="type" id="" class="form-control" required>
                        <option value="">--Pilih--</option>
                      <?php foreach($type->result() as $key=>$data) :?>
                        <option value="<?= $data->type_id ;?>"><?= $data->type ;?></option>
                      <?php endforeach;?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Harga Kamar</label>
                    <input type="text" name="harga_kamar" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Fasilitas</label>
                    <input type="text" name="fasilitas" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="Terisi">Terisi</option>
                        <option value="Kosong">Kosong</option>
                        <option value="Perbaikan">Perbaikan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="foto" class="form-control" required>
                </div>

                <div class="form-group text-right">
                    <button type="submit" name="add_kamar" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                    <button type="reset" class="btn btn-secondary btn-flat"><i class="fa fa-undo"></i> Reset</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>