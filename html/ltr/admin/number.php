<script type="text/javascript">
		function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || (charCode > 31 && charCode <33))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }
        function onlyNumbers(e, t) 
        {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 47 && charCode < 58)||(charCode > 45 && charCode < 47))
                    return true;
                else
                    return false;
            }
            catch (err) 
            {
                alert(err.Description);
            }
        }
    </script>