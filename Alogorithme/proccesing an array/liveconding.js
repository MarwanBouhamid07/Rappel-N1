
let array = [2,3,7,0,5,3,2,1,3,0];
let duplicates = [];

for (let index = 0; index < array.length; index++) {
    
    let count = 0;

    for (let i = 0; i < array.length; i++) {
        
        if(array[index] === array[i] ){
            count++
        }
        
    }

    if( count > 1 ){

        let alreadyExist = false

        
        for (let j = 0; j < duplicates.length; j++) {
            
            if(duplicates[j] === array[index] ){
                alreadyExist = true
            }
            
        }

        if( alreadyExist == false){
            duplicates[duplicates.length] = array[index]
        }
        
    }

    
}

console.log(duplicates);