
<div class="container-fluid">
    <h1 class="mt-4"><i class="fas fa-door-open"></i> Type Kamar</h1>
    <hr>
    <br>
    <div id="flash" data-flash="<?= $this->session->flashdata('success');?>"></div>
    <div class="row">
    <div class="col-sm-6">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12">
                    <i class="fas fa-table mr-1"></i>
                    Daftar Type Kamar
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <a href="<?= site_url('type/add') ;?>" class="btn btn-primary ml-auto"><i class="fas fa-plus"></i> Add Type</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th>Type Kamar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1 ;?>
                            <?php foreach($type->result() as $key=>$data) :?>
                                <tr>
                                    <td><?= $no ;?></td>
                                    <td><?= $data->type ;?></td>
                                    <td class="text-center">
                                        <button
                                          class="btn btn-sm btn-info" id="updateType" data-toggle="modal" data-target="#modalType"
                                          data-id="<?= $data->type_id;?>"
                                          data-type="<?= $data->type;?>"
                                          >
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <!-- <a href="<?php echo site_url('type/del/'.$data->type_id ) ;?>" id="btn-hapus" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </a> -->
                                    </td>
                                </tr>
                            <?php $no++ ;?>
                            <?php endforeach;?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Type Kamar</th>
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
<div class="modal fade" id="modalType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('type/edit') ;?>" method="post">

            <div class="form-group">
                <label for="">Type Kamar</label>
                <input type="hidden" name="id" id="id" class="form-control">
                <input type="text" name="type" id="type" class="form-control" required>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="updateType" class="btn btn-primary">Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click','#updateType', function() {
            var id = $(this).data('id');
            var type = $(this).data('type');
            
            $('#id').val(id);
            $('#type').val(type);
            
        });
    });
</script>