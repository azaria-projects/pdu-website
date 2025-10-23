<div id="form-content" class="form-data d-none">
    <div class="row justify-content-between align-items-center mx-0 p-4 pb-0">
        <div class="col-12 col-md-auto">
            <div class="d-flex flex-column align-items-start">
                <h2 id="add-header" class="header-admin">Add File</h2>
                <small  id="add-subheader" class="subheader-admin">Upload new File</small>
            </div>
        </div>

        <div class="col-12 col-md-auto pe-4 mt-3 mt-md-0">
            <button id="btn-back-1" class="btn btn-outline btn-back me-1"><i class="ti ti-arrow-back-up-double"></i></button>
        </div>
    </div>

    <form id="form-add" action="#" class="d-flex flex-column p-4" novalidate>
        <div class="row mx-0">
            <div class="col-12 col-sm-12 col-md-6">
                <div class="d-flex flex-column mb-3">
                    <label for="add-file" class="form-label d-flex align-items-center gap-1"><i class="ti ti-file-info"></i> file <span class="required">*</span> </label>
                    <input id="add-file" name="add-file" type="file" class="form-control" required>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6">
                <div class="d-flex flex-column mb-3">
                    <label for="add-type-select" class="form-label"><i class="ti ti-squares-selected me-1"></i> Type <span class="required">*</span> </label>
                    <select id="add-type-select" name="add-type-select" class="form-select select2" required><option></option></select>
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