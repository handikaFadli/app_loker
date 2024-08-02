@extends('admin.layouts.main')

@section('title')
		Portal Lowongan Kerja - Dashboard
@endsection

@section('content-admin')
<div class="container-fluid">
	<div class="row page-titles mx-0">
		<div class="col-sm-6 p-md-0">
			<div class="welcome-text">
				<h4>Hi, welcome back!</h4>
				<p class="mb-0">Ini halaman dashboard anda!</p>
			</div>
		</div>
		<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-6">
			<div class="card">
				<div class="stat-widget-one card-body">
					<div class="stat-icon d-inline-block">
						<i class="ti-check text-success border-success"></i>
					</div>
					<div class="stat-content d-inline-block">
						<div class="stat-text">Lamaran Acc</div>
						<div class="stat-digit">{{ $acceptedApplicationCount }}</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card">
				<div class="stat-widget-one card-body">
					<div class="stat-icon d-inline-block">
						<i class="ti-user text-primary border-primary"></i>
					</div>
					<div class="stat-content d-inline-block">
						<div class="stat-text">Pelamar</div>
						<div class="stat-digit">{{ $registeredApplicantCount }}</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card">
				<div class="stat-widget-one card-body">
					<div class="stat-icon d-inline-block">
						<i class="ti-email text-pink border-pink"></i>
					</div>
					<div class="stat-content d-inline-block">
						<div class="stat-text">Lamaran</div>
						<div class="stat-digit">{{ $applicationCount }}</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card">
				<div class="stat-widget-one card-body">
					<div class="stat-icon d-inline-block">
						<i class="icon-doc text-danger border-danger"></i>
					</div>
					<div class="stat-content d-inline-block">
						<div class="stat-text">Lowongan</div>
						<div class="stat-digit">{{ $jobCount }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-sm-6">
			<div class="card">
					<div class="card-header">
							<h4 class="card-title">Jumlah Lamaran per Bulan</h4>
					</div>
					<div class="card-body">
							<canvas id="areaChartLamaran"></canvas>
					</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-6 col-xxl-6 col-md-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Lowongan Paling Banyak Dilamar</h4>
				</div>
				<div class="card-body">
					<div class="recent-comment m-t-15">
						
						@foreach($mostAppliedJobs as $index => $job)
								<div class="media">
										<div class="media-left">
												{{ $index + 1 }}
										</div>
										<div class="media-body">
												<h4 class="media-heading text-primary">{{ $job->judul }}</h4>
												<p class="comment-date">{{ $job->lamaran_count }} Lamaran</p>
										</div>
								</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
		<script>
			const areaChartLamaran = document.getElementById("areaChartLamaran").getContext('2d');
    
    areaChartLamaran.height = 100;
		const monthNames = @json($monthNames);
    const labels = @json(array_keys($applicationsPerMonth)).map(month => monthNames[month] || month);
  	const data = @json(array_values($applicationsPerMonth));

    new Chart(areaChartLamaran, {
        type: 'line',
        data: {
            defaultFontFamily: 'Poppins',
            labels: labels,
            datasets: [
                {
                    label: "Jumlah Lamaran per Bulan",
                    data: data,
                    borderColor: 'rgba(0, 0, 1128, .3)',
                    borderWidth: "1",
                    backgroundColor: 'rgba(0, 171, 197, .5)', 
                    pointBackgroundColor: 'rgba(0, 0, 1128, .3)'
                }
            ]
        },
        options: {
            legend: false, 
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true, 
                        max: 100, 
                        min: 0, 
                        stepSize: 20, 
                        padding: 10
                    }
                }],
                xAxes: [{ 
                    ticks: {
                        padding: 5
                    }
                }]
            }
        }
    });
		</script>
@endsection