<script>
    $(document).ready(function() {
        $("#cetak").DataTable({
            "searching": false,
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ]
        });
    })
</script>