$(document).ready(function () {
    // Set first tab as active by default
    $('.menu-links a:first').addClass('active');

    // Handle tab switching
    $('.tab-link').click(function (e) {
        e.preventDefault();
        const tab = $(this).data('tab');

        // Remove active class from all tabs
        $('.tab-link').removeClass('active');
        // Add active class to current tab
        $(this).addClass('active');

        $.ajax({
            url: $loadTab,
            method: "POST",
            data: { tab: tab },
            beforeSend: function() {
                // Optional: Add loading indicator
                $('#dynamic-content').html('<div class="loading-spinner"><iclass="fas fa-spinner"></i><p>Loading...</p></div>'); // indikator loading
            },
            success: function (response) {
                $('#dynamic-content').html(response);
            },
            error: function () {
                $('#dynamic-content').html('<p>Gagal memuat konten.</p>')
            }
        });
    });
});