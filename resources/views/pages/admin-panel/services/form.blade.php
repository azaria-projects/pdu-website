<div id="form-content" class="form-data d-none">
    <div class="row justify-content-between align-items-center mx-0 p-4 pb-0">
        <div class="col-12 col-md-4">
            <div class="d-flex flex-column align-items-start">
                <h2 id="add-header" class="header-admin">Add Services</h2>
                <small  id="add-subheader" class="subheader-admin">create new services to be displayed</small>
            </div>
        </div>

        <div class="col-12 col-md-auto pe-4 mt-3 mt-md-0">
            <button id="btn-back-1" class="btn btn-outline btn-back me-1"><i class="ti ti-arrow-back-up-double"></i></button>
        </div>
    </div>

    <form novalidate id="form-add" action="#" class="p-4">
        <div class="row mx-0">
            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="d-flex flex-column mb-3">
                    <label for="add-icon-select" class="form-label"><i class="ti ti-favicon me-1"></i> icon <span class="required">*</span> </label>
                    <select id="add-icon-select" name="add-icon-select" class="form-select select2"></select>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="add-name" class="form-label d-flex align-items-center gap-1"><i class="ti ti-tag-starred"></i> name <span class="required">*</span></label>
                    <input id="add-name" name="add-name" type="text" class="form-control" placeholder="ex: Mudlogging" required>
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
                    <textarea id="add-desc" name="add-desc" type="text" class="form-control" placeholder="ex: provide service details"></textarea>
                </div>
            </div>

            <div class="col-12" id="myTab" role="tablist">
                <div class="d-flex flex-column" role="presentation">
                    <div class="btn-select-group-admin">
                        <button 
                            id="home-tab" 
                            class="btn btn-selection active" 
                            data-bs-toggle="tab" 
                            data-bs-target="#home-tab-pane" 
                            type="button" 
                            role="tab" 
                            aria-controls="home-tab-pane" 
                            aria-selected="true">
                            
                            <i class="ti ti-color-swatch"></i> 
                            SELECT BANNER 
                        </button>
                        <button 
                            id="profile-tab" 
                            class="btn btn-selection"
                            data-bs-toggle="tab" 
                            data-bs-target="#profile-tab-pane" 
                            type="button" 
                            role="tab" 
                            aria-controls="profile-tab-pane" 
                            aria-selected="false">
                            
                             <i class="ti ti-world-upload"></i> 
                            UPLOAD BANNER 
                        </button>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div id="tab-select-banner" class="d-flex flex-column my-3">
                                <label for="add-image-select" class="form-label"><i class="ti ti-photo-spark me-1"></i> service banner </label>
                                <select id="add-image-select" name="add-image-select" class="form-select select2"></select>  
                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div id="tab-upload-banner" class="my-3">
                                <label for="add-image" class="form-label d-flex align-items-center gap-1"><i class="ti ti-photo-spark"></i> service banner</label>
                                <input id="add-image" name="add-image" type="file" class="form-control" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end w-100">
                <button class="btn btn-submit" type="submit">
                    <i class="ti ti-device-floppy"></i>
                    <span>save</span>
                </button>
            </div>
        </div>
    </form>
</div>