let tempClone;
let temp;
$('.sponsors__logo-name').hover(e => {
    tempClone = e.currentTarget.cloneNode(true);
    temp = tempClone.lastElementChild.innerHTML;
    e.currentTarget.lastElementChild.innerHTML = 'Click for more!';
}, e => {
    e.currentTarget.lastElementChild.innerHTML = temp;
})

console.log('ok')
