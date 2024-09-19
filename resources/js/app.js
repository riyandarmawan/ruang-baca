import "./bootstrap";
import Alpine from "alpinejs";
import DOMPurify from 'dompurify';

// Register Alpine.js
window.Alpine = Alpine;
Alpine.start();

window.purify = DOMPurify;