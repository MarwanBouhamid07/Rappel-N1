let array = [2,4,1,5,20];

let max = array[0];

for (let index = 0; index < array.length; index++) {
    if(max < array[index]){
        max = array[index]
    }
}
console.log(max);