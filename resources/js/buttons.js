import { playTab, paused, setPaused } from "./tabplayer.js";

let play = document.querySelector("#play");
let stop = document.querySelector("#stop");
let save = document.querySelector("#save");
let deleteTab = document.querySelector("#deletetab");
let bpm = document.querySelector(".bpm");
let hiddenTab = document.querySelector(".hidden-tab");
let myTab = JSON.parse(hiddenTab.value);

play.onclick = function() {
    stop.disabled = false;
    play.disabled = true;

    setPaused(false);
    playTab(myTab, bpm.value);
}

stop.onclick = function() {
    stop.disabled = true;
    play.disabled = false;

    setPaused(true);
}

if (save != null) {
    save.onclick = function() {
        console.log("asd");
    }
}

/*save.onclick = function() {
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
}*/