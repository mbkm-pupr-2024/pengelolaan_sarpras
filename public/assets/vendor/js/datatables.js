$(document).ready(function () {

    "use strict";

    $('#datatable').DataTable();

    $('#datatable1').DataTable({
        order: [[ 1, "asc" ]],
        columns: [
            { orderable: false },  // Kolom kedua tanpa sorting
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            { orderable: false },  // Kolom kedua tanpa sorting
        ],
    });

    $('#datatable2').DataTable({
        order: [[ 1, "asc" ]],
    });

    $('#datatable3').DataTable({
        "scrollX": true
    });

    $('#datatable4 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#datatable4').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
});