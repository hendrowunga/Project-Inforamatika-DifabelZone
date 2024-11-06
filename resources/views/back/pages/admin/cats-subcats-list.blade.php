@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    @livewire('admin-categories-subcategories-list')
@endsection

@push('scripts')
    <script>
        // Make the categories sortable
        $(document).ready(function() {
            $('table tbody#sortable_categories').sortable({
                cursor: "move",
                update: function(event, ui) {
                    $(this).children().each(function(index) {
                        if ($(this).attr("data-ordering") != (index + 1)) {
                            $(this).attr("data-ordering", (index + 1)).addClass("updated");
                        }
                    });
                    var positions = [];
                    $(".updated").each(function() {
                        positions.push([$(this).attr("data-index"), $(this).attr(
                            "data-ordering")]);
                        $(this).removeClass("updated");
                    });
                    // Call the Livewire event to update the ordering
                    Livewire.emit("updateCategoriesOrdering", positions);
                }
            });
        });

        // Delete category with confirmation
        $(document).on('click', '.deleteCategoryBtn', function(e) {
            e.preventDefault();
            var category_id = $(this).data('id');
            console.log(category_id); // Pastikan ID kategori tercetak di konsol
            Swal.fire({
                title: 'Are you sure?',
                text: 'You want to delete this category',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Trigger Livewire event to delete the category
                    Livewire.emit('deleteCategory', category_id);
                }
            });
        });
    </script>
@endpush
