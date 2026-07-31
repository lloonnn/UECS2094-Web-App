/**
 * Math.floor()
 * Math.min(...array)
 * Math.max(...array)
 * 
 * Math.max(array): Math.min([1, 2, 3]) -> NaN
 * Math.min(...array): Math.min(1, 2, 3) -> 5
 */

let array = [];
let result = document.getElementById("result");

function generateNumbers(){
    for (let i = 0; i < 5; i++){
        // Generate Random Integer Number from 1 to 100
        array[i] = Math.floor(Math.random()*100 + 1);
    }
    result.textContent = `Generated Numbers: ${array.join(", ")}`;
}

function findMax(){
    let max = Math.max(...array);
    result.textContent = `Largest number: ${max}`;
}

function findMin(){
    let min = Math.min(...array);
    result.textContent = `Smallest number: ${min}`;
}


