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
                                        Create
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#roleModal">System Role</a>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#categoryModal">Category</a>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#officeTypeModal">Type of Office</a>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#courseModal">Courses</a>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#officeModal">Institutions/Offices</a>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#competenceModal">Competencies</a>
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
                                            data-bs-target="#roleModal">System Role</a>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#categoryModal">Category</a>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#officeTypeModal">Type of Office</a>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#courseModal">Courses</a>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#officeModal">Institutions/Offices</a>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#competenceModal">Competencies</a>
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
                                        <i class="ti ti-devices-cog"></i>&nbsp;System Role
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tabs-profile-8" class="nav-link" data-bs-toggle="tab">
                                        <i class="ti ti-category"></i>&nbsp;Categories
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tabs-others-8" class="nav-link" data-bs-toggle="tab">
                                        <i class="ti ti-adjustments-plus"></i>&nbsp;Offices/Schools/Courses
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tabs-qualification-8" class="nav-link" data-bs-toggle="tab">
                                        <i class="ti ti-target-arrow"></i>&nbsp;Others
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tabs-activity-8" class="nav-link" data-bs-toggle="tab">
                                        <i class="ti ti-clipboard-data"></i>&nbsp;System Logs
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="tabs-home-8">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="tblrole">
                                            <thead>
                                                <th>Role</th>
                                                <th>Point System</th>
                                                <th>Settings</th>
                                                <th>Job Posting</th>
                                                <th>Manage Users</th>
                                                <th>Tracking</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-profile-8">
                                    <div class="row g-3">
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title">Category</div>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped"
                                                            id="tblapplication">
                                                            <thead>
                                                                <th>Category</th>
                                                                <th>Code</th>
                                                                <th>Action</th>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title">Type of Offices</div>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped" id="tbl_type">
                                                            <thead>
                                                                <th>Types</th>
                                                                <th>Code</th>
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
                                <div class="tab-pane fade" id="tabs-others-8">
                                    <div class="row g-3">
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title">Offices/Schools</div>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped"
                                                            id="tblinstitution">
                                                            <thead>
                                                                <th>Name of School/Office</th>
                                                                <th>Code</th>
                                                                <th>Action</th>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title">Courses</div>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped"
                                                            id="tblcourses">
                                                            <thead>
                                                                <th>Courses</th>
                                                                <th>Code</th>
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
                                <div class="tab-pane fade" id="tabs-qualification-8">
                                    <div class="row g-3">
                                        <div class="col-lg-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title">Competence</div>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped"
                                                            id="tblcompetence">
                                                            <thead>
                                                                <th>#</th>
                                                                <th>Title</th>
                                                                <th>Date</th>
                                                                <th>Action</th>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title">System Security</div>
                                                    <form method="POST" class="row g-3" id="frmSystem">
                                                        <?=csrf_field()?>
                                                        <div class="col-lg-12">
                                                            <label class="form-label">Password</label>
                                                            <div class="input-group input-group-flat">
                                                                <input type="password" class="form-control"
                                                                    name="password" id="password" minlength="8"
                                                                    maxlength="16" placeholder="Your password"
                                                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                                                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                                                    autocomplete="off" />
                                                                <span class="input-group-text">
                                                                    <a href="javascript:void(0);" onclick="toggle()"
                                                                        class="link-secondary" title="Show password"
                                                                        data-bs-toggle="tooltip">
                                                                        <!-- Download SVG icon from http://tabler.io/icons/icon/eye -->
                                                                        <i id="icon" class="ti ti-eye-closed"></i>
                                                                    </a>
                                                                </span>
                                                            </div>
                                                            <div id="password-error"
                                                                class="error-message text-danger text-sm"></div>
                                                        </div>
                                                        <div cs="col-lg-12">
                                                            <button type="submit" class="btn btn-outline-success">
                                                                <i class="ti ti-device-floppy"></i>&nbsp;Save
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-activity-8">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="tbl_log">
                                            <thead>
                                                <th>Date & Time</th>
                                                <th>Fullname</th>
                                                <th>Activities</th>
                                                <th>Pages</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach($logs as $row): ?>
                                                <tr>
                                                    <td><?=$row->datetime?></td>
                                                    <td><?=$row->fullname?></td>
                                                    <td><?=$row->activities ?></td>
                                                    <td><?=$row->page ?></td>
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
    <script src="<?=base_url('assets/js/settings.js')?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?=view('main/templates/setting-modal')?>
    <?=view('main/templates/edit-setting-modal')?>
    <script>
    function toggle() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
            let elem = document.getElementById('icon');
            elem.classList.remove("ti-eye-closed");
            elem.classList.add("ti-eye");
        } else {
            x.type = "password";
            let elem = document.getElementById('icon');
            elem.classList.remove("ti-eye");
            elem.classList.add("ti-eye-closed");
        }
    }

    $('#frmOfficeType').on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $('.error-message').html('');
        $.ajax({
            url: window.location.origin + "/save-types",
            method: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully added",
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        // Action based on user's choice
                        if (result.isConfirmed) {
                            $('#frmOfficeType')[0].reset();
                            $('#officeTypeModal').modal('hide');
                            // Perform some action when "Yes" is clicked
                            type_office.ajax.reload();
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

    $('#frmSystem').on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $('.error-message').html('');
        $.ajax({
            url: window.location.origin + "/system-password",
            method: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    $('#frmSystem')[0].reset();
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully submitted",
                        icon: 'success'
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

    $('#frmCompetence').on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $('.error-message').html('');
        $.ajax({
            url: window.location.origin + "/save-competence",
            method: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully added",
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        // Action based on user's choice
                        if (result.isConfirmed) {
                            $('#frmCompetence')[0].reset();
                            $('#competenceModal').modal('hide');
                            // Perform some action when "Yes" is clicked
                            list.ajax.reload();
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

    $('#frmRole').on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $('.error-message').html('');
        $.ajax({
            url: window.location.origin + "/save-role",
            method: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully added",
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        // Action based on user's choice
                        if (result.isConfirmed) {
                            $('#frmRole')[0].reset();
                            $('#roleModal').modal('hide');
                            // Perform some action when "Yes" is clicked
                            role.ajax.reload();
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

    $('#frmEditRole').on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $('.error-message').html('');
        $.ajax({
            url: window.location.origin + "/update-role",
            method: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully applied changes",
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        // Action based on user's choice
                        if (result.isConfirmed) {
                            $('#editRoleModal').modal('hide');
                            // Perform some action when "Yes" is clicked
                            role.ajax.reload();
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

    $('#frmOffice').on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $('.error-message').html('');
        $.ajax({
            url: window.location.origin + "/save-office",
            method: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully added",
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        // Action based on user's choice
                        if (result.isConfirmed) {
                            $('#frmOffice')[0].reset();
                            $('#officeModal').modal('hide');
                            // Perform some action when "Yes" is clicked
                            office.ajax.reload();
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

    $('#frmEditOffice').on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $('.error-message').html('');
        $.ajax({
            url: window.location.origin + "/update-office",
            method: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully applied changes",
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        // Action based on user's choice
                        if (result.isConfirmed) {
                            $('#editOfficeModal').modal('hide');
                            // Perform some action when "Yes" is clicked
                            office.ajax.reload();
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

    $('#frmCourse').on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $('.error-message').html('');
        $.ajax({
            url: window.location.origin + "/save-course",
            method: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully added",
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        // Action based on user's choice
                        if (result.isConfirmed) {
                            $('#frmCourse')[0].reset();
                            $('#courseModal').modal('hide');
                            // Perform some action when "Yes" is clicked
                            courses.ajax.reload();
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

    $('#frmEditCourse').on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $('.error-message').html('');
        $.ajax({
            url: window.location.origin + "/update-course",
            method: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully applied changes",
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        // Action based on user's choice
                        if (result.isConfirmed) {
                            $('#editCourseModal').modal('hide');
                            // Perform some action when "Yes" is clicked
                            courses.ajax.reload();
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

    $('#frmCategory').on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $('.error-message').html('');
        $.ajax({
            url: window.location.origin + "/save-category",
            method: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully added",
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        // Action based on user's choice
                        if (result.isConfirmed) {
                            $('#frmCategory')[0].reset();
                            $('#categoryModal').modal('hide');
                            // Perform some action when "Yes" is clicked
                            app.ajax.reload();
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