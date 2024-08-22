import "./bootstrap";
import Alpine from "alpinejs";
import {
    Chart,
    BarController,
    BarElement,
    CategoryScale,
    LinearScale,
    Title,
    Tooltip,
    Legend,
    plugins,
    Ticks,
    DoughnutController,
    ArcElement,
} from "chart.js";

// Register Alpine.js
window.Alpine = Alpine;
Alpine.start();

// Register the Chart.js components
Chart.register(
    BarController,
    BarElement,
    CategoryScale,
    LinearScale,
    Title,
    Tooltip,
    Legend,
    DoughnutController,
    ArcElement
);

// Data peminjaman per hari
(async function () {
    const labels = ["Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
    const data = {
        labels: labels,
        datasets: [
            {
                label: "Data peminjaman per hari",
                data: [65, 59, 80, 81, 56, 55],
                backgroundColor: [
                    "rgb(255, 99, 132)",
                    "rgb(255, 159, 64)",
                    "rgb(255, 205, 86)",
                    "rgb(75, 192, 192)",
                    "rgb(54, 162, 235)",
                    "rgb(153, 102, 255)",
                ],
                borderColor: [
                    "rgba(255, 99, 132, 0.2)",
                    "rgba(255, 159, 64, 0.2)",
                    "rgba(255, 205, 86, 0.2)",
                    "rgba(75, 192, 192, 0.2)",
                    "rgba(54, 162, 235, 0.2)",
                    "rgba(153, 102, 255, 0.2)",
                ],
                borderWidth: 1,
            },
        ],
    };

    const config = {
        type: "bar",
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
            plugins: {
                legend: {
                    labels: {
                        color: "#F5F5F5",
                    },
                },
            },
        },
    };

    // Create the chart
    new Chart(document.getElementById("borrower"), config);
})();

// Data buku belum kembali
(async function () {
    const labels = ["Naruto", "One Piece", "Sherlock Holmes"];

    const data = {
        labels: labels,
        datasets: [
            {
                label: "Buku belum kembali",
                data: [50, 30, 40], // Dummy data representing the number of books not returned
                backgroundColor: [
                    "rgb(255, 99, 132)",  // Color for "Naruto"
                    "rgb(54, 162, 235)",  // Color for "One Piece"
                    "rgb(255, 205, 86)",  // Color for "Sherlock Holmes"
                ],
                hoverOffset: 4,
            },
        ],
    };

    const config = {
        type: "doughnut",
        data: data,
    };

    // Create the chart
    new Chart(document.getElementById("not-return"), config);
})();


// Buku Terfavorit
(async function () {
    const labels = ["One Piece", "Naruto", "Attack on Titan", "Dragon Ball", "My Hero Academia"];
    const data = {
        labels: labels,
        datasets: [
            {
                label: "Buku terfavorit",
                data: [200, 180, 250, 170, 210],
                backgroundColor: [
                    "rgb(255, 99, 132)",
                    "rgb(54, 162, 235)",
                    "rgb(255, 205, 86)",
                    "rgb(75, 192, 192)",
                    "rgb(153, 102, 255)"
                ],
                borderColor: [
                    "rgba(255, 99, 132, 0.2)",
                    "rgba(54, 162, 235, 0.2)",
                    "rgba(255, 205, 86, 0.2)",
                    "rgba(75, 192, 192, 0.2)",
                    "rgba(153, 102, 255, 0.2)"
                ],
                borderWidth: 1,
            },
        ],
    };

    const config = {
        type: "bar",
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
            plugins: {
                legend: {
                    labels: {
                        color: "#F5F5F5",
                    },
                },
            },
        },
    };

    // Create the chart
    new Chart(document.getElementById("favorite-books"), config);
})();

