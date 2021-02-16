<div class="container-fluid">
    <h1 class="mt-4"><i class="fas fa-book"></i> Form Booking</h1>
    <hr>
    <br>
    <div class="container">
    <div class="row">
        <div class="col-sm-12 text-right">
            <a href="<?= site_url('booking') ;?>" class="btn btn-warning ml-auto"><i class="fa fa-undo"></i> Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="<?= site_url('booking/proses') ;?>" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" name="tanggal" value="<?= date('Y-m-d') ;?>" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="">Kode Booking</label>
                    <input type="text" name="kd_booking" value="<?= 'GN'.date('Y-m-d').substr(md5(rand()),0,10) ;?>" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="">Nama Pengunjung</label>
                    <input type="text" name="nama_pengunjung" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="">--Pilih--</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Telepon</label>
                    <input type="number" name="tlp" class="form-control" required>
                </div>                

                <div>
                    <label for="">Kamar</label>
                </div>
                <div class="form-group input-group">
                    <input type="hidden" name="kamar_id" id="kamar_id">
                    <input type="text" name="no_kamar" id="kamar" class="form-control" required readonly autofocus placeholder="Cari ...">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#daftarKamar">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Type</label>
                            <input type="text" name="type" id="type" value="-" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="">Harga</label>
                            <input type="text" name="harga" id="harga" value="-" class="form-control" readonly>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Keterangan</label>
                    <input type="text" name="ket" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Foto KTP</label>
                    <input type="file" name="foto-ktp" class="form-control" required>
                </div>

                <div class="form-group text-right">
                    <button type="submit" name="add_booking" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                    <button type="reset" class="btn btn-secondary btn-flat"><i class="fa fa-undo"></i> Reset</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="daftarKamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Daftar Kamar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 10px;">No</th>
                        <th>ID Kamar</th>
                        <th>Type</th>
                        <th>Fasilitas</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1 ;?>
                <?php foreach($kamar->result() as $key=>$data) :?>
                    <tr>
                        <td><?= $no ;?></td>
                        <td><?= $data->no_kamar ;?></td>
                        <td><?= $data->type ;?></td>
                        <td><?= $data->fasilitas ;?></td>
                        <td>Rp. <?= $data->harga ;?></td>
                        <td class="text-center">
                            <button id="pilihKamar" data-id="<?= $data->kamar_id ;?>" data-nomor="<?= $data->no_kamar ;?>"
                            data-type="<?= $data->type ;?>"
                            data-harga="<?= $data->harga ;?>"
                                class="btn btn-sm btn-info"
                                >
                                <i class="fas fa-check"></i> Pilih
                            </button>
                        </td>
                    </tr>
                <?php $no++ ;?>
                <?php endforeach;?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>ID Kamar</th>
                        <th>Type</th>
                        <th>Fasilitas</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </tfoot>  
            </table>
        </div>
       </div>
    </div>
  </div>
</div>


<script>
    $(document).ready(function() {
        $(document).on('click','#pilihKamar', function() {
         var id = $(this).data('id');
         var no = $(this).data('nomor');
         var type = $(this).data('type');
         var harga = $(this).data('harga');

        $('#kamar_id').val(id);
        $('#kamar').val(no)
        $('#type').val(type);
        $('#harga').val(harga);
        $('#daftarKamar').modal('hide');
        })
    })
</script>