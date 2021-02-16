
<div class="container-fluid">
    <h1 class="mt-4"><i class="fas fa-door-open"></i> Kamar Hotel</h1>
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
                    Daftar Kamar
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <a href="<?= site_url('kamar/add') ;?>" class="btn btn-primary ml-auto"><i class="fas fa-plus"></i> Add Kamar</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th style="width: 180px;">Foto</th>
                                    <th>ID Kamar</th>
                                    <th>Type</th>
                                    <th>Fasilitas</th>
                                    <th>Harga</th>
                                    <th class="text-center">Status</th>
                                    <th style="width:150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1 ;?>
                            <?php foreach($kamar->result() as $key=>$data) :?>
                                <tr>
                                    <td><?= $no ;?></td>
                                    <td>
                                        <div>
                                            <img src="<?= base_url('uploads/kamar/'.$data->foto) ;?>" style="width: 160px;height:140px;" alt="">
                                        </div>
                                    </td>
                                    <td><?= $data->no_kamar ;?></td>
                                    <td><?= $data->type ;?></td>
                                    <td><?= $data->fasilitas ;?></td>
                                    <td><?= indo_currency($data->harga) ;?></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm <?= $data->status == 'Terisi' ? 'btn-danger' : ($data->status == 'Kosong' ? 'btn-success':'btn-warning') ;?>" style="width: 100px;"><?= $data->status ;?></button>
                                    </td>
                                    <td>
                                        <a href="<?= site_url('kamar/edit/'.$data->kamar_id) ;?>"
                                          class="btn btn-sm btn-info"
                                          >
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="<?php echo site_url('kamar/del/'.$data->kamar_id ) ;?>" id="btn-hapus" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php $no++ ;?>
                            <?php endforeach;?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>ID Kamar</th>
                                    <th>Type</th>
                                    <th>Fasilitas</th>
                                    <th>Harga</th>
                                    <th class="text-center">Status</th>
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
<div class="modal fade" id="modalKamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Kamar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('kamar/edit') ;?>" enctype="multipart/form-data" method="post">

            <div class="form-group">
                <label for="">ID</label>
                <input type="hidden" name="id" id="id" class="form-control">
                <input type="text" name="no_kamar" id="no_kamar" class="form-control" required>
            </div>

            <div class="form-group">
                    <label for="">Type</label>
                    <select name="type" id="" class="form-control">
                        <option value="">--Pilih--</option>
                        <option value="Standar D">Standard D</option>
                        <option value="Standar C">Standar C</option>
                        <option value="VIP">VIP</option>
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
                <label for="">Foto</label>
                <input type="file" name="foto" class="form-control" required>
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