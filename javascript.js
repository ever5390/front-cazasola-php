
// $(document).ready(function(){
//     $('.menu-oculto').on('click', function(){
//         $('.bloque-menu').css({
//             'display':'block',
//             'position':'absolute',
//             'top':'0',
//             'left':'0',
//             'z-index':'10'
//         });
//     });
// });


$(document).ready(function(){
    $('.menu-oculto').on('click', function(){
        $('.bloque-menu').toggleClass('mostrar');     
    });
});