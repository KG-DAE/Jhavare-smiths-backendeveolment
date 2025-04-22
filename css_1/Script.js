function appendToDisplay(value) {
    const display = document.getElementById("display");
    display.value += value;
}

function clearDisplay() {
    const display = document.getElementById("display");
    display.value = "";
}

function calculate() {
    const display = document.getElementById("display");
    try {
        const result = eval(display.value.replace(/sin\(/g, 'Math.sin(').replace(/cos\(/g, 'Math.cos(').replace(/tan\(/g, 'Math.tan('));
        display.value = result;
        saveCalculation(display.value);
    } catch (error) {
        alert("Invalid expression");
    }
}

function saveCalculation(result) {
    // Placeholder for actual PHP backend communication
    console.log("Saving result:", result);
    // You can use fetch or XMLHttpRequest to send this to the server later
}

document.addEventListener("DOMContentLoaded", () => {
    // Placeholder for loading previous calculations via PHP backend
    const userGreeting = document.getElementById("user-greeting");
    userGreeting.innerText = "Hello, KG!"; // Mock user

    const calcHistory = document.getElementById("calc-history");
    calcHistory.innerHTML = "<li>12 + 15 = 27</li><li>sin(0) = 0</li>";
});
