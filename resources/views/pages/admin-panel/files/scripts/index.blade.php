@include('pages.admin-panel.files.scripts.table')

<script>
    /*
        - require admin script!
        - require table script!
    */

    function Index() { 
        this.table  = null;
        this.prefix = 'files';
    }

    //-- other functions
    Index.prototype.toggleVisibility = function (id) {
        const elm = document.getElementById(id);

        if (elm.classList.contains('d-none')) {
            elm.classList.remove('d-none');
        } else {
            elm.classList.add('d-none');
        }
    };

    //-- all init functions
    Index.prototype.init = async function () {
        this.table = new Table('table-datatable');
        this.table.initTable();

        this.initSelect2();
        this.initListeners();
    }

    Index.prototype.initSelect2 = async function () {
        const slf = this;

        $('select[id=add-type-select]').select2({
            placeholder: 'ex: active',
            allowClear: true,
            data: [
                {
                    'id'   : 'banner',
                    'text' : 'banner'
                },
                {
                    'id'   : 'thumbnail',
                    'text' : 'thumbnail'
                },
                {
                    'id'   : 'icon',
                    'text' : 'icon'
                },
                {
                    'id'   : 'logo',
                    'text' : 'logo'
                },
                {
                    'id'   : 'document',
                    'text' : 'document'
                },
                {
                    'id'   : 'slider',
                    'text' : 'slider'
                },
                {
                    'id'   : 'others',
                    'text' : 'others'
                }
            ]
        });
    };

    Index.prototype.initListeners = async function () {
        const slf = this;

        const btnAdd = document.getElementById('btn-add');
        const frmAdd = document.getElementById('form-add');
        const btnRef = document.getElementById('btn-refresh');

        btnAdd.addEventListener('click', function() {
            adm.setState(null);
            
            slf.toggleVisibility('main-content');
            slf.toggleVisibility('form-content');
        });

        frmAdd.addEventListener('submit', async function(e) {
            e.preventDefault(); 

            let prm, res, url;

            const pre = 'add';
            const frm = new FormData();
            const val = adm.validateForm(this.id);
            const mtd = adm.getState() ? 'PUT' : 'POST';

            if (!val) {
                Swal.fire(adm.getSwalPromptConf(
                    'warning', 'Invalid Input', 
                    `please fill all the required forms!`, false, 'OK'
                ));

                return;
            }

            prm = await Swal.fire(adm.getSwalPromptConf(
                'question', 'Save Data?', 
                `store current ${slf.prefix} data?`
            ));

            if (!prm.isConfirmed) { return; }

            const inpFle = document.getElementById(`${pre}-file`).files[0];
            const slcTyp = document.getElementById(`${pre}-type-select`).value;

            if (adm.getState()) {
                frm.append('_method', 'PUT');
                if (inpFle) { frm.append('file', inpFle); }
                frm.append('type', slcTyp); 
                
            } else {
                frm.append('file', inpFle);
                frm.append('type', slcTyp); 
            }
            
            Swal.fire(adm.getSwalLoadingConf(
                'uploading', 'please wait!'
            ));
            
            res = await adm.request('POST', adm.getApiUrl('files'), frm)
                            .then(data => data)
                            .catch(error => error);

            if (res && Object.keys(res).includes('status')) {
                if (res.status === 'success') {
                    Swal.fire(adm.getSwalConf(
                        'success', 'Stored!', 
                        `${slf.prefix} data has been successfully stored.`
                    ));

                    return;
                }

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
        });

        document.querySelectorAll('.btn-back').forEach(btn => {
            btn.addEventListener('click', function() {
                const viw = document.getElementById('form-view');

                if (!viw.classList.contains('d-none')) {
                    slf.toggleVisibility('main-content');
                    slf.toggleVisibility('form-view');

                } else {
                    slf.toggleVisibility('main-content');
                    slf.toggleVisibility('form-content');
                }

                document.querySelectorAll('form').forEach(frm => {
                    frm.reset();
                });

                document.querySelectorAll('.select2').forEach(sct => {
                    sct.value = '';
                    sct.dispatchEvent(new Event('change'));
                });
            });
        });
    };

    document.addEventListener("DOMContentLoaded", function () {
        adm = new Admin();
        ind = new Index();
        ind.init(); 
    });
</script>