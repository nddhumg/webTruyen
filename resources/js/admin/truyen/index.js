
const inputName = document.getElementById('inputName');
const inputAuthor = document.getElementById('inputAuthor');
const inputId = document.getElementById('inputId');
const editPopup = document.getElementById('editPopup');
let idDelete = -1;
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

let trDelete;
let nextSibling = 0;
const tableBody = document.getElementById('tableBody');
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.editBtn').forEach(btn => {
        btn.addEventListener('click', e => {
            const url = btn.dataset.url;
            window.location.href = url;
        });
    });

    document.querySelectorAll('.deleteBtn').forEach(btn => {
        btn.addEventListener('click', e => {
            modalOverlay.classList.remove('hidden');
            deleteUrl = btn.dataset.url;
            idDelete = btn.dataset.id;
            trDelete = btn.closest('tr');
            nextSibling = trDelete.nextElementSibling;
        });
    });
    document.querySelectorAll('.comicBtn').forEach(btn => {
        btn.addEventListener('click', e => {
            const url = btn.dataset.url;
            window.location.href = url;

        });
    });
});
const modalOverlay = document.getElementById('modalOverlay');
const modalBox = document.getElementById('modalBox');
const cancelBtn = document.getElementById('cancelBtn');
const deleteBtn = document.getElementById('deleteBtn');
let deleteUrl;
cancelBtn.addEventListener('click', () => {
    modalOverlay.classList.add('hidden');
});

// Ấn ra ngoài thì đóng
modalOverlay.addEventListener('click', (e) => {
    if (!modalBox.contains(e.target)) {
        modalOverlay.classList.add('hidden');
    }
});

deleteBtn.addEventListener('click', () => {
    // Xóa tạm trong UI (optimistic update)
    trDelete.remove();
    modalOverlay.classList.add('hidden');

    fetch(deleteUrl, {
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
            "Accept": "application/json"
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Delete failed");
        }
        toastPool.show("Xóa thành công", "success");
    })
    .catch(error => {
        // Rollback: chèn lại hàng nếu lỗi
        tableBody.insertBefore(trDelete, nextSibling);
        toastPool.show("Xóa thất bại", "danger");
        console.error(error);
    });
});



