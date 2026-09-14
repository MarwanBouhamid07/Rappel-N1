let array = [3,7,5,2,1,10,4]


for (let index = 0; index < array.length; index++) {

    for (let j = 0; j < array.length; j++) {
        if( array[j] > array[j+1]){
            let temp = array[j]
            array[j] = array[j+1]
            array[j+1]=temp
        }
        
    }
    
}

console.log(array);