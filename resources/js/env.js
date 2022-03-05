const { values } = require("lodash");

// CHANGE COLOR BUTTON IMAGE ON CLICK
$('.btn-img').click(e => {
    // e.target.setAttribute("fill", "#AE2012")
})

// CHANGE COLOR BUTTON IMAGE ON HOVER
$('.btn-img').mouseover(e => {
    let paths = e.currentTarget.getElementsByTagName('path');
    for (let i = 0; i < paths.length; i++) {
        console.log(paths[i].attributes.fill.value);
        if (paths[i].attributes.fill.value == "#001219") {
            paths[i].setAttribute("fill", "#E3CE8F")
        }
    }
});
$('.btn-img').mouseout(e => {
    let paths = e.currentTarget.getElementsByTagName('path');
    for (let i = 0; i < paths.length; i++) {
        if (paths[i].attributes.fill.value == "#E3CE8F") {
            paths[i].setAttribute("fill", "#001219")
        }
    }
});

// MANIPULATE INPUT FILE
    $('input[type="file"]').change(e => {
        let id = e.target.id;
        let str = e.target.files[0].name;
        let n;
        if (window.innerWidth < 425) {
            n = 16;
        }
        else if (window.innerWidth < 576) {
            n = 20;
        }
        else if (window.innerWidth < 992) {
            n = 40;
        }
        else if (window.innerWidth < 1200) {
            n = 20;
        }
        else {
            n = 30;
        }
        str = (str.length > n) ? str.substr(0, n-1) + '&hellip;' : str;
        $('span[for=' + id + ']')[0].innerHTML = str;
      
        window.addEventListener('resize', () => {
            let str = e.target.files[0].name;
            let n;
            if (window.innerWidth < 425) {
                n = 16;
            }
            else if (window.innerWidth < 576) {
                n = 20;
            }
            else if (window.innerWidth < 992) {
                n = 40;
            }
            else if (window.innerWidth < 1200) {
                n = 20;
            }
            else {
                n = 30;
            }
            str = (str.length > n) ? str.substr(0, n-1) + '&hellip;' : str;
            $('span[for=' + id + ']')[0].innerHTML = str;
        })
    })

// CHANGE INPUT FILE BUTTON IN WIDTH < 768PX
window.addEventListener('resize', ()=> {
    if(window.innerWidth < 768) {
        $('.form-group__input-file .button .lg')[0].style.display = 'none';
        $('.form-group__input-file .button .sm')[0].style.display = 'unset';
    }
    else {
        $('.form-group__input-file .button .lg')[0].style.display = 'unset';
        $('.form-group__input-file .button .sm')[0].style.display = 'none';

    }
})

// MANIPULATE INPUT SELECT -> STYLE
let selectItem = $('.form-group--select'); //x
let selectLength = selectItem.length; //l

for (let i = 0; i < selectItem.length; i++) {
    let selectElement = selectItem[i].getElementsByTagName('select')[0];

    let newSelectedElm = document.createElement('input');
    newSelectedElm.setAttribute('class', 'form-group__selected');
    newSelectedElm.placeholder = selectElement.options[selectElement.selectedIndex].innerHTML;
    selectItem[i].prepend(newSelectedElm);

    let newOptionContainerElm = document.createElement('div');
    newOptionContainerElm.setAttribute('class', 'form-group__select-items form-group__select-hide');

    for (let j = 1; j < selectElement.length; j++) {
        let newOptionElm = document.createElement('div');
        newOptionElm.innerHTML = selectElement.options[j].innerHTML;
        newOptionElm.addEventListener('click', function() {
            let y, i, k, s, h, sl, yl;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            sl = s.length;
            h = this.parentNode.nextSibling;
            for (i = 0; i < sl; i++) {
              if (s.options[i].innerHTML == this.innerHTML) {
                s.selectedIndex = i;
                h.innerHTML = this.innerHTML;
                y = this.parentNode.getElementsByClassName("form-group__same-as-selected");
                yl = y.length;
                for (k = 0; k < yl; k++) {
                  y[k].removeAttribute("class");
                }
                this.setAttribute("class", "form-group__same-as-selected");
                break;
              }
            }
            h.click();
        })
        newOptionContainerElm.appendChild(newOptionElm);
    }
    selectItem[i].prepend(newOptionContainerElm);
    newSelectedElm.addEventListener('click', function(e) {
        e.stopPropagation();
        closeAllSelect(this);
        this.previousSibling.classList.toggle('form-group__select-hide');
        this.classList.toggle('form-group__select-arrow-active');
    });
    $('.form-group__selected').keypress(function(e) {
        e.stopPropagation();
        closeAllSelect(this);
        this.previousSibling.classList.toggle('form-group__select-hide');
        this.classList.toggle('form-group__select-arrow-active');
    });
}

function closeAllSelect(elm) {
  let x, y, i, arrNo = [];
  x = document.getElementsByClassName("form-group__select-items");
  y = document.getElementsByClassName("form-group__selected");
  for (i = 0; i < y.length; i++) {
    if (elm == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("form-group__select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("form-group__select-hide");
      x[i].childNodes.forEach(x => {
          x.style.display = 'block';
      })
    }
  }
}

document.addEventListener('click', closeAllSelect);

// MANIPULATE INPUT SELECT -> SEARCHABLE
$('.form-group__select-items').click(e => {
    e.target.parentElement.nextSibling.value = e.target.parentElement.nextSibling.textContent;
})

$('.form-group__selected').on('input', e => {
    let options = [];
    let optionsParent = e.target.previousSibling;
    optionsParent.childNodes.forEach(x => {
        options.push(x.childNodes[0].data)
    })

    let regex = new RegExp(e.target.value, 'i');
    regex.ignoreCase;
    options.map((option, index) => {
        if(!regex.test(option)) {
            optionsParent.childNodes[index].style.display = 'none';
        }
        else {
            optionsParent.childNodes[index].style.display = 'block';
        }
    })
})
//get value -> $('.form-group__select-items .form-group__same-as-selected')[0].innerText

// CHANGE COLOR INPUT RADIO/CHECKBOX
let inputWillCHangeLabel = $('input[type="radio"], input[type="checkbox"]');
let checkChange = () => {
    inputWillCHangeLabel.map(i => {
        if (inputWillCHangeLabel[i].checked) {
            inputWillCHangeLabel[i].parentElement.style.color = "#001219"
        }
        else {
            inputWillCHangeLabel[i].parentElement.style.color = "#B3B8BA"
        }
    });
}

checkChange();
inputWillCHangeLabel.click(e => {
checkChange();
});

// TOGGLE VIEW INPUT PASSWORD 
$('.form-group__see-password').click(e => {
    let elm = e.currentTarget.previousElementSibling;
    if (elm.type == "password") {
        elm.type = "text";
        e.currentTarget.classList.add('unsee');
    } else {
        elm.type = "password";
        e.currentTarget.classList.remove('unsee');
    }
})

// ALL INPUT WHEN HAVE VALUE(s)
$('input, textarea').change(e => {
    if (e.target.value != ""){
        e.target.classList.add('has-value')
    }
    else {
        e.target.classList.remove('has-value')
    }
})

$('.form-group__selected').click(e => {
    if (e.target.childNodes[0] != ""){
        e.target.classList.add('has-value')
    }
    else {
        e.target.classList.remove('has-value')
    }
})

$('input[type="file"]').change(e => {
    if (e.target.value != ""){
        e.target.nextElementSibling.classList.add('file-notnull')
    }
})

$('.form-group--select.readonly input').map(x => {
    $('.form-group--select.readonly input.form-group__selected')[x].classList.add('has-value');
    $('.form-group--select.readonly input.form-group__selected')[x].value = $('.form-group--select.readonly select')[x].value
    $('.form-group--select.readonly input.form-group__selected')[x].setAttribute('readonly', true);
})

$('.form-group input[readonly]').map(x => {
    $('.form-group input[readonly]')[x].classList.add('has-value')
})

$('.form-group input').map(x => {
    if ($('.form-group input')[x].value != '') {
        $('.form-group input')[x].classList.add('has-value');
    }
})

$('.form-group__input-file .form-group__filename').map(x => {
    if ($('.form-group__input-file .form-group__filename')[x].innerHTML != '') {
        $('.form-group__input-file .form-group__filename')[x].parentElement.nextElementSibling.classList.add('has-value');
    }
})