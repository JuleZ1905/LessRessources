const ctx = document.getElementById("myChart").getContext("2d");

let delayed;

let gradient = ctx.createLinearGradient(0, 0, 0, 400);
gradient.addColorStop(0, "rgba(58,123,213,1)");
gradient.addColorStop(1, "rgba(0,210,255,0.3)");

let gradient2 = ctx.createLinearGradient(0, 0, 0, 400);
gradient2.addColorStop(0, "rgb(58,213,97)");
gradient2.addColorStop(1, "rgba(56,213,105,0.3)");

const labels = [
  "Jänner",
  "Februar",
  "März",
  "April",
  "Mai",
  "Juni",
  "Juli",
  "August",
  "September",
  "Oktober",
  "November",
  "Dezember",
];

$.post(
  "lib/DB_dataCollection/dbRequest.php",
  function (data) {
    createGraph(data);
  },
  "json"
);


function createDataArray(data, year){
    let result = new Array();
    for (let index = 0; index < Object.keys(data[year]).length; index++) {
        result[index] = data[year][index+1];
    }
    return result;
}

function getGradient() {
    let result = new Array();

    result.push(gradient);
    result.push(gradient2);

    return result[Math.floor(Math.random() * result.length)];
}


function createGraph(dbData) {
  let years = Object.keys(dbData);
  let datasetEntries = new Array();

  for (let index = 0; index < years.length; index++) {
    datasetEntries[index] = {
      label: years[index],
      data: createDataArray(dbData, years[index]),
      fill: true,
      backgroundColor: getGradient(),
      borderColor: "#fff",
      pointBackgroundColor: "rgb(66,118,159)",
      tension: 0.4,
    };
  }

  console.log(datasetEntries);

  const data = {
    labels,
    datasets: datasetEntries,
  };

  const config = {
    type: "line",
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
          if (
            context.type === "data" &&
            context.mode === "default" &&
            !delayed
          ) {
            delay = context.dataIndex * 300 + context.datasetIndex * 100;
          }
          return delay;
        },
      },
      scales: {
        y: {
          ticks: {
            callback: function (value) {
              return value + " kWh";
            },
          },
        },
      },
    },
  };

  const myChart = new Chart(ctx, config);
}
