
let firstInput = document.querySelector(".first-number");
let secondInput = document.querySelector(".second-number");
let operatorLabel = document.querySelector(".operator-lbl");
let operatorButtons = document.querySelectorAll(".operator-btn-section button");
let equalButton = document.querySelector(".equal-btn");
let outputBox = document.querySelector(".output-box");

let currentOperator = "";

operatorButtons.forEach(button => {
    button.addEventListener("click", () => {
        currentOperator = button.innerText;
        operatorLabel.innerText = currentOperator;
    });
});

equalButton.addEventListener("click", function() {
    let f = parseFloat(firstInput.value);
    let s = parseFloat(secondInput.value);
    let result;

    switch (currentOperator) {
        case "+":
            result = f + s;
            break;
        case "-":
            result = f - s;
            break;
        case "*":
            result = f * s;
            break;
        case "/":
            result = s !== 0 ? f / s : "Can't divide by zero";
            break;
        case "%":
            result = f % s;
            break;
        case "^":
            result = Math.pow(f,s);
            break;
        default:
            result = "Select an operator";
    }

    outputBox.value = result;
});


let clearButton = document.querySelector(".clear-btn");

clearButton.addEventListener("click", function(){
    firstInput.value= "0";
    secondInput.value= "0";
    outputBox.value= "0";
    operatorLabel.innerText = "..."
})
