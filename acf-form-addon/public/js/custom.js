var className = ['input-text', 'text-email', 'text-phone'];
for (let j = 0; j < className.length; j++) {
    document.querySelector('.' + className[j] + ' input').value = ''
}
function select_() {
    var div = document.querySelector('.temp')
    div.innerHTML += ('<div class="acf-field"><div class="acf-input"><div class="acf-input-wrap"><input type="text"  name="option[]" placeholder="Enter Name"><input type="text" name="value[]" placeholder="Enter Value"></div> </div> <button onclick = "add_select_fun()" class="add-select btn btn-primary mx-1 mt-2">+</button><button data-toggle="modal" data-target="#select_" class="confirm btn btn-success mt-2">Confirm</button></div>');
}

function insert_cat(e) {
    const type = e.srcElement.innerText
    document.getElementById('check_option').value = type;
}

function sumbit_form() {
    document.querySelector('.acf-form-submit-btn img').classList.remove('d-none')
    let b = {
        h: [],
        v: [],
        d: []
    }
    var className = ['input-text', 'text-email', 'text-phone'];
    for (let j = 0; j < className.length; j++) {
        b.d.push(document.querySelector('.' + className[j] + ' input').value);
    }

    var divElem = document.querySelectorAll(".data .acf-field");
    for (let i = 0; i < divElem.length; i++) {
        b.h.push(divElem[i].querySelector('label').innerText);
        b.v.push(divElem[i].querySelector('.acf-input-wrap').children[0].value);
    }
    var requestOptions = {
        method: 'POST',
        body: JSON.stringify(b),
    };
    fetch("https://script.google.com/macros/s/AKfycbwAwfXbwOHIH7v_KBp2rAfGmiQfUvggN9yBoUnA4B0P8dW08ED260dYslv7z9dYvagMsw/exec?action=addUser", requestOptions)
        .then(response => alert("Data successfully submitted."))
        .catch(error => console.error('Error!', error.message))
    location.reload()
}

function add_select_fun() {
    document.querySelector('.temp .acf-input').insertAdjacentHTML('beforeend', '<div class="acf-input-wrap"><input type="text"  name="option[]" placeholder="Enter Name"><input type="text" name="value[]" placeholder="Enter Value"></div>');
}

function confirm_select() {
    var div = document.querySelector('.data')
    var divElem = document.getElementsByClassName("temp");
    var inputElements = divElem[0].querySelectorAll("input");
    var d = {
        key: [],
        value: []
    }
    for (let i = 0; i < inputElements.length; i++) {
        if (i % 2 != 0) {
            d.key.push(inputElements[i].value);
        } else {
            d.value.push(inputElements[i].value);
        }
    }
    const val = document.getElementById("label_").value
    document.querySelector('.temp').innerHTML = '';
    var options_str = "";
    d.key.forEach(function (car, i) {
        options_str += '<option value="' + d.key[i] + '">' + d.value[i] + '</option>';
    });
    div.insertAdjacentHTML('beforeend', '<div class="acf-field"><div class="acf-label"><label>' + val + '</label></div><div class="acf-input"><div class="acf-input-wrap"><select>' + options_str + '</select></div></div></div>');
    document.getElementById('label').value = '';
    document.getElementById('check_option').value = '';
    document.getElementsByClassName('close')[1].click();
}
(() => {
    const init_ = (e) => {
        const type = document.getElementById("check_option").value
        const val = document.getElementById("label").value
        var div = document.querySelector('.data')
        if (type == 'Single Line') {
            div.insertAdjacentHTML('beforeend', '<div class="acf-field"><div class="acf-label"><label>' + val + '</label></div><div class="acf-input"><div class="acf-input-wrap"><input type="text" placeholder="' + val + '"></div></div></div>')
        } else if (type == 'Multi Line') {
            div.insertAdjacentHTML('beforeend', '<div class="acf-field"><div class="acf-label"><label>' + val + '</label></div><div class="acf-input"><div class="acf-input-wrap"><textarea rows=5></textarea></div></div></div>')
        }
        document.getElementById('label').value = '';
        document.getElementById('check_option').value = '';
        document.getElementsByClassName('close')[0].click();
    }

    document.getElementById("sub").addEventListener("click", init_);
    const dropdown = document.getElementsByClassName("dropdown-item");
    if (dropdown != undefined) {
        for (let i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", insert_cat);
        }
    }
})();