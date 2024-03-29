


// Initialize room counts and total amounts for each column


// Function to update a specific column
function updateColumn(columnIndex) {
    const roomCountElement = roomCountElements[columnIndex - 1];
    const totalAmountElement = totalAmountElements[columnIndex - 1];
    roomCountElement.textContent = roomCounts[columnIndex - 1];
    totalAmountElement.textContent = "N" + totalAmounts[columnIndex - 1];
}





let totalPrice = 25000;

function updateTotal() {
    document.getElementById("totalPrice").textContent = "N" * totalPrice;
}

function decreaseTotal() {
    totalPrice -= 1;
    updateTotal();
}

function increaseTotal() {
    totalPrice += 1;
    updateTotal();
}





// Initialize room counts and total amounts for each column
let roomCounts = [0, 0, 0, 0];
let totalAmounts = [0, 0, 0, 0];

// Get references to HTML elements
const roomCountElements = document.querySelectorAll("[id^='roomCount']");
const totalAmountElements = document.querySelectorAll("[id^='totalAmount']");

// Get references to the +/- buttons for each column
for (let i = 1; i <= 4; i++) {
    const decreaseButton = document.getElementById(`decreaseRooms${i}`);
    const increaseButton = document.getElementById(`increaseRooms${i}`);

    decreaseButton.addEventListener("click", function () {
        if (roomCounts[i - 1] > 0) {
            roomCounts[i - 1]--;
            totalAmounts[i - 1] -= 25000;
            updateColumn(i);
        }
    });

    increaseButton.addEventListener("click", function () {
        roomCounts[i - 1]++;
        totalAmounts[i - 1] += 25000;
        updateColumn(i);
    });
}

// Function to update a specific column
function updateColumn(columnIndex) {
    const roomCountElement = roomCountElements[columnIndex - 1];
    const totalAmountElement = totalAmountElements[columnIndex - 1];
    roomCountElement.textContent = roomCounts[columnIndex - 1];
    totalAmountElement.textContent = "N" + totalAmounts[columnIndex - 1];
}



