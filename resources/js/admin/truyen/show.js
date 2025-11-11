const btnCreateChapter = document.getElementById('btnCreateChapter');
const popupCreateChapter = document.getElementById('popupCreateChapter');
const parentPopup = document.getElementById('parentPopup');
const closePopupBtn = document.getElementById('closePopupBtn');

btnCreateChapter.addEventListener('click', () => {
    parentPopup.classList.remove('hidden');
})

parentPopup.addEventListener('mousedown', e => {
    if (e.target === parentPopup) {
        parentPopup.classList.add('hidden');
    }
});
closePopupBtn.addEventListener('click', () => {
    parentPopup.classList.add('hidden');
})
