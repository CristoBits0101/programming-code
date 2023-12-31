<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        
        .dropbtn                       {background-color: #04AA6D; color: white; padding: 16px; font-size: 16px; border: none; cursor: pointer;}
        .dropbtn:hover, .dropbtn:focus {background-color: #3e8e41;}
        .dropdown                      {position: relative; display: inline-block;}
        .dropdown-content              {display: none; position: absolute; background-color: #f6f6f6; min-width: 230px; overflow: auto; border: 1px solid #ddd; z-index: 1;}
        .dropdown-content a            {color: black; padding: 12px 16px; text-decoration: none; display: block;}
        .dropdown a:hover              {background-color: #ddd;}
        .show                          {display: block;}

        #myInput {box-sizing: border-box; background-image: url('searchicon.png'); background-position: 14px 12px; background-repeat: no-repeat; font-size: 16px; padding: 14px 20px 12px 45px; border: none; border-bottom: 1px solid #ddd;}
        #myInput:focus {outline: 3px solid #ddd;}

    </style>

</head>

<body>

    <h2>Menú desplegable de búsqueda y/o filtro.</h2>

    <p>Haga clic en el botón para abrir el menú desplegable y use el campo de entrada para buscar un enlace desplegable específico.</p>

    <div class="dropdown">

        <button onclick="myFunction()" class="dropbtn">Dropdown</button>

        <div id="myDropdown" class="dropdown-content">

            <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">

            <a href="#about"  >About  </a>
            <a href="#base"   >Base   </a>
            <a href="#blog"   >Blog   </a>
            <a href="#contact">Contact</a>
            <a href="#custom" >Custom </a>
            <a href="#support">Support</a>
            <a href="#tools"  >Tools  </a>

        </div>

    </div>

    <script>

        // Cuando el usuario hace clic en el botón, alternar entre ocultar y mostrar el contenido desplegable. 
        function myFunction() 
        {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        function filterFunction() 
        {
            var input, filter, ul, li, a, i;

            input  =    document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div    =    document.getElementById("myDropdown");
            a      =         div.getElementsByTagName("a");

            for (i = 0; i < a.length; i++) 
            {
                txtValue = a[i].textContent || a[i].innerText;

                if (txtValue.toUpperCase().indexOf(filter) > -1) 
                {
                    a[i].style.display = "";
                } 
                
                else 
                {
                    a[i].style.display = "none";
                }
            }
        }

    </script>

</body>

</html>