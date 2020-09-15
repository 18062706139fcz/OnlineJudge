export const asyncLoadCss = async (url, callback) => {
  let res = await loadCss(url);
  if (res) {
    if (callback) callback();
  } else {
    return new Error("Load css failed!");
  }
};

export const asyncLoadScript = async (url, callback) => {
  let res = await loadScript(url);
  if (res) {
    if (callback) callback();
  } else {
    return new Error("Load script failed!");
  }
};

export const asyncLoadScriptArr = async (urls, callback) => {
  let res = await loadScriptArr(urls);
  console.log(res);
};

export const loadCss = (url) => {
  return new Promise((resolve, reject) => {
    let el_head = document.getElementsByTagName("head")[0];
    let el_link = document.createElement("link");
    el_link.rel = "stylesheet";
    el_link.type = "text/css";
    el_link.href = url;
    el_head.appendChild(el_link);
    el_link.onload = () => {
      console.log(`Load ${url} successfully!`);
      resolve(true);
    };
    el_link.onerror = () => {
      reject(false);
    };
  });
};

export const loadScript = (url) => {
  return new Promise((resolve, reject) => {
    let el_body = document.getElementsByTagName("body")[0];
    let el_srcipt = document.createElement("script");
    el_srcipt.src = url;
    el_body.appendChild(el_srcipt);
    el_srcipt.onload = () => {
      console.log(`Load ${url} successfully!`);
      resolve(true);
    };
    el_srcipt.onerror = () => {
      reject(false);
    };
  });
};

export const formatImgUrl = (url) => {
  return url.replace("..", "http://dev.acmwhut.com/api");
};

const loadScriptArr = (urls) => {
  let loaderArr = [];
  for (let i = 0; i < urls.length; i++) {
    loaderArr.push(loadScript(urls[i]));
  }
  Promise.all(loaderArr)
    .then((res) => {
      return res;
    })
    .catch((err) => {
      return err;
    });
};

export const judgeWap = function () {
  let bodyWidth = document.body.clientWidth;
  let bodyHeight = document.body.clientHeight;

  if (bodyHeight > bodyWidth || !IsPC()) {
    return true;
  }
  return false;
}

export const IsPC = function () {
  let userAgentInfo = navigator.userAgent;
  let Agents = new Array(
    "Android",
    "iPhone",
    "SymbianOS",
    "Windows Phone",
    "iPad",
    "iPod"
  );
  let flag = true;
  for (let v = 0; v < Agents.length; v++) {
    if (userAgentInfo.indexOf(Agents[v]) > 0) {
      flag = false;
      break;
    }
  }
  return flag;
}

export const getExploreName = function () {
  let explorer = window.navigator.userAgent;
  let ua = window.navigator.userAgent;
  let isSafari = ua.indexOf("Safari") != -1 && ua.indexOf("Version") != -1;
  //判断是否为IE浏览器
  if (explorer.indexOf("MSIE") >= 0) {
    return "IE";
  }
  //判断是否为Firefox浏览器
  else if (explorer.indexOf("Firefox") >= 0) {
    return "Firefox";
  }
  //判断是否为Chrome浏览器
  else if (explorer.indexOf("Chrome") >= 0) {
    return "Chrome";
  }
  //判断是否为Opera浏览器
  else if (explorer.indexOf("Opera") >= 0) {
    return "Opera";
  }
  //判断是否为Safari浏览器
  else if (isSafari) {
    return "Safari";
  } else return "Unknown";
}
