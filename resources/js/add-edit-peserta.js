$('.add-edit-peserta__buttons a').click(e => {
    e.preventDefault()
    $('.add-edit-peserta__dialog')[0].classList.add('active')
})

$('.add-edit-peserta__batal').click(() => {
    $('.add-edit-peserta__dialog')[0].classList.remove('active')
})