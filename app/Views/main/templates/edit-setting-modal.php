<div class="modal modal-blur fade" id="editRoleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit System Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" class="row g-2" autocomplete="off" id="frmEditRole">
                    <?=csrf_field()?>
                    <input type="hidden" name="role_id" id="role_id" />
                    <div class="col-lg-12">
                        <label class="form-label">Name of Role</label>
                        <input type="text" class="form-control" name="role" id="role" required />
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
                        <button type="submit" class="form-control btn btn-outline-success">
                            <i class="ti ti-device-floppy"></i>&nbsp;Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="editOfficeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Institutions/Offices</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" class="row g-3" id="frmEditOffice">
                    <?=csrf_field()?>
                    <input type="hidden" name="office_id" id="office_id" />
                    <div class="col-lg-12">
                        <label class="form-label">Name of Institutions/Offices</label>
                        <input type="text" class="form-control" name="office" id="office" required />
                        <div id="office-error" class="error-message text-danger text-sm"></div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <label class="form-label">Type of Office</label>
                                <select name="type_office" id="type_office" class="form-select" required>
                                    <option value="">Choose</option>
                                    <?php foreach($academic as $row): ?>
                                    <option value="<?=$row['academic_id']?>">
                                        <?=$row['academic_name']?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div id="type_office-error" class="error-message text-danger text-sm"></div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Code</label>
                                <input type="text" class="form-control" name="code" id="code" required />
                                <div id="code-error" class="error-message text-danger text-sm"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="form-control btn btn-outline-success">
                            <i class="ti ti-device-floppy"></i>&nbsp;Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="editCourseModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" class="row g-3" id="frmEditCourse">
                    <?=csrf_field()?>
                    <input type="hidden" name="course_id" id="course_id" />
                    <div class="col-lg-12">
                        <label class="form-label">Course</label>
                        <input type="text" class="form-control" name="course" id="course" required />
                        <div id="course-error" class="error-message text-danger text-sm"></div>
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label">Course Code</label>
                        <input type="text" class="form-control" name="course_code" id="course_code" required />
                        <div id="course_code-error" class="error-message text-danger text-sm"></div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="form-control btn btn-outline-success">
                            <i class="ti ti-device-floppy"></i>&nbsp;Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>