const ctx = document.getElementById("myChart").getContext("2d");

let delayed;
let gradient = ctx.createLinearGradient(0, 0, 0, 400);
gradient.addColorStop(0, 'rgba(58,123,213,1)');
gradient.addColorStop(1, 'rgba(0,210,255,0.3)');


let gradient2 = ctx.createLinearGradient(0, 0, 0, 400);
gradient2.addColorStop(0, 'rgb(58,213,97)');
gradient2.addColorStop(1, 'rgba(56,213,105,0.3)');

const labels = [
    'Jänner',
    'Februar',
    'März',
    'April',
    'Mai',
    'Juni',
    'Juli',
    'August',
    'September',
    'Oktober',
    'November',
    'Dezember',
];

const data = {
    labels,
    datasets: [
        {
            label: "2020",
            data: [211, 324, 435, 567, 678, 789, 50, 34, 546, 900, 900, 900],
            fill: true,
            backgroundColor: gradient,
            borderColor: "#fff",
            pointBackgroundColor: "rgb(66,118,159)",
            tension: 0.4,
        },
        {
            label: "2019",
            data: [0, 800, 100, 700, 978, 389, 100, 334, 246, 600, 500, 400],
            fill: true,
            backgroundColor: gradient2,
            borderColor: "#fff",
            pointBackgroundColor: "rgb(64,138,82)",
            tension: 0.4,
        }
    ],
};

const config = {
    type: 'line',
    data: data,
    options: {
        radius: 5,
        hitRadius: 30,
        hoverRadius: 12,
        responsive: true,
        animation: {
            onComplete: () => {
                delayed = true;
            },
            delay: (context) => {
                let delay = 0;
                if (context.type === "data" && context.mode === "default" && !delayed) {
                    delay = context.dataIndex * 300 + context.datasetIndex * 100;
                }
                return delay;
            },
        },
        scales: {
            y: {
                ticks: {
                    callback: function (value) {
                        return value + "kw"
                    }
                }
            }
        }
    },
};

const myChart = new Chart(ctx, config);
