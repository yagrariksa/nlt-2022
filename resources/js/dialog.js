$('.dialog__bg').click(() => {
    $('.dialog').map(x => {
        if ($('.dialog')[x].classList.contains('active')) {
            $('.dialog')[x].classList.remove('active')
        }
    })
})

$('.detail-keranjang-card__bg').click(() => {
    $('.detail-keranjang-card').map(x => {
        if ($('.detail-keranjang-card')[x].classList.contains('active')) {
            $('.detail-keranjang-card')[x].classList.remove('active')
        }
    })
})

$('.detail-keranjang-card__bg--invoice').click(() => {
    $('.detail-keranjang-card__invoice').map(x => {
        if ($('.detail-keranjang-card__invoice')[x].classList.contains('active')) {
            $('.detail-keranjang-card__invoice')[x].classList.remove('active')
        }
    })
})