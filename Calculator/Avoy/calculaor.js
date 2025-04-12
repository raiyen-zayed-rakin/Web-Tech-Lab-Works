const num1 = document.getElementById('num1');
const num2 = document.getElementById('num2');
const operator = document.getElementById('operator');
const result = document.getElementById('result');
const calculate = document.getElementById('calculate');
const clear = document.getElementById('clear');

calculate.addEventListener('click', () => {
  const a = parseFloat(num1.value);
  const b = parseFloat(num2.value);
  const op = operator.value;

  if (isNaN(a) || isNaN(b)) {
    result.value = "Invalid input!";
    return;
  }

  let res;
  switch(op) {
    case '+': res = a + b; break;
    case '-': res = a - b; break;
    case '*': res = a * b; break;
    case '/': res = b !== 0 ? a / b : "Can't divide by 0"; break;
    default: res = "Unknown op";
  }

  result.value = res;
});

clear.addEventListener('click', () => {
  num1.value = "";
  num2.value = "";
  result.value = "";
});
