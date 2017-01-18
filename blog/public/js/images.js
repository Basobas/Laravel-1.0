// function ImageClicked(e) {
//     var ImageClicked = e.currentTarget;
//     console.log(ImageClicked.id);
// }
//addEventListener('click', ImageClicked);

function details(imageId){
    var photoId = imageId;

}

function isLiked(id, test, total, element){

    var imageId = id;
    var liked = test;
    console.log(liked , imageId);

    var volgendeknop = element.nextElementSibling;
    var vorigeknop = element.previousElementSibling;

    var totalscoreDislike = element.previousElementSibling.previousElementSibling;
    var totalscoreLike = element.previousElementSibling;


    var totalScore = parseInt(total);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url: '/imageLike',
        data: {liked: liked, imageId: imageId }
    })

        .done(function(data){
            // volgendeknop.src = 'test';
            console.log(data);

            //gebruiker geeft een like
            if(liked == 'like' && element.src == 'http://localhost:8000/imagesButtons/up.png'){
                element.src = 'imagesButtons/upGreen.png';
                volgendeknop.src ='imagesButtons/down.png';
                totalscoreLike.innerHTML = data;

            }
            //gebruiker geeft een dislike
            else if(liked == 'dislike' && element.src == 'http://localhost:8000/imagesButtons/down.png'){
                element.src = 'imagesButtons/downRed.png';
                vorigeknop.src = 'imagesButtons/up.png';
                totalscoreDislike.innerHTML = data;

            }
            //gebruiker had een dislike gegeven maar ongedaan gemaakt.
            else if(liked == 'dislike' && element.src == 'http://localhost:8000/imagesButtons/downRed.png'){
                element.src =  'imagesButtons/down.png';
                vorigeknop.src = 'imagesButtons/up.png';
                totalscoreDislike.innerHTML = data;

            }
            else if(liked == 'like' && element.src == 'http://localhost:8000/imagesButtons/upGreen.png'){
                element.src = 'imagesButtons/up.png';
                volgendeknop.src = 'imagesButtons/down.png';

                totalscoreLike.innerHTML = data;

            }
            else{
                console.log('error');
            }
        });
}
function ImageActivate(id, active, test){
    var button = test;

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url: '/ImageActive',
        data: {id: id, active: active}
    })
        .done(function(data){
            console.log(data);
            if (data == 'active'){
                console.log(data);
                button.innerHTML = 'Make inactive';
            }
            else{
                console.log('inactive');
                button.innerHTML = 'Make active';
            }


    });


}