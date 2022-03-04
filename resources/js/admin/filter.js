// global var
var ascending = true
var columnSort = 'univ'

// clone tbody Node
let asli = $('#tableAdmDashboard tbody')[0].cloneNode(true);

// select tr
asli = asli.querySelectorAll('tr')

// nodelist to array
asli = Array.from(asli)
let manipulate = Array.from(asli)

// function listener
const doSort = () => {

    ascending = $('#radio-ascending')[0].checked ? true : false
    columnSort = $('#select-column-sorter')[0].value

    console.log(columnSort)
    if (columnSort == 'univ') {
        sortByName()
    }

    if (columnSort == 'jml') {
        sortByJml()
    }

}

// replace data
const tbody = document.querySelector('#tableAdmDashboard tbody')
const replaceTbody = (data) => {
    console.log(tbody)
    console.log(data)
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
const sortByName = () => {
    console.log('here univ')

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
    replaceTbody(manipulate)
}
const sortByJml = () => {
    manipulate.sort(function (a, b) {
        var aa = a.querySelector('.adm-table__peserta')
        var bb = b.querySelector('.adm-table__peserta')

        return parseInt(aa.innerHTML) - parseInt(bb.innerHTML)
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
    console.log(e.currentTarget.value)
    doSearch(e.currentTarget.value)
})
