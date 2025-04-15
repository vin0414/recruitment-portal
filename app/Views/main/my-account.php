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
                    </div>
                </div>
            </div>
            <!-- END PAGE HEADER -->
            <!-- BEGIN PAGE BODY -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row g-3">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">Personal Information</div>
                                    <div class="row g-3">
                                        <div class="col-lg-12">
                                            <label class="form-label">Complete Name</label>
                                            <input type="text" class="form-control" value="<?=$account['fullname']?>">
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row g-3">
                                                <div class="col-lg-6">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control"
                                                        value="<?=$account['email']?>">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Role</label>
                                                    <?php
                                                    $roleModel = new \App\Models\roleModel();
                                                    $role = $roleModel->WHERE('role_id',$account['role_id'])->first(); 
                                                    ?>
                                                    <input type="text" class="form-control"
                                                        value="<?=$role['role_name']?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="form-label">Token</label>
                                            <input type="text" class="form-control" value="<?=$account['token']?>">
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row g-3">
                                                <div class="col-lg-6">
                                                    <label class="form-label">Account Created</label>
                                                    <p><?=date('F d Y',strtotime($account['date_created']))?></p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Account Verified</label>
                                                    <?php if($account['verified']==1): ?>
                                                    <span class="badge bg-success text-white">Verified</span>
                                                    <?php else : ?>
                                                    <span class="badge bg-danger text-white">Please verify</span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">Account Security</div>
                                    <form method="POST" class="row g-3" id="frmPassword">
                                        <div class="col-lg-12">
                                            <label class="form-label">Current Password</label>
                                            <input type="password" class="form-control" name="current_password"
                                                minlength="8" maxlength="16" />
                                            <div id="current_password-error" class="error-message text-danger text-sm">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="form-label">New Password</label>
                                            <input type="password" class="form-control" name="new_password"
                                                minlength="8" maxlength="16" />
                                            <div id="new_password-error" class="error-message text-danger text-sm">
                                            </div>
                                        </div>
                                        <div cs="col-lg-12">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirm_password"
                                                minlength="8" maxlength="16" />
                                            <div id="confirm_password-error" class="error-message text-danger text-sm">
                                            </div>
                                        </div>
                                        <div cs="col-lg-12">
                                            <button type="submit" class="btn btn-outline-success form-control">Save
                                                Changes</button>
                                        </div>
                                    </form>
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
</body>

</html>