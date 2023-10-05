@auth
@extends('layout.main')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>{{ $page_title }}</h1>
                        <span>{{ $page_description }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                TESTING INPUT QR <input type="text" id="qrInput" readonly placeholder="ini hasil scannya">
                
                {{-- <div class="col-md-9" >
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="fruitTabs" role="tablist">
                                @foreach ($hari_minggus as $index => $sunday)
                                    @php
                                        $formattedDate = \Carbon\Carbon::parse($sunday)->isoFormat('dddd, D MMMM YYYY');
                                        $tabId = 'tab_' . $index;
                                    @endphp
                                    <li class="nav-item">
                                        <a class="nav-link {{ $index === 0 ? 'active' : '' }}" 
                                           id="{{ $tabId }}-tab" 
                                           data-toggle="tab" 
                                           href="#{{ $tabId }}" 
                                           role="tab" 
                                           aria-controls="{{ $tabId }}" 
                                           aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                                            {{ $formattedDate }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        
                            <div class="tab-content" id="fruitTabContent">
                                @foreach ($hari_minggus as $index => $sunday)
                                    @php
                                        $fruits = ['Apple', 'Banana', 'Orange', 'Grapes', 'Watermelon'];
                                        $tabId = 'tab_' . $index;
                                    @endphp
                                    <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" 
                                         id="{{ $tabId }}" 
                                         role="tabpanel" 
                                         aria-labelledby="{{ $tabId }}-tab">
                                        <ul>
                                            @foreach ($fruits as $fruit)
                                                <li>{{ $fruit }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                            <script>
                                $(document).ready(function() {
                                    // Aktifkan tab pertama
                                    $('#fruitTabs a:first').tab('show');
                                    
                                    // Mengatur event handler saat tab di klik
                                    $('#fruitTabs a').on('click', function (e) {
                                        e.preventDefault();
                                        $(this).tab('show');
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Data {{ $page_title }}</h5>
                        </div>
                        <div class="card-body">
                            <table id="datatable1" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Jemaat</th>
                                        <th>Jumlah Kehadiran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->kehadiran }}</td>
                                            <td class="d-flex justify-content-center">
                                                aksi
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endauth
