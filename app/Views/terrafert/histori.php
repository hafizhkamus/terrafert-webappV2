<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="container-content">
    <h1 class="h3 mb-3"><strong>Histori</strong></h1>
    <div class="row">
        <div class="col-12">
            <div class="card flex-fill">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Daftar Alat</h5>
                    <div class="w-20">
                        <select id="monthDropdown" class="form-control">
                            <option value="">Pilih Bulan</option>
                            <?php foreach ($Month as $month) : ?>
                                <option value="<?= $month['value']; ?>"><?= $month['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>
                                    <th class="w-10">No</th>
                                    <th class="d-none d-xl-table-cell w-40">Nama</th>
                                    <th class="w-30">Tanggal Input</th>
                                    <th class="w-20"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($Alat as $alat) : ?>
                                    <tr>
                                        <td><?= $alat['no_device']; ?></td>
                                        <td class="d-none d-xl-table-cell w-40"><?= $alat['device_name']; ?></td>
                                        <td><?= $alat['created_at']; ?></td>
                                        <td>
                                            <button class="btn btn-info btn-sm btnEdit" data-bs-toggle="modal" data-bs-target="#formUserModal" data-id="<?= $alat['id']; ?>">Liat Histori</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-12 col-lg-4 col-xxl-4 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0">User Roles <button class="btn btn-primary btn-sm float-end btnAddRole" data-bs-toggle="modal" data-bs-target="#formRoleModal">Create New Role</button></h5>
                </div>
                <div class="card-body d-flex">
                    <div class="table-responsive">
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>
                                    <th>Role</th>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($UserRole as $userRole) : ?>
                                    <tr>
                                        <td><?= $userRole['role_name']; ?></td>
                                        <td><a href="<?= base_url('users/userRoleAccess?role=' . $userRole['id']); ?>"> <span class="badge bg-primary">Access Menu</span></a></td>
                                        <td>
                                            <button class="btn btn-info btn-sm btnEditRole" data-bs-toggle="modal" data-bs-target="#formRoleModal" data-id="<?= $userRole['id']; ?>" data-role="<?= $userRole['role_name']; ?>">Update</button>
                                            <form action="<?= base_url('users/deleteRole/' . $userRole['id']); ?>" method="post" class="d-inline">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    Delete
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>-->
    </div> 
</div> 


<div class="modal fade" id="formUserModal" tabindex="-1" aria-labelledby="formUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:1000px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Daftar History</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- <form action="<?= base_url('alat/save'); ?>" method="POST"> -->
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>
                                    <th class="">No</th>
                                    <th class="">Tanggal</th>
                                    <th class="">Waktu</th>
                                    <th class="">Kelembaban (%)</th>
                                    <th class="">pH</th>
                                    <th class="">N (ppm)</th>
                                    <th class="">P (ppm)</th>
                                    <th class="">K (ppm)</th>
                                </tr>
                            </thead>
                            <tbody id="listHistori">
                            </tbody>
                        </table>
                    </div>
                    <!-- <input type="hidden" name="deviceId" id="deviceId">
                    <div class="mb-3">
                        <label for="noDevice" class="col-form-label">No:</label>
                        <input type="number" class="form-control" name="noDevice" id="noDevice" required>
                    </div>
                    <div class="mb-3">
                        <label for="deviceName" class="col-form-label">Nama Alat:</label>
                        <input type="text" class="form-control" name="deviceName" id="deviceName" required>
                    </div> -->

                </div>
                <div class="modal-footer">
                    <!-- <button type="submit" class="btn btn-primary">Send message</button> -->
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            <!-- </form> -->
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="formRoleModal" tabindex="-1" aria-labelledby="formUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formUserModalLabel">Create New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('users/createRole'); ?> " method="post">
                <div class="modal-body">
                    <input type="hidden" name="roleID" id="roleID">
                    <div class="mb-3">
                        <label for="inputRoleName" class="form-label">Add Role</label>
                        <input type="text" class="form-control" id="inputRoleName" name="inputRoleName" placeholder="Role Name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Role</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div> -->
<script>
    $(document).ready(function() {
        $(".btnAdd").click(function() {
            $('#formUserModalLabel').html('Tambah Alat');
            $('.modal-footer button[type=submit]').html('Save');
            $('#noDevice').val('');
            $("#noDevice").prop('disabled', false);
            $('#deviceName').val('');
        });
        $(".btnEdit").click(function() {
            $('#listHistori').empty();
            const month = $('#monthDropdown').val();
            const idAlat = $(this).data('id');
            $.ajax({
                url: "<?php echo base_url('histori/filterHistory'); ?>",
                type: "POST",
                data: { month: month, id: idAlat},
                dataType: "json",
                success: function(data) {
                    // console.log(data);
                    $.each(data, function(index, alat) {
                        $('#listHistori').append('<tr><td>' + alat.id + '</td><td>' + 
                        alat.tanggal + '</td><td>' + 
                        alat.waktu + '</td><td>'+ 
                        alat.humidity + '</td><td>'+ 
                        alat.ph + '</td><td>'+ 
                        alat.N + '</td><td>'+ 
                        alat.P + '</td><td>'+ 
                        alat.K + '</td>');
                    });
                    // Update the table with the filtered data
                    // You can do this based on your table structure and data format
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $(".btnAddRole").click(function() {
            $('#formUserModalLabel').html('Create New Role');
            $('.modal-content form').attr('action', '<?= base_url('users/createRole') ?>');
            $('.modal-footer button[type=submit]').html('Save Role');
            $('#roleID').val('');
            $('#inputRoleName').val('');
        });
        $(".btnEditRole").click(function() {
            const roleID = $(this).data('id');
            const inputRoleName = $(this).data('role');
            $('#modalTitle').html('Update Data Role');
            $('.modal-footer button[type=submit]').html('Update role');
            $('.modal-content form').attr('action', '<?= base_url('users/updateRole') ?>');
            $('#roleID').val(roleID);
            $('#inputRoleName').val(inputRoleName);
        });
    });
</script>
<?= $this->endSection(); ?>