@extends('application.layouts.master')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Penduduk</h1>

        <div class="row">
            <div class="col-md-3 mb-3">
                <select class="form-select" id="chartOptions" aria-label="Pilih jenis grafik">
                    <option value="rt" selected>Jumlah Penduduk per RT</option>
                    <option value="rw">Jumlah Penduduk per RW</option>
                </select>
            </div>
            <div class="col-md-9 mb-4">
                <canvas id="populationChart"></canvas>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Foto</th>
                        <th>Nama Kepala Keluarga</th>
                        <th>RT</th>
                        <th>RW</th>
                        {{-- <th>NIK</th> --}}
                        <th>Jumlah KK</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($residents as $resident)
                        <tr>
                            <td>{{ $resident->Nomor }}</td>
                            <td>
                                @if ($resident->Foto)
                                    <img src="{{ $resident->getFotoUrl() }}" alt="Foto"
                                        style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>{{ $resident->Nama_Kepal }}</td>
                            <td>{{ $resident->RT }}</td>
                            <td>{{ $resident->RW }}</td>
                            {{-- <td>{{ $resident->NIK }}</td> --}}
                            <td>{{ $resident->Jumlah_KK }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row mt-4">
            <div class="col-12 d-flex justify-content-center">
                {{ $residents->links() }}
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Data untuk grafik RT
        var rtData = @json($residentsByRT);
        var rtLabels = rtData.map(item => 'RT ' + item.RT);
        var rtCounts = rtData.map(item => item.total);

        // Data untuk grafik RW
        var rwData = @json($residentsByRW);
        var rwLabels = rwData.map(item => 'RW ' + item.RW);
        var rwCounts = rwData.map(item => item.total);

        var ctx = document.getElementById('populationChart').getContext('2d');
        var currentChart = null;

        function createChart(labels, data, title) {
            if (currentChart) {
                currentChart.destroy();
            }
            currentChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Penduduk',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: title
                        }
                    }
                }
            });
        }

        document.getElementById('chartOptions').addEventListener('change', function(e) {
            if (e.target.value === 'rt') {
                createChart(rtLabels, rtCounts, 'Jumlah Penduduk per RT');
            } else if (e.target.value === 'rw') {
                createChart(rwLabels, rwCounts, 'Jumlah Penduduk per RW');
            }
        });

        // Default: tampilkan grafik RT saat halaman dimuat
        createChart(rtLabels, rtCounts, 'Jumlah Penduduk per RT');
    </script>
@endsection
