import './bootstrap';

document.addEventListener("DOMContentLoaded", () => {
    console.log("Script loaded ✅"); // Kiểm tra script có chạy không

    const checkbox = document.getElementById('checkbox');
    const html = document.documentElement;

    if (!checkbox) {
        console.log("Checkbox not found ❌");
        return;
    }

    // Áp dụng theme đã lưu
    if (localStorage.theme === 'dark') {
        html.classList.add('dark');
        checkbox.checked = true;
        console.log("Dark mode applied 🌙");
    } else {
        console.log("Light mode applied ☀️");
    }

    // Lắng nghe thay đổi
    checkbox.addEventListener('change', () => {
        if (checkbox.checked) {
            html.classList.add('dark');
            localStorage.theme = 'dark';
            console.log("Switched to Dark Mode 🌙");
        } else {
            html.classList.remove('dark');
            localStorage.theme = 'light';
            console.log("Switched to Light Mode ☀️");
        }
    });
});


