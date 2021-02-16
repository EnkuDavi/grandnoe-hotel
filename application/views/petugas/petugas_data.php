
<div class="container-fluid">
    <h1 class="mt-4"><i class="fas fa-user"></i> Petugas</h1>
    <hr>
    <div id="flash" data-flash="<?= $this->session->flashdata('success');?>"></div>
    <br>
    <div class="row">
    <div class="col-sm-8">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12">
                    <i class="fas fa-table mr-1"></i>
                        Daftar Petugas
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <a href="<?= site_url('petugas/add') ;?>" class="btn btn-primary ml-auto"><i class="fas fa-plus"></i> Add Petugas</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Level</th>
                                    <th style="width:150px;">Action</>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1 ;?>
                            <?php foreach($user->result() as $key=>$data) :?>
                                <tr>
                                    <td><?= $no ;?></td>
                                    <td><?= $data->username ;?></td>
                                    <td><?= $data->nama_user ;?></td>
                                    <td><?= $data->level ;?></td>
                                    <td>
                                        <!-- <a href="" class="btn btn-sm btn-info" id="editUser" data-toggle="modal" data-target="#modalUser"
                                          >
                                            <i class="fas fa-edit"></i> Edit
                                        </a> -->
                                        <a href="<?php echo site_url('petugas/del/'.$data->user_id ) ;?>">
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Data Kamar ini Akan Dihapus !')">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php $no++ ;?>
                            <?php endforeach;?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Level</th>
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
<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('petugas/edit') ;?>" enctype="multipart/form-data" method="post">

            <div class="form-group">
                <label for="">Username</label>
                <input type="hidden" name="id" id="id" class="form-control">
                <input type="text" name="username" id="username" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="">Level</label>
                <select name="kategori" id="kategori" class="form-control" required>
                    <option value="Iklan">Iklan</option>
                    <option value="Promo">Promo</option>
                    <option value="Portfolio">Portfolio</option>
                </select>
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