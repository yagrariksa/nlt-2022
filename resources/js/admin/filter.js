$('button.adm-dashboard__btn-filter').click(e => {
    e.currentTarget.nextElementSibling.classList.add('active')
})

$('.button.adm-dashboard__dialog-filter--no').click(e => {
    e.currentTarget.parentElement.parentElement.classList.remove('active')
})
