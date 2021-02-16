<div class="container-fluid">
    <h1 class="mt-4"><i class="fab fa-youtube"></i> Tambah Type Kamar</h1>
    <hr>
    <br>
    <div class="container">
    <div class="row">
        <div class="col-sm-12 text-right">
            <a href="<?= site_url('type') ;?>" class="btn btn-warning ml-auto"><i class="fa fa-undo"></i> Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="<?= site_url('type/add_type') ;?>" method="post">
                <div class="form-group">
                    <label for="">Type</label>
                    <input type="text" name="type" class="form-control" required>
                </div>

                <div class="form-group text-right">
                    <button type="submit" name="add_type" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                    <button type="reset" class="btn btn-secondary btn-flat"><i class="fa fa-undo"></i> Reset</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>