export function getCookie(name) {
  let encodedName = encodeURIComponent(name).replace(
    /([\.$?*|{}\(\)\[\]\\\/\+^])/g,
    "\\$1"
  );
  let matches = document.cookie.match(
    new RegExp("(?:^|; )" + encodedName + "=([^;]*)")
  );
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

export function setCookie(name, value, options = {}) {
  options = {
    path: "/",
    ...options,
  };

  if (options.expires instanceof Date) {
    options.expires = options.expires.toUTCString();
  }

  let updatedCookie =
    encodeURIComponent(name) +
    "=" +
    encodeURIComponent(value).replace(/%(..)/g, decodeURIComponent);

  for (let optionKey in options) {
    updatedCookie += "; " + optionKey;
    let optionValue = options[optionKey];
    if (optionValue !== true) {
      updatedCookie += "=" + optionValue;
    }
  }

  document.cookie = updatedCookie;
}
