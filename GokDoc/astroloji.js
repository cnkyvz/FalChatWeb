function showTab(tabId) {
    // Tüm sekmeleri gizle
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(content => {
        content.classList.remove('active');
    });

    // Tüm sekme butonlarındaki 'active' sınıfını kaldır
    const tabButtons = document.querySelectorAll('.tab-button');
    tabButtons.forEach(button => {
        button.classList.remove('active');
    });

    // Tıklanan sekme içeriğini göster ve butonunu aktif yap
    document.getElementById(tabId).classList.add('active');
    event.currentTarget.classList.add('active');
}

// Sayfa yüklendiğinde ilk sekmeyi göster
document.addEventListener('DOMContentLoaded', function() {
    showTab('daily');
});


