let tab = document.querySelector(".tab");
let addRow = document.querySelector("#add-row");
let bpm = document.querySelector(".bpm");
let hiddenTab = document.querySelector(".hidden-tab");
let myTab = [];
if (hiddenTab != null) {
    myTab = JSON.parse(hiddenTab.value);
}

if (hiddenTab == null) {
    window.onload = generateEmptyTab(1);
}
else {
    window.onload = loadTab();
}

function generateEmptyTab(numberOfRows) {

    for (let i = 0; i < numberOfRows; i++) {
        let rowWrapper = document.createElement("div");
        rowWrapper.classList.add("new-row-wrapper");
        tab.appendChild(rowWrapper.cloneNode(true));
    }

    let rowWrappers = document.querySelectorAll(".new-row-wrapper");
    for (let element of rowWrappers) {
        let rowBackground = document.createElement("div");
        rowBackground.classList.add("new-row-background");
        element.appendChild(rowBackground);

        let row = document.createElement("div");
        row.classList.add("new-row");
        element.appendChild(row);
    }

    let rowBackgrounds = document.querySelectorAll(".new-row-background");
    for (let element of rowBackgrounds) {
        for (let i = 0; i < 6; i++) {
            let string = document.createElement("div");
            string.classList.add("new-string");
            element.appendChild(string);
        }
    }

    let rows = document.querySelectorAll(".new-row");
    for (let element of rows) {
        for (let i = 0; i < 4; i++) {
            let rythm = document.createElement("div");
            rythm.classList.add("new-rythm");
            element.appendChild(rythm);
        }
    }

    let rythms = document.querySelectorAll(".new-rythm");
    for (let element of rythms) {
        for (let i = 0; i < 16; i++) {
            let beat = document.createElement("div");
            beat.classList.add("new-beat");
            element.appendChild(beat);
        }
    }

    let beats = document.querySelectorAll(".new-beat");
    for (let element of beats) {
        for (let i = 0; i < 6; i++) {
            let note = document.createElement("input");
            note.classList.add("new-note");
            note.type = "number";
            note.placeholder = " ";
            element.appendChild(note);
        }
    }

    let notes = document.querySelectorAll(".new-note");
    for (let note of notes) {
        note.classList.remove("new-note");
        note.classList.add("note");
    }
    for (let beat of beats) {
        beat.classList.remove("new-beat");
        beat.classList.add("beat");
    }
    for (let rythm of rythms) {
        rythm.classList.remove("new-rythm");
        rythm.classList.add("rythm");
    }
    let strings = document.querySelectorAll(".new-string");
    for (let string of strings) {
        string.classList.remove("new-string");
        string.classList.add("string");
    }
    for (let row of rows) {
        row.classList.remove("new-row");
        row.classList.add("row");
    }
    let backgrounds = document.querySelectorAll(".new-row-background");
    for (let background of backgrounds) {
        background.classList.remove("new-row-background");
        background.classList.add("row-background");
    }
    for (let rowWrapper of rowWrappers) {
        rowWrapper.classList.remove("new-row-wrapper");
        rowWrapper.classList.add("row-wrapper");
    }

    let rowWrapper = document.querySelector(".row-wrapper");
    let bar = document.createElement("div");
    bar.classList.add("bar");
    rowWrapper.appendChild(bar);
}

if (addRow != null) {
    addRow.onclick = function() {
        generateEmptyTab(1);
    }
}

function loadTab() {
    generateEmptyTab(myTab.length / 64);
    let beats = document.querySelectorAll(".beat");

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