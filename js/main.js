$(function() {
  // change title
  document.title = "Welcome to " + window.site_config.building_name;

  // change survey links
  $(".survey_links").attr("href", window.site_config.survey_links);

  // --------------------------------------------------
  // social media href replacement
  // --------------------------------------------------
  var e_building = encodeURIComponent(window.site_config.building_name),
      e_url      = encodeURIComponent(window.site_config.url),
      e_title    = encodeURIComponent(window.site_config.social_title);

  $("#fb").attr("href", 'http://www.facebook.com/sharer.php?s=100&p[title]=' + e_building + '&p[url]=' + e_url + '&p[summary]=' + e_title);
  $("#li").attr("href", 'http://www.linkedin.com/shareArticle?mini=true&url=' + e_url+ '&title=' + e_title);
  $("#tw").attr("href", 'https://twitter.com/share?url=' + e_url+ '&text=' + e_title);
  $("#mg").attr("href", 'mailto:?body=' + e_url+ '&subject=' + e_title);

  // --------------------------------------------------
  // Handlebars text replacement
  // --------------------------------------------------
  // section: slide heading
  var source   = $("#slidesection-template").html();
  var template = Handlebars.compile(source);
  $("#slidesection").prepend(template(window.site_config));

  // section: what is
  source   = $("#whatis-template").html();
  template = Handlebars.compile(source);
  $("#whatis").html(template(window.site_config));

  // section: help
  source   = $("#help-template").html();
  template = Handlebars.compile(source);
  $("#help").html(template(window.site_config));

  // section: chances
  source   = $("#chances-template").html();
  template = Handlebars.compile(source);
  $("#chances > .cont").prepend(template(window.site_config));

  // --------------------------------------------------
  // Actions
  // --------------------------------------------------
  $("#fb, #li, #tw").click(function(e) {
    e.preventDefault();
    window.open($(this).attr("href"), 'Share on social network', 'width=626,height=436');
  });

  $('#carousel').carouFredSel({
    auto: false,
    responsive: true,
    pagination: "#slideshownav"
  });

  $("#playmobile").click(function(e) {
    e.preventDefault();
    $("#jquery_jplayer_1").jPlayer("play");
  });
});
