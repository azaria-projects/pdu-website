@include('pages.admin-panel.statistics.scripts.table')

<script>
    /*
        - require admin script!
        - require table script!
    */

    function Index() { 
        this.table  = null;
        this.prefix = 'statistics';
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

    Index.prototype.setFormatSelectIcon = function (sta) {
        if (!sta.id) { 
            return sta.text; 
        }

        const html = $(`<span><i class='${sta.text} me-2'></i>${sta.text}</span>`);
        return html;
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

        $('select[id=add-icon-select]').select2({
            placeholder: 'ex: ti ti-home',
            allowClear: true,
            templateResult: this.setFormatSelectIcon,
            ajax: {
                url: 'http://127.0.0.1:8000/api/codes',
                dataType: 'json',
                data: function (params) {
                    var query = {
                        'type'    : 'icons',
                        'keyword' : params.term,
                    };

                    return query;
                },
                processResults: function (data) {
                    const arr = [];
                    const dat = data.response.data;

                    dat.forEach(elm => {
                        arr.push({
                            'id'   : elm.value,
                            'text' : elm.value
                        });
                    });

                    return { results: arr };
                }
            }
        });

        $('select[id=add-status-select]').select2({
            placeholder: 'ex: active',
            allowClear: true,
            data: [
                {
                    'id'   : 'active',
                    'text' : 'active'
                },
                {
                    'id'   : 'inactive',
                    'text' : 'inactive'
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

            const pyd = {};
            const pre = 'add';
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

            const inpVal = document.getElementById(`${pre}-value`).value;
            const inpDsc = document.getElementById(`${pre}-desc`).value;
            const slcIcn = document.getElementById(`${pre}-icon-select`).value;
            const slcSts = document.getElementById(`${pre}-status-select`).value;

            pyd.value       = inpVal; 
            pyd.icon        = slcIcn;
            pyd.description = inpDsc;
            pyd.status      = slcSts !== '' ? slcSts : 'inactive';

            if (adm.getState()) {
                const dat = adm.getRowData();

                pyd.name        = inpVal ?? dat.name;
                pyd.icon        = slcIcn !== '' ? slcIcn : dat.icon;
                pyd.description = inpDsc ?? dat.description;
                pyd.status      = slcSts !== '' ? slcSts : 'inactive';
            }

            Swal.fire(adm.getSwalLoadingConf(
                'processing', `saving ${slf.prefix} data!`
            ));
            
            url = adm.getState() 
                    ? `${adm.getApiUrl(slf.prefix)}/${adm.getState()}`
                    : adm.getApiUrl(slf.prefix);

            res = await adm.request(mtd, url, JSON.stringify(pyd))
                            .then(data => data)
                            .catch(error => error);

            if (res.status === 'success') {
                Swal.fire(adm.getSwalConf(
                    'success', 'Stored!', 
                    `${slf.prefix} data has been successfully stored.`
                ));

                btnRef.click();
                document.getElementById('btn-back-1').click();
                
                return;
            } else {
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