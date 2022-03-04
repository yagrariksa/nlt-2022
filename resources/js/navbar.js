$(document).ready(function(){
    $(".nav__burger").click(e => {
        e.currentTarget.classList.toggle("active");
        e.currentTarget.parentNode.nextElementSibling.classList.toggle("active");
    });

    $(".nav__profile").click (e => {
        e.currentTarget.nextElementSibling.classList.toggle("active");
    })
});

window.addEventListener('click', e => {
    if ($('.nav__dropdown')[0].classList.contains('active') && e.target.className != 'nav__profile') {
        $('.nav__dropdown')[0].classList.remove('active')
    }
});

if (window.location.search == '?mode=list&object=peserta') {
    $('#nav__item--peserta')[0].classList.add('active')
    $('#nav__item--souvenir')[0].classList.remove('active')
    $('#nav__item--password')[0].classList.remove('active')
}
else if (window.location.pathname == '/souvenir' && window.location.search == '?mode=list') {
    $('#nav__item--peserta')[0].classList.remove('active')
    $('#nav__item--souvenir')[0].classList.add('active')
    $('#nav__item--password')[0].classList.remove('active')
}
else if (window.location.pathname == '/setting') {
    $('#nav__item--peserta')[0].classList.remove('active')
    $('#nav__item--souvenir')[0].classList.remove('active')
    $('#nav__item--password')[0].classList.add('active')
}
else if (window.location.search == '?object=peserta') {
    $('#nav__item--a-peserta')[0].classList.add('active')
    $('#nav__item--a-souvenir')[0].classList.remove('active')
    $('#nav__item--a-absensi')[0].classList.remove('active')
}
