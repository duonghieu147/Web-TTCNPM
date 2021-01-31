





$("#deviceManager").addClass("active");
$(".pagination li:nth-child(1)").addClass("active");
var pages = 1;


function getPage(index) {
    pages = index;
    $(`.pagination li`).removeClass("active");
    $(`.pagination li:nth-child(${pages})`).addClass("active");
    getListDevice()
}



function searchOnClick() {
    pages = 1;
    getListDevice();
}

function getListDevice() {


    // var orderBy = document.getElementById("orderby").value;
    // var descending = document.getElementById("descending").value;
    var searchField = document.getElementById("search-field").value;
    var keyword = document.getElementById("keyword").value;
    var min = document.getElementById("min").value;
    var max = document.getElementById("max").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("list").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", `index.php?controller=devices&action=deviceList&page=${pages}&keyword=${keyword}&searchField=${searchField}&min=${min}&max=${max}`, true);
    xmlhttp.send();
}


// function goToPageInput() {
//     pages = $("#pages").val();
//     if (pages <= 0) {
//         pages = 1;
//         getListDevice();
//     }
//     else {
//         getListDevice();
//     }

// }
function goToPage(index) {
    if (index <= 0) {
        index = 1;
    }
    else {
        pages = index;
        $("#pages").val(pages);
    }
    getListDevice();
}







getListDevice();



