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
let inputFile = id => {
    $('#' + id).change(e => {
        let str = e.target.files[0].name;
        let n;
        if (window.innerWidth < 425) {
            n = 25;
        }
        else if (window.innerWidth < 576) {
            n = 30;
        }
        else if (window.innerWidth < 992) {
            n = 40;
        }
        else if (window.innerWidth < 1200) {
            n = 60;
        }
        else {
            n = 80;
        }
        str = (str.length > n) ? str.substr(0, n-1) + '&hellip;' : str;
        $('span[for=' + id + ']')[0].innerHTML = str;
      
        window.addEventListener('resize', () => {
            let str = e.target.files[0].name;
            let n;
            if (window.innerWidth < 425) {
                n = 25;
            }
            else if (window.innerWidth < 576) {
                n = 30;
            }
            else if (window.innerWidth < 992) {
                n = 40;
            }
            else if (window.innerWidth < 1200) {
                n = 60;
            }
            else {
                n = 80;
            }
            str = (str.length > n) ? str.substr(0, n-1) + '&hellip;' : str;
            $('span[for=' + id + ']')[0].innerHTML = str;
        })
    })
};
//usage :: 
inputFile('upload-1') 

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

// MANIPULATE INPUT SELECT
let selectItem = $('.form-group--select'); //x
let selectLength = selectItem.length; //l

for (let i = 0; i < selectItem.length; i++) {
    let selectElement = selectItem[i].getElementsByTagName('select')[0];

    let newSelectedElm = document.createElement('div');
    newSelectedElm.setAttribute('class', 'form-group__selected');
    newSelectedElm.innerHTML = selectElement.options[selectElement.selectedIndex].innerHTML;
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
    }
  }
}

document.addEventListener('click', closeAllSelect);

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