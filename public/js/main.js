$(document).ready(function() {
    var urls = ['https://wallpapercave.com/wp/wp4368683.jpg', 'https://wallpapercave.com/wp/wp4198956.jpg', 'https://wallpapercave.com/wp/wp5231505.jpg', 'https://wallpapercave.com/wp/wp5231517.jpg', 'https://wallpapercave.com/wp/wp5231533.jpg', 'https://wallpapercave.com/wp/wp5231535.jpg', 'https://wallpapercave.com/wp/wp5231555.jpg'];

    var cout = 1;
    $('body').css('background-image', 'url("' + urls[0] + '")');
    setInterval(function() {
        $('body').css('background-image', 'url("' + urls[cout] + '")');
        cout == urls.length - 1 ? cout = 0 : cout++;
    }, 15000);

});