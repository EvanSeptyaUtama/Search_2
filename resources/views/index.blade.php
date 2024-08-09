<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Fitur Search With Relationship Between Table</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <form action="/search" method="get" class="d-flex" role="search">

                                    <div class="input-group">
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" name="nama" value="nama"
                                                {{ request()->input('nama') ? 'checked' : '' }}
                                                class="form-check-input">
                                            <label class="form-check-label" for="inlineCheckbox1">Name</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" name="nis" value="nis"
                                                {{ request()->input('nis') ? 'checked' : '' }} class="form-check-input">
                                            <label class="form-check-label" for="inlineCheckbox1">Nis</label>
                                        </div>
                                    </div>
                                    <input class="form-control me-2" name="search" type="search"
                                        placeholder="Search...."
                                        value="{{ request()->input('search') ? request()->input('search') : '' }}"
                                        aria-label="Search">
                                    <button class="btn btn-primary" type="submit">Search
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nis</th>
                                    <th scope="col">Usia</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Mata kuliah</th>
                                    <th scope="col">Guru</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($siswas as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->nis }}</td>
                                        <td>{{ $item->usia }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->matakuliah->nama_matakuliah }}</td>
                                        <td>{{ $item->guru->nama }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td><i>Data Tidak Ditemukan</i></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>
