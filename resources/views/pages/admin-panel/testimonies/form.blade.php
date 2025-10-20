<div id="form-content" class="form-data d-none">
    <div class="row justify-content-between align-items-center mx-0 p-4 pb-0">
        <div class="col-12 col-md-auto">
            <div class="d-flex flex-column align-items-start">
                <h2 id="add-header" class="header-admin">Add Testimony</h2>
                <small  id="add-subheader" class="subheader-admin">create new user testimonies displayed</small>
            </div>
        </div>

        <div class="col-12 col-md-auto pe-4 mt-3 mt-md-0">
            <button id="btn-back-1" class="btn btn-outline btn-back me-1"><i class="ti ti-arrow-back-up-double"></i></button>
        </div>
    </div>

    <form id="form-add" action="#" class="d-flex flex-column p-4" novalidate>
        <div class="row mx-0">
            <div class="col-12 col-sm-12 col-md-6">
                <div class="mb-3">
                    <label for="add-name" class="form-label d-flex align-items-center gap-1"><i class="ti ti-users"></i> name <span class="required">*</span></label>
                    <input id="add-name" name="add-name" type="text" class="form-control" placeholder="ex: person who gave testimony" required>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6">
                <div class="mb-3">
                    <label for="add-role" class="form-label d-flex align-items-center gap-1"><i class="ti ti-affiliate"></i> role <span class="required">*</span></label>
                    <input id="add-role" name="add-role" type="text" class="form-control" placeholder="ex: person who gave testimony" required>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6">
                <div class="d-flex flex-column mb-3">
                    <label for="add-company-select" class="form-label"><i class="ti ti-building-estate me-1"></i> company <span class="required">*</span></label>
                    <select id="add-company-select" name="add-company-select" class="form-select select2"><option></option></select>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6">
                <div class="d-flex flex-column mb-3">
                    <label for="add-status-select" class="form-label"><i class="ti ti-circuit-battery me-1"></i> status </label>
                    <select id="add-status-select" name="add-status-select" class="form-select select2"><option></option></select>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <label for="add-testimony" class="form-label d-flex align-items-center gap-1"><i class="ti ti-text-scan-2"></i> testimony <span class="required">*</span></label>
                    <textarea id="add-testimony" name="add-testimony" type="text" class="form-control" placeholder="ex: user review / testimony" required></textarea>
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