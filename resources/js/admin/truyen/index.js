
const inputName = document.getElementById('inputName');
const inputAuthor = document.getElementById('inputAuthor');
const inputId = document.getElementById('inputId');
const editPopup = document.getElementById('editPopup');

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.editBtn').forEach(btn => {
        btn.addEventListener('click', e => {
            const url = btn.dataset.url;
            window.location.href = url;
        });
    });

    document.querySelectorAll('.deleteBtn').forEach(btn => {
        btn.addEventListener('click', e => {

        });
    });
});
