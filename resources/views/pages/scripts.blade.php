<script>
    document.addEventListener("DOMContentLoaded", function () {
        const bt1 = document.getElementById('btn-mudlogging');
        const bt2 = document.getElementById('btn-mwd');
        const bt3 = document.getElementById('btn-plt');

        const sv1 = document.getElementById('service-mudlogging');
        const sv2 = document.getElementById('service-mwd');
        const sv3 = document.getElementById('service-plt');

        const bt4 = document.getElementById('btn-geothermal');
        const bt5 = document.getElementById('btn-oilgas');

        const sv4 = document.getElementById('company-geothermal');
        const sv5 = document.getElementById('company-oilgas');

        const scrollAmount = 300;
        const updateButtonStates = (target, leftBtn, rightBtn) => {
            if (!target) return;
            
            const maxScrollLeft = target.scrollWidth - target.clientWidth;

            if (leftBtn) {
                leftBtn.disabled = target.scrollLeft <= 0;
            }

            if (rightBtn) {
                rightBtn.disabled = target.scrollLeft >= maxScrollLeft - 1;
            }
        };

        bt1.addEventListener("click", function (e) {
            if (sv1.classList.contains('d-none')) {
                sv2.classList.add('d-none');
                sv3.classList.add('d-none');
                sv1.classList.remove('d-none');
            }

            bt1.classList.add('active');

            if (bt2.classList.contains('active')) {
                bt2.classList.remove('active');
            }

            if (bt3.classList.contains('active')) {
                bt3.classList.remove('active');
            }
        });

        bt2.addEventListener("click", function (e) {
            if (sv2.classList.contains('d-none')) {
                sv1.classList.add('d-none');
                sv3.classList.add('d-none');
                sv2.classList.remove('d-none');
            }

            bt2.classList.add('active');

            if (bt1.classList.contains('active')) {
                bt1.classList.remove('active');
            }

            if (bt3.classList.contains('active')) {
                bt3.classList.remove('active');
            }
        });

        bt3.addEventListener("click", function (e) {
            if (sv3.classList.contains('d-none')) {
                sv1.classList.add('d-none');
                sv2.classList.add('d-none');
                sv3.classList.remove('d-none');
            }

            bt3.classList.add('active');

            if (bt2.classList.contains('active')) {
                bt2.classList.remove('active');
            }

            if (bt1.classList.contains('active')) {
                bt1.classList.remove('active');
            }
        });

        bt4.addEventListener("click", function (e) {
            if (sv4.classList.contains('d-none')) {
                sv5.classList.add('d-none');
                sv4.classList.remove('d-none');
            }

            bt4.classList.add('active');
            
            if (bt5.classList.contains('active')) {
                bt5.classList.remove('active');
            }
        });

        bt5.addEventListener("click", function (e) {
            if (sv5.classList.contains('d-none')) {
                sv4.classList.add('d-none');
                sv5.classList.remove('d-none');
            }

            bt5.classList.add('active');
                        
            if (bt4.classList.contains('active')) {
                bt4.classList.remove('active');
            }
        });

        document.querySelectorAll('.btn-slide').forEach(button => {
            button.addEventListener('click', function () {
                const direction = this.classList.contains('left') ? 'left' : 'right';
                const targetId = this.getAttribute('data-target-id');
                const target = document.getElementById(targetId);

                if (!target) return;

                const scrollBy = direction === 'left' ? -scrollAmount : scrollAmount;

                target.scrollBy({
                    left: scrollBy,
                    behavior: 'smooth'
                });

                setTimeout(() => {
                    const parentGroup = this.closest('.btn-slide-group');
                    const leftBtn = parentGroup.querySelector('.btn-slide.left');
                    const rightBtn = parentGroup.querySelector('.btn-slide.right');
                    updateButtonStates(target, leftBtn, rightBtn);
                }, 300);
            });
        });

        document.querySelectorAll('.btn-slide-group').forEach(group => {
            const leftBtn = group.querySelector('.btn-slide.left');
            const rightBtn = group.querySelector('.btn-slide.right');
            const targetId = leftBtn?.getAttribute('data-target-id');
            const target = document.getElementById(targetId);

            updateButtonStates(target, leftBtn, rightBtn);
        });
    });
</script>