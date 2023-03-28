let play = document.querySelector("#play");
let save = document.querySelector("#save");
let deleteTab = document.querySelector("#deletetab");
let beats = document.querySelectorAll(".beat");
let myTab = [];

window.onload = loadTab();

play.onclick = function() {
    if (myTab != null) {
        cancelled = false;
        playTab(myTab, bpm.value);
    }
}

save.onclick = function() {
    myTab = [];
    localStorage.clear();
    let beat;
    for (let i = 0; i < beats.length; i++) {
        beat = [];
        for (let j = 5; j >= 0; j--) {
            if (beats[i].children[j].value == '') {
                beat.push(null)
            }
            else {
                beat.push(JSON.parse(beats[i].children[j].value));
            }
        }
        myTab.push(beat);
    }
    localStorage.setItem('tab', JSON.stringify(myTab));
    localStorage.setItem('tempo', bpm.value);
}

deleteTab.onclick = function() {
    myTab = [];
    localStorage.clear();
    for (let i = 0; i < beats.length; i++) {
        for (let j = 0; j < 6; j++) {
            beats[i].children[j].value = "";
        }
    }
}

function loadTab() {
    myTab = JSON.parse(localStorage.getItem('tab'));
    if (bpm.value = '120') {
        bpm.value = 120;
    }
    else {
        bpm.value = JSON.parse(localStorage.getItem('tempo'));
    }
    if (myTab != null) {
        for (let i = 0; i < myTab.length; i++) {
            let k = 0
            for (let j = 5; j >= 0; j--) {
                beats[i].children[k].value = myTab[i][j];
                k++;
            }
        }
    }
}