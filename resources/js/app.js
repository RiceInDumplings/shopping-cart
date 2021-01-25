require('./bootstrap');

document.getElementById('addBtn').addEventListener("click", add);
document.getElementById('minusBtn').addEventListener("click", minus);
document.getElementById('spinner').addEventListener("input", inputQuantity);

//reduce how many quantity
function add() {
    var quantity = parseInt(document.getElementById('quantity').value); // 3
    var spinner = parseInt(document.getElementById('spinner').value); // 3
    if (spinner < quantity) {
        document.getElementById('spinner').value++;
    }
}

// add how many quantity
function minus() {
    var spinner = parseInt(document.getElementById('spinner').value);
    if (spinner > 1) {
        document.getElementById('spinner').value--
    }
}

// if user inputs more than the quantity
//  or less than 1
function inputQuantity() {
    var spinner = parseInt(document.getElementById('spinner').value);
    var quantity = parseInt(document.getElementById('quantity').value);

    if (spinner > quantity)
        document.getElementById('spinner').value = quantity;
    else if (spinner < 1)
        document.getElementById('spinner').value = 1;
}