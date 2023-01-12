<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-edit"></i> <?= $title; ?></h1>

    <!-- notification/alert -->
    <?php echo $this->session->flashdata('message'); ?>
    <!-- DataTales-->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center" style="font-weight: bold;">
                            <th>No</th>
                            <th>Nama Pengunjung</th>
                            <th>Email</th>
                            <th>Kritik Dan saran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($kritiksaran as $kts) : ?>
                            <tr class="text-center">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $kts->nama_pengunjung ?></td>
                                <td><?php echo $kts->email_pengunjung ?></td>
                                <td><?php echo $kts->kritik_saran ?></td>
                                <td>
                                    <a onclick="deleteConfirm('<?php echo site_url('kritiksaran/fungsiDelete/' . $kts->id_kritik_saran) ?>')" href="#!" class="btn btn-sm btn-danger "><i class="fa fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </section>
            </div>

            <!-- Modal Konfirmasi Hapus -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus data?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Data yang sudah dihapus tidak bisa dikembalikan</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                            <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function deleteConfirm(url) {
                    $('#btn-delete').attr('href', url);
                    $('#deleteModal').modal();
                }
            </script>