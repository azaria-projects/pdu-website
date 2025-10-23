<div id="main-content">
    <div class="row justify-content-between align-items-center mx-0 p-4 pb-0">
        <div class="col-12 col-md-4">
            @include('components.admin.page-header', [
                'icon'      => 'ti-home',
                'header'    => 'Partners',
                'subheader' => 'display all company partners',
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
                    <input id="filter-search" name="filter-search" type="text" class="form-control" placeholder="ex: PT. PetroChina Jabung">
                </div>
            </div>
        </div>

        <div id="page-table">
            <div class="table-responsive">
                <table id="table-datatable" class="table">
                    <thead>
                        <tr class="text-center">
                            <th id="id"            class="text-center">id</th>
                            <th id="icon-data"     class="text-center">Icon Data</th>
                            <th id="icon"          class="text-center">Icon</th>
                            <th id="name"          class="text-center">Name</th>
                            <th id="motto"         class="text-center">Motto</th>
                            <th id="email-data"    class="text-center">Email Data</th>
                            <th id="email"         class="text-center">Email</th>
                            <th id="vision"        class="text-center">Vision</th>
                            <th id="mission"       class="text-center">Mission</th>
                            <th id="facebook-data" class="text-center">Facebook Data</th>
                            <th id="facebook"      class="text-center">Facebook</th>
                            <th id="linkedin-data" class="text-center">LinkedIn Data</th>
                            <th id="linkedin"      class="text-center">LinkedIn</th>
                            <th id="instagram-data "class="text-center">Instagram Data</th>
                            <th id="instagram"     class="text-center">Instagram</th>
                            <th id="address-data"  class="text-center">Address Data</th>
                            <th id="address"       class="text-center">Address</th>
                            <th id="partner-data"  class="text-center">Partner Data</th>
                            <th id="partner"       class="text-center">Active Partner</th>
                            <th id="created-at"    class="text-center">created-at</th>
                            <th id="updated-at"    class="text-center">updated-at</th>
                            <th id="action"        class="text-center">#</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col">
                
            </div>
        </div>
    </div>
</div>