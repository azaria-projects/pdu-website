<div id="main-content">
    <div class="row justify-content-between align-items-center mx-0 p-4 pb-0">
        <div class="col-12 col-md-auto">
            @include('components.admin.page-header', [
                'icon'      => 'ti-job-opp',
                'header'    => 'Careers',
                'subheader' => 'provide careers/job details to the website',
            ])
        </div>
    </div>

    <div class="d-flex flex-column p-4 pt-3 gap-4">
        <div class="" id="myTab" role="tablist">
            <div class="d-flex flex-column" role="presentation">
                <div class="btn-select-group-admin">
                    <button 
                        id="job-opp-tab" 
                        class="btn btn-selection active" 
                        data-bs-toggle="tab" 
                        data-bs-target="#job-opp-tab-pane" 
                        type="button" 
                        role="tab" 
                        aria-controls="job-opp-tab-pane" 
                        aria-selected="true">
                        
                        <i class="ti ti-replace-user"></i> 
                        JOB OPPORTUNITIES
                    </button>
                    <button 
                        id="job-desc-tab" 
                        class="btn btn-selection"
                        data-bs-toggle="tab" 
                        data-bs-target="#job-desc-tab-pane" 
                        type="button" 
                        role="tab" 
                        aria-controls="job-desc-tab-pane" 
                        aria-selected="false">
                        
                            <i class="ti ti-calendar-user"></i> 
                        JOB DESCRIPTION
                    </button>
                </div>

                <div class="tab-content" id="careers-tab-content">
                    <div class="tab-pane fade show active" id="job-opp-tab-pane" role="tabpanel" aria-labelledby="job-opp-tab" tabindex="0">
                        <div id="opp-data" class="d-flex flex-column mt-3 gap-4">
                            <div id="opp-content" class="d-none"></div>
                            <div class="btn-actions">
                                <div class="d-flex justify-content-end gap-2">
                                    <button id="opp-add" type="button" class="btn btn-add" data-id='' data-name='opp'> 
                                        <i class="ti ti-device-floppy"></i>
                                    </button>

                                    <button id="opp-reset" type="button" class="btn btn-delete" data-id='' data-name='opp'> 
                                        <i class="ti ti-rotate-2"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="opp-editor" class="summernote"></div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="job-desc-tab-pane" role="tabpanel" aria-labelledby="job-desc-tab" tabindex="0">
                        <div id="desc-data" class="d-flex flex-column mt-3 gap-4">
                            <div id="desc-content" class="d-none"></div>
                            <div class="btn-actions">
                                <div class="d-flex justify-content-end gap-2">
                                    <button id="desc-add" type="button" class="btn btn-add" data-id='' data-name='desc'> 
                                        <i class="ti ti-device-floppy"></i>
                                    </button>

                                    <button id="desc-reset" type="button" class="btn btn-delete" data-id='' data-name='desc'> 
                                        <i class="ti ti-rotate-2"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="desc-editor" class="summernote"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>