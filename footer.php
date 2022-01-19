<script>
  $(document).ready(function() {
    $("#employees_form").validate({
      rules: {
        firstname: {
          required: true,
          minlength: 3
        },
        lastname: {
          required: true,
          minlength: 3
        },
        contact: {
          required: true,
          minlength: 10,
          maxlength: 10
        },
      },
      messages: {
        firstname: {
          minlength: "Firstname should be at least 3 characters"
        },
        lastname: {
          minlength: "Lastname should be at least 3 characters"
        },
        contact: {
          minlength: "Contact Number Not Valid"
        },
      }
    });
  });
</script>
</body>

</html>