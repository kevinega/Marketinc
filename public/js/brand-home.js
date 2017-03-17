$(document).ready(function() {
  // AJAX function to change the form by user input
  $('#urlKu').change(function() {
    $.ajax({
      url: '/brand/article/extractUrl',
      type: 'post',
      dataType: 'json',
      data: {
        "_token": "{{ csrf_token() }}",
        "url": $('#urlKu').val()
      },
      success: function(data) {
        $('#title').val(data.message.title); // change the title form input
        $('#author').val(data.message.author); // change the author form input
        $('#description').val(data.message.description); // change the description form input
      },
      error: function(e) {
        console.log('Form AJAX failed.');
      }
    });
  });

  // AJAX function to load the articles from the database
  $.ajax({ 
    url: '/brand/embedArticle', 
    type: 'get',
    async:false,
    dataType: 'json', 
    success: function(data) { 
      if (data.status == 'success') {
        var articles = data.message,
        htmlText = title = image = url= author = description = providerName = providerUrl = '';

        for (var key in articles) {
          title = data.message[key].title;
          image = data.message[key].image;
          url = data.message[key].url;
          author = data.message[key].author;
          description = data.message[key].description;
          providerName = data.message[key].provider_name;
          providerUrl = data.message[key].provider_url;

          htmlText += '<div class="card" style="width: 20rem;">';
          htmlText += '<img class="card-img-top" src=' + image + ' alt="Card image cap"></img>';
          htmlText += '<div class="card-block">';
          htmlText += '<h4 class="card-title">' + title + '</h4>';
          htmlText += '<p class="card-text">' + description + '</p>';
          htmlText += '</div>';
          htmlText += '</div>';
        }

        $('.articles').append(htmlText);
      } else {
        var htmlText = data.message;
        $('.articles').append(htmlText);
      }
    },
    error: function(e) { 
      console.log('Get data from database failed.'); 
    } 
  }); 
});
//# sourceMappingURL=brand-home.js.map
