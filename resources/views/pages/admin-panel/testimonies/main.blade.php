<div id="main-content">
    <div class="row justify-content-between align-items-center mx-0 p-4 pb-0">
        <div class="col-12 col-md-4">
            @include('components.admin.page-header', [
                'icon'      => 'ti-home',
                'header'    => 'Testimonies',
                'subheader' => 'display user testimonies',
            ])
        </div>

        <div class="col-12 col-md-auto pe-4 mt-3 mt-md-0">
            <button id="btn-add" class="btn btn-outline me-1"><i class="ti ti-plus"></i></button>
            <button id="btn-refresh" class="btn btn-outline btn-refresh"><i class="ti ti-refresh"></i></button>
        </div>
    </div>

    <div class="d-flex flex-column p-4 pt-3">
        <div class="row mx-0">
            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="filter-search" class="form-label d-flex align-items-center gap-1"><i class="ti ti-clipboard-search"></i> search</label>
                    <input id="filter-search" name="filter-search" type="text" class="form-control" placeholder="ex: N.P.T">
                </div>
            </div>
        </div>

        <div id="page-table">
            <div class="table-responsive">
                <table id="table-datatable" class="table">
                    <thead>
                        <tr class="text-center">
                            <th id="id"         class="text-center">id</th>
                            <th id="name"       class="text-center">Name</th>
                            <th id="role"       class="text-center">Role</th>
                            <th id="company"    class="text-center">Company</th>
                            <th id="company-nm" class="text-center">Company</th>
                            <th id="testimony"  class="text-center">Testimony</th>
                            <th id="status"     class="text-center">Status</th>
                            <th id="active"     class="text-center">Status</th>
                            <th id="created-at" class="text-center">created-at</th>
                            <th id="updated-at" class="text-center">updated-at</th>
                            <th id="action"     class="text-center">#</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>