<button href="{{ route('admin.borrow.return', $model) }}" class="btn btn-info" id="return">
    Pengembalian Buku
</button>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('button#return').on('click', function(e){
        e.preventDefault();
        var href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah kamu yakin datanya sudah benar?',
            text: "Pastikan bahwa data dan buku yang dikembalikan sama!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, betul data sudah dicek!'
            }).then((result) => {
            if (result.value) {
                document.getElementById('returnForm').action = href;
                document.getElementById('returnForm').submit();
                Swal.fire(
                    'Dikembalikan!',
                    'Buku sudah dikembalikan',
                    'success'
                )
            }
        })
    })
</script>