// if (typeof jQuery != 'undefined') {
//     alert("jQuery library is loaded!");
// }else{
//     alert("jQuery library is not found!");
// }
// *************************************************

$(document).ready(function(){


     var $name = $('#name');
     var $add = $('#add');

     $name.keyup(function(){
        if($(this).val().length > 0){
            $(this).css({
                borderColor : 'green',
                color : 'green'
            });
        }else{
            e.preventDefault();
            var $erreur = alert("il faut saisir un nom, s'il vous plaît!");
            $erreur;
                $(this).css({
                    border : 'red',
                    color : 'red'
                });

        }
    });
});
