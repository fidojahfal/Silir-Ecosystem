<!DOCTYPE html>
<html>

<head>
    <title>Tampilan Hasil JSON dari API Lokal</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>Tampilan Hasil JSON dari API Lokal</h1>

    <table>
        <thead>
            <tr>
                <th>Nama Event</th>
                <th>Penyelenggara</th>
            </tr>
        </thead>
        <tbody id="data-container">
            <tr>
                <td>Loading...</td>
                <td>Loading...</td>
            </tr>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'http://localhost:8000/api/eo/events',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    var data = response.data;
                    var html = '';

                    if (data) {
                        for (var x in data[0]) {
                            html += '<tr>';
                            html += '<td>' + data[0]['nama_event'] + '</td>';
                            html += '<td>' + x['penyelenggara'] + '</td>';
                            html += '</tr>';
                        }
                        html += '<tr>';
                        html += '<td>' + data[0]['nama_event'] + '</td>';
                        html += '<td>' + data[0]['penyelenggara'] + '</td>';
                        html += '</tr>';
                    } else {
                        html += '<tr>';
                        html += '<td colspan="2">No data available</td>';
                        html += '</tr>';
                    }

                    $('#data-container').html(html);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    var html = '<tr>';
                    html += '<td colspan="2">Error occurred while fetching data</td>';
                    html += '</tr>';
                    $('#data-container').html(html);
                }
            });
        });
    </script>
</body>

</html>
{{-- 
@foreach ($data['data'] as $item)
    <p>id_event: {{ $item['id_event'] }}</p>
    <p>nama_event: {{ $item['nama_event'] }}</p>
    <p>penyelenggara: {{ $item['penyelenggara'] }}</p>
    <p>deskripsi_event: {{ $item['deskripsi_event'] }}</p>
    <p>biaya_masuk: {{ $item['biaya_masuk'] }}</p>
    <p>waktu_start: {{ $item['waktu_start'] }}</p>
    <p>waktu_end: {{ $item['waktu_end'] }}</p>
    <p>banner_event: {{ $item['banner_event'] }}</p>
    <p>status_event: {{ $item['status_event'] }}</p>
@endforeach --}}
