@include('pages.admin-panel.partners.scripts.table')

<script>
    /*
        - require admin script!
        - require table script!
    */

    function Index() { 
        this.table  = null;
        this.prefix = 'company';
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

        $('#add-image-select').on('select2:select', function (e) {
            const dat = e.params.data;
            const img = document.getElementById('img-prev');
            const tmp = document.getElementById('img-thumb');
            const inp = document.getElementById('add-image');
            
            img.src   = dat.url;
            inp.value = '';

            if (img.classList.contains('d-none')) {
                slf.toggleVisibility('img-prev');
                slf.toggleVisibility('img-thumb');
            }
        });

        $('#add-image-select').on('select2:clear', function (e) {
            const img = document.getElementById('img-prev');
            const tmp = document.getElementById('img-thumb');

            img.src = '';
            
            if (!img.classList.contains('d-none')) {
                slf.toggleVisibility('img-prev');
                slf.toggleVisibility('img-thumb');
            }
        });

        $('select[id=add-image-select]').select2({
            placeholder: 'ex: mudlogging-banner.jpg',
            allowClear: true,
            ajax: {
                url: 'http://127.0.0.1:8000/api/files',
                dataType: 'json',
                data: function (params) {
                    var query = {
                        'keyword': params.term,
                    };

                    return query;
                },
                processResults: function (data) {
                    const arr = [];
                    const dat = data.response.data;

                    dat.forEach(elm => {
                        arr.push({
                            'id'   : elm.id,
                            'url'  : elm.path,
                            'text' : elm.name
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

            const inpNme = document.getElementById(`${pre}-name`).value;
            const inpDsc = document.getElementById(`${pre}-desc`).value;
            const inpImg = document.getElementById(`${pre}-image`).files[0];
            const slcLnk = document.getElementById(`${pre}-link-select`).value;
            const slcImg = document.getElementById(`${pre}-image-select`).value;
            const slcSts = document.getElementById(`${pre}-status-select`).value;

            pyd.name        = inpNme; 
            pyd.link        = slcLnk;
            pyd.description = inpDsc;
            pyd.status      = slcSts !== '' ? slcSts : 'inactive';

            if (adm.getState()) {
                const dat = adm.getRowData();

                pyd.name        = inpNme ?? dat.name;
                pyd.link        = slcLnk ?? dat.status;
                pyd.description = inpDsc ?? dat.description;
                pyd.status      = slcSts !== '' ? slcSts : dat.icon;

                if (slcImg) {
                    pyd.image_id = slcImg;
                }

                if (!slcImg && dat.image) {
                    pyd.image_id = dat.image.id;
                }
            }

            if (inpImg && slcImg) {
                Swal.fire(adm.getSwalConf(
                    'error', 'Invalid Selection!', 
                    'please select just 1 image banner!'
                ));

                return;
            }

            //-- case 1: user upload image
            if (inpImg && !slcImg) {
                prm = await Swal.fire(adm.getSwalPromptConf(
                    'warning', 'New Image!', 
                    `new image detected, upload the image first?`
                ));
                
                if (prm.isConfirmed) {
                    Swal.fire(adm.getSwalLoadingConf(
                        'uploading', 'please wait!'
                    ));

                    const frm = new FormData();
                    frm.append('type', 'banner');
                    frm.append('file', inpImg); 
                    
                    res = await adm.request('POST', adm.getApiUrl('files'), frm)
                                    .then(data => data)
                                    .catch(error => error);

                    if (res.status === 'success') {
                        Swal.fire(adm.getSwalLoadingConf(
                            'processing', `saving ${slf.prefix} data!`
                        ));

                        pyd.image_id = res.response.id;
                        url = adm.getState() 
                                ? `${adm.getApiUrl(slf.prefix)}/${adm.getState()}`
                                : adm.getApiUrl(slf.prefix);

                        res = await adm.request(mtd, url, JSON.stringify(pyd))
                                        .then(data => data)
                                        .catch(error => error);
                        
                        Swal.fire(adm.getSwalConf(
                            'success', 'Stored!', 
                            `${slf.prefix} data has been successfully stored.`
                        ));

                        btnRef.click();
                        document.getElementById('btn-back-1').click();
                        
                        return;
                    }
                }
            }

            //-- case 2: user select exsisting image
            if (slcImg && !inpImg) {
                Swal.fire(adm.getSwalLoadingConf(
                    'processing', `saving ${slf.prefix} data!`
                ));

                pyd.image_id = slcImg;

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
                }
            }

            //-- case 3: user does not provide image data
            if ((slcImg === '' && inpImg === undefined)) {
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
                }
            }

            //-- case 4: error case
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

                const img = document.getElementById('img-prev')
                
                img.src = '';
            });
        });
    };

    document.addEventListener("DOMContentLoaded", function () {
        adm = new Admin();
        ind = new Index();
        ind.init(); 
    });
</script>