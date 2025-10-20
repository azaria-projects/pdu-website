<script>
    /*
        - require admin script!
    */

    function Index() { 
        this.prefix = 'company';
    }

    Index.prototype.setDefaultCompanyData = async function () {
        const occ = document.getElementById('ovr-content');

        const oad = document.getElementById('ovr-add');
        const ort = document.getElementById('ovr-reset'); 
        
        const url = new URL(adm.getApiUrl('codes'));
        url.searchParams.set('type', 'default-company')

        const jbc = await adm.request('GET', url.toString())
                        .then(data => data)
                        .catch(error => error);

        if (jbc && jbc.status !== 'success') {
            oad.innerHtml = ''; 
        }

        occ.innerHTML = jbc.response.data[0].value;

        oad.setAttribute('data-id', jbc.response.data[0].id);
        ort.setAttribute('data-id', jbc.response.data[0].id);

        $('.summernote').summernote({
            height: 500,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            placeholder: 'Add changes here . . .',
        });

        $('#ovr-editor').summernote('code', jbc.response.data[0].value);
    }

    Index.prototype.init = async function () {
        await this.setDefaultCompanyData();
        this.initListeners();
    }

    Index.prototype.initListeners = async function () {
        const slf = this;

        $('.btn-add').on('click', async function () {
            let prm;

            const pyd = {};
            const cid = $(this).attr('data-id');
            const crr = $(this).attr('data-name');
            const url = `${adm.getApiUrl('codes')}/${cid}`;
            const elm = $(`#${crr}-editor`).summernote('code');

            prm = await Swal.fire(adm.getSwalPromptConf(
                'question', 'Update Data?', 
                `save new company data?`
            ));

            if (!prm.isConfirmed) { return; }

            pyd.value = elm;

            Swal.fire(adm.getSwalLoadingConf(
                'saving data', 'please wait!'
            ));

            res = await adm.request('PUT', url, JSON.stringify(pyd))
                            .then(data => data)
                            .catch(error => error);

            if (res && res.status === 'success') {
                Swal.fire(adm.getSwalConf(
                    'success', 'Updated!', 
                    `company data has been updated.`
                ));
                
                return;
            }

            Swal.fire(adm.getSwalConf(
                'error', 'Unable to Perform Changes!', 
                'please contact the administrator!'
            ));
        });

        $('.btn-delete').on('click', async function () {
            let prm;

            const crr = $(this).attr('data-id');
            const elm = $(`#${crr}-editor`).summernote('code');
            const url = `${adm.getApiUrl('codes')}/company-reset`;

            prm = await Swal.fire(adm.getSwalPromptConf(
                'question', 'Reset Data?', 
                `reset all company data?`
            ));

            if (!prm.isConfirmed) { return; }

            Swal.fire(adm.getSwalLoadingConf(
                'resetting data', 'please wait!'
            ));

            res = await adm.request('POST', url)
                            .then(data => data)
                            .catch(error => error);

            if (res && res.status === 'success') {
                await slf.setDefaultCompanyData();

                Swal.fire(adm.getSwalConf(
                    'success', 'Reset!', 
                    `company data has been reset.`
                ));
                
                return;
            }

            Swal.fire(adm.getSwalConf(
                'error', 'Unable to Perform Changes!', 
                'please contact the administrator!'
            ));
        });

        $('.summernote').summernote();
    };

    document.addEventListener("DOMContentLoaded", function () {
        adm = new Admin();
        ind = new Index();
        ind.init(); 
    });
</script>