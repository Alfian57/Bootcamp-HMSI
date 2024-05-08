<div class="mx-1 d-inline">
    <form action="{{ $href }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <div class="d-flex text-end">
            <x-datatable::ui.button.index type="submit" class="btn-danger"
                onclick="return confirmation(event, 'Apakah anda ingin menghapus data ini?')">
                Hapus
            </x-datatable::ui.button.index>
        </div>
    </form>
</div>
