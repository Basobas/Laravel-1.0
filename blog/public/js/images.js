// function ImageClicked(e) {
//     var ImageClicked = e.currentTarget;
//     console.log(ImageClicked.id);
// }
//addEventListener('click', ImageClicked);

function details(imageId){
    var photoId = imageId;

}

function isLiked(id, test, element){

    var imageId = id;
    var liked = test;
    console.log(liked , imageId);

    var volgendeknop = element.nextElementSibling;
    var vorigeknop = element.previousElementSibling;

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

            }
            //gebruiker geeft een dislike
            else if(liked == 'dislike' && element.src == 'http://localhost:8000/imagesButtons/down.png'){
                element.src = 'imagesButtons/downRed.png';
                vorigeknop.src = 'imagesButtons/up.png';

            }
            //gebruiker had een dislike gegeven maar ongedaan gemaakt.
            else if(liked == 'dislike' && element.src == 'http://localhost:8000/imagesButtons/downRed.png'){
                element.src =  'imagesButtons/down.png';
                vorigeknop.src = 'imagesButtons/up.png';

            }
            else if(liked == 'like' && element.src == 'http://localhost:8000/imagesButtons/upGreen.png'){
                element.src = 'imagesButtons/up.png';
                volgendeknop.src = 'imagesButtons/down.png';

            }
            else{
                console.log('error');
            }
        });
}
