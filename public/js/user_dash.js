var page = "";

var search = "";
var divs = document.getElementsByClassName('user');
var record_number = 0;
var divCon = document.getElementById('pag');
var page_no = 0;


function pages(nr) {
    page_no = nr;
    if (nr < 1)
        pages(1);
    else if (nr * record_number > divs.length)
        pages(page_no);
    else
        for (i = 0; i < divs.length; i++) {
            if (i < nr * record_number && i > ((nr - 1) * record_number) - 1) { divs[i].style.display = 'block'; } else
                divs[i].style.display = 'none';
        }
}

function hide(nr) {
    record_number = nr;
    page_no = 1;
    paginate(divs.length / nr);
    pages(1);
}

function paginate(nr) {
    divCon.innerHTML = `<button type="button" onclick='previous()' class="btn btn-secondary">Previous</button>
      <button type="button" onclick='next()' class="btn btn-secondary">Next</button>`;
    for (i = 0; i < nr; i++) {
        divCon.innerHTML += `<button type="button" onclick="pages(` + (i + 1) + `)" class="btn btn-secondary">` + (i + 1) + `</button>`;
    }
}

function next() {
    pages(page_no + 1);
}

function previous() {
    pages(page_no - 1);
}
hide(5);