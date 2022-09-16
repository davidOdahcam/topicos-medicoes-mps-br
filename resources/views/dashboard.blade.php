@extends('layouts.main')

@push('title')
    Dashboard
@endpush

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card p-4">
                        <h3 class="text-center mb-3">Número de cadastros</h3>
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card p-4">
                                <h3 class="text-center mb-3">Número de cadastros</h3>
                                <canvas id="myChart2" width="300" height="300"></canvas>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card p-4">
                                <h3 class="text-center mb-3">Número de cadastros</h3>
                                <canvas id="myChart3" width="300" height="300"></canvas>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card p-4">
                                <h3 class="text-center mb-3">Número de cadastros</h3>
                                <canvas id="myChart4" width="300" height="300"></canvas>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card p-4">
                                <h3 class="text-center mb-3">Número de cadastros</h3>
                                <canvas id="myChart5" width="300" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

@push('js')
    <script>
        const dataDefault = {
            labels: [
                'Red',
                'Blue',
                'Yellow'
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [300, 50, 100],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        }


        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Projetos', 'Propósitos', 'Diretrizes', 'Objetivos', 'Métricas'],
                datasets: [{
                    label: 'Número de cadastros',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
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

        const ctx2 = document.getElementById('myChart2').getContext('2d');
        const myChart2 = new Chart(ctx2, {
            type: 'doughnut',
            data: dataDefault
        })

        const ctx3 = document.getElementById('myChart3').getContext('2d');
        const myChart3 = new Chart(ctx3, {
            type: 'doughnut',
            data: dataDefault
        })

        const ctx4 = document.getElementById('myChart4').getContext('2d');
        const myChart4 = new Chart(ctx4, {
            type: 'doughnut',
            data: dataDefault
        })

        const ctx5 = document.getElementById('myChart5').getContext('2d');
        const myChart5 = new Chart(ctx5, {
            type: 'doughnut',
            data: dataDefault
        })
    </script>
@endpush
