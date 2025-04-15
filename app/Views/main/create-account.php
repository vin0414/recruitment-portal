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
                                <a href="<?=site_url('accounts')?>"
                                    class="btn btn-outline-success btn-5 d-none d-sm-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 12l14 0" />
                                        <path d="M5 12l6 6" />
                                        <path d="M5 12l6 -6" />
                                    </svg>
                                    Back
                                </a>
                                <a href="<?=site_url('accounts')?>"
                                    class="btn btn-outline-success btn-6 d-sm-none btn-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 12l14 0" />
                                        <path d="M5 12l6 6" />
                                        <path d="M5 12l6 -6" />
                                    </svg>
                                </a>
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
                    <div class="row g-3">
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <i class="ti ti-user-plus"></i>&nbsp;<?=$title?>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="row g-3" method="POST" autocomplete="OFF" id="frmAccount">
                                        <?=csrf_field()?>
                                        <div class="col-lg-12">
                                            <label class="form-label">Complete Name</label>
                                            <input type="text" class="form-control" name="fullname" required />
                                            <div id="fullname-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row g-3">
                                                <div class="col-lg-8">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email" required />
                                                    <div id="email-error" class="error-message text-danger text-sm">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="form-label">System Role</label>
                                                    <select name="role" class="form-select" required>
                                                        <option value="">Choose</option>
                                                        <?php foreach($role as $row): ?>
                                                        <option value="<?=$row['role_id']?>"><?=$row['role_name']?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div id="role-error" class="error-message text-danger text-sm">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="form-label">Office/School</label>
                                            <select name="office" id="office" class="form-select" required>
                                                <option value="">Choose</option>
                                                <?php foreach($office as $row): ?>
                                                <option value="<?=$row['school_id']?>"><?=$row['school_name']?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div id="office-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="agree"
                                                    value="1" />
                                                <span class="form-check-label">Send verification link to activate and
                                                    access the system</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-outline-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                    <path d="M14 4l0 4l-6 0l0 -4" />
                                                </svg>
                                                &nbsp;Save Account
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Recents</div>
                                </div>
                                <div class="position-relative">
                                    <div class="card-table table-responsive">
                                        <table class="table table-vcenter">
                                            <tbody>
                                                <?php if(empty($recent)){ ?>
                                                <tr>
                                                    <td>
                                                        <center><span>No Recent(s) Account</span></center>
                                                    </td>
                                                </tr>
                                                <?php }else { ?>
                                                <?php foreach($recent as $row): ?>
                                                <tr>
                                                    <td>
                                                        <b><?=$row['fullname']?></b><br />
                                                        <small><?=date('F d, Y',strtotime($row['date_created']))?></small>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                                <?php } ?>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $('#frmAccount').on('submit', function(e) {
        e.preventDefault();
        $('.error-message').html('');
        let data = $(this).serialize();
        $.ajax({
            url: window.location.origin + "/save-account",
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
                            $('#frmAccount')[0].reset();
                            // Perform some action when "Yes" is clicked
                            location.href = window.location.origin + "/accounts";
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