let beats = document.querySelectorAll(".beat");
let bar = document.querySelector(".bar");
const context = new AudioContext();

let dampening = 0.99;

function pluck(frequency) {
    const pluck = context.createScriptProcessor(2048, 0, 1);
    const N = Math.round(context.sampleRate / frequency);
    const y = new Float32Array(N);

    for (let i = 0; i < N; i++) {
        y[i] = Math.random() * 2 - 1;
    }

    let n = 0;
    pluck.onaudioprocess = function (e) {
        const output = e.outputBuffer.getChannelData(0);

        for (let i = 0; i < e.outputBuffer.length; i++) {
            y[n] = (y[n] + y[(n + 1) % N]) / 2;
            output[i] = y[n];
            y[n] *= dampening;
            n++;
            if (n >= N) {
                n = 0;
            }
        }
    };

    const bandpass = context.createBiquadFilter();
    bandpass.type = "bandpass";
    bandpass.frequency.value = frequency;
    bandpass.Q.value = 1;
    pluck.connect(bandpass);

    setTimeout(() => {
        pluck.disconnect();
    }, 2000);
    
    setTimeout(() => {
        bandpass.disconnect();
    }, 2000);

    return bandpass;
}

function strum(fret) {
    dampening = 0.99;
    const dst = context.destination;

    for (let i = 0; i < 6; i++) {
        if (Number.isFinite(fret[i])) {
            pluck(getFrequency(i, fret[i])).connect(dst);
        }
    }
}

function getFrequency(string, fret) {
    const A = 110;
    const offsets = [-5, 0, 5, 10, 14, 19];
    return A * Math.pow(2, (fret + offsets[string]) / 12);
}

function playBeat(frets) {
    context.resume().then(strum(frets));
}

export let paused = false;

export function setPaused(state) {
    paused = state;
}

function delay(ms) {
    return new Promise((resolve, reject) => {
        setTimeout(() => { if (!paused) resolve() }, ms)
    });
}

export async function playTab(tab, bpm) {
    let selectedBeat = document.querySelector(".selected");
    let selectedIndex = Array.from(beats).indexOf(selectedBeat);
    for (let i = selectedIndex; i < tab.length; i++) {
        playBeat(tab[i]);
        bar.style.top = (Math.floor(i / 64) * 140 - 10) + "px";
        bar.style.left = ((i % 64) * 100 / 64) + "%";
        await delay(15 / bpm * 1000);
    }
}