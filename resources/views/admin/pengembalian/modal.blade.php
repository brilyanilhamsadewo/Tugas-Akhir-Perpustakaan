<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Pengembalian Buku
</button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pengembalian Buku</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{-- <form action="#" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group @error('nama_peminjam') has-error @enderror">
                    <label for="">Nama Penerbit</label>
                    <input type="text" name="nama_peminjam" class="form-control" placeholder="Masukkan nama penerbit" value="{{ old('nama_peminjam') ?? $pinjam->nama_peminjam}}">
                    @error('nama_peminjam')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" value="Ubah" class="btn btn-primary">
                </div>
            </form> --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>