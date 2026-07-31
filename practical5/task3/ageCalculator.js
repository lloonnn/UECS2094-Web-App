function calculateAge(){
    let age = parseInt(document.getElementById("age").value);
    let result = document.getElementById("result");

    if(age >= 100) {
        result.textContent = `Hello ${name}! You are 100 years old or older.`;
        return;
    }
    let name = document.getElementById("name").value;
    let age100 = 100 - age + new Date().getFullYear();
    result.textContent = `Hello ${name}! You will turn 100 in the year ${age100}.`;
}