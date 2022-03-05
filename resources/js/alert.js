$('.alert__close').click(e => {
    e.target.parentElement.style.visibility = 'hidden';
    e.target.parentElement.style.transform = 'translate(-50%, -50%)';
    e.target.parentElement.style.opacity = 0;
})