<!DOCTYPE html>
<html>
<head>
    <title>Daftar Karyawan</title>
    @vite('resources/css/app.css')
    <style>
        table { border-collapse: collapse; width: 80%; margin: auto; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        a, button { margin-right: 5px; }
        .center { text-align: center; margin: 20px; }
    </style>
</head>
<body>

    <header class="crm-header">
        <a href="{{ route('employees.index') }}" class="crm-logo">CRM</a>

        <div class="crm-search">
            <form action="" method="GET">
                <input type="text" name="q" placeholder="Search..." value="{{ request('q') }}">
                <button type="submit"></button>
            </form>
        </div>
    </header>
    <nav class="crm-nav">
        <a href="#" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            Home
        </a>
        <a  href="#" class="{{ request()->routeIs('activities') ? 'active' : '' }}">
            Activities
        </a>
        <a  href="#" class="{{ request()->routeIs('relationships') ? 'active' : '' }}">
            Relationships
        </a>
        <a href="#" class="{{ request()->routeIs('transactions') ? 'active' : '' }}">
            Transactions
        </a>
        <a href="#" class="{{ request()->routeIs('inventory') ? 'active' : '' }}">
           Inventory
        </a>
        <div class="crm-nav-item" style="position: relative;">
            <a href="#" id="settingsDropdown">
                Settings
            </a>
            <div id="settingsDropdownMenu" class="dropdown-menu-custom" style="display: none;">
                <a href="#">Users</a>
                <a href="#">Roles</a>
                <a href="#">Employee</a>
            </div>
        </div>
        <a href="#" class="{{ request()->routeIs('report') ? 'active' : '' }}">
            Report
        </a>
    </nav>

    <h1 class="center">Daftar Karyawan</h1>

    <div class="center">
        <a href="{{ route('employees.create') }}">Tambah Karyawan</a>
    </div>

    <table>
        <tr>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Jabatan</th>
            <th>Kota</th>
            <th>Aksi</th>
        </tr>

        @foreach ($employees as $e)
        <tr>
            <td>{{ $e->name }}</td>
            <td>{{ \Carbon\Carbon::parse($e->birth_date)->format('d/m/Y') }}</td>
            <td>{{ $e->position->name }}</td>
            <td>{{ $e->city->name }}</td>
            <td>
                <a href="{{ route('employees.edit', $e->id) }}">Edit</a>
                <form action="{{ route('employees.destroy', $e->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin mau hapus?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <script>
        const dropdownButton = document.getElementById('settingsDropdown');
        const dropdownMenu = document.getElementById('settingsDropdownMenu');

        dropdownButton.addEventListener('click', function(e) {
            e.preventDefault();
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });

        document.addEventListener('click', function(e) {
            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.style.display = 'none';
            }
        });
    </script>
</body>
</html>
