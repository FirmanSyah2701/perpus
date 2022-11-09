<a href="{{ route('admin.author.edit', $model) }}" class="btn btn-warning">
    Ubah
</a>
<button href="{{ route('admin.author.destroy', $model) }}" class="btn btn-danger" id="deleteAuthor">
    Hapus
</button>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('button#deleteAuthor').on('click', function(e){
        e.preventDefault();
        var href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah kamu yakin hapus data ini?',
            text: "Data yang sudah dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus saja!'
            }).then((result) => {
            if (result.value) {
                document.getElementById('deleteFormAuthor').action = href;
                document.getElementById('deleteFormAuthor').submit();
                Swal.fire(
                    'Terhapus!',
                    'Data kamu berhasi dihapus.',
                    'success'
                )
            }
        })
    })
</script>