<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="d-flex">
        <div class="calculator border p-3 rounded bg-light">
            <input type="text" id="display" class="form-control text-end mb-2" disabled>
            <div class="row">
                <button class="btn btn-secondary col-3" onclick="clearDisplay()">C</button>
                <button class="btn btn-secondary col-3" onclick="appendToDisplay('/')">/</button>
                <button class="btn btn-secondary col-3" onclick="appendToDisplay('*')">*</button>
                <button class="btn btn-danger col-3" onclick="backspace()">⌫</button>
            </div>
            <div class="row mt-1">
                <button class="btn btn-light col-3" onclick="appendToDisplay('7')">7</button>
                <button class="btn btn-light col-3" onclick="appendToDisplay('8')">8</button>
                <button class="btn btn-light col-3" onclick="appendToDisplay('9')">9</button>
                <button class="btn btn-secondary col-3" onclick="appendToDisplay('-')">-</button>
            </div>
            <div class="row mt-1">
                <button class="btn btn-light col-3" onclick="appendToDisplay('4')">4</button>
                <button class="btn btn-light col-3" onclick="appendToDisplay('5')">5</button>
                <button class="btn btn-light col-3" onclick="appendToDisplay('6')">6</button>
                <button class="btn btn-secondary col-3" onclick="appendToDisplay('+')">+</button>
            </div>
            <div class="row mt-1">
                <button class="btn btn-light col-3" onclick="appendToDisplay('1')">1</button>
                <button class="btn btn-light col-3" onclick="appendToDisplay('2')">2</button>
                <button class="btn btn-light col-3" onclick="appendToDisplay('3')">3</button>
                <button class="btn btn-primary col-3" onclick="calculateResult()">=</button>
            </div>
            <div class="row mt-1">
                <button class="btn btn-light col-6" onclick="appendToDisplay('0')">0</button>
                <button class="btn btn-light col-3" onclick="appendToDisplay('.')">.</button>
            </div>
        </div>
        <div class="history ms-3">
            <h5>History</h5>
            <button class="btn btn-danger btn-sm mb-2" onclick="clearHistory()">Clear History</button>
            <div id="history-list"></div>
        </div>
    </div>
    
    <script>
        function appendToDisplay(value) {
            document.getElementById("display").value += value;
        }
        
        function clearDisplay() {
            document.getElementById("display").value = "";
        }
        
        function backspace() {
            let display = document.getElementById("display");
            display.value = display.value.slice(0, -1);
        }
        
        function calculateResult() {
            let display = document.getElementById("display");
            try {
                let result = eval(display.value);
                if (!isNaN(result)) {
                    let historyList = document.getElementById("history-list");
                    let historyItem = document.createElement("div");
                    historyItem.classList.add("history-item");
                    historyItem.textContent = `${display.value} = ${result}`;
                    historyList.prepend(historyItem);
                    display.value = result;
                }
            } catch (error) {
                alert("Invalid input");
            }
        }
        
        function clearHistory() {
            document.getElementById("history-list").innerHTML = "";
        }
    </script>
</body>
</html>
