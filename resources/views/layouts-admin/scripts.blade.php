@push('scripts-body')
    <script src="{{ asset('dependancies/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('themes/adminlte4/js/adminlte.min.js') }}"></script>
    
    <script src="{{ asset('dependancies/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dependancies/jquery/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('dependancies/jquery/additional-methods.min.js') }}"></script>

    <script src="{{ asset('dependancies/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('dependancies/datatable/js/datatables.min.js') }}"></script>
    <script src="{{ asset('dependancies/sweetalert2/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('dependancies/summernote/js/summernote-bs5.min.js') }}"></script>

    @vite([ 'resources/js/app.js' ])

    <script>
        let adm;

        function Admin(
            baseUrl    = 'http://127.0.0.1:8000',
            basePrefix = 'api'
        ) {
            this.state      = null;
            this.rowData    = null;
            this.baseUrl    = baseUrl;
            this.basePrefix = basePrefix;
        }

        Admin.prototype.getState = function() {
            return this.state;
        };

        Admin.prototype.getRowData = function() {
            return this.rowData;
        };

        Admin.prototype.setState = function( 
            sta = ''
        ) {
            this.state = sta;
        };

        Admin.prototype.setRowData = function( 
            dat = ''
        ) {
            this.rowData = dat;
        };

        Admin.prototype.getApiUrl = function( 
            end = ''
        ) {
            return `${this.baseUrl}/${this.basePrefix}/${end}`;
        };

        Admin.prototype.validateForm = function( 
            fid = ''
        ) {
            const frm = document.getElementById(fid);
            const fld = frm.querySelectorAll('[required]');
            
            for (const elm of fld) {
                if (elm.value.trim() === '') {
                    return false;
                }
            }

            return true;
        };

        Admin.prototype.request = async function (
            mtd = 'GET', 
            url = '', 
            dat = {}
        ) {
            const par = {
                body    : dat,
                method  : mtd,
                headers : { 'Content-Type': 'application/json' }
            }

            //-- adjust based on methods
            if (mtd === 'GET') {
                delete par.body;
                par.headers['Cache-Control'] = 'no-store';
            }

            //-- adjust based on payload
            if (dat instanceof FormData) {
                delete par.headers;
            } else if (dat instanceof Object && mtd !== 'GET') {
                par.body = JSON.stringify(dat);
            }

            try {
                //-- perform a request
                const res = await fetch(url, par);
                const dat = await res.json();

                return {
                    status   : dat.status,
                    response : dat.response,
                    message  : dat.message
                };

            } catch (err) {
                return {
                    status  : 'error',
                    message : err
                };
            }
        }

        Admin.prototype.getSwalConf = function (
            sta = '', 
            hed = '', 
            sub = '', 
            ctm = 1500, 
            cfb = false
        ) {
            return {
                // theme: 'dark',
                icon  : sta,
                title : hed,
                text  : sub,
                timer : ctm,
                showConfirmButton: cfb,
                didOpen: () => {
                    Swal.hideLoading();
                }
            }
        }

        Admin.prototype.getSwalPromptConf = function (
            sta = '', 
            hed = '', 
            sub = '',
            ccb = true,
            cbt = 'yes'
        ) {
            return {
                // theme: 'dark',
                icon  : sta,
                title : hed,
                text  : sub,

                showCancelButton  : ccb,
                confirmButtonText : cbt,
                buttonsStyling    : true,
                customClass       : {
                    confirmButton: 'btn-swal-confirm',
                    cancelButton: 'btn-swal-cancel'   
                }
            }
        }

        Admin.prototype.getSwalLoadingConf = function (
            hed = '', 
            sub = ''
        ) {
            return {
                // theme: 'dark',
                title : hed,
                text  : sub,
                allowOutsideClick : false,
                showConfirmButton : false,
                didOpen: () => {
                    Swal.showLoading();
                }
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('.nav-link.active').forEach(function(elm) {
                const par = elm.parentElement.parentElement.parentElement;
                par.firstElementChild.classList.add('has-active');
            });
        });
    </script>
@endpush