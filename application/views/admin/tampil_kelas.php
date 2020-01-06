<?php $info = $this->session->flashdata('info');
if (!empty($info)) { ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $info; ?>
    </div>
<?php }
?>


<header class="panel-heading">
    <div class="panel-actions">
        <a href="#" class="fa fa-caret-down"></a>
        <a href="#" class="fa fa-times"></a>
    </div>

    <h2 class="panel-title">Tabel Data Kelas</h2>
</header>

<div class="panel-body">
    <p>
        <button class="btn btn-oval btn-success" data-toggle="modal" data-target="#exampleModal">
            <i class="glyphicon glyphicon-plus"></i>Tambah
        </button>
    </p>

    <table class="table table-bordered table-striped mb-none" id="datatable">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Kelas</th>
            <th>Wali Kelas</th>
            <th>Aksi</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <?php
            if($data->num_rows() > 0) {
            $no = 1;
            foreach ($data->result() as $row) {
            ?>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row->kode_kelas; ?></td>
            <td><?php echo $row->wali_kelas; ?></td>

            <td>
                <button class="btn btn-floating btn-primary" data-toggle="modal"
                        data-target="#exampleModal<?php echo $row->id_kelas; ?>"><i class="fa fa-pencil"></i></button>
                <div class="modal fade" id="exampleModal<?php echo $row->id_kelas; ?>" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <header class="panel-heading">
                                <h2 class="panel-title">Ubah Kelas</h2>
                            </header>

                            <div class="panel-body form">
                                <?php $attributes = array('class' => 'form-horizontal mb-lg');
                                echo form_open('kelas/ubah') ?>

                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label no-padding-right">Nama Kelas</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="kode_kelas" id="nip"
                                               placeholder="Nama Kelas" value="<?php echo $row->kode_kelas; ?>"
                                               class="form-control" maxlength="15" required>
                                        <input type="hidden" name="id_kelas_lama"
                                               value="<?php echo $row->id_kelas; ?>">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">Wali Kelas</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="wali_kelas" value="<?php echo $row->wali_kelas; ?>"
                                               id="fakultas"
                                               placeholder="Wali Kelas" class="form-control" required>
                                    </div>
                                </div>


                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Batal
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() ?>index.php/kelas/hapus/<?php echo $row->id_kelas ?>"
                   class="btn btn-floating btn-danger"><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
        <?php }} else {
                ?>
            <td></td>
        <td></td>
        <td></td>
        <td></td>
            <?php } ?>
        </tbody>
    </table>
    <!-- end: page -->


    <!-- Java Script -->

    <div class="modal fade" id="exampleModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <header class="panel-heading">
                    <h2 class="panel-title">Tambah Kelas</h2>
                </header>

                <div class="panel-body form">
                    <?php $attributes = array('class' => 'form-horizontal mb-lg');
                    echo form_open('kelas/simpan') ?>

                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label no-padding-right">Nama Kelas</label>
                        <div class="col-sm-9">
                            <input type="text" name="kode_kelas" id="kode_kelas" placeholder="Nama Kelas"
                                   class="form-control" maxlength="15" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">Wali Kelas</label>
                        <div class="col-sm-9">
                            <input type="text" name="wali_kelas" id="wali_keelas" placeholder="Wali Kelas"
                                   class="form-control" required>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
