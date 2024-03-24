function enterTime(timer) {
    var times = document.getElementById("times");
    var row = times.insertRow(1);
    var cell1 = row.insertCell();
    cell1.textContent = "0";

    var cell2 = row.insertCell();
    cell2.textContent = "N/A";

    var cell3 = row.insertCell();
    cell3.textContent = "N/A";
}