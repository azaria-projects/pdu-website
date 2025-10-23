<script>
    /*
        - require admin script!
    */

    function Table(
        id = '',
    ) {
        this.crr = null;
        this.tne = 'statistics'
        this.tid = id; 
        this.col = [
            { data: 'id', name: 'id', visible: false },
            { 
                data: 'icon', 
                name: 'icon', 
                visible: true,
                orderable: false,
                render: function (data, type, row, meta) {
                    const html = `<i class='ti ${data}'></i>`;
                    return html;
                } 
            },
            { data: 'value', name: 'value', visible: true, orderable: false },
            { data: 'description', name: 'description', visible: true },
            { data: 'status', name: 'active', visible: false },
            { 
                data: 'status', 
                name: 'status', 
                visible: true,
                render: function (data, type, row, meta) {
                    if (data === 'active') {
                        return `<button class='btn btn-exist btn-status' data-status='${data}'><i class='ti ti-checks'></i></button>`;
                    }

                    return `<button class='btn btn-missing btn-status' data-status='${data}'><i class='ti ti-exclamation-circle'></i></button>`;
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
            { width: '10%', targets: [5] },
            { width: '20%', targets: [8] },
            { class: 'text-center', targets: [1, 2, 5, 8] },
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

            const val = document.getElementById(`${pre}-value`);
            const dsc = document.getElementById(`${pre}-desc`);
            const icn = document.getElementById(`${pre}-icon`);
            const sta = document.getElementById(`${pre}-status`);

            hdr.innerText = `${slf.tne} Data`;
            sdr.innerText = `Selected ${slf.tne} data`;

            icn.value = dat.icon;
            val.value = dat.value;
            dsc.value = dat.description; 

            if (dat.status) {
                sta.value = dat.status;
                sta.dispatchEvent(new Event('change'));
            }

            $('#form-view').toggleClass('d-none');
            $('#main-content').toggleClass('d-none');
        });

        $(document).on('click', '.btn-edit', function() {
            const pre = 'add';
            const dat = tbl.row($(this).parent().parent()).data();

            const hdr = document.getElementById(`${pre}-header`);
            const sdr = document.getElementById(`${pre}-subheader`);

            const val = document.getElementById(`${pre}-value`);
            const dsc = document.getElementById(`${pre}-desc`);
            const icn = document.getElementById(`${pre}-icon-select`);
            const sta = document.getElementById(`${pre}-status-select`);

            adm.setRowData(dat);
            adm.setState(dat.id);

            hdr.innerText = `Edit ${slf.tne}`;
            sdr.innerText = `change this ${slf.tne} details`;

            if (dat.status) {
                sta.value = dat.status;
                sta.dispatchEvent(new Event('change'));
            }
            
            val.value = dat.value ?? '';
            dsc.value = dat.description ?? ''; 

            $('#form-content').toggleClass('d-none');
            $('#main-content').toggleClass('d-none');
        });

        $(document).on('click', '.btn-delete', async function() {
            const dat = tbl.row($(this).parent().parent()).data();
            const prm = await Swal.fire(adm.getSwalPromptConf(
                'warning', 'Delete Data?', 
                `delete this ${slf.tne} data?`
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

                Swal.fire(adm.getSwalConf(
                    'error', 'Unable to Perform Changes!', 
                    'please contact the administrator!'
                )); 
            };
        });

        $(document).on('click', '.btn-status', async function() {
            const dat = tbl.row($(this).parent().parent()).data();

            let sub = 'Publish Data?';
            let sbb = `publish this ${slf.tne} data?`;

            if (dat.status === 'active') {
                sub = 'Private Data?';
                sbb = `make this ${slf.tne} data private?`;
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