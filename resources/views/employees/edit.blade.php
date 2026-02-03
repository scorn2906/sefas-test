<!DOCTYPE html>
<html>
<head>
    <title>Edit Karyawan</title>
    <style>
        form { width: 400px; margin: auto; }
        input, select { width: 100%; padding: 8px; margin-bottom: 10px; }
        button { padding: 8px 12px; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Edit Karyawan</h2>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nama:</label>
        <input type="text" name="name" value="{{ $employee->name }}" required>

        <label>Tanggal Lahir:</label>
        <input type="date" name="birth_date" value="{{ $employee->birth_date }}" required>

        <label>Jabatan:</label>
        <select name="position_id" required>
            @foreach($positions as $p)
                <option value="{{ $p->id }}" {{ $employee->position_id == $p->id ? 'selected' : '' }}>
                    {{ $p->name }}
                </option>
            @endforeach
        </select>

        <label>Kota:</label>
        <select name="city_id" required>
            @foreach($cities as $c)
                <option value="{{ $c->id }}" {{ $employee->city_id == $c->id ? 'selected' : '' }}>
                    {{ $c->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Update</button>
        <a href="{{ route('employees.index') }}">Batal</a>
    </form>
</body>
</html>
