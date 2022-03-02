// // SORTING DI LIST PESERTA
// const List = require("list.js");

let userList = new List('d-list-peserta', {
    valueNames: ['list-peserta__nama', 'list-peserta__jabatan']
})

// DIALOG DELETE
$('button.list-peserta__btn--delete').click(e => {
    e.currentTarget.nextElementSibling.classList.add('active')
})

$('button.card__btn--delete').click(e => {
    e.currentTarget.nextElementSibling.classList.add('active')
})

$('.button.list-peserta__batal').click(e => {
    e.currentTarget.parentElement.parentElement.classList.remove('active')
})
