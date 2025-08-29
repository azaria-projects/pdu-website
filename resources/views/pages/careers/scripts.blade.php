<script>
    document.addEventListener("DOMContentLoaded", function () {
        const mn1 = document.getElementById('menu-opportunities');
        const mn2 = document.getElementById('menu-descriptions');

        const cn1 = document.getElementById('content-opportunities');
        const cn2 = document.getElementById('content-descriptions');

        mn1.addEventListener("click", function (e) {
            if (cn1.classList.contains('d-none')) {
                cn2.classList.add('d-none');
                cn1.classList.remove('d-none');
            }

            mn1.classList.add('active');

            if (mn2.classList.contains('active')) {
                mn2.classList.remove('active');
            }
        });

        mn2.addEventListener("click", function (e) {
            if (cn2.classList.contains('d-none')) {
                cn1.classList.add('d-none');
                cn2.classList.remove('d-none');
            }

            mn2.classList.add('active');

            if (mn1.classList.contains('active')) {
                mn1.classList.remove('active');
            }
        });
    });
</script>