$(document).ready(function () {
    $(".nav__burger").click(e => {
        e.currentTarget.classList.toggle("active");
        e.currentTarget.nextElementSibling.classList.toggle("active");
    });

    $(".nav__profile").click(e => {
        e.currentTarget.nextElementSibling.classList.toggle("active");
    })
});

window.addEventListener('click', e => {
    if ($('.nav__dropdown')[0].classList.contains('active') && e.target.className != 'nav__profile') {
        $('.nav__dropdown')[0].classList.remove('active')
    }
});

$('.nav__right .nav__item').click(e => {
    $('.nav__right .nav__item').map(x => {
        $('.nav__right .nav__item')[x].classList.remove('active')
    })
    e.target.classList.add('active')
})

$('.nav__mobile-item .nav__item--sm').click(e => {
    $('.nav__mobile-item .nav__item--sm').map(x => {
        $('.nav__mobile-item .nav__item--sm')[x].classList.remove('active')
    })
    e.target.parentNode.classList.add('active')
    $('.nav__burger')[0].classList.remove('active')
    $('.nav__mobile-item')[0].classList.remove('active')
})

if (window.location.search == '?mode=list&object=peserta') {
    $('#nav__item--peserta')[0].classList.add('active')
    $('#nav__item--souvenir')[0].classList.remove('active')
    $('#nav__item--absensi')[0].classList.remove('active')
    $('#nav__item--password')[0].classList.remove('active')
    $('#nav__item--peserta-sm')[0].classList.add('active')
    $('#nav__item--souvenir-sm')[0].classList.remove('active')
    $('#nav__item--absensi-sm')[0].classList.remove('active')
    $('#nav__item--password-sm')[0].classList.remove('active')
} else if (window.location.pathname == '/souvenir' && window.location.search == '?mode=list') {
    $('#nav__item--peserta')[0].classList.remove('active')
    $('#nav__item--souvenir')[0].classList.add('active')
    $('#nav__item--absensi')[0].classList.remove('active')
    $('#nav__item--password')[0].classList.remove('active')
    $('#nav__item--peserta-sm')[0].classList.remove('active')
    $('#nav__item--souvenir-sm')[0].classList.add('active')
    $('#nav__item--absensi-sm')[0].classList.remove('active')
    $('#nav__item--password-sm')[0].classList.remove('active')
} else if (window.location.pathname == '/absensi') {
    $('#nav__item--peserta')[0].classList.remove('active')
    $('#nav__item--souvenir')[0].classList.remove('active')
    $('#nav__item--absensi')[0].classList.add('active')
    $('#nav__item--password')[0].classList.remove('active')
    $('#nav__item--peserta-sm')[0].classList.remove('active')
    $('#nav__item--souvenir-sm')[0].classList.remove('active')
    $('#nav__item--absensi-sm')[0].classList.add('active')
    $('#nav__item--password-sm')[0].classList.remove('active')
} else if (window.location.pathname == '/setting') {
    $('#nav__item--peserta')[0].classList.remove('active')
    $('#nav__item--souvenir')[0].classList.remove('active')
    $('#nav__item--absensi')[0].classList.remove('active')
    $('#nav__item--password')[0].classList.add('active')
    $('#nav__item--peserta-sm')[0].classList.remove('active')
    $('#nav__item--souvenir-sm')[0].classList.remove('active')
    $('#nav__item--absensi-sm')[0].classList.remove('active')
    $('#nav__item--password-sm')[0].classList.add('active')
} else if (window.location.pathname == '/mahavira/peserta' && window.location.search.includes('?object=peserta')) {
    $('#nav__item--a-peserta')[0].classList.add('active')
    $('#nav__item--a-souvenir')[0].classList.remove('active')
    $('#nav__item--a-absensi')[0].classList.remove('active')
    $('#nav__item--a-univ')[0].classList.remove('active')
    $('#nav__item--a-peserta-sm')[0].classList.add('active')
    $('#nav__item--a-souvenir-sm')[0].classList.remove('active')
    $('#nav__item--a-absensi-sm')[0].classList.remove('active')
    $('#nav__item--a-univ-sm')[0].classList.remove('active')
} else if (window.location.pathname == '/mahavira/peserta' && window.location.search.includes('?univ=list')) {
    $('#nav__item--a-peserta')[0].classList.remove('active')
    $('#nav__item--a-souvenir')[0].classList.remove('active')
    $('#nav__item--a-absensi')[0].classList.remove('active')
    $('#nav__item--a-univ')[0].classList.add('active')
    $('#nav__item--a-peserta-sm')[0].classList.remove('active')
    $('#nav__item--a-souvenir-sm')[0].classList.remove('active')
    $('#nav__item--a-absensi-sm')[0].classList.remove('active')
    $('#nav__item--a-univ-sm')[0].classList.add('active')
} else if (window.location.pathname == '/mahavira/souvenir' && (window.location.search == '?mode=list&object=barang' || window.location.search.includes('?mode=add') ||window.location.search.includes('?mode=edit'))) {
    $('#nav__item--a-peserta')[0].classList.remove('active')
    $('#nav__item--a-souvenir')[0].classList.add('active')
    $('#nav__item--a-absensi')[0].classList.remove('active')
    $('#nav__item--a-univ')[0].classList.remove('active')
    $('#nav__item--a-peserta-sm')[0].classList.remove('active')
    $('#nav__item--a-souvenir-sm')[0].classList.add('active')
    $('#nav__item--a-absensi-sm')[0].classList.remove('active')
    $('#nav__item--a-univ-sm')[0].classList.remove('active')
}
// cek client
