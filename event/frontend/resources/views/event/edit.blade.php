<h1>Edit</h1>
@php
    $item = $data['data'];
    $id = $item['id_event'];
@endphp
<form method="POST" action="{{ route('event.update', $id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="nama_event" placeholder="" value="{{ $item['nama_event'] }}">
    <input type="text" name="penyelenggara" placeholder="" value="{{ $item['penyelenggara'] }}">
    <input type="text" name="deskripsi_event" placeholder="" value="{{ $item['deskripsi_event'] }}">
    <input type="number" name="biaya_masuk" placeholder="" value="{{ $item['biaya_masuk'] }}">
    <input type="date" name="waktu_start" placeholder="" value="{{ $item['waktu_start'] }}">
    <input type="date" name="waktu_end" placeholder="" value="{{ $item['waktu_end'] }}">
    <input type="file" name="banner_event" id="banner_event">
    <input type="text" name="status_event" placeholder="" value="{{ $item['status_event'] }}">
    <button type="submit">Kirim</button>
</form>
