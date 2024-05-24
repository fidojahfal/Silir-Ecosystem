@foreach ($data['data'] as $item)
    {{-- @if ($item['waktu_start'] == '2011-05-30') --}}
    <p>id_event: {{ $item['id_event'] }}</p>
    <p>nama_event: {{ $item['nama_event'] }}</p>
    <p>penyelenggara: {{ $item['penyelenggara'] }}</p>
    <p>deskripsi_event: {{ $item['deskripsi_event'] }}</p>
    <p>biaya_masuk: {{ $item['biaya_masuk'] }}</p>
    <p>waktu_start: {{ $item['waktu_start'] }}</p>
    <p>waktu_end: {{ $item['waktu_end'] }}</p>
    <p>banner_event: {{ $item['banner_event'] }}</p>
    <p>status_event: {{ $item['status_event'] }}</p>
    <img src="{{ 'http://localhost:8000/storage/banner_event/' . $item['banner_event'] }}" alt="Event Image">
    <a href="{{ route('event.edit', $item['id_event']) }}">Edit</a>
    <a href="{{ route('event.destroy', $item['id_event']) }}">Delete</a>
    {{-- @endif --}}
@endforeach
