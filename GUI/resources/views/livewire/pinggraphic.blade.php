<div wire:poll.60000ms="refresh"> <!-- Polling cada 60 segundos -->
    <div class="mb-4">
        <!-- Botones para seleccionar el periodo -->
        <button onclick="updateChart('15m');updatePeriod('15m');" class="text-blue-500">15 min</button>
        <button onclick="updateChart('30m');updatePeriod('30m');" class="text-blue-500 ml-5">30 min</button>
        <button onclick="updateChart('1h'); updatePeriod('1h')" class="text-blue-500 ml-5">1 hour</button>
        <button onclick="updateChart('6h'); updatePeriod('6h')" class="text-blue-500 ml-5">6 hours</button>
        <button onclick="updateChart('12h'); updatePeriod('12h')" class="text-blue-500 ml-5">12 hours</button>
        <button onclick="updateChart('24h'); updatePeriod('24h')" class="text-blue-500 ml-5">24 hours</button>
        <button onclick="updateChart('7d'); updatePeriod('7d')" class="text-blue-500 ml-5">7 days</button>
        <button onclick="updateChart('15d'); updatePeriod('15d')" class="text-blue-500 ml-5">15 days</button>
        <button onclick="updateChart('1m'); updatePeriod('1m')" class="text-blue-500">1 month</button>
    </div>

    <div class="rounded-lg overflow-hidden">
        <canvas id="chartLine" width="400" height="200"></canvas>
    </div>
    <!-- Required chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Date-fns Adapter -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>


    

    <!-- Chart line -->
    <script>
        let chartLine;
        let pingData = @json($pingData); // Pasa pingData desde Blade a JavaScript
        let chartperiod;

        function updatePeriod(cperiod) {
            chartperiod = cperiod;
        }

        function updateChart(period) {
            const now = new Date();
            let minDate;
            let timeUnit = 'hour'; // Default unit

            switch (period) {
                case '15m':
                    minDate = new Date(now.getTime() - (15 * 60 * 1000));
                    timeUnit = 'minute';
                    break;
                case '30m':
                    minDate = new Date(now.getTime() - (30 * 60 * 1000));
                    timeUnit = 'minute';
                    break;
                case '1h':
                    minDate = new Date(now.getTime() - (60 * 60 * 1000));
                    timeUnit = 'minute';
                    break;
                case '6h':
                    minDate = new Date(now.getTime() - (6 * 60 * 60 * 1000));
                    break;
                case '12h':
                    minDate = new Date(now.getTime() - (12 * 60 * 60 * 1000));
                    break;
                case '24h':
                    minDate = new Date(now.getTime() - (24 * 60 * 60 * 1000));
                    break;
                case '7d':
                    minDate = new Date(now.getTime() - (7 * 24 * 60 * 60 * 1000));
                    timeUnit = 'day';
                    break;
                case '15d':
                    minDate = new Date(now.getTime() - (15 * 24 * 60 * 60 * 1000));
                    timeUnit = 'day';
                    break;
                case '1m':
                    minDate = new Date(now.getTime() - (30 * 24 * 60 * 60 * 1000));
                    timeUnit = 'day';
                    break;
                default:
                    minDate = new Date(now.getTime() - (24 * 60 * 60 * 1000));
                    break;
            }

            // Actualiza el gráfico con el nuevo rango de fechas
            if (chartLine) {
                chartLine.destroy();
            }

            // Procesar datos para Chart.js
            const chartData = pingData.filter(ping => {
                const pingDate = new Date(ping.date);
                return pingDate >= minDate;
            }).map(ping => ({
                x: new Date(ping.date),
                y: parseFloat(ping.ptime) // Convertir el tiempo de ping a número
            }));

            console.log('Chart Data:', chartData); // Verificar datos procesados

            chartLine = new Chart(document.getElementById('chartLine').getContext('2d'), {
                type: 'line',
                data: {
                    datasets: [{
                        label: 'Ping Time',
                        data: chartData,
                        borderColor: 'hsl(217, 91.2%, 59.8%)',
                        backgroundColor: 'hsl(217, 91.2%, 59.8%)',
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                unit: timeUnit,
                                tooltipFormat: 'MMM d, yyyy H:mm:ss',
                                displayFormats: {
                                    minute: 'H:mm',
                                    hour: 'H:mm',
                                    day: 'MMM d'
                                }
                            },
                            title: {
                                display: true,
                                text: 'Time'
                            },
                            ticks: {
                                autoSkip: true,
                                maxTicksLimit: timeUnit === 'day' ? 10 : 24
                            },
                            min: minDate.toISOString(), // Mínimo según el periodo seleccionado
                            max: new Date().toISOString() // Máximo: Ahora
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Ping Time (ms)'
                            }
                        }
                    }
                }
            });
        }

        document.addEventListener('livewire:load', () => {
            updateChart('24h'); // Cargar el gráfico con el período predeterminado

            // Listener para actualizar la gráfica cuando se reciban nuevos datos
            window.addEventListener('updateChartData', (event) => {
                pingData = event.detail.pingData; // Actualizar los datos de ping
                updateChart(chartperiod); // Vuelve a renderizar la gráfica con los datos actualizados
            });
        });
    </script>
</div>
