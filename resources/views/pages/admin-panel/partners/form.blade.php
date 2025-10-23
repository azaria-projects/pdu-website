<div id="form-content" class="form-data d-none">
    <div class="row justify-content-between align-items-center mx-0 p-4 pb-0">
        <div class="col-12 col-md-auto">
            <div class="d-flex flex-column align-items-start">
                <h2 id="add-header" class="header-admin">Add Partner</h2>
                <small  id="add-subheader" class="subheader-admin">create new partner company data</small>
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
                    <label for="add-name" class="form-label d-flex align-items-center gap-1"><i class="ti ti-building-estate"></i> name <span class="required">*</span></label>
                    <input id="add-name" name="add-name" type="text" class="form-control" placeholder="ex: PT. Drilling Raya" required>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="add-motto" class="form-label d-flex align-items-center gap-1"><i class="ti ti-octahedron"></i> motto </label>
                    <input id="add-motto" name="add-motto" type="text" class="form-control" placeholder="ex: Provide Drilling Services">
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="d-flex flex-column mb-3">
                    <label for="add-active-select" class="form-label"><i class="ti ti-cube-spark me-1"></i> active partner? </label>
                    <select id="add-active-select" name="add-active-active" class="form-select select2"><option></option></select>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6">
                <div class="mb-3">
                    <label for="add-vision" class="form-label d-flex align-items-center gap-1"><i class="ti ti-stars"></i> vision </label>
                    <textarea id="add-vision" name="add-vision" type="text" class="form-control" placeholder="ex: enter company's vision"></textarea>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6">
                <div class="mb-3">
                    <label for="add-mission" class="form-label d-flex align-items-center gap-1"><i class="ti ti-target-arrow"></i> mission </label>
                    <textarea id="add-mission" name="add-mission" type="text" class="form-control" placeholder="ex: enter company's mission"></textarea>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="add-fb" class="form-label d-flex align-items-center gap-1"><i class="ti ti-brand-meta"></i> Facebook </label>
                    <input id="add-fb" name="add-fb" type="text" class="form-control" placeholder="ex: username_facebook">
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="add-ln" class="form-label d-flex align-items-center gap-1"><i class="ti ti-brand-linkedin"></i> LinkedIn </label>
                    <input id="add-ln" name="add-ln" type="text" class="form-control" placeholder="ex: username_linkedin">
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="add-in" class="form-label d-flex align-items-center gap-1"><i class="ti ti-brand-instagram"></i> Instagram </label>
                    <input id="add-in" name="add-in" type="text" class="form-control" placeholder="ex: username_instagram">
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="add-email" class="form-label d-flex align-items-center gap-1"><i class="ti ti-mail"></i> Email </label>
                    <input id="add-email" name="add-email" type="text" class="form-control" placeholder="ex: user@mail.com">
                </div>
            </div>

            <div id="myTab" class="col-12 mt-2" role="tablist">
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
                            SELECT ICON 
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
                            UPLOAD ICON 
                        </button>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div id="tab-select-icon" class="d-flex flex-column my-3">
                                <label for="add-icon-select" class="form-label"><i class="ti ti-photo-spark me-1"></i> company icon </label>
                                <select id="add-icon-select" name="add-icon-select" class="form-select select2"></select>  
                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div id="tab-upload-icon" class="my-3">
                                <label for="add-icon" class="form-label d-flex align-items-center gap-1"><i class="ti ti-photo-spark"></i> company icon </label>
                                <input id="add-icon" name="add-icon" type="file" class="form-control" accept="image/*">
                            </div>
                        </div>
                    </div>
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