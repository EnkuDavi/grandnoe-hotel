
<div class="container-fluid">
    <h1 class="mt-4">Pendapatan</h1>
    <hr>
    <div id="flash" data-flash="<?= $this->session->flashdata('success');?>"></div>
    <br>
    <div class="row">
    <div class="col-sm-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12">
                    <i class="fas fa-table mr-1"></i>
                        Data Pendapatan
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                      <form action="<?= site_url('pendapatan/export') ;?>" method="post">
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="unit_name">Tanggal Awal</label>
                                    <input type="date" name="tgl_a" id="tgl_a" value="<?php echo set_value('tgl_a'); ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="stock">Tanggal Akhir</label>
                                    <input type="date" name="tgl_b" id="tgl_b" value="<?php echo set_value('tgl_b'); ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-success" name="btn-cari" style="margin-top: 32px;"><i class="fas fa-search"></i> Cari</button>
                                    <button class="btn btn-success" name="export" style="margin-top: 32px;"><i class="fas fa-download"></i> Export</button>
                                </div>
                            </div>
                        </div>

                      </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                                <tr>
                                    <th style="width: 15px;">No</th>
                                    <th>Kode Booking</th>
                                    <th>Kamar</th>
                                    <th>Nama Pengunjung</th>
                                    <th>Pemasukan</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1 ;?>
                            <?php foreach($pendapatan->result() as $key=>$data) :?>
                                <tr>
                                    <td><?= $no ;?></td>
                                    <td><?= $data->kd_booking ;?></td>
                                    <td><?= $data->no_kamar ;?></td>
                                    <td><?= $data->nama_pengunjung ;?></td>
                                    <td><?= indo_currency($data->pendapatan) ;?></td>
                                    <td><?= $data->checkOut ;?></td>
                                    <td>
                                        <!-- <a href="<?= site_url('pendapatan/edit/'.$data->pendapatan_id) ;?>"
                                          class="btn btn-sm btn-info"
                                          >
                                            <i class="fas fa-edit"></i> Edit
                                        </a> -->
                                        <a href="<?php echo site_url('pendapatan/del/'.$data->pendapatan_id ) ;?>" id="btn-hapus" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php $no++ ;?>
                            <?php endforeach;?>
                            </tbody>
                            <tfoot>

                            </tfoot>
                            
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('banner/edit') ;?>" enctype="multipart/form-data" method="post">

            <div class="form-group">
                <label for="">Judul</label>
                <input type="hidden" name="id" id="id" class="form-control">
                <input type="text" name="judul" id="judul" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="">Deskripsi</label>
                <input type="text" name="deskripsi" id="deskripsi" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="">Source</label>
                <input type="text" name="source" id="source" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Kategori</label>
                <select name="kategori" id="kategori" class="form-control" required>
                    <option value="Iklan">Iklan</option>
                    <option value="Promo">Promo</option>
                    <option value="Portfolio">Portfolio</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Created</label>
                <input type="text" id="date" class="form-control" readonly>
            </div>

            
            <div class="form-group">
                <label for="">Layout</label>
                <input type="file" name="layout" value="" id="layout" class="form-control" required>
            </div>


            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="updateVideo" class="btn btn-primary">Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click','#updateBanner', function() {
            var id = $(this).data('id');
            var judul = $(this).data('judul');
            var deskripsi = $(this).data('desc');
            var sumber = $(this).data('source');
            var kategori = $(this).data('kategori');
            var date = $(this).data('created');
            var layout = $(this).data('layout');
            $('#id').val(id);
            $('#judul').val(judul);
            $('#deskripsi').val(deskripsi);
            $('#source').val(sumber);
            $('#kategori').val(kategori);
            $('#date').val(date);
            $('#layout').val(layout);
        });
    });
</script>