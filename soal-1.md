1.Jelaskan konsep MVC?

Jawab:
pada dasarnya konsep mvc itu konsep pada sebuah arsitektur yang memisahkan antara controller, views, dan model yang bertujuan untuk memudahkan dalam proses development dan membuat system design yang lebih terstrukur.

- controller berfungsi untuk memproses input atau request dari pengguna sebagai perantara antara view dan model
- view sebagai tampilan atau User interface yang biasa nya berisi file html
- model berguna untuk mengatur, memproses dan berisi proses logika dan akan berhubungan langsung dengan database

    4.Buat function untuk menghitung selisih dari 2 input tanggal dalam bentuk dd/mm/yyyy

Jawab:

```php
    function dateDifference($date1, $date2)
    {
        $d1 = \DateTime::createFromFormat('d/m/Y', $date1);
        $d2 = \DateTime::createFromFormat('d/m/Y', $date2);

        if (!$d1 || !$d2) return false;

        $diff = $d1->diff($d2);

        return [
            'years' => $diff->y,
            'months' => $diff->m,
            'days' => $diff->d,
        ];
    }
```
