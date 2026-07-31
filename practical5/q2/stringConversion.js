let result = document.getElementById("result");
let inputField = document.getElementById("inputField");

function displayInput(){
    result.innerHTML = `Input String: ${inputField.value}`;
}

function convertToUpper() {
    result.innerHTML = `Upper Case String: ${inputField.value.toUpperCase()}`;
}

function convertToLower() {
    result.innerHTML = `Lower Case String: ${inputField.value.toLowerCase()}`;
}
