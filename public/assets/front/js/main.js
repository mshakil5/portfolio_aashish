$(document).ready(function(){

            new Photostack( document.getElementById( 'photostack-3' ), {
                callback : function( item ) {
                    //console.log(item)
                }
            } );
	
})

var mycls = document.getElementsByClassName('nav-link');
for (let i = 0; i <= mycls.length; i++) {
    mycls[i].addEventListener("click", function () {
        for (var j = 0; j < mycls.length; j++) {
            mycls[j].classList.remove('active-link');
        }
        this.classList.add('active-link');
    });
}