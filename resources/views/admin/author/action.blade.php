<a href="{{ route('admin.author.edit', $model) }}" class="btn btn-warning">Edit</a>
<button href="{{ route('admin.author.destroy', $model) }}" class="btn btn-danger" id="delete">Hapus</button>

<script>
    $('button#delete').on('click', function(e){
        e.preventDefault();

        var href= $(this).attr('href');

        document.getElementById('deleteForm').action = href;
        document.getElementById('deleteForm').submit();
    })
</script>