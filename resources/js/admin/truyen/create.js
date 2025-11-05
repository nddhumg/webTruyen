const dropdownButton = document.getElementById('dropdownButton');
const dropdownMenu = document.getElementById('dropdownMenu');
const categoryInput = document.getElementById('genresInput');

let selectedGenres = [];
// Hiển thị/ẩn dropdown
dropdownButton.addEventListener('click', () => {
    dropdownMenu.classList.toggle('hidden');
});

// Chọn thể loại
dropdownMenu.querySelectorAll('div[data-value]').forEach(item => {
    item.addEventListener('click', () => {
        const value = item.dataset.value;
        const fullName = item.textContent.trim();
        const maxLength = 10;

        const displayName = fullName.length > maxLength
            ? fullName.slice(0, maxLength) + "..."
            : fullName;

        // Kiểm tra xem đã chọn chưa
        const index = selectedGenres.findIndex(g => g.value === value);

        if (index !== -1) {
            // Nếu đã chọn thì bỏ chọn
            selectedGenres.splice(index, 1);
            item.classList.remove('bg-indigo-200');
        } else {
            // Nếu chưa chọn thì thêm
            selectedGenres.push({ value, name: displayName });
            item.classList.add('bg-indigo-200');
        }


        // Cập nhật nút hiển thị
        if (selectedGenres.length > 0) {
            dropdownButton.textContent = selectedGenres.map(g => g.name).join(', ');
        } else {
            dropdownButton.textContent = '-- Chọn thể loại --';
        }

        // Cập nhật input hidden
        categoryInput.value = selectedGenres.map(g => g.value);

    });
});

// Ẩn dropdown khi click ra ngoài
document.addEventListener('click', (e) => {
    if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
        dropdownMenu.classList.add('hidden');
    }
});
