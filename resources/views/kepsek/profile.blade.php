@extends('layout.master')

@section('content')
<div class="main">
    <div class="main-content">
	<div class="container-fluid">
			<div class="clearfix">
				<!-- LEFT COLUMN -->
				<div class="profile-left">
					<!-- PROFILE HEADER -->
					<div class="profile-header">
						<div class="overlay"></div>
						<div class="profile-main">
							<img src="{{$kepsek->getAvatar()}}" class="img-circle img-responsive" alt="Avatar">
							<h3 class="name">{{$kepsek->nama_depan}}</h3>
							<span class="online-status status-available">Available</span>
						</div>
					</div>
					<!-- END PROFILE HEADER -->
					<!-- PROFILE DETAIL -->
					<div class="profile-detail">
						<div class="profile-info">
							<h4 class="heading">Data Diri</h4>
							<ul class="list-unstyled list-justify">
                                <li>NIP <span>{{$kepsek->nip}}</span></li>
                                <li>Nama Depan <span>{{$kepsek->nama_depan}}</span></li>
								<li>Nama Belakang <span>{{$kepsek->nama_belakang}}</span></li>
								<li>Tempat Lahir <span>{{$kepsek->tempat_lahir}}</span></li>
								<li>Tanggal Lahir <span>{{$kepsek->tanggal_lahir}}</span></li>
								<li>Jenis Kelamin <span>{{$kepsek->jenis_kelamin}}</span></li>
                                <li>Agama <span>{{$kepsek->agama}}</span></li>
                                <li>Alamat : <p><span>{{$kepsek->alamat}}</span></p></li>
							</ul>
						</div>
                    <div class="text-center"><a href="/kepsek/{{$kepsek->id}}/edit" class="btn btn-primary">Edit Profile</a></div>
						</div>
						<!-- END PROFILE DETAIL -->
					</div>
					<!-- END LEFT COLUMN -->
					<!-- RIGHT COLUMN -->
					<!-- END TABBED CONTENT -->
					</div>
					<!-- END RIGHT COLUMN -->
			</div>
		</div>
	</div>
</div>
@stop
