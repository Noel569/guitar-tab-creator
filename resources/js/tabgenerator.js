const tab = document.querySelector(".tab");
const rowWrapper = document.createElement("div");
let bpm = document.querySelector(".bpm");
let hiddenTab = document.querySelector(".hidden-tab");
let myTab = [];
if (hiddenTab != null) {
    myTab = JSON.parse(hiddenTab.value);
}
rowWrapper.classList.add("row-wrapper");

if (hiddenTab == null) {
    window.onload = generateEmptyTab(1);
}
else {
    window.onload = loadTab();
}

function generateEmptyTab(numberOfRows) {

    for (let i = 0; i < numberOfRows; i++) {
        tab.appendChild(rowWrapper.cloneNode(true));
    }

    let rowWrappers = document.querySelectorAll(".row-wrapper");
    for (let element of rowWrappers) {
        let rowBackground = document.createElement("div");
        rowBackground.classList.add("row-background");
        element.appendChild(rowBackground);

        let row = document.createElement("div");
        row.classList.add("row");
        element.appendChild(row);
    }

    let rowBackgrounds = document.querySelectorAll(".row-background")
    for (let element of rowBackgrounds) {
        for (let i = 0; i < 6; i++) {
            let string = document.createElement("div");
            string.classList.add("string");
            element.appendChild(string);
        }
    }

    let rows = document.querySelectorAll(".row")
    for (let element of rows) {
        for (let i = 0; i < 4; i++) {
            let rythm = document.createElement("div");
            rythm.classList.add("rythm");
            element.appendChild(rythm);
        }
    }

    let rythms = document.querySelectorAll(".rythm")
    for (let element of rythms) {
        for (let i = 0; i < 8; i++) {
            let beat = document.createElement("div");
            beat.classList.add("beat");
            element.appendChild(beat);
        }
    }

    let beats = document.querySelectorAll(".beat")
    for (let element of beats) {
        for (let i = 0; i < 6; i++) {
            let note = document.createElement("input");
            note.classList.add("note");
            note.type = "number";
            note.placeholder = " ";
            element.appendChild(note);
        }
    }
}

function loadTab() {
    generateEmptyTab(myTab.length / 32);
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