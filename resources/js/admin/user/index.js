
const btnAdd = document.getElementById('btnAdd');
const closeModal = document.getElementById('closeModal');
const cancelBtn = document.getElementById('cancelBtn');
const userModal = document.getElementById('userModal');
const confirmModal = document.getElementById('confirmModal');
const cancelDelete = document.getElementById('cancelDelete');
const confirmDelete = document.getElementById('confirmDelete');

btnAdd.addEventListener('click', () => openModal());
closeModal.addEventListener('click', closeUserModal);
cancelBtn.addEventListener('click', closeUserModal);

const userId = document.getElementById('userId');
const emailInput = document.getElementById('emailInput');
const usernameInput = document.getElementById('usernameInput');
const roleInput = document.getElementById('roleInput');

function openModal(user = null) {
    console.log(user);
    if (user) {
        document.getElementById('modalTitle').textContent = 'Sửa người dùng';
        userId.value = user.id;
        emailInput.value = user.email;
        usernameInput.value = user.name;
        // roleInput.value = user['role'];
    } else {
        document.getElementById('modalTitle').textContent = 'Thêm người dùng';
        userForm.reset();
        userId.value = '';
    }
    userModal.classList.remove('hidden');
    userModal.style.display = 'flex';
}

function closeUserModal() {
    userModal.classList.add('hidden');
    userModal.style.display = 'none';
}

cancelDelete.addEventListener('click', closeConfirmModalDelete);
confirmDelete.addEventListener('click', () => {
});


function closeConfirmModalDelete() {
    confirmModal.classList.add('hidden');
}

function openConfirmModalDelete() {
    confirmModal.classList.remove('hidden');
}

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.editBtn').forEach(element => {
        element.addEventListener('click', async function () {
            const user = JSON.parse(element.dataset.id);
            openModal(user);
        })
    });

    document.querySelectorAll('.deleteBtn').forEach(element => {
        element.addEventListener('click', () => {
            confirmModal.classList.remove('hidden');
        }
        )
    });
});
