import Chart from "chart.js/auto";

const labels = window.graficoLabels;
const datasets = window.graficoDatasets;

const ctx = document.getElementById("graficoMultiplo");
if (ctx) {
    new Chart(ctx, {
        type: "bar",
        data: { labels, datasets },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            aspectRatio: 5,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value) {
                            return (
                                "R$ " +
                                value
                                    .toString()
                                    .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                            );
                        },
                    },
                },
            },
            plugins: {
                legend: { position: "top" },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            const valor = context.raw;
                            return (
                                context.dataset.label +
                                ": R$ " +
                                valor.toLocaleString("pt-BR")
                            );
                        },
                    },
                },
            },
        },
    });
}
