import $ from 'jquery';
let navOpen = null
const colorOpen = "bg-amber-400";

window.isDev = "{{ app()->environment('local') ? 'true' : 'false' }}" === 'true';
window.projectBase = "{{ url('') }}"; // VD: http://localhost/webTruyen/public
const currentPageData = document.getElementById('datapage').dataset.currentPage;
const page = document.getElementById('nav-menu-' + currentPageData);
window.viteBase = !window.isDev
    ? 'http://localhost:5173/resources'
    : window.projectBase + '/build/assets'; // Đúng đường dẫn sau khi npm run build

if (page) {
    TurnOn(page);
    navOpen = page;
}

document.querySelectorAll('.nav-menu').forEach(link => {
    link.addEventListener('click', () => {
        if (navOpen != link && navOpen != null) {

            TurnOn(navOpen);
        }
        navOpen = link;
    });
    link.addEventListener('mouseenter', () => {
        if (navOpen === link)
            return;
        TurnOn(link);
    });

    link.addEventListener('mouseleave', () => {
        if (navOpen === link)
            return;
        TurnOff(link);
    });
});

const sidebar = document.getElementById('default-sidebar');
const toggleBtn = document.getElementById('sidebar-toggle');

toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('-translate-x-full');
});



// document.querySelectorAll('.nav-link').forEach(link => {
//     link.addEventListener('click', function (e) {
//         e.preventDefault();
//         const url = this.getAttribute('href');
//         const urlSplit = url.split("/");


//         fetch(url, {
//             headers: {
//                 'X-Requested-With': 'XMLHttpRequest'
//             }
//         })
//             .then(res => res.text())
//             .then(html => {
//                 document.querySelector('#content').innerHTML = html;
//                 loadPageScript(urlSplit[urlSplit.length - 2], urlSplit[urlSplit.length - 1]);
//                 window.history.pushState({}, '', url); // cập nhật URL mà không reload
//             })
//             .catch(err => console.error('Lỗi khi load:', err));
//     });
// });

function TurnOn(element) {
    const childNav = element.querySelector('.nav-submenu');
    if (childNav) {
        childNav.classList.remove("hidden");
    }
    element.classList.add(colorOpen);
}

function TurnOff(element) {
    const childNav = element.querySelector('.nav-submenu');
    if (childNav) {
        childNav.classList.add("hidden");
    }
    element.classList.remove(colorOpen);
}

