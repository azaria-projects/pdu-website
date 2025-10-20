@include('pages.admin-panel.testimonies.scripts.table')

<script>
    /*
        - require admin script!
        - require table script!
    */

    function Index() { 
        this.table  = null;
        this.prefix = 'testimonies';
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

        $('select[id=add-company-select]').select2({
            placeholder: 'ex: PT. PetroChina Jabung',
            allowClear: true, 
            tags: true,
            ajax: {
                url: adm.getApiUrl('companies'),
                dataType: 'json',
                data: function (params) {
                    var query = {
                        'keyword' : params.term,
                    };

                    return query;
                },
                processResults: function (data) {
                    const arr = [];
                    const dat = data.response.data;

                    dat.forEach(elm => {
                        arr.push({
                            'id'   : elm.id,
                            'text' : elm.name
                        });
                    });

                    return { results: arr };
                }
            },
            createTag: function (params) {
                const term = $.trim(params.term);
                const crr  = this.$element.find('option[value="new-tag"]');
                
                if (term === '') { return null; }
                if (crr.length) { crr.remove(); }
                
                return {
                    id: 'new-tag',
                    text: term,
                    newTag: true
                }
            },
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

            const inpNme = document.getElementById(`${pre}-name`).value;
            const inpRle = document.getElementById(`${pre}-role`).value;
            const inpTes = document.getElementById(`${pre}-testimony`).value;
            const slcCom = document.getElementById(`${pre}-company-select`).value;
            const slcSts = document.getElementById(`${pre}-status-select`).value;

            pyd.name       = inpNme; 
            pyd.role       = inpRle;
            pyd.company_id = slcCom;
            pyd.testimony  = inpTes;
            pyd.status     = slcSts !== '' ? slcSts : 'inactive';

            if (adm.getState()) {
                const dat = adm.getRowData();

                pyd.name       = inpNme ?? dat.name; 
                pyd.role       = inpRle ?? dat.role;
                pyd.testimony  = inpTes ?? dat.testimony;
                pyd.status     = slcSts !== '' ? slcSts : 'inactive';
                pyd.company_id = slcCom !== '' ? slcCom : dat.company.id;
            }
            
            if (slcCom === 'new-tag') {
                const cnm = $(`#${pre}-company-select option:selected`).text();

                prm = await Swal.fire(adm.getSwalPromptConf(
                    'question', 'New Company?', 
                    `save ${cnm} data as a new company?`
                ));

                if (!prm.isConfirmed) { return; }

                Swal.fire(adm.getSwalLoadingConf(
                    'processing', `saving ${cnm} data!`
                ));

                res = await adm.request('POST', adm.getApiUrl('companies'), JSON.stringify({ 'name' : cnm }))
                                .then(data => data)
                                .catch(error => error);

                pyd.company_id = res.response.id;

                if (res.status !== 'success') {
                    Swal.fire(adm.getSwalPromptConf(
                        'warning', 'Unable to Save Data', 
                        res.message, false, 'OK'
                    ));

                    return;
                }
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