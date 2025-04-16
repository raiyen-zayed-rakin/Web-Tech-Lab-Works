const num1 = document.getElementById('num1');
const num2 = document.getElementById('num2');
const operator = document.getElementById('operator');
const resultDiv = document.getElementById('result');
const calculate = document.getElementById('calculate');

calculate.addEventListener('click', () => {
  const a = parseFloat(num1.value);
  const b = parseFloat(num2.value);
  const op = operator.value;

  if (isNaN(a) || isNaN(b)) {
    resultDiv.innerHTML = "Invalid input!";
    return;
  }

  let res;
  switch (op) {
    case '+':
      res = a + b;
      break;
    case '-':
      res = a - b;
      break;
    case '*':
      res = a * b;
      break;
    case '/':
      res = b !== 0 ? a / b : "Can't divide by 0";
      break;
    case 'mod':
      res = a % b;
      break;
    case 'power':
      res = Math.pow(a, b);
      break;
    default:
      res = "Unknown operator";
  }

  resultDiv.innerHTML = `Result: ${res}`;
});
