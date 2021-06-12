"use strict";

function LIFT_Scale_WebSite() {
  var _iteratorNormalCompletion = true;
  var _didIteratorError = false;
  var _iteratorError = undefined;

  try {
    for (var _iterator = document.getElementsByTagName('html')[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
      var divMain = _step.value;
      // drag the section
      var _iteratorNormalCompletion2 = true;
      var _didIteratorError2 = false;
      var _iteratorError2 = undefined;

      try {
        for (var _iterator2 = divMain.getElementsByTagName('body')[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
          var divSection = _step2.value;
          // when mouse is pressed store the current mouse x,y
          var previousX, previousY;
          divSection.addEventListener('mousedown', function (event) {
            previousX = event.pageX;
            previousY = event.pageY;
          }); // when mouse is moved, scrollBy() the mouse movement x,y

          divSection.addEventListener('mousemove', function (event) {
            // only do this when the primary mouse button is pressed (event.buttons = 1)
            if (event.buttons) {
              var dragX = 0;
              var dragY = 0; // skip the drag when the x position was not changed

              if (event.pageX - previousX !== 0) {
                dragX = previousX - event.pageX;
                previousX = event.pageX;
              } // skip the drag when the y position was not changed


              if (event.pageY - previousY !== 0) {
                dragY = previousY - event.pageY;
                previousY = event.pageY;
              } // scrollBy x and y


              if (dragX !== 0 || dragY !== 0) {
                divMain.scrollBy(dragX, dragY);
              }
            }
          });
        } // zoom in/out on the section

      } catch (err) {
        _didIteratorError2 = true;
        _iteratorError2 = err;
      } finally {
        try {
          if (!_iteratorNormalCompletion2 && _iterator2["return"] != null) {
            _iterator2["return"]();
          }
        } finally {
          if (_didIteratorError2) {
            throw _iteratorError2;
          }
        }
      }

      var scale = 1;
      var factor = 0.05;
      var max_scale = 10;
      divMain.addEventListener('wheel', function (e) {
        // preventDefault to stop the onselectionstart event logic
        var _iteratorNormalCompletion3 = true;
        var _didIteratorError3 = false;
        var _iteratorError3 = undefined;

        try {
          for (var _iterator3 = divMain.getElementsByTagName('body')[Symbol.iterator](), _step3; !(_iteratorNormalCompletion3 = (_step3 = _iterator3.next()).done); _iteratorNormalCompletion3 = true) {
            var divSection = _step3.value;
            e.preventDefault();
            var delta = e.delta || e.wheelDelta;

            if (delta === undefined) {
              //we are on firefox
              delta = e.originalEvent.detail;
            }

            delta = Math.max(-1, Math.min(1, delta)); // cap the delta to [-1,1] for cross browser consistency

            offset = {
              x: divMain.scrollLeft,
              y: divMain.scrollTop
            };
            image_loc = {
              x: e.pageX + offset.x,
              y: e.pageY + offset.y
            };
            zoom_point = {
              x: image_loc.x / scale,
              y: image_loc.y / scale
            }; // apply zoom

            scale += delta * factor * scale;
            scale = Math.max(1, Math.min(max_scale, scale));
            zoom_point_new = {
              x: zoom_point.x * scale,
              y: zoom_point.y * scale
            };
            newScroll = {
              x: zoom_point_new.x - e.pageX,
              y: zoom_point_new.y - e.pageY
            };
            divSection.style.transform = "scale(".concat(scale, ", ").concat(scale, ")");
            divMain.scrollTop = newScroll.y;
            divMain.scrollLeft = newScroll.x;
          }
        } catch (err) {
          _didIteratorError3 = true;
          _iteratorError3 = err;
        } finally {
          try {
            if (!_iteratorNormalCompletion3 && _iterator3["return"] != null) {
              _iterator3["return"]();
            }
          } finally {
            if (_didIteratorError3) {
              throw _iteratorError3;
            }
          }
        }
      });
    }
  } catch (err) {
    _didIteratorError = true;
    _iteratorError = err;
  } finally {
    try {
      if (!_iteratorNormalCompletion && _iterator["return"] != null) {
        _iterator["return"]();
      }
    } finally {
      if (_didIteratorError) {
        throw _iteratorError;
      }
    }
  }
}