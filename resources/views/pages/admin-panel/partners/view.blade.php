<div id="form-view" class="form-data d-none">
    <div class="row justify-content-between align-items-center mx-0 p-4 pb-0">
        <div class="col-12 col-md-auto">
            <div class="d-flex align-items-center">
                <i id="view-header-icon" class="" style="font-size: 32px;"></i>
                <div class="d-flex flex-column align-items-start">
                    <h2 id="view-header" class="header-admin"></h2>
                    <small id="view-subheader" class="subheader-admin"></small>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-auto pe-4 mt-3 mt-md-0">
            <button id="btn-back-2" class="btn btn-outline btn-back me-1"><i class="ti ti-arrow-back-up-double"></i></button>
        </div>
    </div>

    <div class="p-4">
        <div class="row mx-0">
            <div class="col-12 col-sm-12 col-md-6">
                <div class="mb-3">
                    <label for="view-name" class="form-label d-flex align-items-center gap-1"><i class="ti ti-tag-starred"></i> title </label>
                    <input id="view-name" name="view-name" type="text" class="form-control" disabled>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6">
                <div class="mb-3">
                    <label for="view-link" class="form-label d-flex align-items-center gap-1"><i class="ti ti-link-plus"></i> link </label>
                    <input id="view-link" name="view-link" type="text" class="form-control" disabled>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <label for="view-desc" class="form-label d-flex align-items-center gap-1"><i class="ti ti-text-scan-2"></i> description <span class="required">*</span></label>
                    <textarea id="view-desc" name="view-desc" type="text" class="form-control" disabled></textarea>
                </div>
            </div>

            <div class="col-12">
                <div class="img-prev mt-3">
                    <img id="view-img" src="" alt="" class="preview">
                </div>
            </div>
        </div>
    </div>
</div>