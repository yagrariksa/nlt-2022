$('.dialog__bg').click(() => {
    $('.dialog').map(x => {
        if ($('.dialog')[x].classList.contains('active')) {
            $('.dialog')[x].classList.remove('active')
        }
    })
})