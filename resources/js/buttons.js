import { playTab, setPaused } from "./tabplayer.js";

let csrf = document.querySelector("meta[name=\"_token\"]");
let route = document.querySelector("meta[name=\"_route\"]");
let like = document.querySelector(".like-wrapper");
let likeIcon = document.querySelector(".like-icon");
let likeCounter = document.querySelector("#like-counter");
let publicitySwitch = document.querySelector(".switch");
let checkbox = document.querySelector("#publicity");
let circle = document.querySelector(".circle");
let play = document.querySelector("#play");
let stop = document.querySelector("#stop");
let save = document.querySelector("#save");
let bpm = document.querySelector(".bpm");
let beats = document.querySelectorAll(".beat");
let chordSelect = document.querySelector(".chord");
let hiddenTab = document.querySelector(".hidden-tab");
let myTab = [];
if (hiddenTab != null) {
    myTab = JSON.parse(hiddenTab.value);
}

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
        let form = document.querySelector(".input-wrapper");
        let tempo = document.querySelector("input[name=\"tempo\"]");
        let tabString = document.querySelector("input[name=\"tab\"]");
        beats = document.querySelectorAll(".beat");
        let tab = [];
        let beat;

        tempo.value = bpm.value;

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
            tab.push(beat);
        }
        tabString.value = JSON.stringify(tab);

        form.submit();
    }
}

if (like != null) {
    like.onclick = async function() {
        let status = 100;

        await fetch(route.content, {
            method: "POST",
            headers: {'X-CSRF-Token': csrf.content},
        }).then(res => {
            if (res.redirected) {
                location.href = res.url;
            } else {
                status = res.status;
            }
        });

        if (status === 201) {
            if (!likeIcon.classList.contains("inactive")) {
                likeIcon.classList.add("inactive");
            }
            likeCounter.innerHTML = parseInt(likeCounter.innerHTML) - 1;
        } else if (status === 200) {
            if (likeIcon.classList.contains("inactive")) {
                likeIcon.classList.remove("inactive");
            }
            likeCounter.innerHTML = parseInt(likeCounter.innerHTML) + 1;
        }
    }
}

if (publicitySwitch != null) {
    publicitySwitch.onclick = function() {
        if (circle.classList.contains("private")) {
            circle.classList.remove("private");
            circle.classList.add("public");
            checkbox.checked = false;
        } else if (circle.classList.contains("public")) {
            circle.classList.remove("public");
            circle.classList.add("private");
            checkbox.checked = true;
        } 
    }
}

for (let i = 0; i < beats.length; i++) {
    beats[i].addEventListener('click', function() {
        let selectedBeat = document.querySelector(".selected");
        selectedBeat.classList.remove("selected");
        beats[i].classList.add("selected");
    });
}

chordSelect.addEventListener('change', function() {
    let selectedBeat = document.querySelector(".selected");
    let chord = JSON.parse(chordSelect.value);
    let targetNotes = selectedBeat.children;
    for (let i = 0; i < 6; i++) {
        targetNotes[i].value = chord[5 - i];
    }
});