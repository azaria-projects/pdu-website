@include('pages.admin-panel.services.scripts.table')

<script>
    /*
        - require admin script!
        - require table script!
    */

    function Index() { 
        this.table  = null;
        this.prefix = 'services';
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
        const self = this;
         
        $('#add-image-select').on('select2:select', function (e) {
            const dat = e.params.data;
            const img = document.getElementById('img-prev');
            const tmp = document.getElementById('img-thumb');
            const inp = document.getElementById('add-image');
            
            img.src   = dat.url;
            inp.value = '';

            if (img.classList.contains('d-none')) {
                self.toggleVisibility('img-prev');
                self.toggleVisibility('img-thumb');
            }
        });

        $('#add-image-select').on('select2:clear', function (e) {
            const img = document.getElementById('img-prev');
            const tmp = document.getElementById('img-thumb');

            img.src = '';
            
            if (!img.classList.contains('d-none')) {
                self.toggleVisibility('img-prev');
                self.toggleVisibility('img-thumb');
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
    };

    Index.prototype.initListeners = async function () {
        const self = this;

        const btnAdd = document.getElementById('btn-add');
        const frmAdd = document.getElementById('form-add');
        const inpImg = document.getElementById('add-image');
        const btnRef = document.getElementById('btn-refresh');
        const btnBck = document.querySelectorAll('.btn-back');

        btnAdd.addEventListener('click', function() {
            adm.setState(null);
            
            self.toggleVisibility('main-content');
            self.toggleVisibility('form-content');
        });

        inpImg.addEventListener('change', function() {
            const fle = this.files[0];
            const rdr = new FileReader();
            const img = document.getElementById('img-prev');
            const sct = document.getElementById('add-image-select');

            rdr.addEventListener("load", function () { img.src = rdr.result; }, false);
            if (fle) { rdr.readAsDataURL(fle); }

            if (img.classList.contains('d-none')) {
                self.toggleVisibility('img-prev');
                self.toggleVisibility('img-thumb');
            }

            sct.value = '';
            sct.dispatchEvent(new Event('change'));
        });

        frmAdd.addEventListener('submit', async function(e) {
            e.preventDefault(); 

            let res, prm, url;

            // const pyd = {};
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
                `store current service data?`
            ));

            if (!prm.isConfirmed) {
                return;
            }

            const inpNme = document.getElementById('add-name').value;
            const inpDes = document.getElementById('add-desc').value;
            const inpImg = document.getElementById('add-image').files[0];
            const slcIcn = document.getElementById('add-icon-select').value;
            const slcImg = document.getElementById('add-image-select').value;

            const pyd = {
                'name'        : inpNme,
                'icon'        : slcIcn,
                'description' : inpDes
            };

            if (adm.getState()) {
                const dat = adm.getRowData();

                pyd.name        = inpNme ?? dat.name;
                pyd.description = inpDes ?? dat.description;
                pyd.icon        = slcIcn !== '' ? slcIcn : dat.icon;

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
                            'processing', 'saving services data!'
                        ));

                        pyd.image_id = res.response.id;
                        url = adm.getState() 
                                ? `${adm.getApiUrl(self.prefix)}/${adm.getState()}`
                                : adm.getApiUrl(self.prefix);

                        res = await adm.request(mtd, url, JSON.stringify(pyd))
                                        .then(data => data)
                                        .catch(error => error);
                        
                        Swal.fire(adm.getSwalConf(
                            'success', 'Stored!', 
                            'service data has been successfully stored.'
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
                    'processing', 'saving services data!'
                ));

                pyd.image_id = slcImg;

                console.log(pyd);

                url = adm.getState() 
                        ? `${adm.getApiUrl(self.prefix)}/${adm.getState()}`
                        : adm.getApiUrl(self.prefix);

                res = await adm.request(mtd, url, JSON.stringify(pyd))
                                .then(data => data)
                                .catch(error => error);

                if (res.status === 'success') {
                    Swal.fire(adm.getSwalConf(
                        'success', 'Stored!', 
                        'service data has been successfully stored.'
                    ));

                    btnRef.click();
                    document.getElementById('btn-back-1').click();
                    
                    return;
                }
            }

            //-- case 3: user does not provide image data
            if ((slcImg === '' && inpImg === undefined)) {
                Swal.fire(adm.getSwalLoadingConf(
                    'processing', 'saving services data!'
                ));
                
                url = adm.getState() 
                        ? `${adm.getApiUrl(self.prefix)}/${adm.getState()}`
                        : adm.getApiUrl(self.prefix);

                res = await adm.request(mtd, url, JSON.stringify(pyd))
                                .then(data => data)
                                .catch(error => error);

                if (res.status === 'success') {
                    Swal.fire(adm.getSwalConf(
                        'success', 'Stored!', 
                        'service data has been successfully stored.'
                    ));

                    btnRef.click();
                    document.getElementById('btn-back-1').click();
                    
                    return;
                }
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
                    self.toggleVisibility('main-content');
                    self.toggleVisibility('form-view');

                } else {
                    self.toggleVisibility('main-content');
                    self.toggleVisibility('form-content');
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

                // if (img.src === '') {
                //     self.toggleVisibility('img-prev');
                //     self.toggleVisibility('img-thumb');
                // }
            });
        });
    };

    document.addEventListener("DOMContentLoaded", function () {
        adm = new Admin();
        ind = new Index();
        ind.init(); 
    });
</script>