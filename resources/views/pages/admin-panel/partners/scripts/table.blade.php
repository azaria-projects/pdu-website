<script>
    /*
        - require admin script!
    */

    function Table(
        id = '',
    ) {
        this.crr = null;
        this.tne = 'companies'
        this.tid = id; 
        this.col = [
            { data: 'id', name: 'id', visible: false },
            { data: 'icon', name: 'icon_data', visible: false },
            {
                data: 'icon', 
                name: 'icon', 
                visible: true,
                orderable: false, 
                render: function (data, type, row, meta) {
                    if (data !== null) {
                        return `<img src="${data.path}" alt="" class="img-fluid">`;
                    }

                    return `<button class='btn btn-missing'><i class='ti ti-exclamation-circle'></i></button>`;
                } 
            },
            { data: 'name', name: 'name', visible: true },
            { data: 'motto', name: 'motto', visible: false },
            { data: 'email', name: 'email_data', visible: false },
            {
                data: 'email', 
                name: 'email', 
                visible: true,
                orderable: false, 
                render: function (data, type, row, meta) {
                    if (data !== null) {
                        return `<a href='${data}' class='btn btn-exist' target='_blank'><i class='ti ti-link'></i></a>`;
                    }

                    return `<button class='btn btn-missing'><i class='ti ti-exclamation-circle'></i></button>`;
                } 
            },
            { data: 'vision', name: 'vision', visible: false },
            { data: 'mission', name: 'mission', visible: false },
            { data: 'facebook', name: 'facebook_data', visible: false },
            {
                data: 'facebook', 
                name: 'facebook', 
                visible: true,
                orderable: false, 
                render: function (data, type, row, meta) {
                    if (data !== null) {
                        return `<a href='${data}' class='btn btn-exist' target='_blank'><i class='ti ti-link'></i></a>`;
                    }

                    return `<button class='btn btn-missing'><i class='ti ti-exclamation-circle'></i></button>`;
                } 
            },
            { data: 'linkedin', name: 'linkedin_data', visible: false },
            {
                data: 'linkedin', 
                name: 'linkedin', 
                visible: true,
                orderable: false, 
                render: function (data, type, row, meta) {
                    if (data !== null) {
                        return `<a href='${data}' class='btn btn-exist' target='_blank'><i class='ti ti-link'></i></a>`;
                    }

                    return `<button class='btn btn-missing'><i class='ti ti-exclamation-circle'></i></button>`;
                } 
            },
            { data: 'instagram', name: 'instagram_data', visible: false },
            {
                data: 'instagram', 
                name: 'instagram', 
                visible: true,
                orderable: false, 
                render: function (data, type, row, meta) {
                    if (data !== null) {
                        return `<a href='${data}' class='btn btn-exist' target='_blank'><i class='ti ti-link'></i></a>`;
                    }

                    return `<button class='btn btn-missing'><i class='ti ti-exclamation-circle'></i></button>`;
                } 
            },
            { data: 'address', name: 'address_data', visible: false },
            { data: 'address', name: 'address', visible: false },
            { data: 'created_at' , name: 'created_at' , visible: false },
            { data: 'updated_at' , name: 'updated_at' , visible: false },
            { 
                data: null, 
                name: 'action', 
                visible: true, 
                orderable: false,
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

        this.def = [
            { width: '10%', targets: [2, 6, 10, 12, 14] },
            // // { width: '10%', targets: [3] },
            // // { width: '20%', targets: [7] },
            { class: 'text-center', targets: [2, 6, 10, 12, 14, 19] },
        ];
    }

    Table.prototype.initTable = async function () {
        const slf = this;

        const bse = adm.getApiUrl(this.tne);
        const tbl = $(`#${this.tid}`).DataTable({
            pagingType: 'full',
            paging: true,
            ordering: true,
            searching: false,
            processing: true,
            serverSide: true,
            responsive: false,
            autoWidth: false,
            ajax: function(data, callback, settings) {
                const key = document.getElementById('filter-search').value;
                const pge = Math.floor(data.start / data.length) + 1;
                const par = new URLSearchParams({
                    'limit'    : data.length,
                    'order'    : data.order[0].dir,
                    'keyword'  : key,
                    'order_by' : data.order[0].name
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
            columns: this.col,
            columnDefs: this.def,
            layout: { topStart: null, topEnd: 'pageLength' },
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
            const pre = 'view';
            const dat = tbl.row($(this).parent().parent()).data();

            const img = document.getElementById(`${pre}-img`);
            const nme = document.getElementById(`${pre}-name`);
            const lnk = document.getElementById(`${pre}-link`);
            const des = document.getElementById(`${pre}-desc`);
            const hdr = document.getElementById(`${pre}-header`);
            const sdr = document.getElementById(`${pre}-subheader`);

            hdr.innerText = `${dat.name} ${this.tne}`;
            sdr.innerText = `Selected ${this.tne} data`;

            img.src   = dat.image !== null ? dat.image.path : '';
            lnk.value = dat.link;
            nme.value = dat.name;
            des.value = dat.description; 

            $('#form-view').toggleClass('d-none');
            $('#main-content').toggleClass('d-none');
        });

        $(document).on('click', '.btn-edit', function() {
            const pre = 'add';
            const dat = tbl.row($(this).parent().parent()).data();

            const nme = document.getElementById(`${pre}-name`);
            const des = document.getElementById(`${pre}-desc`);
            const hdr = document.getElementById(`${pre}-header`);
            const sdr = document.getElementById(`${pre}-subheader`);
            const lnk = document.getElementById(`${pre}-link-select`);
            const sta = document.getElementById(`${pre}-status-select`);

            adm.setRowData(dat);
            adm.setState(dat.id);

            hdr.innerText = `Edit ${slf.tne}`;
            sdr.innerText = `change ${dat.name} ${slf.tne} details`;

            if (dat.link) {
                lnk.value = dat.link;
                lnk.dispatchEvent(new Event('change'));
            }

            if (dat.status) {
                sta.value = dat.status;
                sta.dispatchEvent(new Event('change'));
            }
            
            nme.value = dat.name ?? '';
            des.value = dat.description ?? ''; 

            $('#form-content').toggleClass('d-none');
            $('#main-content').toggleClass('d-none');
        });

        $(document).on('click', '.btn-delete', async function() {
            const dat = tbl.row($(this).parent().parent()).data();
            const prm = await Swal.fire(adm.getSwalPromptConf(
                'warning', 'Delete Data?', 
                `delete ${dat.name} ${slf.prefix} data?`
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
                        `${slf.prefix} data has been successfully deleted.`
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
            let sbb = `publish ${dat.name} ${slf.prefix} data?`;

            if (dat.status === 'active') {
                sub = 'Private Data?';
                sbb = `make ${dat.name} ${slf.prefix} data private?`;
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
                        `${slf.prefix} data has been successfully updated.`
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