let inputGambarProfile = document.getElementById('gambar_profil');
let displayGambarProfile = document.getElementById('display_gambar_profil');
if (inputGambarProfile) {
inputGambarProfile.addEventListener("change", previewGambar);
function previewGambar() {
const [file] = inputGambarProfile.files;
displayGambarProfile.src = URL.createObjectURL(file);
}
// agar ketika gambar profil di klik, file upload juga langsung terbuka
displayGambarProfile.addEventListener("click", () =>
inputGambarProfile.click()
);
}


let pilihanBg = document.getElementsByClassName('pilihan-background-profil');
let inputanBg = document.getElementById('background_profil');

if (pilihanBg) {
[...pilihanBg].forEach(element => element.addEventListener("click",updateBg))

function updateBg() {

inputanBg.value = this.children[0].innerHTML;

}
}

let btnHapus = document.getElementsByClassName('btn-hapus')
let FormDelete = document.getElementById('deleteForm')

if (btnHapus) {
    [...btnHapus].forEach(element => element.addEventListener("click",InputId) )
    function InputId() {
        let idHapus = this.getAttribute('data-id');
        FormDelete.setAttribute('action', 'users/' + idHapus);
    }
}

