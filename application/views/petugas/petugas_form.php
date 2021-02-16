<div class="container-fluid">
    <h1 class="mt-4"><i class="fas fa-user"></i> Tambah Petugas</h1>
    <hr>
    <br>
    <div class="container">
    <div class="row">
        <div class="col-sm-12 text-right">
            <a href="<?= site_url('petugas') ;?>" class="btn btn-warning ml-auto"><i class="fa fa-undo"></i> Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="<?= site_url('petugas/addPetugas') ;?>" method="post">
                
            <div class="form-group">
                <label for="">Username</label>
                <input type="hidden" name="id" id="id" class="form-control">
                <input type="text" name="username" id="username" class="form-control" required>
                <span class="text-danger"><?= form_error('username') ;?></span>
            </div>

            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
                <span class="text-danger"><?= form_error('nama') ;?></span>
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" required>
                <span class="text-danger"><?= form_error('password') ;?></span>
            </div>

            <div class="form-group">
                <label for="">Konfirm Password</label>
                <input type="password" name="passconf" class="form-control" required>
                <span class="text-danger"><?= form_error('passconf') ;?></span>
            </div>

            <div class="form-group">
                <label for="">Level</label>
                <select name="level" id="kategori" class="form-control" required>
                    <option value="admin">Admin</option>
                </select>
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