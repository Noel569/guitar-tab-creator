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

function playTab(tab, bpm) {
    for (let i = 0; i < tab.length; i++) {
        setTimeout(() => {
            playBeat(tab[i]);
        }, (60 / bpm * 1000) * i);
    }
}

let sweetChild = [
    [null, null, 11, null, null, null],
    [null, null, null, null, 14, null],
    [null, null, null, 13, null, null],
    [null, null, null, 11, null, null],
    [null, null, null, null, null, 14],
    [null, null, null, 13, null, null],
    [null, null, null, null, null, 13],
    [null, null, null, 13, null, null],
    [null, null, 11, null, null, null],
    [null, null, null, null, 14, null],
    [null, null, null, 13, null, null],
    [null, null, null, 11, null, null],
    [null, null, null, null, null, 14],
    [null, null, null, 13, null, null],
    [null, null, null, null, null, 13],
    [null, null, null, 13, null, null],
    [null, null, 13, null, null, null],
    [null, null, null, null, 14, null],
    [null, null, null, 13, null, null],
    [null, null, null, 11, null, null],
    [null, null, null, null, null, 14],
    [null, null, null, 13, null, null],
    [null, null, null, null, null, 13],
    [null, null, null, 13, null, null],
    [null, null, 13, null, null, null],
    [null, null, null, null, 14, null],
    [null, null, null, 13, null, null],
    [null, null, null, 11, null, null],
    [null, null, null, null, null, 14],
    [null, null, null, 13, null, null],
    [null, null, null, null, null, 13],
    [null, null, null, 13, null, null],
];

let shallow = [
    [0, null, null, null, null, null],
    [null, null, null, 0, null, null],
    [null, null, null, null, 3, null],
    [null, null, null, 0, null, null],
    [2, null, null, null, null, null],
    [null, null, null, 2, 3, null],
    [null, null, null, null, null, null],
    [3, null, null, 0, 3, null],
    [null, null, null, null, null, null],
    [null, null, null, null, null, null],
    [null, null, null, null, null, null],
    [null, null, null, null, null, null],
    [null, 3, null, null, null, null],
    [null, null, 2, null, null, null],
    [null, null, null, null, 1, null],
    [null, null, null, null, 3, null],
    [null, null, null, null, null, null],
    [null, null, null, null, null, 0],
    [null, null, null, null, 3, null],
    [3, null, null, null, null, null],
    [null, null, null, null, 3, 3],
    [null, null, null, null, null, null],
    [null, null, 0, 2, 3, null],
    [null, null, null, null, null, null],
    [null, null, null, null, null, 0],
    [null, null, null, null, 3, null],
]