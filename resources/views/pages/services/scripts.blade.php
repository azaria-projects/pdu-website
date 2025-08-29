<script>
    document.addEventListener("DOMContentLoaded", function () {
        const mn1 = document.getElementById('menu-mwd');
        const mn2 = document.getElementById('menu-plt');
        const mn3 = document.getElementById('menu-mudlogging');

        const cn1 = document.getElementById('content-mwd');
        const cn2 = document.getElementById('content-plt');
        const cn3 = document.getElementById('content-mudlogging');

        mn1.addEventListener("click", function (e) {
            if (cn1.classList.contains('d-none')) {
                cn2.classList.add('d-none');
                cn3.classList.add('d-none');
                cn1.classList.remove('d-none');
            }

            mn1.classList.add('active');

            if (mn2.classList.contains('active')) {
                mn2.classList.remove('active');
            }

            if (mn3.classList.contains('active')) {
                mn3.classList.remove('active');
            }
        });

        mn2.addEventListener("click", function (e) {
            if (cn2.classList.contains('d-none')) {
                cn1.classList.add('d-none');
                cn3.classList.add('d-none');
                cn2.classList.remove('d-none');
            }

            mn2.classList.add('active');

            if (mn1.classList.contains('active')) {
                mn1.classList.remove('active');
            }

            if (mn3.classList.contains('active')) {
                mn3.classList.remove('active');
            }
        });

        mn3.addEventListener("click", function (e) {
            if (cn3.classList.contains('d-none')) {
                cn1.classList.add('d-none');
                cn2.classList.add('d-none');
                cn3.classList.remove('d-none');
            }

            mn3.classList.add('active');

            if (mn1.classList.contains('active')) {
                mn1.classList.remove('active');
            }

            if (mn2.classList.contains('active')) {
                mn2.classList.remove('active');
            }
        });
    });
</script>