<script>
    /*
        - require admin script!
    */

    function Table(
        id = '',
    ) {
        this.crr = null;
        this.tne = 'files'
        this.tid = id; 
        this.col = [
            { data: 'id', name: 'id', visible: false },
            {
                data: 'name', 
                name: 'name', 
                visible: true,
                orderable: false, 
                render: function (data, type, row, meta) {
                    const dat = data.split('.');
                    return dat[0];
                } 
            },
            {
                data: 'size', 
                name: 'size', 
                visible: true,
                orderable: false, 
                render: function (data, type, row, meta) {
                    const dat = data.split(' ');
                    return `~ ${ parseInt(dat[0] / 1024).toFixed(2)} Mb` ;
                } 
            },
            { data: 'type', name: 'type', visible: true },
            {
                data: 'path', 
                name: 'path', 
                visible: true,
                orderable: false, 
                render: function (data, type, row, meta) {
                    return `<a href='${data}' class='btn btn-exist' target='_blank'><i class='ti ti-link'></i></a>`;
                } 
            },
            {
                data: 'extension', 
                name: 'extension', 
                visible: true,
                orderable: false, 
                render: function (data, type, row, meta) {
                    return `.${data}`;
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
            { width: '10%', targets: [2, 3, 4, 5] },
            { width: '15%', targets: [8] },
            // { width: '20%', targets: [7] },
            { class: 'text-center', targets: [2, 4, 5, 8] },
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
            
            const fle = document.getElementById(`${pre}-file`);
            const typ = document.getElementById(`${pre}-type`);

            hdr.innerText = `${dat.name} ${this.tne}`;
            sdr.innerText = `Selected ${this.tne} data`;

            fle.value = dat.path;
            typ.value = dat.type;

            $('#form-view').toggleClass('d-none');
            $('#main-content').toggleClass('d-none');
        });

        $(document).on('click', '.btn-edit', function() {
            const pre = 'add';
            const dat = tbl.row($(this).parent().parent()).data();

            const hdr = document.getElementById(`${pre}-header`);
            const sdr = document.getElementById(`${pre}-subheader`);
            
            const fle = document.getElementById(`${pre}-file`);
            const typ = document.getElementById(`${pre}-type-select`);

            adm.setRowData(dat);
            adm.setState(dat.id);

            hdr.innerText = `Edit ${slf.tne}`;
            sdr.innerText = `change ${dat.name} ${slf.tne} details`;

            typ.value = dat.type;
            typ.dispatchEvent(new Event('change'));

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

                if (res && Object.keys(res).includes('status')) {
                    if (res.status === 'success') {
                        Swal.fire(adm.getSwalConf(
                            'success', 'Deleted!', 
                            `${slf.tne} data has been successfully deleted.`
                        ));

                        $('.btn-refresh').trigger('click');
                        return;
                    }

                    Swal.fire(adm.getSwalPromptConf(
                        'warning', 'Unable to Delete!', 
                        `the ${slf.tne} might still be used somewhere else . . .`, false, 'OK'
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