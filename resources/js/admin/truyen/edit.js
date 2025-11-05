const dropdownButton = document.getElementById('dropdownButton');
const dropdownMenu = document.getElementById('dropdownMenu');
const categoryInput = document.getElementById('genresInput');
const comicData = JSON.parse(document.getElementById('comic').value);
let selectedGenres = [];
const maxLength = 10;

rederGenre();
// Hiển thị/ẩn dropdown
dropdownButton.addEventListener('click', () => {
    dropdownMenu.classList.toggle('hidden');
});

// Chọn thể loại
dropdownMenu.querySelectorAll('div[data-value]').forEach(item => {
      const idGenre = item.dataset.value;

    if (selectedGenres.some(g => g.idGenre === idGenre)) {
        item.classList.add('bg-indigo-200');
    }
    item.addEventListener('click', () => {
        const fullName = item.textContent.trim();
        const displayName = getSliceNameGenre(fullName);

        // Kiểm tra xem đã chọn chưa
        const index = selectedGenres.findIndex(g => g.idGenre === idGenre);
        if (index !== -1) {
            // Nếu đã chọn thì bỏ chọn
            selectedGenres.splice(index, 1);
            item.classList.remove('bg-indigo-200');
        } else {
            // Nếu chưa chọn thì thêm
            selectedGenres.push({ idGenre, name: displayName });
            item.classList.add('bg-indigo-200');
        }


        // Cập nhật nút hiển thị
        if (selectedGenres.length > 0) {
            dropdownButton.textContent = selectedGenres.map(g => g.name).join(', ');
        } else {
            dropdownButton.textContent = '-- Chọn thể loại --';
        }

        // Cập nhật input hidden
        categoryInput.value = selectedGenres.map(g => g.idGenre);

    });
});

// Ẩn dropdown khi click ra ngoài
document.addEventListener('click', (e) => {
    if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
        dropdownMenu.classList.add('hidden');
    }
});

function getSliceNameGenre(name) {
    return name.length > maxLength
        ? name.slice(0, maxLength) + "..."
        : name;
}

function rederGenre() {

    comicData.forEach(element => {
        console.log(element);
        selectedGenres.push({ idGenre: element.id.toString(), name: getSliceNameGenre(element.name) });
    });
    categoryInput.value = selectedGenres.map(g => g.idGenre);
    dropdownButton.textContent = selectedGenres.map(g => g.name).join(', ');
}
