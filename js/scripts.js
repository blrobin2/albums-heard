var Albums = {
  init: function( config ) {
    this.config = config;

    $.ajaxSetup({
      url: 'index.php',
      type: 'POST'
    });

    this.setupTemplates();
    this.bindEvents();

    $('button').remove();
  },

  bindEvents: function() {
    this.config.letterSelection.on( 'change', this.fetchAlbum );
    this.config.artistsList.on( 'click', 'li', this.displayAlbumInfo);
    this.config.albumInfo.on( 'click', 'span.close', this.closeOverlay );
  },

  setupTemplates: function() {
    this.config.artistListTemplate = Handlebars.compile( this.config.artistListTemplate );
    this.config.albumInfoTemplate = Handlebars.compile( this.config.albumInfoTemplate );

    Handlebars.registerHelper('artistAlbum', function( artist ) {
      return artist.Artist + ": " + artist.Album;
    });
  },

  fetchAlbum: function() {
    self = Albums;

    self.config.albumInfo.slideUp(300);

    $.ajax({
      data: self.config.form.serialize(),
      dataType: 'json',
      success: function(results) {
        self.config.artistsList.empty();
        if ( results[0] ){
          self.config.artistsList.append( self.config.artistListTemplate( results ) );
        } else {
          self.config.artistsList.append('<li>Nothing Returned</li>');
        }
      }
    });
  },

  displayAlbumInfo: function( e ) {
    var self = Albums;
    $.ajax({
      data: { album_id: $(this).data( 'album_id') }
    }).done(function( results ) {
      self.config.artistsList.empty();
      self.config.albumInfo.html( self.config.albumInfoTemplate( { info: results }) ).slideDown(300);
    });
    e.preventDefault();
    $(document.body).html($(document.body).html().replace("*", "★"));
  },

  closeOverlay: function() {
    Albums.config.albumInfo.fadeOut(300);
  }
};

Albums.init({
  letterSelection: $('#q'),
  form: $('#artist-selection'),
  artistListTemplate: $('#artist_list_template').html(),
  albumInfoTemplate: $('#album_info_template').html(),
  artistsList: $('ul.artists_list'),
  albumInfo: $('.album_info')
});