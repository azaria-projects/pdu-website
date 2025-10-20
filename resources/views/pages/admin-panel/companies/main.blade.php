<div id="main-content">
    <div class="row justify-content-between align-items-center mx-0 p-4 pb-0">
        <div class="col-12 col-md-auto">
            @include('components.admin.page-header', [
                'icon'      => '',
                'header'    => 'Company',
                'subheader' => 'display current company related data',
            ])
        </div>
    </div>

    <div class="d-flex flex-column p-4 pt-3 gap-4">
        <div class="" id="myTab" role="tablist">
            <div class="d-flex flex-column" role="presentation">
                <div class="btn-select-group-admin">
                    <button 
                        id="job-ovr-tab" 
                        class="btn btn-selection active" 
                        data-bs-toggle="tab" 
                        data-bs-target="#job-ovr-tab-pane" 
                        type="button" 
                        role="tab" 
                        aria-controls="job-ovr-tab-pane" 
                        aria-selected="true">
                        
                        <i class="ti ti-replace-user"></i> 
                        OVERVIEW
                    </button>
                </div>

                <div class="tab-content" id="careers-tab-content">
                    <div class="tab-pane fade show active" id="job-ovr-tab-pane" role="tabpanel" aria-labelledby="job-ovr-tab" tabindex="0">
                        <div id="ovr-data" class="d-flex flex-column mt-3 gap-4">
                            <div id="ovr-content" class="d-none"></div>
                            <div class="btn-actions">
                                <div class="d-flex justify-content-end gap-2">
                                    <button id="ovr-add" type="button" class="btn btn-add" data-id='' data-name='ovr'> 
                                        <i class="ti ti-device-floppy"></i>
                                    </button>

                                    <button id="ovr-reset" type="button" class="btn btn-delete" data-id='' data-name='ovr'> 
                                        <i class="ti ti-rotate-2"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="ovr-editor" class="summernote"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>