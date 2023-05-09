let beats = document.querySelectorAll(".beat");
let notes = document.querySelectorAll(".note");
let bpm = document.querySelector(".bpm");
let bar = document.querySelector(".bar");

window.onload = function() {
    for (let note of notes) {
        note.classList.add("read-only");
    }
    bpm.classList.add("read-only");
}

for (let i = 0; i < beats.length; i++) {
    beats[i].addEventListener('click', function() {
        bar.style.top = (Math.floor(i / 64) * 140 - 10) + "px";
        bar.style.left = ((i % 64) * 100 / 64) + "%";
    });
}