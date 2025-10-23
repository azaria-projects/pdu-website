@include('pages.admin-panel.partners.scripts.table')

<script>
    /*
        - require admin script!
        - require table script!
    */

    function Index() { 
        this.table  = null;
        this.prefix = 'companies';
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

        const html = $(`<div class="d-flex gap-2 align-items-center"><img src="${sta.url}" alt="${sta.text}" class="option select2-image"></img></i><span>${sta.text}</span></div>`);
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

        // $('#add-image-select').on('select2:select', function (e) {
        //     const dat = e.params.data;
        //     const img = document.getElementById('img-prev');
        //     const tmp = document.getElementById('img-thumb');
        //     const inp = document.getElementById('add-image');
            
        //     img.src   = dat.url;
        //     inp.value = '';

        //     if (img.classList.contains('d-none')) {
        //         slf.toggleVisibility('img-prev');
        //         slf.toggleVisibility('img-thumb');
        //     }
        // });

        // $('#add-image-select').on('select2:clear', function (e) {
        //     const img = document.getElementById('img-prev');
        //     const tmp = document.getElementById('img-thumb');

        //     img.src = '';
            
        //     if (!img.classList.contains('d-none')) {
        //         slf.toggleVisibility('img-prev');
        //         slf.toggleVisibility('img-thumb');
        //     }
        // }); 

        $('select[id=add-icon-select]').select2({
            placeholder: 'ex: pt-petrochina-icon.svg',
            allowClear: true,
            templateResult: this.setFormatSelectIcon,
            ajax: {
                url: adm.getApiUrl('files'),
                dataType: 'json',
                data: function (params) {
                    var query = {
                        'type': 'logo',
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

        $('select[id=add-active-select]').select2({
            placeholder: 'ex: active',
            allowClear: true,
            data: [
                {
                    'id'   : 0,
                    'text' : 'inactive'
                },
                {
                    'id'   : 1,
                    'text' : 'active'
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
                `store partner ${slf.prefix} data?`
            ));

            if (!prm.isConfirmed) { return; }

            const inpIns = document.getElementById(`${pre}-in`).value;
            const inpLin = document.getElementById(`${pre}-ln`).value;
            const inpFac = document.getElementById(`${pre}-fb`).value;
            const inpNme = document.getElementById(`${pre}-name`).value;
            const inpMtt = document.getElementById(`${pre}-motto`).value;
            const inpEml = document.getElementById(`${pre}-email`).value;
            const inpVis = document.getElementById(`${pre}-vision`).value;
            const inpMis = document.getElementById(`${pre}-mission`).value;

            const inpIcn = document.getElementById(`${pre}-icon`).files[0];
            const slcLct = document.getElementById(`${pre}-active-select`).value;
            const slcIcn = document.getElementById(`${pre}-icon-select`).value;

            pyd.name      = inpNme;
            pyd.motto     = inpMtt;
            pyd.email     = inpEml;
            pyd.vision    = inpVis;
            pyd.mission   = inpMis;
            pyd.linkedin  = inpLin;
            pyd.facebook  = inpFac;
            pyd.instagram = inpIns;

            pyd.is_partner = slcLct !== '' ? slcLct : false;
            pyd.icon_id    = slcIcn !== '' ? slcIcn : null;

            if (adm.getState()) {
                const dat = adm.getRowData();

                pyd.name      = inpNme ?? dat.name;
                pyd.motto     = inpMtt ?? dat.motto;
                pyd.email     = inpEml ?? dat.email;
                pyd.vision    = inpVis ?? dat.vision;
                pyd.mission   = inpMis ?? dat.mission;
                pyd.linkedin  = inpLin ?? dat.linkedin;
                pyd.facebook  = inpFac ?? dat.facebook;
                pyd.instagram = inpIns ?? dat.instagram;

                pyd.is_partner = slcLct !== '' ? slcLct : dat.is_partner;
                pyd.icon_id    = slcIcn !== '' ? slcIcn : dat.icon_id;
            }

            if (inpIcn && slcIcn) {
                Swal.fire(adm.getSwalConf(
                    'error', 'Invalid Selection!', 
                    'please select just 1 icon!'
                ));

                return;
            }

            //-- case 1: user upload logo
            if (inpIcn && !slcIcn) {
                prm = await Swal.fire(adm.getSwalPromptConf(
                    'warning', 'New Logo!', 
                    `new logo detected, upload the logo first?`
                ));
                
                if (prm.isConfirmed) {
                    Swal.fire(adm.getSwalLoadingConf(
                        'uploading', 'please wait!'
                    ));

                    const frm = new FormData();
                    frm.append('type', 'logo');
                    frm.append('file', inpIcn); 
                    
                    res = await adm.request('POST', adm.getApiUrl('files'), frm)
                                    .then(data => data)
                                    .catch(error => error);

                    if (res.status === 'success') {
                        Swal.fire(adm.getSwalLoadingConf(
                            'processing', `saving ${slf.prefix} data!`
                        ));

                        pyd.icon_id = res.response.id;
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

            //-- case 2: user select exsisting logo
            if (slcIcn && !inpIcn) {
                Swal.fire(adm.getSwalLoadingConf(
                    'processing', `saving ${slf.prefix} data!`
                ));

                pyd.icon_id = slcIcn;

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

            //-- case 3: user does not provide icon data
            if ((slcIcn === '' && inpIcn === undefined)) {
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
            });
        });
    };

    document.addEventListener("DOMContentLoaded", function () {
        adm = new Admin();
        ind = new Index();
        ind.init(); 
    });
</script>