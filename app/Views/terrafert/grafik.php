<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="container-content">
    <h1 class="h3 mb-3"><strong>Grafik</strong></h1>
    <div class="row">
        <div class="col-12">
            <div class="card flex-fill">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Daftar Alat</h5>
                    <div class="w-40 d-flex">
                        <div class="w-50 pe-2">
                            <label for="startDate">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="startDate" id="startDate">
                        </div>
                        <div class="w-50 ps-2">
                            <label for="endDate">Tanggal Selesai</label>
                            <input type="date" class="form-control" name="endDate" id="endDate">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>
                                    <th class="w-10">No</th>
                                    <th class="d-none d-xl-table-cell w-60">Nama</th>
                                    <!-- <th class="w-30">Tanggal Input</th> -->
                                    <th class="w-30"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($Alat as $alat) : ?>
                                    <tr>
                                        <td><?= $alat['no_device']; ?></td>
                                        <td class="d-none d-xl-table-cell w-40"><?= $alat['device_name']; ?></td>
                                        <td>
                                            <button class="btn btn-secondary btn-lg me-2 kelembaban" data-bs-toggle="modal" data-bs-target="#formUserModal" id="kelembaban" data-id="<?= $alat['id']; ?>" data-category="Kelembaban"><img src="<?= base_url('assets/img/water.png') ?>" style="width: 25px;"></button>
                                            <button class="btn btn-secondary btn-lg me-2 ph" data-bs-toggle="modal" data-bs-target="#formUserModal" id="ph" data-id="<?= $alat['id']; ?>" data-category="pH"><img src="<?= base_url('assets/img/pH.png') ?>" style="width: 25px;"></button>
                                            <button class="btn btn-secondary btn-lg npk" data-bs-toggle="modal" data-bs-target="#formUserModal" id="npk" data-id="<?= $alat['id']; ?>" data-category="NPK"><img src="<?= base_url('assets/img/npk.png') ?>" style="width: 25px;"></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>



<div class="modal fade" id="formUserModal" tabindex="-1" aria-labelledby="formUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:1000px !important;">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title">Daftar History</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> -->
            <!-- <form action="<?= base_url('alat/save'); ?>" method="POST"> -->
                <div class="modal-body">
                    <canvas id="myChart"></canvas>
                    <!-- <canvas id="myChart2"></canvas> -->
                    <!-- <div class="table-responsive">
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
        var myChart;
        $(".kelembaban").click(function() {
            if (myChart){
                myChart.destroy();
            }
            console.log($('#startDate').val().toString());
            console.log($('#endDate').val().toString());
            const idAlat = $(this).data('id');
            const category = $(this).data('category');

            $.ajax({
                url: "<?php echo base_url('grafik/getGrafikByParam'); ?>",
                type: "POST",
                data: { category: category, id: idAlat, startDate: $('#startDate').val().toString(), endDate : $('#endDate').val().toString()},
                dataType: "json",
                success: function(data) {
                    var week = [];
                    var value = [];
                    $.each(data, function(index, alat) {
                        console.log(alat);
                        week.push(alat.trx_time.toString());
                        value.push(parseInt(alat.avg_humidity));
                    });

                    const ctx = document.getElementById('myChart');
                    if (myChart){
                        myChart.destroy();
                    }

                    myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                        labels: week,
                        datasets: [{
                            label: category,
                            data: value,
                            borderColor: '#57BE29',
                            borderWidth: 1
                        }]
                        },
                        options: {
                        scales: {
                            y: {
                            beginAtZero: true
                            }
                        }
                        }
                    });
                    // Update the table with the filtered data
                    // You can do this based on your table structure and data format
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
        $(".ph").click(function() {
            if (myChart){
                myChart.destroy();
            }
            console.log($('#startDate').val().toString());
            console.log($('#endDate').val().toString());
            const idAlat = $(this).data('id');
            const category = $(this).data('category');

            $.ajax({
                url: "<?php echo base_url('grafik/getGrafikByParam'); ?>",
                type: "POST",
                data: { category: category, id: idAlat, startDate: $('#startDate').val().toString(), endDate : $('#endDate').val().toString()},
                dataType: "json",
                success: function(data) {
                    var week = [];
                    var value = [];
                    $.each(data, function(index, alat) {
                        console.log(alat);
                        week.push(alat.trx_time.toString());
                        value.push(parseInt(alat.avg_ph));
                    });

                    const ctx = document.getElementById('myChart');
                    if (myChart){
                        myChart.destroy();
                    }

                    myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                        labels: week,
                        datasets: [{
                            label: category,
                            data: value,
                            borderColor: '#57BE29',
                            borderWidth: 1
                        }]
                        },
                        options: {
                        scales: {
                            y: {
                            beginAtZero: true
                            }
                        }
                        }
                    });
                    // Update the table with the filtered data
                    // You can do this based on your table structure and data format
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
        $(".npk").click(function() {
            if (myChart){
                myChart.destroy();
            }
            console.log($('#startDate').val().toString());
            console.log($('#endDate').val().toString());
            const idAlat = $(this).data('id');
            const category = $(this).data('category');

            $.ajax({
                url: "<?php echo base_url('grafik/getGrafikByParam'); ?>",
                type: "POST",
                data: { category: category, id: idAlat, startDate: $('#startDate').val().toString(), endDate : $('#endDate').val().toString()},
                dataType: "json",
                success: function(data) {
                    var week = [];
                    var avgN = [];
                    var avgP = [];
                    var avgK = [];
                    $.each(data, function(index, alat) {
                        console.log(alat);
                        week.push(alat.trx_time.toString());
                        avgN.push(parseInt(alat.avg_N));
                        avgP.push(parseInt(alat.avg_P));
                        avgK.push(parseInt(alat.avg_K));
                    });

                    const ctx = document.getElementById('myChart');

                    myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                        labels: week,
                        datasets: [{
                            label: 'N',
                            data: avgN,
                            borderColor: 'red', // Color for line 1
                            borderWidth: 1
                        },
                        {
                            label: 'P',
                            data: avgP,
                            borderColor: 'blue', // Color for line 2
                            borderWidth: 1
                        },
                        {
                            label: 'K',
                            data: avgK,
                            borderColor: 'green', // Color for line 3
                            borderWidth: 1
                        }]
                        },
                        options: {
                        scales: {
                            y: {
                            beginAtZero: true
                            }
                        }
                        }
                    });
                    // Update the table with the filtered data
                    // You can do this based on your table structure and data format
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
        $(".btnEdit").click(function() {
            const month = $('#monthDropdown').val();
            const idAlat = $(this).data('id');
            $.ajax({
                url: "<?php echo base_url('histori/filterHistory'); ?>",
                type: "POST",
                data: { month: month, id: idAlat},
                dataType: "json",
                success: function(data) {
                    // console.log(data);
                    $('#listHistori').empty();
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

    });
</script>

<!-- <script>
  
</script> -->
<?= $this->endSection(); ?>