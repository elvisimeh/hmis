<script src="../assets/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/datatables/dataTables.bootstrap.min.js"></script>
<script src="../assets/datatables/dataTables.buttons.min.js"></script>
<script src="../assets/datatables/buttons.flash.min.js"></script>
<script src="../assets/datatables/jszip.min.js"></script>
<script src="../assets/datatables/pdfmake.min.js"></script>
<script src=".../assets/datatables/vfs_fonts.js"></script>
<script src="../assets/datatables/buttons.html5.min.js"></script>
<script src="../assets/datatables/buttons.print.min.js"></script>
<script src="../assets/datatables/dataTables.fixedHeader.min.js"></script>
<script src="../assets/datatables/dataTables.select.min.js"></script>
<script src="../assets/datatables/buttons.colVis.min.js"></script>


<script>
$(document).ready(function () {
    $('#portrait_searchdata').DataTable({
        fixedHeader: true,
        pageLength: 50,
        select: {
            style: 'single'
        },
        dom: 'Bfrtip',
            buttons: [
            {   extend: 'colvis',
                text: '<span class="fa fa-eye-slash" style="color:#ff0000"></></span> COLUMN HEAD',
                className: 'btn btn-default btn-xs',
                titleAttr: 'Column Visibility',
                columnText: function ( dt, idx, title ) {
                return (idx+1)+': '+title;
                }
            },
            {   extend: 'pdf',
                exportOptions: {
                    columns: ':visible'
                },
                orientation: 'portrait',
                pageSize: 'A4',
                text:'<span class="fa fa-file-pdf" style="color:#c9302c"></></span>',
                className: 'btn btn-default btn-xs',
                ButtonClass: 'button_pdf',
                titleAttr: 'Generate PDF report'
            },
            {   extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }, 
                text:'<span class="fa fa-file-excel" style="color:#449d44"></span>',
                className: 'btn btn-secondary btn-xs',
                titleAttr: 'Export to excel'
            },
            {   extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }, 
                text:'<span class="fa fa-print" style="color:#ec971f"></span>',
                className: 'btn btn-info btn-xs',
                titleAttr: 'Send to printer' 
            },
            {   extend: 'copy',
                exportOptions: {
                    columns: ':visible'
                }, 
                text:'<span class="fa fa-copy" style="color:#005384"></span>',
                className: 'btn btn-info btn-xs',
                titleAttr: 'Copy to clipboard'
            },
            
        ],
        columnDefs: [ {
            //targets: -1,
            visible: false
        } ],
        "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Record does not exist - sorry",
            //"info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Quick Search:",
            "searchPlaceholder": "enter keyword(s)"
        },
    });
    $('#landscape_searchdata').DataTable({
        fixedHeader: true,
        pageLength: 25,
        dom: 'Bfrtip',
            buttons: [
            {   extend: 'pdf',
                exportOptions: {
                    columns: ':visible'
                },
                orientation: 'landscape',
                pageSize: 'A4',
                text:'<span class="mdi mdi-file-pdf"></span>',
                className: 'btn btn-default btn-xs',
                titleAttr: 'Generate PDF report'
            },
            {   extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }, 
                text:'<span class="mdi mdi-file-excel"></span>',
                className: 'btn btn-secondary btn-xs',
                titleAttr: 'Export to excel'
            },
            {   extend: 'print',
                exportOptions: {
                    columns: ':visible'
                },
                orientation: 'landscape',
                pageSize: 'A4', 
                text:'<span class="mdi mdi-printer"></span>',
                className: 'btn btn-info btn-xs',
                titleAttr: 'Send to printer' 
            },
            {   extend: 'copy',
                exportOptions: {
                    columns: ':visible'
                }, 
                text:'<span class="mdi mdi-file-multiple"></span>',
                className: 'btn btn-info btn-xs',
                titleAttr: 'Copy to clipboard'
            },
            'colvis'
        ],
        columnDefs: [ {
            //targets: -1,
            visible: false
        } ],
        "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Record does not exist - sorry",
            //"info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Quick Search:",
            "searchPlaceholder": "enter keyword(s)"
        }
    });
});
</script>
