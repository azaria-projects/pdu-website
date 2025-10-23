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
                        return `<img src="${data.path}" alt="" class="img-fluid column-logo">`;
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
            { data: 'partners', name: 'partners_status', visible: false },
            {
                data: 'partners', 
                name: 'partners', 
                visible: true,
                orderable: false, 
                render: function (data, type, row, meta) {
                    if (data) {
                        return `<button class='btn btn-exist'><i class='ti ti-checks'></i></button>`;
                    }

                    return `<button class='btn btn-missing'><i class='ti ti-exclamation-circle'></i></button>`;
                } 
            },
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
            { width: '10%', targets: [2, 6, 10, 12, 14, 18] },
            { class: 'text-center', targets: [2, 6, 10, 12, 14, 18, 21] },
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

            const hdr = document.getElementById(`${pre}-header`);
            const sdr = document.getElementById(`${pre}-subheader`);

            const ins = document.getElementById(`${pre}-in`);
            const lin = document.getElementById(`${pre}-ln`);
            const fac = document.getElementById(`${pre}-fb`);
            const nme = document.getElementById(`${pre}-name`);
            const mtt = document.getElementById(`${pre}-motto`);
            const eml = document.getElementById(`${pre}-email`);
            const vis = document.getElementById(`${pre}-vision`);
            const mis = document.getElementById(`${pre}-mission`);
            const act = document.getElementById(`${pre}-active`);
            const Icn = document.getElementById(`${pre}-icon`);

            hdr.innerText = `${dat.name} ${this.tne}`;
            sdr.innerText = `Selected ${this.tne} data`;

            nme.value = dat.name ?? '';
            mtt.value = dat.motto ?? '';
            eml.value = dat.email ?? '';
            vis.value = dat.vision ?? '';
            mis.value = dat.mission ?? '';
            lin.value = dat.linkedin ?? '';
            fac.value = dat.facebook ?? '';
            ins.value = dat.instagram ?? '';
            Icn.value = dat.icon_data ?? '';
            act.value = dat.partners_status !== null ? dat.partners_status : '';

            $('#form-view').toggleClass('d-none');
            $('#main-content').toggleClass('d-none');
        });

        $(document).on('click', '.btn-edit', function() {
            const pre = 'add';
            const dat = tbl.row($(this).parent().parent()).data();

            const hdr = document.getElementById(`${pre}-header`);
            const sdr = document.getElementById(`${pre}-subheader`);

            const inpIns = document.getElementById(`${pre}-in`);
            const inpLin = document.getElementById(`${pre}-ln`);
            const inpFac = document.getElementById(`${pre}-fb`);
            const inpNme = document.getElementById(`${pre}-name`);
            const inpMtt = document.getElementById(`${pre}-motto`);
            const inpEml = document.getElementById(`${pre}-email`);
            const inpVis = document.getElementById(`${pre}-vision`);
            const inpMis = document.getElementById(`${pre}-mission`);

            const slcAct = document.getElementById(`${pre}-active-select`);
            const slcIcn = document.getElementById(`${pre}-icon-select`);

            adm.setRowData(dat);
            adm.setState(dat.id);

            hdr.innerText = `Edit ${slf.tne}`;
            sdr.innerText = `change ${dat.name} ${slf.tne} details`;

            inpNme.value = dat.name ?? '';
            inpMtt.value = dat.motto ?? '';
            inpEml.value = dat.email ?? '';
            inpVis.value = dat.vision ?? '';
            inpMis.value = dat.mission ?? '';
            inpLin.value = dat.linkedin ?? '';
            inpFac.value = dat.facebook ?? '';
            inpIns.value = dat.instagram ?? '';

            slcAct.value = dat.partners;
            slcAct.dispatchEvent(new Event('change'));

            $('#form-content').toggleClass('d-none');
            $('#main-content').toggleClass('d-none');
        });

        $(document).on('click', '.btn-delete', async function() {
            const dat = tbl.row($(this).parent().parent()).data();
            const prm = await Swal.fire(adm.getSwalPromptConf(
                'warning', 'Delete Data?', 
                `delete ${dat.name} ${slf.tne} data?`
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
                        `${slf.tne} data has been successfully deleted.`
                    ));

                    $('.btn-refresh').trigger('click');
                    return;
                } 

                if (res && Object.keys(res).includes('status')) {
                    Swal.fire(adm.getSwalPromptConf(
                        'warning', 'Invalid Input', 
                        res.message, false, 'OK'
                    ));

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
            let sbb = `publish ${dat.name} ${slf.tne} data?`;

            if (dat.status === 'active') {
                sub = 'Private Data?';
                sbb = `make ${dat.name} ${slf.tne} data private?`;
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
                        `${slf.tne} data has been successfully updated.`
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