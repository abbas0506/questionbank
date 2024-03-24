import "./bootstrap";
// import "chartjs-plugin-outerlabels";

import jQuery from "jquery";
import { Html5QrcodeScanner } from "html5-qrcode";
window.$ = jQuery;

import AOS from "aos";
import "aos/dist/aos.css";

// AOS.init();
AOS.init({
    duration: 1000,
    easing: "ease-in-out",
    once: true,
    mirror: false,
});
