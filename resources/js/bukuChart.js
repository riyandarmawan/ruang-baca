import { Chart } from "chart.js";

const chartBuku = document.getElementById('chart-buku');

(async function () {
    const data = [
        { year: 2010, count: 10 },
        { year: 2011, count: 11 },
    ];

    new Chart(
        chartBuku,
        {
            type: 'line',
            data: {
                labels: data.map(row => row.year),
                datasets: [
                    {
                        label: "Line Chart by Year",
                        data: data.map(row => row.count)
                    }
                ]
            }
        }
    )
});