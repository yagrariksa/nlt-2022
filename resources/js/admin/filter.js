// global var
var ascending = true
var columnSort = 'univ'

let asli = null
let tbody = null
// clone tbody Node
if (window.location.search == '?univ=list') {
    asli = $('#tableAdmDashboard tbody')[0].cloneNode(true);
    tbody = document.querySelector('#tableAdmDashboard tbody')
} else if (window.location.search == '?object=peserta') {
    asli = $('#tableAdmListPesertaAll tbody')[0].cloneNode(true);
    tbody = document.querySelector('#tableAdmListPesertaAll tbody')
}else if (window.location.search == '?object=peserta&mode=tampilan%20penuh'){
    asli = $('#tableAdmListPesertaAllFull tbody')[0].cloneNode(true);
    tbody = document.querySelector('#tableAdmListPesertaAllFull tbody')
}

// select tr
asli = asli.querySelectorAll('tr')

// nodelist to array
asli = Array.from(asli)
let manipulate = Array.from(asli)

// function listener
const doSort = () => {

    ascending = $('#select-column-sorter-ascending')[0].value == 'A-Z' ? true : false
    columnSort = $('#select-column-sorter-column')[0].value

    console.log(ascending)
    console.log(columnSort)
    
    switch (columnSort) {
        case 'Nama Universitas':
            sortByUniv()
            break;

        case 'Jumlah Peserta':
            sortByJml()
            break;

        case 'Nama':
            sortByName()
            break;

        case 'Asal Universitas':
            sortByUnivPAll()
            break;

        case 'Jabatan':
            sortByJabatan()
            break;

        default:
            alert('default')
            break;
    }
}

// replace data
const replaceTbody = (data) => {
    tbody.innerHTML = ''
    if (ascending) {
        data.forEach(e => {
            tbody.appendChild(e)
        })
    } else {
        for (var i = data.length - 1; i >= 0; i--) {
            data[i].classList.add(`bruh-${i}`)
            tbody.appendChild(data[i])
        }
    }

}
const resetSort = () => {
    tbody.innerHTML = ''
    asli.forEach(e => {
        tbody.appendChild(e)
    })
}


// sort
const sortByUniv = () => {
    manipulate.sort(function (a, b) {
        var aa = a.querySelector('.adm-table__univ')
        var bb = b.querySelector('.adm-table__univ')
        console.log('sort by univ')

        if (aa.innerHTML < bb.innerHTML) {
            return -1
        }
        if (aa.innerHTML > bb.innerHTML) {
            return 1
        }
        return 0
    })
    replaceTbody(manipulate, 'tableAdmDashboard')
}
const sortByJml = () => {
    manipulate.sort(function (a, b) {
        var aa = a.querySelector('.adm-table__peserta')
        var bb = b.querySelector('.adm-table__peserta')

        return parseInt(aa.innerHTML) - parseInt(bb.innerHTML)
    })
    replaceTbody(manipulate, 'tableAdmDashboard')
}
const sortByName = () => {
    manipulate.sort(function (a, b) {
        var aa = a.querySelector('.adm-table__nama')
        var bb = b.querySelector('.adm-table__nama')

        if (aa.innerHTML < bb.innerHTML) {
            return -1
        }
        if (aa.innerHTML > bb.innerHTML) {
            return 1
        }
        return 0
    })
    replaceTbody(manipulate, 'tableAdmListPesertaAll')
}
const sortByUnivPAll = () => {
    manipulate.sort(function (a, b) {
        var aa = a.querySelector('.adm-table__univ')
        var bb = b.querySelector('.adm-table__univ')

        if (aa.innerHTML < bb.innerHTML) {
            return -1
        }
        if (aa.innerHTML > bb.innerHTML) {
            return 1
        }
        return 0
    })
    replaceTbody(manipulate, 'tableAdmListPesertaAll')
}
const sortByJabatan = () => {
    manipulate.sort(function (a, b) {
        var aa = a.querySelector('.adm-table__jabatan')
        var bb = b.querySelector('.adm-table__jabatan')

        if (aa.innerHTML < bb.innerHTML) {
            return -1
        }
        if (aa.innerHTML > bb.innerHTML) {
            return 1
        }
        return 0
    })
    replaceTbody(manipulate, 'tableAdmListPesertaAll')
}

const sortByPesertaName = () => {

    manipulate.sort(function (a, b) {
        var aa = a.querySelector('.adm-table__nama')
        var bb = b.querySelector('.adm-table__nama')

        if (aa.innerHTML < bb.innerHTML) {
            return -1
        }
        if (aa.innerHTML > bb.innerHTML) {
            return 1
        }
        return 0
    })
    replaceTbody(manipulate)
}

const sortByPesertaUniv = () => {

    manipulate.sort(function (a, b) {
        var aa = a.querySelector('.adm-table__univ')
        var bb = b.querySelector('.adm-table__univ')

        if (aa.innerHTML < bb.innerHTML) {
            return -1
        }
        if (aa.innerHTML > bb.innerHTML) {
            return 1
        }
        return 0
    })
    replaceTbody(manipulate)
}

const sortByPesertaJabatan = () => {

    manipulate.sort(function (a, b) {
        var aa = a.querySelector('.adm-table__jabatan')
        var bb = b.querySelector('.adm-table__jabatan')

        if (aa.innerHTML < bb.innerHTML) {
            return -1
        }
        if (aa.innerHTML > bb.innerHTML) {
            return 1
        }
        return 0
    })
    replaceTbody(manipulate)
}


const doSearch = (value) => {
    var data = tbody.querySelectorAll('tr')
    data.forEach(e => {
        e.style.display = 'none'
    });
    if (value == null) {
        data.forEach(e => {
            e.style.display = 'table-row'
        })
    } else {
        data.forEach(e => {
            if (e.innerText.toLowerCase().includes(value.toLowerCase())) {
                e.style.display = 'table-row'
            }
        })
    }
}

$('button.adm-dashboard__btn-filter').click(e => {
    console.log('ok')
    e.currentTarget.nextElementSibling.classList.add('active')
})

$('.button.adm-dashboard__dialog-filter--no').click(e => {
    e.currentTarget.parentElement.parentElement.classList.remove('active')
    resetSort()
})

$('.button.adm-dashboard__dialog-filter--yes').click(e => {
    e.currentTarget.parentElement.parentElement.classList.remove('active')
    doSort()
})

$('input#filter-search').on('input', e => {
    // console.log(e.currentTarget.value)
    // console.log(e.currentTarget.attributes['aria-idtable'].value)
    doSearch(e.currentTarget.value)
})
