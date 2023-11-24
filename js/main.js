function clickMenu() {
    var mvertical = document.getElementById('mvertical');
    if (mvertical.style.display == 'block') {
        mvertical.style.display = 'none';
    } else {
        mvertical.style.display = 'block';
    }
}

function redirectToPage(select) {
    var selectedValue = select.value;
    if (selectedValue === "calcados") {
        window.location.href = "modelo.php";
    } else if (selectedValue === "especial") {
        window.location.href = "especiais.php";
    }
}