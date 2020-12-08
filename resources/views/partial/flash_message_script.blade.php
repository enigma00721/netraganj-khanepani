<script type="text/javascript">
    $(document).ready(function(){
    
        $(".alert-success").fadeTo(5000, 500).slideUp(500, function(){
            $(".alert-success").slideUp(500);
        });
        $(".alert-danger").fadeTo(5000, 500).slideUp(500, function(){
            $(".alert-danger").slideUp(500);
        });

    });
</script>