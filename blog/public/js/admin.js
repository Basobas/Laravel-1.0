function userActivate(id, test) {
    var button = test;

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url: '/userActive',
        data: {id: id}
    })
        .done(function (data) {
            console.log(data);
            if (data == 'active') {
                console.log(data);
                button.innerHTML = 'Make inactive';
            }
            else {
                console.log('inactive');
                button.innerHTML = 'Make active';
            }
        });
}