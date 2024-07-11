document.addEventListener('DOMContentLoaded', function () {
    const colorElements = document.querySelectorAll('.color');
    const frameElements = document.querySelectorAll('.frame-option');
    const mapImage = document.getElementById('map-image');
    const step1 = document.getElementById('step1');
    const step2 = document.getElementById('step2');
    const step3 = document.getElementById('step3');
    const continueBtn = document.getElementById('continueBtn');
    const colorPicker = document.getElementById('color-picker');
    const extraContent = document.getElementById('extra-content');
    const formatOptions = document.getElementById('format-options');
    const frameOptions = document.getElementById('frame-options');
    const yearSelect = document.getElementById('yearSelect');
    const monthSelect = document.getElementById('monthSelect');
    const daySelect = document.getElementById('daySelect');
    const printOption = document.getElementById('printOption');
    const frameOption = document.getElementById('frameOption');
    const woodenFrame = document.getElementById('woodenFrame');
    const whiteFrame = document.getElementById('whiteFrame');
    const blackFrame = document.getElementById('blackFrame');

    let selectedColor = null;
    let selectedFrame = null;

    // Renk seçim işlevi
    colorElements.forEach(colorElement => {
        colorElement.addEventListener('click', function () {
            colorElements.forEach(el => el.classList.remove('selected'));
            this.classList.add('selected');
    
            selectedColor = this.getAttribute('data-color');
            let imagePath = '';
    
            switch (selectedColor) {
                case 'charcoal': // Siyah seçildiğinde
                    if (step1.classList.contains('active')) {
                        // Siyah seçildiğinde step1 aktifse
                        frameElements.forEach(frameElement => {
                            frameElement.addEventListener('click', function () {
                                frameElements.forEach(el => el.classList.remove('selected'));
                                this.classList.add('selected');
    
                                selectedFrame = this.getAttribute('id');
                                let imagePath = '';
    
                                switch (selectedFrame) {
                                    case 'woodenFrame':
                                        imagePath = 'FalResim/S_AhsapCerceve.png';
                                        break;
                                    case 'whiteFrame':
                                        imagePath = 'FalResim/S_BeyazCerceve.png';
                                        break;
                                    case 'blackFrame':
                                        imagePath = 'FalResim/S_SiyahCerceve.png';
                                        break;
                                }
    
                                mapImage.setAttribute('src', imagePath);
                            });
                        });
                    }
                    break;
                case 'white': // Beyaz seçildiğinde
                    if (step1.classList.contains('active')) {
                        // Beyaz seçildiğinde step1 aktifse
                        frameElements.forEach(frameElement => {
                            frameElement.addEventListener('click', function () {
                                frameElements.forEach(el => el.classList.remove('selected'));
                                this.classList.add('selected');
    
                                selectedFrame = this.getAttribute('id');
                                let imagePath = '';
    
                                switch (selectedFrame) {
                                    case 'woodenFrame':
                                        imagePath = 'FalResim/B_AhsapCerceve.png';
                                        break;
                                    case 'whiteFrame':
                                        imagePath = 'FalResim/B_BeyazCerceve.png';
                                        break;
                                    case 'blackFrame':
                                        imagePath = 'FalResim/B_SiyahCerceve.png';
                                        break;
                                }
    
                                mapImage.setAttribute('src', imagePath);
                            });
                        });
                    }
                    break;
            }
    
            switch (selectedColor) {
                case 'charcoal':
                    imagePath = 'FalResim/Charcoal.png';
                    break;
                case 'white':
                    imagePath = 'FalResim/White.png';
                    break;
            }
    
            mapImage.setAttribute('src', imagePath);
        });
    });

    // Yıl selectbox'ını doldurma
    for (let year = 1900; year <= 2100; year++) {
        let option = document.createElement('option');
        option.value = year;
        option.textContent = year;
        yearSelect.appendChild(option);
    }

    // Ay değiştiğinde günlerin güncellenmesi
    monthSelect.addEventListener('change', updateDays);
    yearSelect.addEventListener('change', updateDays);

    // Başlangıçta günleri güncelleme
    updateDays();

    function updateDays() {
        const selectedYear = parseInt(yearSelect.value);
        const selectedMonth = parseInt(monthSelect.value);
        const daysInMonth = new Date(selectedYear, selectedMonth, 0).getDate();

        daySelect.innerHTML = '';

        for (let day = 1; day <= daysInMonth; day++) {
            let option = document.createElement('option');
            option.value = day;
            option.textContent = day;
            daySelect.appendChild(option);
        }
    }

    // Adımları ve ilgili içerikleri kontrol etme
    step1.addEventListener('click', function () {
        showStep(step1);
        colorPicker.style.display = 'block';
        extraContent.style.display = 'none';
        formatOptions.style.display = 'none';
        frameOptions.style.display = 'none';
    });

    step2.addEventListener('click', function () {
        showStep(step2);
        colorPicker.style.display = 'none';
        extraContent.style.display = 'block';
        formatOptions.style.display = 'none';
        frameOptions.style.display = 'none';
    });

    step3.addEventListener('click', function () {
        showStep(step3);
        colorPicker.style.display = 'none';
        extraContent.style.display = 'none';
        formatOptions.style.display = 'block';
    });

    function showStep(step) {
        [step1, step2, step3].forEach(s => s.classList.remove('active'));
        step.classList.add('active');
    }

    printOption.addEventListener('click', function () {
        showFormatOptions();
    });

    frameOption.addEventListener('click', function () {
        showFrameOptions();
    });

    function showFormatOptions() {
        formatOptions.style.display = 'block';
        frameOptions.style.display = 'none';
        continueBtn.style.display = 'block';
        printOption.classList.add('selected');
        frameOption.classList.remove('selected');
    }

    function showFrameOptions() {
        frameOptions.style.display = 'block';
        formatOptions.style.display = 'none';
        continueBtn.style.display = 'block';
        frameOption.classList.add('selected');
        printOption.classList.remove('selected');
    }

    continueBtn.addEventListener('click', function() {
        if (step1.classList.contains('active')) {
            step1.classList.remove('active');
            step2.classList.add('active');
            colorPicker.style.display = 'none';
            extraContent.style.display = 'block';
            printOption.style.display = 'inline-block';
            frameOption.style.display = 'inline-block';
        } else if (step2.classList.contains('active')) {
            step2.classList.remove('active');
            step3.classList.add('active');
            extraContent.style.display = 'none';
            formatOptions.style.display = 'block';
            // Burada "Devam Et" butonunu "Sipariş Oluştur" butonu olarak değiştir
            continueBtn.textContent = 'Sipariş Oluştur';
        } else if (step3.classList.contains('active')) {
            // Renk ve çerçeve seçimini kontrol et ve yönlendirme yap
            if (selectedColor === 'white' && selectedFrame === 'woodenFrame') {
                window.location.href = 'https://iyzi.link/AJqCSw';
            } else if (selectedColor === 'white' && selectedFrame === 'whiteFrame') {
                window.location.href = 'https://iyzi.link/AJqClQ';
            } else if (selectedColor === 'white' && selectedFrame === 'blackFrame') {
                window.location.href = 'https://iyzi.link/AJqClw';
            } else if (selectedColor === 'charcoal' && selectedFrame === 'woodenFrame') {
                window.location.href = 'https://iyzi.link/AJqCmQ';
            } else if (selectedColor === 'charcoal' && selectedFrame === 'whiteFrame') {
                window.location.href = 'https://iyzi.link/AJqCmg';
            } else if (selectedColor === 'charcoal' && selectedFrame === 'blackFrame') {
                window.location.href = 'https://iyzi.link/AJqCmw';
            } else {
                console.log('Başka bir seçenek seçildi.');
            }
        }
    });

    const backBtn = document.getElementById('backBtn');

    backBtn.addEventListener('click', function() {
        if (step3.classList.contains('active')) {
            step3.classList.remove('active');
            step2.classList.add('active');
            extraContent.style.display = 'block';
            formatOptions.style.display = 'none';
        } else if (step2.classList.contains('active')) {
            step2.classList.remove('active');
            step1.classList.add('active');
            colorPicker.style.display = 'block';
            extraContent.style.display = 'none';
            formatOptions.style.display = 'none';
        }
    });

    window.addEventListener('load', function () {
        step1.click();
    });
});
