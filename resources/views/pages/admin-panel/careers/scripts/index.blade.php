<script>
    /*
        - require admin script!
    */

    function Index() { 
        this.prefix = 'careers';
    }

    Index.prototype.setDefaultCareerData = async function () {
        const cnc = document.getElementById('opp-content');
        const cnd = document.getElementById('desc-content');

        const bad = document.getElementById('opp-add');
        const dad = document.getElementById('desc-add');
        const brt = document.getElementById('opp-reset'); 
        const drt = document.getElementById('desc-reset'); 
        
        const url = new URL(adm.getApiUrl('codes'));
        url.searchParams.set('type', 'default-careers')

        const jbc = await adm.request('GET', url.toString())
                        .then(data => data)
                        .catch(error => error);

        if (jbc && jbc.status !== 'success') {
            cnc.innerHtml = ''; 
            cnd.innerHtml = ''; 
        }

        cnc.innerHTML = jbc.response.data[0].value;
        cnd.innerHTML = jbc.response.data[1].value;

        bad.setAttribute('data-id', jbc.response.data[0].id);
        dad.setAttribute('data-id', jbc.response.data[1].id);
        brt.setAttribute('data-id', jbc.response.data[0].id);
        drt.setAttribute('data-id', jbc.response.data[1].id);

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

        $('#opp-editor').summernote('code', jbc.response.data[0].value);
        $('#desc-editor').summernote('code', jbc.response.data[1].value);
    }

    Index.prototype.init = async function () {
        await this.setDefaultCareerData();
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
                `save new career data?`
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
                    `career data has been updated.`
                ));

                await slf.resetCareerData();
                
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
            const url = `${adm.getApiUrl('codes')}/careers-reset`;

            prm = await Swal.fire(adm.getSwalPromptConf(
                'question', 'Reset Data?', 
                `reset all career data?`
            ));

            if (!prm.isConfirmed) { return; }

            Swal.fire(adm.getSwalLoadingConf(
                'resetting data', 'please wait!'
            ));

            res = await adm.request('POST', url)
                            .then(data => data)
                            .catch(error => error);

            if (res && res.status === 'success') {
                await slf.setDefaultCareerData();

                Swal.fire(adm.getSwalConf(
                    'success', 'Reset!', 
                    `career data has been reset.`
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