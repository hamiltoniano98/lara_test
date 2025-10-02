import Chart from "chart.js/auto";

const datas = window.graficoPizzaData;

document.addEventListener("DOMContentLoaded", () => {
    const ctx = document.getElementById("graficoPizza");

    if (ctx && window.graficoPizzaData) {
        new Chart(ctx, {
            type: "pie",
            data: datas,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: "right",
                    },
                    title: {
                        display: true,
                        text: "Participación porcentual de receita líquida",
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                const total = context.dataset.data.reduce(
                                    (a, b) => a + b,
                                    0
                                );
                                const valor = context.raw;
                                const porcentaje = (
                                    (valor / total) *
                                    100
                                ).toFixed(1);
                                return `${
                                    context.label
                                }: R$ ${valor.toLocaleString(
                                    "pt-BR"
                                )} (${porcentaje}%)`;
                            },
                        },
                    },
                },
            },
        });
    }
});
