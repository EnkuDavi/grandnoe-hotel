
<div class="container-fluid">
    <h1 class="mt-4"><i class="fas fa-book"></i> Booking</h1>
    <hr>
    <br>
    <div id="flash" data-flash="<?= $this->session->flashdata('success');?>"></div>
    <div class="row">
    <div class="col-sm-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12">
                    <i class="fas fa-table mr-1"></i>
                    Daftar Booking
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <a href="<?= site_url('booking/add') ;?>" class="btn btn-primary ml-auto"><i class="fas fa-plus"></i> Add Booking</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th>Kode Booking</th>
                                    <th>Nama</th>
                                    <th>Kamar</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;?>
                                <?php foreach($booking->result() as $key=>$data) :?>
                                    <tr>
                                        <td><?= $no ;?></td>
                                        <td><?= $data->kd_booking ;?></td>
                                        <td><?= $data->nama_pengunjung ;?></td>
                                        <td><?= $data->no_kamar ;?></td>
                                        <td><?= $data->checkIn ;?></td>
                                        <td><?= $data->checkOut ;?></td>
                                        <td><?= $data->ket ;?></td>
                                        <td class="text-center">
                                        <button
                                          class="btn btn-sm btn-info" id="updateBooking" data-toggle="modal" data-target="#modalBooking"
                                          data-id="<?= $data->booking_id ;?>"
                                          data-nama="<?= $data->nama_pengunjung ;?>"
                                          data-nomer="<?= $data->no_kamar ;?>"
                                          data-in="<?= $data->checkIn ;?>" 
                                          data-harga="<?= $data->harga ;?>"
                                          data-ket="<?= $data->ket ;?>"
                                          >
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <a href="<?php echo site_url('booking/del/'.$data->booking_id ) ;?>" class="btn btn-danger btn-sm" id="btn-hapus">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </a>
                                    </td>
                                    </tr>
                                <?php $no++ ;?>
                                <?php endforeach ;?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th>Kode Booking</th>
                                    <th>Nama</th>
                                    <th>Kamar</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalBooking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Booking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('booking/checkOut') ;?>" enctype="multipart/form-data" method="post">

            <div class="form-group">
                <label for="">Nama</label>
                <input type="hidden" name="id" id="id" class="form-control">
                <input type="text" name="nama" id="nama" class="form-control" required readonly>
            </div>

            <div class="form-group">
                <label for="">No Kamar</label>
                <input type="no_kamar" name="no_kamar" id="no_kamar" class="form-control" readonly>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Check In</label>
                        <input type="date" name="checkIn" id="in" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Check Out</label>
                        <input type="date" name="checkOut" id="checkOut" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Harga Sewa/hari</label>
                <input type="text" class="form-control" value="" name="harga" id="harga">
            </div>
            
            <div class="form-group">
                <label for="">Keterangan</label>
                <input type="text" name="ket" id="ket" class="form-control">
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="updateBooking" class="btn btn-primary">Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click','#updateBooking', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var nomer = $(this).data('nomer');
            var cekin = $(this).data('in');
            var harga = $(this).data('harga');
            var ket = $(this).data('ket')
            $('#id').val(id);
            $('#nama').val(nama);
            $('#no_kamar').val(nomer);
            $('#in').val(cekin);
            $('#harga').val(harga);
            $('#ket').val(ket);
        });
    });
</script>