@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Buku Harian RO /</span> Daftar Harian RO
      </h4>
    @include('components.harianro.information')
    @include('components.harianro.table')
</div>
@endsection