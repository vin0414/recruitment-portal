<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="apple-touch-icon" href="<?=base_url('assets/images/deped-gentri-logo.webp')?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url('assets/images/deped-gentri-logo.webp')?>">
    <title>HR Recruitment Portal</title>
    <link href="<?=base_url('assets/css/tabler.min.css')?>" rel="stylesheet" />
    <link href="<?=base_url('assets/css/demo.min.css')?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" />
    <style>
    @import url("https://rsms.me/inter/inter.css");
    </style>
</head>

<body>
    <script src="<?=base_url('assets/js/demo-theme.min.js')?>"></script>
    <div class="page">
        <!--  BEGIN SIDEBAR  -->
        <?= view('main/templates/sidebar')?>
        <!--  END SIDEBAR  -->
        <!-- BEGIN NAVBAR  -->
        <?= view('main/templates/header')?>
        <!-- END NAVBAR  -->
        <div class="page-wrapper">
            <!-- BEGIN PAGE HEADER -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">HR Recruitment Portal</div>
                            <h2 class="page-title"><?=$title?></h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <div class="dropdown">
                                    <a href="javascript:void(0);"
                                        class="btn btn-outline-success btn-5 d-none d-sm-inline-block"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 5l0 14" />
                                            <path d="M5 12l14 0" />
                                        </svg>
                                        New
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#educationModal">Education</a>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#trainingModal">Training</a>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#experienceModal">Experience</a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);"
                                        class="btn btn-outline-success btn-6 d-sm-none btn-icon"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 5l0 14" />
                                            <path d="M5 12l14 0" />
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#educationModal">Education
                                            <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#trainingModal">Training</a>
                                            <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#experienceModal">Experience</a>
                                    </div>
                                </div>
                            </div>
                            <!-- BEGIN MODAL -->
                            <!-- END MODAL -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE HEADER -->
            <!-- BEGIN PAGE BODY -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                                <li class="nav-item">
                                    <a href="#tabs-home-8" class="nav-link active" data-bs-toggle="tab">
                                        <i class="ti ti-books"></i>&nbsp;Educations
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tabs-training-8" class="nav-link" data-bs-toggle="tab">
                                        <i class="ti ti-certificate"></i>&nbsp;Trainings
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tabs-job-8" class="nav-link" data-bs-toggle="tab">
                                        <i class="ti ti-briefcase"></i>&nbsp;Experiences
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="tabs-home-8">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="educations">
                                            <thead>
                                                <th>Level</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-training-8">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="trainings">
                                            <thead>
                                                <th>Level</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-job-8">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="experiences">
                                            <thead>
                                                <th>Level</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE BODY -->
            <!--  BEGIN FOOTER  -->
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; <?= date('Y')?>
                                    <a href="." class="link-secondary">HR Recruitment Portal</a>. All rights reserved.
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="link-secondary" rel="noopener"> v1.1.1 </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            <!--  END FOOTER  -->
        </div>
    </div>
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?=base_url('assets/js/tabler.min.js')?>" defer></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!-- BEGIN DEMO SCRIPTS -->
    <script src="<?=base_url('assets/js/demo.min.js')?>" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
    <script src="<?=base_url('assets/js/point-system.js')?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="modal modal-blur fade" id="educationModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Education</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="row g-3" id="frmEducation">
                        <?=csrf_field()?>
                        <div class="col-lg-12">
                            <label class="form-label">Level</label>
                            <input type="number" class="form-control" name="level" required />
                            <div id="level-error" class="error-message text-danger text-sm"></div>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label">From</label>
                            <input type="text" class="form-control" name="from" required />
                            <div id="from-error" class="error-message text-danger text-sm"></div>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label">To</label>
                            <input type="text" class="form-control" name="to" required />
                            <div id="to-error" class="error-message text-danger text-sm"></div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="form-control btn btn-outline-success">
                                <i class="ti ti-device-floppy"></i>&nbsp;Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="trainingModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Training</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="row g-3" id="frmTraining">
                        <?=csrf_field()?>
                        <div class="col-lg-12">
                            <label class="form-label">Level</label>
                            <input type="number" class="form-control" name="training_level" required />
                            <div id="training_level-error" class="error-message text-danger text-sm"></div>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label">From</label>
                            <input type="text" class="form-control" name="from_training" required />
                            <div id="from_training-error" class="error-message text-danger text-sm"></div>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label">To</label>
                            <input type="text" class="form-control" name="to_training" required />
                            <div id="to_training-error" class="error-message text-danger text-sm"></div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="form-control btn btn-outline-success">
                                <i class="ti ti-device-floppy"></i>&nbsp;Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="experienceModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="row g-3" id="frmExperience">
                        <?=csrf_field()?>
                        <div class="col-lg-12">
                            <label class="form-label">Level</label>
                            <input type="number" class="form-control" name="level" required />
                            <div id="level-error" class="error-message text-danger text-sm"></div>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label">From</label>
                            <input type="text" class="form-control" name="from" required />
                            <div id="from-error" class="error-message text-danger text-sm"></div>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label">To</label>
                            <input type="text" class="form-control" name="to" required />
                            <div id="to-error" class="error-message text-danger text-sm"></div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="form-control btn btn-outline-success">
                                <i class="ti ti-device-floppy"></i>&nbsp;Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    $('#frmEducation').on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $('.error-message').html('');
        $.ajax({
            url: window.location.origin + "/save-education-data",
            method: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully saved",
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        // Action based on user's choice
                        if (result.isConfirmed) {
                            $('#educationModal').modal('hide');
                            // Perform some action when "Yes" is clicked
                            $('#frmEducation')[0].reset();
                            educations.ajax.reload();
                        }
                    });
                } else {
                    var errors = response.error;
                    // Iterate over each error and display it under the corresponding input field
                    for (var field in errors) {
                        $('#' + field + '-error').html('<p>' + errors[field] +
                            '</p>'); // Show the first error message
                        $('#' + field).addClass(
                            'text-danger'); // Highlight the input field with an error
                    }
                }
            }
        });
    });

    $('#frmTraining').on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $('.error-message').html('');
        $.ajax({
            url: window.location.origin + "/save-training-data",
            method: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully saved",
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        // Action based on user's choice
                        if (result.isConfirmed) {
                            $('#trainingModal').modal('hide');
                            // Perform some action when "Yes" is clicked
                            $('#frmTraining')[0].reset();
                            trainings.ajax.reload();
                        }
                    });
                } else {
                    var errors = response.error;
                    // Iterate over each error and display it under the corresponding input field
                    for (var field in errors) {
                        $('#' + field + '-error').html('<p>' + errors[field] +
                            '</p>'); // Show the first error message
                        $('#' + field).addClass(
                            'text-danger'); // Highlight the input field with an error
                    }
                }
            }
        });
    });
    </script>
</body>

</html>