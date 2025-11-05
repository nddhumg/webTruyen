// 🔹 Event delegation cho popup mở khi click nút
document.addEventListener('click', function (e) {
    // Mở popup
    if (e.target.matches('#btnAddGenre')) {
        const createPopup = document.getElementById('createPopup');
        if (createPopup) createPopup.classList.remove('hidden');
    }

    // Đóng popup khi click overlay
    if (e.target.matches('#createPopup')) {
        e.target.classList.add('hidden');
    }
});

$(document).on('input', '#searchInput', function () {
    let query = $(this).val();
    const searchUrl = $(this).data('search-url');
    if (!searchUrl) return;
    $.ajax({
        url: searchUrl,
        type: 'GET',
        data: { q: query },
        success: function (data) {
            $('#genreList').html(data);
        },
        error: function (xhr) {
            console.log('Lỗi AJAX:', xhr);
        }
    });
});

// 🔹 Mở popup nếu có lỗi validation
document.addEventListener('DOMContentLoaded', () => {
    const errorIndicator = document.getElementById('genreValidationError');
    const createPopup = document.getElementById('createPopup');
    if (errorIndicator && errorIndicator.dataset.hasError === '1' && createPopup) {
        createPopup.classList.remove('hidden');
    }
});
