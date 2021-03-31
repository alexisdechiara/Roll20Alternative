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
