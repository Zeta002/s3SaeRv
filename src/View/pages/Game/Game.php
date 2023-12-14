<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Unity WebGL Player | SAE3_3D</title>
    <link rel="shortcut icon" href="TemplateData/favicon.ico">
    <link rel="stylesheet" href="TemplateData/style.css">
    <link rel="stylesheet" href="TemplateData/navbar.css">
</head>
<body>
    <nav class="main-nav">
        <div id="pages-container">
            <a class="pages-link" href="/about">A propos</a>
            <a class="pages-link" href="/src/View/pages/Game/Game.php">Jouer</a>
            <a class="pages-link" href="/howtoplay">Comment jouer</a>
            <a class="pages-link" href="/credit">Crédit</a>
        </div>
        <a href="https://iut.univ-amu.fr/fr">
            <img id="logo-iut" src="/assets/images/univ-logo.png" alt="logo de institut universitaire de technologie">
        </a>
    </nav>
  <div id="unity-container" class="unity-desktop">
      <canvas id="unity-canvas" width=960 height=600 tabindex="-1"></canvas>
      <!--     <canvas id="unity-canvas" width=960 height=600 tabindex="-1"></canvas> -->
       <div id="unity-loading-bar">
            <div id="unity-logo"></div>
            <div id="unity-progress-bar-empty">
                <div id="unity-progress-bar-full"></div>
            </div>
        </div>
        <div id="unity-warning"> </div>
        <div id="unity-footer">
           <div id="unity-webgl-logo"></div>
         <div id="unity-fullscreen-button"></div>
         <div id="unity-build-title">SAE3_3D</div>
     </div>
 </div>
 <script>

     var container = document.querySelector("#unity-container");
     var canvas = document.querySelector("#unity-canvas");
     var loadingBar = document.querySelector("#unity-loading-bar");
     var progressBarFull = document.querySelector("#unity-progress-bar-full");
     var fullscreenButton = document.querySelector("#unity-fullscreen-button");
     var warningBanner = document.querySelector("#unity-warning");

     // Shows a temporary message banner/ribbon for a few seconds, or
     // a permanent error message on top of the canvas if type=='error'.
     // If type=='warning', a yellow highlight color is used.
     // Modify or remove this function to customize the visually presented
     // way that non-critical warnings and error messages are presented to the
     // user.
     function unityShowBanner(msg, type) {
         function updateBannerVisibility() {
             warningBanner.style.display = warningBanner.children.length ? 'block' : 'none';
         }
         var div = document.createElement('div');
         div.innerHTML = msg;
         warningBanner.appendChild(div);
         if (type == 'error') div.style = 'background: red; padding: 10px;';
         else {
             if (type == 'warning') div.style = 'background: yellow; padding: 10px;';
             setTimeout(function() {
                 warningBanner.removeChild(div);
                 updateBannerVisibility();
             }, 5000);
         }
         updateBannerVisibility();
     }

     var buildUrl = "Build";
     var loaderUrl = buildUrl + "/sae2test.loader.js";
     var config = {
         dataUrl: buildUrl + "/sae2test.data",
         frameworkUrl: buildUrl + "/sae2test.framework.js",
         codeUrl: buildUrl + "/sae2test.wasm",
         streamingAssetsUrl: "StreamingAssets",
         companyName: "DefaultCompany",
         productName: "SAE3_3D",
         productVersion: "0.1.0",
         showBanner: unityShowBanner,
     };

     // By default, Unity keeps WebGL canvas render target size matched with
     // the DOM size of the canvas element (scaled by window.devicePixelRatio)
     // Set this to false if you want to decouple this synchronization from
     // happening inside the engine, and you would instead like to size up
     // the canvas DOM size and WebGL render target sizes yourself.
     // config.matchWebGLToCanvasSize = false;

     if (/iPhone|iPad|iPod|Android/i.test(navigator.userAgent)) {
         // Mobile device style: fill the whole browser client area with the game canvas:

         var meta = document.createElement('meta');
         meta.name = 'viewport';
         meta.content = 'width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, shrink-to-fit=yes';
         document.getElementsByTagName('head')[0].appendChild(meta);
         container.className = "unity-mobile";
         canvas.className = "unity-mobile";

         // To lower canvas resolution on mobile devices to gain some
         // performance, uncomment the following line:
         // config.devicePixelRatio = 1;


     } else {
         // Desktop style: Render the game canvas in a window that can be maximized to fullscreen:
         canvas.style.width = "960px"; // Update this to your desired width
         canvas.style.height = "600px"; // Update this to your desired height
     }

     loadingBar.style.display = "block";

     var script = document.createElement("script");
     script.src = loaderUrl;
     script.onload = () => {
         createUnityInstance(canvas, config, (progress) => {
             progressBarFull.style.width = 100 * progress + "%";
         }).then((unityInstance) => {
             loadingBar.style.display = "none";
             fullscreenButton.onclick = () => {
                 unityInstance.SetFullscreen(1);
             };
         }).catch((message) => {
             alert(message);
         });
     };

     document.body.appendChild(script);

 </script>
 </body>
 </html>
