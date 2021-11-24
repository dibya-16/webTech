   function Delete() {
            document.getElementById("result").value = "" ; 

      }

        function calculator(NewValue){
            document.getElementById("result").value += NewValue; 

        }

    function equal() {
        var a = document.getElementById("result").value ; 
        var b = eval(a);
        document.getElementById("result").value = b;

    }