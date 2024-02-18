<div>
    <!--SHOW CHART-->
    <h1>Ventas del ultimo año</h1>
    <canvas id="salesChart"></canvas>

    <!--SCRIPT CHART-->
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const sales = document.getElementById('salesChart').getContext('2d');

            new Chart(sales, {
                type: 'line',
                data: {
                    labels: @json(
                        $salesLastYear->map(function ($sale) {
                            return $sale->month . '/' . $sale->year;
                        })),
                    datasets: [{
                        label: 'Ingresos por Mes',
                        data: @json($salesLastYear->pluck('total_income')),
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 0.5)',
                        borderWidth: 3
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush
</div>
