<div>
    <!--SHOW CHART-->
    <h1>Ventas de la ultima semana</h1>
    <canvas id="salesLastWeekChart"></canvas>

    <!--SCRIPT CHART-->
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const salesLastWeek = document.getElementById('salesLastWeekChart').getContext('2d');

            new Chart(salesLastWeek, {
                type: 'line',
                data: {
                    labels: @json($salesLastWeek->pluck('day')),
                    datasets: [{
                        label: 'Ingresos por Día',
                        data: @json($salesLastWeek->pluck('total_income')),
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 0.5)',
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
