<div class="container-fluid">
    <h1 class="mt-4"><i class="fab fa-youtube"></i> Edit Data Kamar</h1>
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
                    <input type="hidden" name="id" value="<?= $row->kamar_id ;?>">
                    <input type="text" name="no_kamar" value="<?= $row->no_kamar ;?>" class="form-control" required>
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
                    <input type="text" name="harga_kamar" value="<?= $row->harga ;?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Fasilitas</label>
                    <input type="text" name="fasilitas" value="<?= $row->fasilitas ;?>" class="form-control" required>
                </div>

                
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-control">
                        <option value=""></option>
                        <option value="Terisi">Terisi</option>
                        <option value="Kosong">Kosong</option>
                        <option value="Perbaikan">Perbaikan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Foto</label>
                    <div style="width:10 0px;margin-bottom:4px">
                        <img src="<?= base_url('uploads/kamar/' . $row->foto )?>" style="width:100px">
                    </div>
                    <input type="file" name="foto"><br>
                    <small>(Biarkan kosong jika tidak diganti)</small>
                </div>

                <div class="form-group text-right">
                    <button type="submit" name="edit_kamar" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                    <button type="reset" class="btn btn-secondary btn-flat"><i class="fa fa-undo"></i> Reset</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>