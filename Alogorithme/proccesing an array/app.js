let array = [1, 2, 3, 2, 4, 5, 6, 2];
let duplicates = [];

for (let index = 0; index < array.length; index++) {
    let count = 0;
    for (let i = 0; i < array.length; i++) {
        if(array[i] === array[index]){
            count++
        }   
    }
    if(count > 1){
        let alreadyExist = false;
        for (let j = 0; j < duplicates.length; j++) {
            if(duplicates[j] === array[index]){
                alreadyExist = true;
            }
        }
        if(alreadyExist == false){
            duplicates[duplicates.length] = array[index]
        }

    }   

}

console.log(duplicates);

