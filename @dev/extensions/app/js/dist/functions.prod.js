"use strict";var APP_HOST=window.location.host,APP_PATH=window.location.pathname;function getUrlParameter(t){for(var n,o=window.location.search.substring(1).split("&"),i=0;i<o.length;i++)if((n=o[i].split("="))[0]===t)return void 0===n[1]||decodeURIComponent(n[1])}function domain_from_url(t){var n,o;return(o=t.match(/^(?:https?:\/\/)?(?:[^@\n]+@)?(?:www\.)?([^:\/\n\?\=]+)/im))&&(o=(n=o[1]).match(/^[^\.]+\.(.+\..+)$/))&&(n=o[1]),n}