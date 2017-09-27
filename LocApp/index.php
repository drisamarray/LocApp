<html>
<head>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    <!-- Include JS File Here -->

    <!-- Include JS File Here -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTBYRZ3zAUQ81jl-x8Y8J14WqVIP4Es9g&libraries=places"></script>
    <style>label{ color:darkblue
            }</style>
    <script>


        google.maps.event.addDomListener(window,'load',init );

        function init() {
            var autocomplete = new google.maps.places.Autocomplete(document.getElementById('adresse'));

            google.maps.event.addListener(autocomplete, 'place_changed', function () {

                var place = autocomplete.getPlace();

                document.getElementById('lat').value=place.geometry.location.lat();
                document.getElementById('long').value=place.geometry.location.lng();

            });
        }

        function ptk(){
//  $( document ).ready(function() {
//            $("#btn").click(function(){
//
//                var vname = '122323';
//                var vemail = '1456456456546';
//
//
//                if(vname=='' && vemail=='')
//                {
//                    alert("le formulaire n<est pas complete ");
//                }
//                           else{
//                    $.post("bd.php",
//                        {
//                            name:vname,
//                            email:vemail
//                        },
//                        function(response,status){ //
//                            //alert("*----
// ----*\n\nResponse : " + response+"\n\nStatus : " + status);
// "response" dans response recoit ce qu'on a mis dans notre script php
//                             });
//                }
//            });
            var lat =document.getElementById('lat').value;
            var long = document.getElementById('long').value;
            var prenom= document.getElementById('prenom').value;
            var nomfamille= document.getElementById('nfamille').value;
            var adresse= document.getElementById('adresse').value;
            var prix=document.getElementById('prix').value;

            console.log(lat);
            console.log(long);
            $.ajax({
                type:"POST",
                url: "bd.php",
                data: "lat=" + lat + "&long="+ long+"&prenom="+prenom+"&nfamille="+nomfamille+"&adresse="+adresse+"&prix="+prix,
                success: function(result){

                    window.location.href = "dropPhotos.php";
                },
                error: function(data) {
                }
            });
        }
    </script>

</head>
<body>
<div id="formLocation">
    <h1>Formulaire Inscription de location (jQuery Ajax )</h1>
    <hr>
    <form id="form" method="" action="">

        <div ><label>Prenom</label>
            <input type="text" name="prenom" id="prenom"  style="width: 300px" placeholder="prenom"/><br></div>
        <br>
        <div><label>Nom famille</label>
            <input type="text" name="nfamille" id="nfamille"  style="width: 300px" placeholder="nom famille"/><br></div>
        <br>
        <div ><label>Adresse</label>
            <input type="text" name="adresse" id="adresse"  style="width: 300px" placeholder="adresse"/><br></div>
        <br>
        <div ><label>Prix de location</label>
            <input type="text" name="prix" id="prix"  style="width: 300px" placeholder="prix"/><br></div>

        <input type="text" hidden id="lat" value="">
        <input type="text" hidden id="long" value="">
<br>

    </form>

    <button onclick="ptk()">Continuer</button>
    <label id="successmessage"></label>
</div>
</body>
</html>
