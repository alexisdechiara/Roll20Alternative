let sliders = document.querySelectorAll('input[type="range"]');
let vals = document.querySelectorAll('input[inputmode="numeric"]')

for (let i = 0; i < sliders.length; i++) {
    sliders[i].setAttribute('min','0');
    sliders[i].setAttribute('max','100');

    sliders[i].onchange = function (event){
        vals[i].value = sliders[i].value;
        console.log('slider'+i);
    }
    vals[i].onchange = function (event){
        sliders[i].value = vals[i].value;
        console.log('value'+i);
    }
}

let listdivs = document.getElementsByClassName('container text-center');
for (let i = 1; i < listdivs.length; i++) {
    let button = listdivs[i].getElementsByClassName('btn btn-primary')[0];
    button.onclick = function(event){
        let newdiv = listdivs[i].getElementsByTagName('div')[0].cloneNode(true);
        console.log(listdivs[i].childElementCount);
        for (let j = 0; j < newdiv.childElementCount; j++) {
            newdiv.children[j].children[0].children[1].value = "";
        }
        $(newdiv).insertBefore(button);
        if (listdivs[i].childElementCount >= 5) {
            listdivs[i].lastElementChild.disabled = false;
        }
        else {
            listdivs[i].lastElementChild.disabled = true;
        }
    }
    let button2 = listdivs[i].getElementsByClassName('btn btn-danger')[0];
    button2.onclick = function(event) {
        listdivs[i].removeChild(listdivs[i].children[listdivs[i].childElementCount - 3]);
        if (listdivs[i].childElementCount >= 5) {
            listdivs[i].lastElementChild.disabled = false;
        }
        else {
            listdivs[i].lastElementChild.disabled = true;
        }
    }
}

let resetButton = document.getElementById("reset");
resetButton.onclick = function(event) {
    for (let i = 1; i < listdivs.length; i++) {
        listdivs[i].lastElementChild.disabled = true;
        while (listdivs[i].childElementCount >= 5) {
            listdivs[i].removeChild(listdivs[i].children[listdivs[i].childElementCount - 3]);
        }
    }
}

String.prototype.replaceAt=function(index, char) {
    var a = this.split("");
    a[index] = char;
    return a.join("");
}
