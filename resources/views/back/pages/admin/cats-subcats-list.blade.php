@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    @livewire('admin-categories-subcategories-list')
@endsection


@push('scripts')
    <script>
        // Make the categories sortable
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
                    positions.push([$(this).attr("data-index"), $(this).attr("data-ordering")]);
                    $(this).removeClass("updated");
                });
                // alert(positions);
                Livewire.dispatch("updateCategoriesOrdering", [positions]);
                // window.livewire.emit("updateCategoriesOrdering", positions);
            }
        });

        // $(document).on('click', '.deleteCategoryBtn', function(e) {
        //     e.preventDefault();
        //     var category_id = $(this).data('id');
        //     // alert(category_id);

        //     swal.fire({
        //         title: 'Are you sure?',
        //         html: 'You want to delete this category',
        //         showCloseButton: true,
        //         showCancelButton: true,
        //         cancelButtonText: 'Cancel',
        //         confirmButtonText: 'Yes, Delete',
        //         cancelButtonColor: '#d33',
        //         confirmButtonColor: '#3085d6',
        //         width: 300,
        //         allowOutsideClick: false
        //     }).then(function(result) {
        //         if (result.value) {
        //             // alert('Yes,Delete category');

        //             Livewire.dispatch('deleteCategory', [category_id]);
        //             // window.livewire.emit('deleteCategory', category_id);

        //         }
        //     });
        // });
        $(document).on('click', '.deleteCategoryBtn', function(e) {
            e.preventDefault();
            var category_id = $(this).data('id');

            swal.fire({
                title: 'Are you sure?',
                html: 'You want to delete this category',
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, Delete',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                width: 300,
                allowOutsideClick: false
            }).then(function(result) {
                if (result.isConfirmed) {
                    // Trigger event deleteCategory setelah konfirmasi "Yes, Delete"
                    Livewire.emit('deleteCategory', category_id);
                }
            });
        });


        $('table tbody#sortable_subcategories').sortable({
            cursor: "move",
            update: function(event, ui) {
                $(this).children().each(function(index) {
                    if ($(this).attr("data-ordering") != (index + 1)) {
                        $(this).attr("data-ordering", (index + 1)).addClass("updated");
                    }
                });
                var positions = [];
                $(".updated").each(function() {
                    positions.push([$(this).attr("data-index"), $(this).attr("data-ordering")]);
                    $(this).removeClass("updated");
                });
                // Livewire.dispatch("updateSubCategoriesOrdering", [positions]);
                window.livewire.emit('updateSubCategoriesOrdering', positions);


            }
        });

        $('ul#sortable_child_subcategories').sortable({
            cursor: "move",
            update: function(event, ui) {
                $(this).children().each(function(index) {
                    if ($(this).attr("data-ordering") != (index + 1)) {
                        $(this).attr("data-ordering", (index + 1)).addClass("updated");
                    }
                });
                var positions = [];
                $(".updated").each(function() {
                    positions.push([$(this).attr("data-index"), $(this).attr("data-ordering")]);
                    $(this).removeClass("updated");
                });
                Livewire.dispatch("updateChildSubCategoriesOrdering", [positions]);
                // window.livewire.emit('updateChildSubCategoriesOrdering', positions);
            }
        });

        $(document).on('click', '.deleteSubCategoryBtn, .deleteChildSubCategoryBtn', function(e) {
            e.preventDefault();
            var subcategory_id = $(this).data('id');
            var title = $(this).data('title');

            swal.fire({
                title: 'Are you sure?',
                html: 'You want to delete this <b>' + title + '</b>',
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, Delete',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                width: 300,
                allowOutsideClick: false
            }).then(function(result) {
                if (result.isConfirmed) {
                    // Trigger event deleteSubCategory setelah konfirmasi "Yes, Delete"
                    Livewire.emit('deleteSubCategory', subcategory_id);
                }
            });
        });
    </script>
@endpush
