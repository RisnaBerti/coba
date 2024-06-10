@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>

    <div class="page-content">
        <section class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible show fade">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <h4>Hallo! 👋, {{ auth()->user()->name }}</h4>
                        <p>{{ __('Selamat datang di SIMFASKES!') }}</p>
                    </div>
                </div>

                {{-- card menampilkan jumlah user , jumlah perencanaan --}}
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4>User</h4>
                                <h2>5</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4>Perencanaan</h4>
                                <h2>54 Project</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4>Project Selesai</h4>
                                <h2>101 Project</h2>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- grafik menunjukan progress setiap perencanaan --}}
                <div class="card">
                    <div class="card-body">
                        <h4>Progress Perencanaan</h4>
                        <canvas id="myChart" width="400" height="200"></canvas>
                    </div>
                </div>

                {{-- <div class="card">
                    <div class="card-body">
                        <h4>Informasi Pengguna</h4>
                        <table class="table table-hover table-striped">
                            <tr>
                                <td class="fw-bold">Nama</td>
                                <td>{{ auth()->user()->name }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Email</td>
                                <td>{{ auth()->user()->email }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Role</td>
                                <td>{{ auth()->user()->roles[0]->name }}</td>
                            </tr>
                        </table>
                    </div>
                </div> --}}
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const ctx = document.getElementById('myChart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Project A', 'Project B', 'Project C', 'Project D', 'Project E'],
                        datasets: [{
                            label: 'Progress (%)',
                            data: [70, 50, 90, 60, 80], // Data dummy progres tiap proyek
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 100
                            }
                        }
                    }
                });
            });
        </script>

    </div>
@endsection
