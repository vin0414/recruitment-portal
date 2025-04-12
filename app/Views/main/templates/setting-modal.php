<div class="modal modal-blur fade" id="officeTypeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Competence</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" class="row g-3" id="frmOfficeType">
                    <?=csrf_field()?>
                    <div class="col-lg-12">
                        <label class="form-label">Name of Office</label>
                        <input type="text" class="form-control" name="office_name" required />
                        <div id="office_name-error" class="error-message text-danger text-sm"></div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="form-control btn btn-primary">
                            <i class="ti ti-device-floppy"></i>&nbsp;Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="roleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New System Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" class="row g-2" autocomplete="off" id="frmRole">
                    <?=csrf_field()?>
                    <div class="col-lg-12">
                        <label class="form-label">Name of Role</label>
                        <input type="text" class="form-control" name="role" required />
                        <div id="role-error" class="error-message text-danger text-sm"></div>
                    </div>
                    <div class="col-lg-12">
                        <h3><b>System Permission</b></h3>
                        <label class="form-label">Point System Module</label>
                        <div class="form-selectgroup-boxes row mb-3">
                            <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="point_rule" value="1" class="form-selectgroup-input"
                                        required />
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">Yes</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="point_rule" value="0" class="form-selectgroup-input" />
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">No</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div id="point_rule-error" class="error-message text-danger text-sm"></div>
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label">Settings Module</label>
                        <div class="form-selectgroup-boxes row mb-3">
                            <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="settings" value="1" class="form-selectgroup-input"
                                        required />
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">Yes</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="settings" value="0" class="form-selectgroup-input" />
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">No</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div id="settings-error" class="error-message text-danger text-sm"></div>
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label">Job Posting Module</label>
                        <div class="form-selectgroup-boxes row mb-3">
                            <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="job_posting" value="1" class="form-selectgroup-input"
                                        required />
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">Yes</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="job_posting" value="0" class="form-selectgroup-input" />
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">No</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div id="job_posting-error" class="error-message text-danger text-sm"></div>
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label">User Management Module</label>
                        <div class="form-selectgroup-boxes row mb-3">
                            <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="user_management" value="1" class="form-selectgroup-input"
                                        required />
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">Yes</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="user_management" value="0"
                                        class="form-selectgroup-input" />
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">No</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div id="user_management-error" class="error-message text-danger text-sm"></div>
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label">Application Tracking Module</label>
                        <div class="form-selectgroup-boxes row mb-3">
                            <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="tracking" value="1" class="form-selectgroup-input"
                                        required />
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">Yes</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="tracking" value="0" class="form-selectgroup-input" />
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">No</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div id="tracking-error" class="error-message text-danger text-sm"></div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="form-control btn btn-primary">
                            <i class="ti ti-device-floppy"></i>&nbsp;Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="officeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Institutions/Offices</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" class="row g-3" id="frmOffice">
                    <?=csrf_field()?>
                    <div class="col-lg-12">
                        <label class="form-label">Name of Institutions/Offices</label>
                        <input type="text" class="form-control" name="office" required />
                        <div id="office-error" class="error-message text-danger text-sm"></div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <label class="form-label">Type of Office</label>
                                <select name="type_office" class="form-select" required>
                                    <option value="">Choose</option>
                                    <?php foreach($academic as $row): ?>
                                    <option value="<?=$row['academic_id']?>"><?=$row['academic_name']?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div id="type_office-error" class="error-message text-danger text-sm"></div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Code</label>
                                <input type="text" class="form-control" name="code" required />
                                <div id="code-error" class="error-message text-danger text-sm"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="form-control btn btn-primary">
                            <i class="ti ti-device-floppy"></i>&nbsp;Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="courseModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" class="row g-3" id="frmCourse">
                    <?=csrf_field()?>
                    <div class="col-lg-12">
                        <label class="form-label">Course</label>
                        <input type="text" class="form-control" name="course" required />
                        <div id="course-error" class="error-message text-danger text-sm"></div>
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label">Course Code</label>
                        <input type="text" class="form-control" name="course_code" required />
                        <div id="course_code-error" class="error-message text-danger text-sm"></div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="form-control btn btn-primary">
                            <i class="ti ti-device-floppy"></i>&nbsp;Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="categoryModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" class="row g-3" id="frmCategory">
                    <?=csrf_field()?>
                    <div class="col-lg-12">
                        <label class="form-label">Category</label>
                        <input type="text" class="form-control" name="category" required />
                        <div id="category-error" class="error-message text-danger text-sm"></div>
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label">Code</label>
                        <input type="text" class="form-control" name="category_code" required />
                        <div id="category_code-error" class="error-message text-danger text-sm"></div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="form-control btn btn-primary">
                            <i class="ti ti-device-floppy"></i>&nbsp;Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="competenceModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Competence</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" class="row g-3" id="frmCompetence">
                    <?=csrf_field()?>
                    <div class="col-lg-12">
                        <label class="form-label">Title of Competency</label>
                        <input type="text" class="form-control" name="title" required />
                        <div id="title-error" class="error-message text-danger text-sm"></div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="form-control btn btn-primary">
                            <i class="ti ti-device-floppy"></i>&nbsp;Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>