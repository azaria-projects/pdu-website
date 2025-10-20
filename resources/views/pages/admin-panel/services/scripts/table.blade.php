<script>
    function Table(
        id = '',
        baseUrl = 'http://127.0.0.1:8000',
        basePrefix = 'api'
    ) {
        this.currRow   = null;
        this.baseUrl    = baseUrl;
        this.basePrefix = basePrefix;
        this.tableId    = id; 
        this.columns    = [
            { data: 'id', name: 'id', visible: false },
            { 
                data: 'icon', name: 'icon', visible: true,
                render: function (data, type, row, meta) {
                    const html = `<i class='ti ${data}'></i>`;
                    return html;
                } 
            },
            { data: 'name', name: 'name', visible: true },
            { data: 'image', name: 'image', visible: false },
            { 
                data: 'image', name: 'banner', visible: true,
                render: function (data, type, row, meta) {
                    if (data !== null) {
                        return `<button class='btn btn-exist'><i class='ti ti-checks'></i></button>`;
                    }

                    return `<button class='btn btn-missing'><i class='ti ti-exclamation-circle'></i></button>`;
                } 
            },
            { data: 'status', name: 'status', visible: false },
            { 
                data: 'status', name: 'active', visible: true,
                render: function (data, type, row, meta) {
                    if (data === 'active') {
                        return `<button class='btn btn-exist btn-status' data-status='${data}'><i class='ti ti-checks'></i></button>`;
                    }

                    return `<button class='btn btn-missing btn-status' data-status='${data}'><i class='ti ti-exclamation-circle'></i></button>`;
                } 
            },
            { data: 'description', name: 'description', visible: true },
            { data: 'created_at' , name: 'created_at' , visible: false },
            { data: 'updated_at' , name: 'updated_at' , visible: false },
            { 
                data: null, name: 'action', visible: true,
                render: function (data, type, row, meta) {
                    const btn = `
                        <div class="td-groups">
                            <button type="button" class="btn btn-view" data-row-id="${row.id}"> 
                                <i class="ti ti-eye-search"></i>
                            </button>

                            <button type="button" class="btn btn-edit" data-row-id="${row.id}"> 
                                <i class="ti ti-edit"></i>
                            </button>

                            <button type="button" class="btn btn-delete" data-row-id="${row.id}"> 
                                <i class="ti ti-trash"></i>
                            </button>
                        </div>`;

                    return btn;
                }
            },
        ];

        this.columnDefs = [
            { width: '10%', targets: [2] },
            { width: '5%', targets: [1,4] },
            { width: '20%', targets: [8] },
            { class: 'text-center', targets: [1] }
        ];
    }

    Table.prototype.initTable = async function () {
        const bse = `${this.baseUrl}/${this.basePrefix}/services`;
        const tbl = $(`#${this.tableId}`).DataTable({
            pagingType: 'full',
            paging: true,
            ordering: false,
            searching: false,
            processing: true,
            serverSide: true,
            responsive: false,
            autoWidth: false,
            ajax: function(data, callback, settings) {
                const key = document.getElementById('filter-search').value;
                const pge = Math.floor(data.start / data.length) + 1;
                const par = new URLSearchParams({
                    'limit'    : 10,
                    'order'    : 'asc',
                    'keyword'  : key,
                    'order_by' : 'id'
                }).toString();

                $.ajax({
                    url: `${bse}?${par}`,
                    success: function(json) {
                        callback({
                            draw: data.draw,
                            recordsTotal: json.response.meta.total,
                            recordsFiltered: json.response.meta.total,
                            data: json.response.data
                        });
                    }
                });
            },
            columns: this.columns,
            columnDefs: this.columnDefs,
            layout: {
                topStart: null,
                topEnd: 'pageLength'
            },
            initComplete: function() {
                this.api().responsive.recalc();
                $(window).trigger('resize');
            },
        });

        $(`#${this.tableId}`).on('processing.dt', function(e, settings, processing) {
            if (processing) {
                $('.dt-processing').addClass('dt-load');
            } else {
                $('.dt-processing').removeClass('dt-load');
            }
        });

        $(document).on('click', '.btn-view', function() {
            const dat = tbl.row($(this).parent().parent()).data();

            const img = document.getElementById('view-img');
            const icn = document.getElementById('view-icon');
            const nme = document.getElementById('view-name');
            const des = document.getElementById('view-desc');
            const hdr = document.getElementById('view-header');
            const sdr = document.getElementById('view-subheader');
            const vcn = document.getElementById('view-header-icon');
            const vcl = dat.icon.split(' ');

            hdr.innerText = `${dat.name} Services`;
            sdr.innerText = 'company services';

            img.src   = dat.image !== null ? dat.image.path : '';
            icn.value = dat.icon;
            nme.value = dat.name;
            des.value = dat.description; 

            vcn.classList.remove(...vcn.classList);
            vcn.classList.add('ti');
            vcl.forEach(cls => { vcn.classList.add(cls); });
            vcn.classList.add('me-3');

            $('#form-view').toggleClass('d-none');
            $('#main-content').toggleClass('d-none');
        });

        $(document).on('click', '.btn-edit', function() {
            const dat = tbl.row($(this).parent().parent()).data();

            const nme = document.getElementById('add-name');
            const des = document.getElementById('add-desc');
            const prv = document.getElementById('img-prev');
            const icn = document.getElementById('add-icon-select');
            const img = document.getElementById('add-image-select');
            const sts = document.getElementById('add-status-select');

            const hdr = document.getElementById('add-header');
            const sdr = document.getElementById('add-subheader');

            adm.setRowData(dat);
            adm.setState(dat.id);

            hdr.innerText = `Edit Services`;
            sdr.innerText = `change ${dat.name} service details`;

            if (dat.image) {
                prv.src = dat.image.path;
                
                if (prv.classList.contains('d-none')) {
                    ind.toggleVisibility('img-prev');
                    ind.toggleVisibility('img-thumb');
                }
            } else {
                if (!prv.classList.contains('d-none')) {
                    ind.toggleVisibility('img-prev');
                    ind.toggleVisibility('img-thumb');
                }
            }

            nme.value = dat.name;
            des.value = dat.description;

            sts.value = dat.status;
            sts.dispatchEvent(new Event('change'));

            $('#form-content').toggleClass('d-none');
            $('#main-content').toggleClass('d-none');
        });

        $(document).on('click', '.btn-delete', async function() {
            const dat = tbl.row($(this).parent().parent()).data();
            const prm = await Swal.fire(adm.getSwalPromptConf(
                'warning', 'Delete Data?', 
                `delete ${dat.name} service data?`
            ));

            if (prm.isConfirmed) {
                Swal.fire(adm.getSwalLoadingConf(
                    'processing', 'please wait!'
                ));

                const url = `${bse}/${dat.id}`;
                const res = await adm.request('DELETE', url).then(data => data).catch(error => error);

                if (res.status === 'success') {
                    Swal.fire(adm.getSwalConf(
                        'success', 'Deleted!', 
                        'service data has been successfully deleted.'
                    ));

                    $('.btn-refresh').trigger('click');
                    return;
                }

                Swal.fire(adm.getSwalConf(
                    'error', 'Unable to Perform Changes!', 
                    'please contact the administrator!'
                )); 
            };
        });

        $(document).on('click', '.btn-status', async function() {
            const dat = tbl.row($(this).parent().parent()).data();

            let sub = 'Publish Data?';
            let sbb = `publish ${dat.name} service data?`;

            if (dat.status === 'active') {
                sub = 'Private Data?';
                sbb = `make ${dat.name} service data private?`;
            }
            
            const prm = await Swal.fire(
                adm.getSwalPromptConf('warning', sub, sbb)
            );

            if (prm.isConfirmed) {
                Swal.fire(adm.getSwalLoadingConf(
                    'processing', 'please wait!'
                ));

                const url = `${bse}/${dat.id}`;
                const pyd = { 'status' : dat.status === 'inactive' ? 'active' : 'inactive' };
                const res = await adm.request('PUT', url, JSON.stringify(pyd))
                                        .then(data => data)
                                        .catch(error => error);

                if (res.status === 'success') {
                    Swal.fire(adm.getSwalConf(
                        'success', 'Updated!', 
                        'service data has been successfully updated.'
                    ));

                    $('.btn-refresh').trigger('click');
                    return;
                }

                Swal.fire(adm.getSwalConf(
                    'error', 'Unable to Perform Changes!', 
                    'please contact the administrator!'
                )); 
            };
        });

        $(document).on('click', '.btn-refresh', function() {
            tbl.ajax.reload(null, false);
        });

        $(document).on('keyup', '#filter-search', function() {
            $('.btn-refresh').trigger('click');
        });

        $('.page-link[data-dt-idx="0"]').trigger('click');
    }
</script>