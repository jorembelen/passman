
       <script>
        window.addEventListener('show-form', function (event) {
            $('#addAcct').modal('show');
        });
        window.addEventListener('show-edit-form', function (event) {
            $('#editAcct').modal('show');
        });
        window.addEventListener('show-info-form', function (event) {
            $('#viewAcct').modal('show');
        });
        window.addEventListener('show-viewPass-form', function (event) {
            $('#viewPass').modal('show');
        });
        window.addEventListener('show-viewEditPass-form', function (event) {
            $('#viewEditPass').modal('show');
        });
        window.addEventListener('hide-form', function (event) {
            $('#addAcct').modal('hide');
            $('#viewAcct').modal('hide');
            $('#editAcct').modal('hide');
            $('#viewPass').modal('hide');
            $('#viewEditPass').modal('hide');
        });
    </script>

