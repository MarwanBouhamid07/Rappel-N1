let videos = [
    { title: "song", duration: 2, views: 20000 },
    { title: "challenge", duration: 5, views: 15000 },
    { title: "challenge", duration: 3, views: 17000 },
    { title: "race", duration: 11, views: 12000 },
    { title: "podcast", duration: 60, views: 10000 },
    { title: "DOM manipulation", duration: 4, views: 1500 },
    { title: "funny", duration: 8, views: 4000 }
];


let popularVideos = [];

for (let i = 0; i < videos.length; i++) {

    if (videos[i].views >= 2000) {
        popularVideos[popularVideos.length] = videos[i];
    }
}


for (let i = 0; i < popularVideos.length; i++) {

    for (let j = 0; j < popularVideos.length - 1; j++) {

        if (popularVideos[j].duration > popularVideos[j + 1].duration) {

            let temp = popularVideos[j];

            popularVideos[j] = popularVideos[j + 1];

            popularVideos[j + 1] = temp;
        }
    }
}


let selectedVideos = [];
let totalDuration = 0;

for (let i = 0; i < popularVideos.length; i++) {

    if (totalDuration + popularVideos[i].duration <= 10) {

        selectedVideos[selectedVideos.length] = popularVideos[i];

        totalDuration = totalDuration + popularVideos[i].duration;
    }
}


console.log("Videos sélectionnées :");

for (let i = 0; i < selectedVideos.length; i++) {
    console.log(selectedVideos[i]);
}

console.log("Nombre de vidéos :", selectedVideos.length);
console.log("Durée totale :", totalDuration, "minutes");