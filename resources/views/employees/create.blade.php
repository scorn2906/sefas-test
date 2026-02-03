<!DOCTYPE html>
<html>
<head>
    <title>Tambah Karyawan</title>
    <style>
        form { width: 400px; margin: auto; }
        input, select { width: 100%; padding: 8px; margin-bottom: 10px; }
        button { padding: 8px 12px; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Tambah Karyawan</h2>

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="name" required>

        <label>Tanggal Lahir:</label>
        <input type="date" name="birth_date" required>

        <label>Jabatan:</label>
        <select name="position_id" required>
            @foreach($positions as $p)
                <option value="{{ $p->id }}">{{ $p->name }}</option>
            @endforeach
        </select>

        <label>Kota:</label>
        <select name="city_id" required>
            @foreach($cities as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>

        <button type="submit">Simpan</button>
        <a href="{{ route('employees.index') }}">Batal</a>
    </form>
</body>
</html>
