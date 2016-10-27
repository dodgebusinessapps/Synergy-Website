$(document).foundation()

(function() {
  /**
   * Video element
   * @type {HTMLElement}
   */
  var video = document.getElementById("bg-video");

  /**
   * Check if video can play, and play it
   */
  video.addEventListener( "canplay", function() {
    video.play();
  });
})();
