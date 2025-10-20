<div id="form-content" class="form-data d-none">
    <div class="row justify-content-between align-items-center mx-0 p-4 pb-0">
        <div class="col-12 col-md-auto">
            <div class="d-flex flex-column align-items-start">
                <h2 id="add-header" class="header-admin">Add Statistics</h2>
                <small  id="add-subheader" class="subheader-admin">create new statistics to be displayed</small>
            </div>
        </div>

        <div class="col-12 col-md-auto pe-4 mt-3 mt-md-0">
            <button id="btn-back-1" class="btn btn-outline btn-back me-1"><i class="ti ti-arrow-back-up-double"></i></button>
        </div>
    </div>

    <form id="form-add" action="#" class="d-flex flex-column p-4" novalidate>
        <div class="row mx-0">
            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="add-value" class="form-label d-flex align-items-center gap-1"><i class="ti ti-tag-starred"></i> value <span class="required">*</span></label>
                    <input id="add-value" name="add-value" type="text" class="form-control" placeholder="ex: 100%" required>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="d-flex flex-column mb-3">
                    <label for="add-icon-select" class="form-label"><i class="ti ti-favicon me-1"></i> icon <span class="required">*</span></label>
                    <select id="add-icon-select" name="add-icon-select" class="form-select select2"></select>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="d-flex flex-column mb-3">
                    <label for="add-status-select" class="form-label"><i class="ti ti-circuit-battery me-1"></i> status </label>
                    <select id="add-status-select" name="add-status-select" class="form-select select2"><option></option></select>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <label for="add-desc" class="form-label d-flex align-items-center gap-1"><i class="ti ti-text-scan-2"></i> description <span class="required">*</span></label>
                    <textarea id="add-desc" name="add-desc" type="text" class="form-control" placeholder="ex: number of logged well" required></textarea>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end w-100 px-3 pt-2">
            <button class="btn btn-submit" type="submit">
                <i class="ti ti-device-floppy"></i>
                <span>save</span>
            </button>
        </div>
    </form>
</div>