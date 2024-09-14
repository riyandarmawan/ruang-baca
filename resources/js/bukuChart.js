import { Chart, registerables } from 'chart.js';

Chart.register(...registerables);

const ctx = document.getElementById('buku-chart').getContext('2d');
const bukuChart = new Chart(ctx, {
    type: 'line', // Specify chart type
    data: {
        labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu'], // X-axis labels
        datasets: [
            {
                label: 'Buku yang dipinjam', // First line (books borrowed)
                data: [10, 8, 12, 6, 5, 9], // Data points for books borrowed (Sum = 50)
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                fill: false // Don't fill under the line
            },
            {
                label: 'Buku yang dikembalikan', // Second line (books returned)
                data: [5, 7, 6, 4, 3, 5], // Data points for books returned (Sum = 30)
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                fill: false // Don't fill under the line
            }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    color: 'white', // Y-axis label color to white
                    font: {
                        size: 16 // Set Y-axis font size
                    }
                }
            },
            x: {
                ticks: {
                    color: 'white', // X-axis label color to white
                    font: {
                        size: 16 // Set X-axis font size
                    }
                }
            }
        },
        plugins: {
            legend: {
                labels: {
                    color: 'white', // Legend label color to white
                    font: {
                        size: 14 // Set font size for the legend
                    }
                }
            }
        }
    }
});
