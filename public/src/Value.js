function amountUp() {
    let value = document.getElementById("amount").value;
    value = parseInt(value);
    value += 1;

    document.getElementById("amount").value = value;
}

function amountDown() {
    let value = document.getElementById("amount").value;
    value = parseInt(value);
    if (value <= 0) {
        alert('Je kan niet lager dan 0!');
        return
    }
    value -= 1;

    document.getElementById("amount").value = value;
}

function amountUpC() {
    let value = document.getElementById("week").value;
    value = parseInt(value);
    value += 1;

    document.getElementById("week").value = value;
    document.getElementById("myPost").submit();

}

function amountDownC() {
    let value = document.getElementById("week").value;
    value = parseInt(value);
    if (value <= 0) {
        alert('Je kan niet lager dan 0!');
        return
    }
    value -= 1;

    document.getElementById("week").value = value;
    document.getElementById("myPost").submit();
}

function submit(id) {
    document.getElementById(id).submit();

}