<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <h5 class="text-right"><?= date('l , d F Y') ;?></h5>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body"><h3><?= $kamar->num_rows() ;?> Kamar</h3></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Kamar hotel</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body"><h3><?= $type->num_rows() ;?> Type</h3></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Type Kamar</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body"><h3><?= indo_currency($income->pendapatan) ;?></h3></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Pendapatan Bulan ini</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body"><h3><?= $pengunjung->num_rows() ;?> Pengunjung</h3></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Pengunjung Bulan Ini</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="row">
        <div class="col-sm-12">
            <h4>Info Kamar</h4>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-6 col-sm-12">
            <?php foreach($kamar->result() as $key=>$data) :?>
                <button class="btn btn-lg mt-3 <?= $data->status == 'Terisi' ? 'btn-danger' : ($data->status == 'Kosong' ? 'btn-success':'btn-warning') ;?>" data-toggle="modal" data-target="#modalDash" id="btn-kamar" style="margin-left: 10px;" data-id="<?= $data->kamar_id;?>"
                data-type="<?= $data->type ;?>"
                data-harga="<?= $data->harga ;?>"
                data-status="<?= $data->status ;?>"><?= $data->no_kamar ;?></button>
            <?php endforeach ;?>
        </div>
    </div>

    <br><br>
    <div class="row">
        <div class="col-sm-12">
            <h4>Data Pengunjung / Bulan</h4>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDash" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Info Kamar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="">Type</label>
                    <input type="text" id="type" class="form-control" readonly>
                </div>
                <div class="col-sm-4">
                    <label for="">Harga</label>
                    <input type="text" id="harga" class="form-control" readonly>
                </div>
                <div class="col-sm-4">
                    <label for="">Status</label>
                    <input type="text" id="status" class="form-control" readonly>
                </div>
            </div>
            
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>



<script>
    $(document).on('click','#btn-kamar', function(){
        var id = $(this).data('id');
        var type = $(this).data('type');
        var harga = $(this).data('harga');
        var status = $(this).data('status');

        $('#type').val(type);
        $('#harga').val(harga);
        $('#status').val(status);
    });
</script>

<script>
    $(document).ready(function() {
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: ['JANUARI','FEBRUARI','MARET','APRIL','MEI','JUNI','JULI','AGUSTUS','SEPTEMBER','OKTOBER', 'NOVEMBER', 'DESEMBER'],
                datasets: [{
                    label: 'Data Pengunjung',
                    backgroundColor: 'rgb(137,255,51)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [
                        <?= $januari->num_rows();?>, <?= $februari->num_rows() ;?>, <?=$maret->num_rows() ;?>,<?= $april->num_rows();?>, <?= $mei->num_rows() ;?>, <?=$juni->num_rows() ;?>,<?= $juli->num_rows();?>, <?= $agustus->num_rows() ;?>, <?=$september->num_rows() ;?>, <?= $oktober->num_rows();?>, <?= $november->num_rows() ;?>, <?=$desember->num_rows() ;?>
                        ]
                }]
            },

            // Configuration options go here
            options: {}
        });
    })
    
</script>