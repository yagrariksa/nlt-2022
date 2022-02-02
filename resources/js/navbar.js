$(document).ready(function(){
    $(".nav__burger").click(e => {
        e.currentTarget.classList.toggle("active");
        e.currentTarget.parentNode.nextElementSibling.classList.toggle("active");
    });

    $(".nav__profile").click (e => {
        e.currentTarget.nextElementSibling.classList.toggle("active");
    })
});

$('.nav__item').click(e => {
    console.log(e.currentTarget.id)
})

if (window.location.search == '?mode=list&object=peserta') {
    $('#nav__item--peserta')[0].classList.add('active')
    $('#nav__item--travel')[0].classList.remove('active')
    $('#nav__item--souvenir')[0].classList.remove('active')
    $('#nav__item--password')[0].classList.remove('active')
}
else if (window.location.search == '?mode=list&object=travel') {
    $('#nav__item--peserta')[0].classList.remove('active')
    $('#nav__item--travel')[0].classList.add('active')
    $('#nav__item--souvenir')[0].classList.remove('active')
    $('#nav__item--password')[0].classList.remove('active')
}
else if (window.location.search == '?mode=list&object=souvenir') {
    $('#nav__item--peserta')[0].classList.remove('active')
    $('#nav__item--travel')[0].classList.remove('active')
    $('#nav__item--souvenir')[0].classList.add('active')
    $('#nav__item--password')[0].classList.remove('active')
}
else if (window.location.pathname == '/setting') {
    $('#nav__item--peserta')[0].classList.remove('active')
    $('#nav__item--travel')[0].classList.remove('active')
    $('#nav__item--souvenir')[0].classList.remove('active')
    $('#nav__item--password')[0].classList.add('active')
}

console.log()